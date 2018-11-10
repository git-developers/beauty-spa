<?php
function dt_get_page_permalink_by_its_template( $temlplate ) {
	$permalink = null;

	$pages = get_posts( array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $temlplate ) );

	if ( is_array( $pages ) && count( $pages ) > 0 ) {
		$login_page = $pages[0];
		$permalink = get_permalink( $login_page->ID );
	}
	return $permalink;
}

add_action( 'wp_ajax_dt_fill_staffs', 'dt_fill_staffs' ); # For logged-in users
add_action( 'wp_ajax_nopriv_dt_fill_staffs','dt_fill_staffs'); # For logged-out users 
function dt_fill_staffs() {
	if( isset($_REQUEST['service_id']) ){
		
		$service_id = $_REQUEST['service_id'];
		
		if( dttheme_is_plugin_active('sitepress-multilingual-cms/sitepress.php') ) {
			global $sitepress;
			
			$default_lang = $sitepress->get_default_language();
			$current_lang = ICL_LANGUAGE_CODE;
			
			if( $default_lang != $current_lang ) {
				$service_id =  icl_object_id(  $service_id ,'dt_services', true ,$sitepress->get_default_language());
			}
		}
		
		$wp_query = new WP_Query();
		$staffs = array(
			'post_type' => 'dt_staffs',
			'posts_per_page' => '-1',
			'meta_query'=>array());

		$staffs['meta_query'][] = array(
			'key'     => '_services',
			'value'   =>  $service_id,
			'compare' => 'LIKE');
		
		$wp_query->query( $staffs );
		echo "<option value=''>".__('Select','dt_themes')."</option>";
		if( $wp_query->have_posts() ):
			while( $wp_query->have_posts() ):
				$wp_query->the_post();
				$id = get_the_ID();
				$title = get_the_title($id);
				echo "<option value='{$id}'>{$title}</option>";
			endwhile;
		endif;	
	}
	die( '' );
}

add_action( 'wp_ajax_dt_available_times', 'dt_available_times' ); # For logged-in users
add_action( 'wp_ajax_nopriv_dt_available_times', 'dt_available_times' ); # For logged-out users
function dt_available_times(){

	$date = $_REQUEST['date'];
	$stime = $_REQUEST['stime'];
	$etime = $_REQUEST['etime'];
	$staff = $_REQUEST['staff'];
	$staffid = $_REQUEST['staffid'];
	$service = $_REQUEST['service'];
	$serviceid = $_REQUEST['serviceid'];
	$mgs = array();
	
	if( empty( $staffid ) ) {
		# Staff
		$wp_query = new WP_Query();
		$staffs = array( 'post_type' => 'dt_staffs', 'orderby'=>'ID', 'order'=>'DESC', 'posts_per_page' => '-1', 'meta_query'=>array());
		$staffs['meta_query'][] = array( 'key' => '_services', 'value' => $serviceid ,'compare' => 'LIKE');
		$wp_query->query( $staffs );
		
		if( $wp_query->have_posts() ):
			while( $wp_query->have_posts() ):
				$wp_query->the_post();
				$staffid = get_the_ID();
				$staff =  get_the_title($staffid);
				$mgs[$staffid] = $staff;
			endwhile;
		endif;	
		# Staff
	} else {
		$mgs = array($staffid=>$staff);
	}
	

	$info = get_post_meta( $serviceid, "_info",true);
	$info = is_array($info) ? $info : array();
	$service_duration = array_key_exists('duration', $info) ? $info['duration'] :  1800;
	
	$bookings = array();
	$working_hours = array();
	$out = "";

	foreach( $mgs as $sid => $sname ) {

		# 1. Get Staff Schedule Time
		$timer = get_post_meta( $sid, "_timer",true);
		$timer = is_array($timer) ? $timer : array();
		$timer = array_filter($timer);
		$timer = array_diff( $timer, array('00:00'));

		$working_hours = array();

		foreach ( array('monday','tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday') as $day ):
			if(  array_key_exists("{$day}_start",$timer)  ):
				$working_hours[$day] = array( 'start' => $timer["{$day}_start"] , 'end' => $timer["{$day}_end"]);
			endif;	
		endforeach;
		
		#Staff existing bookings
		global $wpdb;
		$q = "SELECT option_value FROM $wpdb->options WHERE option_name LIKE '_dt_reservation_mid_{$staffid}%' ORDER BY option_id ASC";
		$rows = $wpdb->get_results( $q );
		if( $rows ){
			foreach ($rows as $row ) {
				if( is_serialized($row->option_value ) ) {
					
					$data = unserialize($row->option_value);
					
					/*$data = $data['start'];
					$data = explode("(", $data);
					$data = new DateTime($data[0]);	
					$data = $data->format("Y-m-d G:i:s");
					$bookings[] = $data;*/
					
					$start = $data['start'];
					$start = explode("(", $start);
					$start = new DateTime($start[0]);	
					$start = $start->format("Y-m-d G:i:s");
					

					$end = $data['end'];
					$end = explode("(", $end);
					$end = new DateTime($end[0]);	
					$end = $end->format("Y-m-d G:i:s");
					
					#$bookings[ $data['id'] ] = array( 'start' => $start, 'end' => $end , 'rs' => $data['start'], 're' => $data['end'] );
					$bookings[ $data['id'] ] = array( 'start' => $start, 'end' => $end );
					
				}
			}
		}
		#Staff existing bookings
		
		# Final Bookings
		$final_bookings = array();
		foreach( $bookings as $booking ){			
			$start = new DateTime( $booking['start'] );
			$end = new DateTime( $booking['end'] );
			$interval = DateInterval::createFromDateString($service_duration.' seconds');
			$times  = new DatePeriod($start, $interval, $end);
			foreach ($times as $time) {
				$final_bookings[] = $time->format('Y-m-d G:i:s');
			}
		}
		
		$slots = array();
		
		if( count($working_hours) ){
			//$loop = ( count($working_hours) == 7 ) ? 7 : 10;
			$loop = 7;
			$i = 0;
			
			while( $i < $loop ){
				#$slot = findTimeSlot( $working_hours, $bookings, $date , $service_duration );
				$slot = findTimeSlot( $working_hours, $final_bookings, $date , $service_duration );
				if( !empty($slot) ){
					$slots[] = $slot;
				}
				$date = new DateTime($date);
				$date->modify("+1 day");
				$date = $date->format('Y-m-d');
				$i++;
			}#endwhile
		}
		
		
		if( !empty($slots) ) {
			$out .= "<h5 class='hr-title'>";
			$out .= "<span> {$sname} </span>";
			$out .= "</h5>";
			$out .= "<ul class='time-table'>";
			foreach( $slots as $slot ){
				if( is_array($slot) ){
					foreach( $slot as $date => $s  ){
						$out .= "<li> <span> {$sname} </span> {$date}";
						if(is_array($s)){
							$out .= "<ul class='time-slots' >";
							foreach( $s as $time ){
								$start = new DateTime($time->start);
								$start = $start->format( 'm/d/Y H:i');

								$end = new DateTime($time->end);
								$end = $end->format( 'm/d/Y H:i');

								$date =  new DateTime($time->date);
								$date = $date->format( 'm/d/Y');

								$out .= '<li>';
								$out .= "<a href='#' data-sid='{$sid}' data-start='{$start}' data-end='{$end}' data-date='{$date}' data-time='{$time->hours}' class='time-slot'>";
								$out .= $time->label;
								$out .= '</a>';
								$out .= '</li>';
							}
							$out .= '</ul>';
						}
						$out .= '</li>';
					}
				}
			}
			$out .= "</ul>";
		}	
	} # Staffs loops end
	
	if( empty($out) )
		echo '<p>'.__('No Time slots available','dt_themes').'</p>';
	else
		echo $out;
		
	die('');
}

function findTimeSlot( $working_hours, $bookings, $date , $service_duration = 1800 ){

	$time_format = get_option('time_format');

	$timeslot= array();
	$dayofweek = date('l',strtotime($date));
	$dayofweek = strtolower($dayofweek);

	$is_date_today = ($date == date( 'Y-m-d', current_time( 'timestamp' ) ) );
	$current_time  = date( 'H:i:s', ceil( current_time( 'timestamp' ) / 900 ) * 900 );

	$past = ( $date <  date('Y-m-d') ) ? true : false;

	if( array_key_exists($dayofweek, $working_hours)  && !$past ){

		$working_start_time = ($is_date_today && $current_time > $working_hours[ $dayofweek ][ 'start' ]) ? $current_time : $working_hours[ $dayofweek ][ 'start' ];
		$working_end_time = $working_hours[ $dayofweek ][ 'end' ];

		$show = $is_date_today && ($current_time > $working_end_time) ? false : true;
		if( $show ) {
			
			$intersection = findIntersection( $working_start_time,$working_hours[ $dayofweek ][ 'end' ],$_REQUEST['stime'],$_REQUEST['etime']);
			
			for( $time = dtStrToTime($intersection['start']); $time <= ( dtStrToTime($intersection['end']) - $service_duration ); $time += $service_duration ){

				$value = $date.' '.date('G:i:s', $time);
				$end = $date.' '.date('G:i:s', ($time+$service_duration));

				if( !in_array($value, $bookings) ) { # if already booked in $time
					$object = new stdClass();
					$object->label = date( $time_format, $time );
					$object->date = $date;
					$object->start = $value;
					$object->hours = date('g:i A', $time).' - '.date('g:i A', ($time+$service_duration));
					$object->end = $end;
					$translatable_day =  translatableDay( date('l',strtotime($date)) );
					$p = $date.'<span> ('.$translatable_day.') </span>';
					$timeslot[$p][$time] = $object;
				}
			}
		}
	}
	return $timeslot;
}

function translatableDay( $day ) {
	
	switch( $day ):
		case 'Sunday':
			$day = __('Sunday','dt_themes');
		break;
	
		case 'Monday':
			$day = __('Monday','dt_themes');
		break;

		case 'Tuesday':
			$day = __('Tuesday','dt_themes');
		break;

		case 'Wednesday':
			$day = __('Wednesday','dt_themes');
		break;

		case 'Thursday':
			$day = __('Thursday','dt_themes');
		break;

		case 'Friday':
			$day = __('Friday','dt_themes');
		break;

		case 'Saturday':
			$day = __('Saturday','dt_themes');
		break;
	endswitch;
	
	return $day;
}

function findIntersection( $p1_start, $p1_end, $p2_start, $p2_end ) {
	$result = false;
	if ( $p1_start <= $p2_start && $p1_end >= $p2_start && $p1_end <= $p2_end ) {
		$result = array( 'start' => $p2_start, 'end' => $p1_end );
	} else if ( $p1_start <= $p2_start && $p1_end >= $p2_end ) {
		$result = array( 'start' => $p2_start, 'end' => $p2_end );
	} else if ( $p1_start >= $p2_start && $p1_start <= $p2_end && $p1_end >= $p2_end ) {
		$result = array( 'start' => $p1_start, 'end' => $p2_end );
	} else if ( $p1_start >= $p2_start && $p1_end <= $p2_end ) {
		$result = array( 'start' => $p1_start, 'end' => $p1_end );
    }
	return $result;
}

function dtStrToTime( $str ) {
	return strtotime( sprintf( '1985-03-17 %s', $str ) );
}


#Front End - tpl-reservation ajax
function dt_customer( $name, $email, $phone ){

	$user = array('name'=>$name,'emailid'=>$email,'phone'=>$phone);
	$users = array();

	$wp_query = new WP_Query();
	$customers = array( 'post_type'=>'dt_customers','posts_per_page'=>-1,'order_by'=> 'published');

		$wp_query->query( $customers );
		if( $wp_query->have_posts() ):
			while( $wp_query->have_posts() ):
				$wp_query->the_post();
				$the_id = get_the_ID();
				$title = get_the_title($the_id);

				$info = get_post_meta ( $the_id, "_info",true);
				$info = is_array($info) ? $info : array();
				$info['name'] = $title;
				$users[$the_id] = $info;
			endwhile;
		endif;

	$uid = array_search( $user, $users);

	if( $uid  ){
		$uid = $uid;
	} else {
		#Insert new customer
		$post_id = wp_insert_post( array('post_title' => $user['name'], 'post_type' => 'dt_customers', 'post_status' => 'publish'));
		if( $post_id > 0 ) {
			$info['emailid'] = $user['emailid'];
			$info['phone'] = $user['phone'];
			update_post_meta ( $post_id, "_info",$info);
			$uid = $post_id;
		}
	}
	return $uid;
}

add_action( 'wp_ajax_dt_new_reservation', 'dt_new_reservation' ); # For logged-in users
add_action( 'wp_ajax_nopriv_dt_new_reservation','dt_new_reservation'); # For logged-out users
function dt_new_reservation(){
	global $wpdb;

	#New Customer
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		$customer = dt_customer($name,$email,$phone);
	#New Customer
	
	$id = $wpdb->get_var("SELECT max(option_id) FROM $wpdb->options");
	$title = __("New Reservation By ",'dt_themes').$name;
	$body =  $_REQUEST['body'];

	$staff = $_REQUEST['staff'];
	$service = $_REQUEST['service'];
	if( dttheme_is_plugin_active('sitepress-multilingual-cms/sitepress.php') ) {
		global $sitepress;
		
		$default_lang = $sitepress->get_default_language();
		$current_lang = ICL_LANGUAGE_CODE;
		
		if( $default_lang != $current_lang ) {
			$service =  icl_object_id(  $service ,'dt_services', true ,$sitepress->get_default_language());
		}
	}
	
	
	$start = $_REQUEST['start'];
	$end = $_REQUEST['end'];

	$option = "_dt_reservation_mid_{$staff}_id_{$id}";
	
	$data = array( 'id' => $id, 'title' => $title, 'body' => $body, 'start'=> $start, 'end'=>$end, 'service'=>$service, 'user'=>$customer, 'readOnly'=>true );
	
	# Sending Mail
		$client_name = $client_phone = $client_email = $amount = "";
		
		#Staff
		$staff_name = get_the_title($staff);
		$service_name = get_the_title($service);

		$sinfo = get_post_meta( $staff , "_info",true);
		$sinfo = is_array($sinfo) ? $sinfo : array();
		$staff_price = array_key_exists("price", $sinfo) ? $sinfo['price'] : 0;
		$staff_price = floatval($staff_price);

		#Service Price
		if( !empty( $data['service']) ){
			$serviceinfo = get_post_meta($data['service'],'_info',true );
			$serviceinfo = is_array( $serviceinfo ) ? $serviceinfo : array();
			$service_price = array_key_exists("price", $serviceinfo) ? $serviceinfo['price'] : 0;
			$service_price = floatval($service_price);
		}

		$amount = ( ($staff_price+$service_price) > 0 ) ?  dt_currency_symbol( dttheme_option('company', 'currency') ).' '.( $staff_price+$service_price ) : $amount;
		
		#Client
		if( !empty($data['user']) ){

			$client_name = get_the_title($data['user']);
			$cinfo = get_post_meta( $data['user'], "_info",true);
			$cinfo = is_array($cinfo) ? $cinfo : array();

			$client_email = array_key_exists('emailid', $cinfo) ? $cinfo['emailid'] : "";
			$client_phone = array_key_exists('phone', $cinfo) ? $cinfo['phone'] : "";;
		}

		#Admin
		$user_info = get_userdata(1);
		$admin_name = $user_info->nickname;
		$admin_email = $user_info->user_email;

		$array = array(
			'admin_name' => $admin_name,
			'staff_name' => $staff_name,
			'service_name' => $service_name,
			'appointment_id' => $data['id'],
			'appointment_time' => $_POST['time'],
			'appointment_date' => $_POST['date'],
			'appointment_title' => $data['title'],
			'appointment_body' =>  $data['body'],
			'client_name' => $client_name,
			'client_phone' => $client_phone,
			'client_email' => $client_email,
			'amount' => $amount,
			'company_logo' => 'Company Logo',
			'company_name' => 'Company Name',
			'company_phone' => 'Company Phone',
			'company_address' => 'Company Address',
			'company_website' => 'Company Website');

		#Admin Mail
		$subject =  dttheme_option('company', 'appointment_notification_to_admin_subject');
		$subject = dt_replace( $subject, $array);
		
		$message =  dttheme_option('company', 'appointment_notification_to_admin_message' );
		$message = dt_replace( $message, $array);
		dt_send_mail( $admin_email, $subject, $message);
		

		#Staff Mail
		$subject = dttheme_option('company', 'appointment_notification_to_staff_subject');
		$subject = dt_replace( $subject, $array);

		$message = dttheme_option('company', 'appointment_notification_to_staff_message');
		$message = dt_replace( $message, $array);
		dt_send_mail( $sinfo["emailid"], $subject, $message);

		#Client Mail
		if( !empty($client_email) ) {
			$subject = dttheme_option('company', 'appointment_notification_to_client_subject');
			$subject = dt_replace( $subject, $array);

			$message = dttheme_option('company', 'appointment_notification_to_client_message');
			$message = dt_replace( $message, $array);

			dt_send_mail( $client_email, $subject, $message);
		}


	# Sending Mail
	if( update_option( $option, $data ) ){
		#echo "Added";
		
		#Add Payment Details to options table
		$payment_id = str_replace('_dt_reservation_',"_dt_payment_",$option);
		#$amount = trim(str_replace(dt_currency_symbol( get_option("dt_currency") ),"",$amount));
		$amount = $staff_price+$service_price;

		$payment_data = array( 
			'date' =>  date('Y-m-d H:i:s'),
			'service' => get_the_title($data['service']),
			'type' => 'local',
			'customer_id' =>$data['user'],
			'total'=> $amount);

		update_option($payment_id,$payment_data);
		# $result['url'] = home_url();
		
		$url = dt_get_page_permalink_by_its_template('tpl-reservation.php');
		$url = add_query_arg( array('action'=>'success'), $url );
		$result['url'] =  $url;
		echo json_encode( $result );
	}else{
		echo "FAiled";
	}
	die('');
}

#Paypal Express Checkout

function sendPaypalRequest( $method, $data ){

	$uname = dttheme_option('company','api-username');
	$pass = dttheme_option('company','api-password');
	$sign = dttheme_option('company','api-signature');
	$mode = dttheme_option('company','enable-live') ? "" : ".sandbox";
	$url = "https://api-3t".$mode.".paypal.com/nvp";
    $version = urlencode('109.0');
    // Set the curl parameters.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);

    // Turn off the server and peer verification (TrustManager Concept).
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Set the API operation, version, and API signature in the request.
    $nvpreq = "METHOD={$method}&VERSION={$version}&PWD={$pass}&USER={$uname}&SIGNATURE={$sign}{$data}";

    // Set the request as a POST FIELD for curl.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);

    if(!$httpResponse) {
        exit("$method failed: ".curl_error($ch).'('.curl_errno($ch).')');
    }

    // Extract the response details.
    $httpResponseArray = explode("&", $httpResponse);

    $httpParsedResponseArray = array();
    foreach ($httpResponseArray as $i => $value) {
    	$tmpAr = explode("=", $value);
    	if(sizeof($tmpAr) > 1) {
    		$httpParsedResponseArray[$tmpAr[0]] = $tmpAr[1];
        }
    }

    if((0 == sizeof($httpParsedResponseArray)) || !array_key_exists('ACK', $httpParsedResponseArray)) {
    	exit("Invalid HTTP Response for POST request($nvpreq) to $url.");
    }

    return $httpParsedResponseArray;
}

add_action( 'wp_ajax_dt_paypal_request', 'dt_paypal_request' ); # For logged-in users
add_action( 'wp_ajax_nopriv_dt_paypal_request','dt_paypal_request'); # For logged-out users
function dt_paypal_request() {

	global $wpdb;

	#New Customer
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		$customer = dt_customer($name,$email,$phone);
	#New Customer

	$id = $wpdb->get_var("SELECT max(option_id) FROM $wpdb->options");
	$title = __("New Reservation By ",'dt_themes').$name;
	$body =  $_REQUEST['body'];

	$staff = $_REQUEST['staff'];
	$service = $_REQUEST['service'];
	$start = $_REQUEST['start'];
	$end = $_REQUEST['end'];

	$option = "_dt_reservation_mid_{$staff}_id_{$id}";
	$data = array( 'id' => $id, 'title' => $title, 'body' => $body, 'start'=> $start, 'end'=>$end, 'service'=>$service, 'user'=>$customer, readOnly=>true );

	# Amount Calculation
		$sinfo = get_post_meta( $staff , "_info",true);
		$sinfo = is_array($sinfo) ? $sinfo : array();
		$staff_price = array_key_exists("price", $sinfo) ? $sinfo['price'] : 0;
		$staff_price = floatval($staff_price);

		$serviceinfo = get_post_meta($data['service'],'_info',true );
		$serviceinfo = is_array( $serviceinfo ) ? $serviceinfo : array();
		$service_price = array_key_exists("price", $serviceinfo) ? $serviceinfo['price'] : 0;
		$service_price = floatval($service_price);
		$amount = ($staff_price+$service_price);
	# Amount Calculation

	# Paypal
	if( update_option( $option, $data ) ) {
		
		$mode = dttheme_option('company','enable-live') ? "" : ".sandbox";
		$uname = dttheme_option('company','api-username');
		$currency_code = dttheme_option('company', 'currency');
		
		$url = add_query_arg( array( 
			'cmd' => '_xclick',
			'item_name' => __("Service :",'dt_themes').' '.get_the_title($service).' - '. __("Time :",'dt_themes').$_REQUEST['date'].'('.$_REQUEST['time'].')',
			'item_number' => $option,
			'business' => $uname,
			'currency_code' => $currency_code,
			'amount' => $amount,
			'return' => add_query_arg( array( 'action'=>'dt_paypal_retrun', 'res'=>$option ) , home_url('/')  ) ,
			'cancel_return' => add_query_arg ( array( 'action'=>'dt_paypal_cancel', 'res'=>$option ), home_url('/')  )		
			
		 ), 'https://www'.$mode.'.paypal.com/cgi-bin/webscr' );
		
		$result['url'] = $url;
		echo json_encode( $result );
	}
	
	die('');
}
#Paypal Express Checkout End


add_action( 'wp_loaded', 'dt_paypal_listener' ); # Paypal ExpressCheckout redirect 
function dt_paypal_listener() {

	if( isset( $_GET['action'] ) ) {
		switch ( $_GET['action'] ) {

			case 'dt_paypal_cancel':
				$args = array('action','res');
				delete_option($_GET['res']);
				$url = dt_get_page_permalink_by_its_template('tpl-reservation.php');
				$url = add_query_arg( array( 'action' => 'error' ) , $url );
				wp_safe_redirect($url);
				exit;
			break;

			case 'dt_paypal_retrun':		
				#if( isset( $_REQUEST['st'] ) && ( $_REQUEST['st'] == 'Completed' ) ) {
					
					$reservation = get_option($_REQUEST['item_number']);
					
					$staff = explode("_",$_REQUEST['item_number']);
					$staff_name = get_the_title($staff[4]);
					$service_name = get_the_title($reservation['service']);
					$start = new DateTime($reservation['start']);
					$end = new DateTime($reservation['end']);
					$date = date_format($start, "Y/m/d");
					$time = date_format($start,"g:i a").' - '.date_format($end,"g:i a");
	
					$client_name = get_the_title($reservation['user']);
					$cinfo = get_post_meta( $reservation['user'], "_info",true);
					$cinfo = is_array($cinfo) ? $cinfo : array();
					$client_email = array_key_exists('emailid', $cinfo) ? $cinfo['emailid'] : "";
					$client_phone = array_key_exists('phone', $cinfo) ? $cinfo['phone'] : "";
	
					#Staff Price
					$sinfo = get_post_meta( $staff[4] , "_info",true);
					$sinfo = is_array($sinfo) ? $sinfo : array();
					$staff_price = array_key_exists("price", $sinfo) ? $sinfo['price'] : 0;
					$staff_price = floatval($staff_price);
	
					#Service Price
					$serviceinfo = get_post_meta($reservation['service'],'_info',true );
					$serviceinfo = is_array( $serviceinfo ) ? $serviceinfo : array();
					$service_price = array_key_exists("price", $serviceinfo) ? $serviceinfo['price'] : 0;
					$service_price = floatval($service_price);
	
					$amount = ( ($staff_price+$service_price) > 0 ) ? ( $staff_price+$service_price ) : "";
					
					$currency_code = dttheme_option('company', 'currency');
					$amount = !empty( $amount ) ? $currency_code . $amount.' ['.$_REQUEST['st'].']' : '';
					
					#Admin
					$user_info = get_userdata(1);
					$admin_name = $user_info->nickname;
					$admin_email = $user_info->user_email;

					$array = array(
						'admin_name' => $admin_name,
						'admin_email' => $admin_email,
						'staff_name' => $staff_name,
						'service_name' => $service_name,
						'appointment_id' => $reservation['id'],
						'appointment_time' => $time,
						'appointment_date' => $date,
						'appointment_title' => $reservation['title'],
						'appointment_body' =>  $reservation['body'],
						'client_name' => $client_name,
						'client_phone' => $client_phone,
						'client_email' => $client_email,
						'amount' => $amount,
						'company_logo' => 'Company Logo',
						'company_name' => 'Company Name',
						'company_phone' => 'Company Phone',
						'company_address' => 'Company Address',
						'company_website' => 'Company Website');
					
					#Admin Mail
					$subject =  dttheme_option('company', 'appointment_notification_to_admin_subject');
					$subject = dt_replace( $subject, $array);
					
					$message =  dttheme_option('company', 'appointment_notification_to_admin_message' );
					$message = dt_replace( $message, $array);

					dt_send_mail( $admin_email, $subject, $message);
					
					
					#Staff Mail
					$subject =  dttheme_option('company', 'appointment_notification_to_staff_subject');

					$subject = dt_replace( $subject, $array);

					$message =  dttheme_option('company', 'appointment_notification_to_staff_message' );
					$message = dt_replace( $message, $array);

					dt_send_mail( $sinfo["emailid"], $subject, $message);

					#Customer Mail
					$subject =  dttheme_option('company', 'appointment_notification_to_client_subject');
					$subject = dt_replace( $subject, $array);

					$message =  dttheme_option('company', 'appointment_notification_to_client_message' );
					$message = dt_replace( $message, $array);
					dt_send_mail( $client_email, $subject, $message);

					#Add Payment Details to options table
					$payment_id = str_replace('_dt_reservation_',"_dt_payment_",$_REQUEST['item_number']);
					
					$payment_data = array( 
						'date' =>  date('Y-m-d H:i:s'),
						'service' => get_the_title($reservation['service']),
						'type' => 'paypal',
						'customer_id' =>$reservation['user'],
						'status' => $_REQUEST['st'],
						'transaction_id'=> $_REQUEST['tx'],
						'total'=> urldecode( $_REQUEST['amt']));
					update_option($payment_id,$payment_data);
					
					$url = dt_get_page_permalink_by_its_template('tpl-reservation.php');
					$url = add_query_arg( array( 'action' => 'success' ) , $url );
					
					wp_safe_redirect($url);
					exit();
				#} # st == Completed
			break;
		}
	}
}?>