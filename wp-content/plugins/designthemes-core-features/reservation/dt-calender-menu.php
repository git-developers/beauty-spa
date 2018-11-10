<?php if ( !class_exists( 'DTCalenderMenu' ) ) {

	class DTCalenderMenu {

		function __construct() {
			add_action( 'admin_menu', array( 
				$this,
				'register_calendar_menu'
			) );

			// 1. List Reservations For Individual Members
			add_action( 'wp_ajax_dt_list_member_reservations' , array(
				$this,
				'dt_list_member_reservations'
			) );

			// 2. Get Reservation id - For Adding new reservation
			add_action( 'wp_ajax_dt_new_reservation_id', array(
				$this,
				'dt_new_reservation_id'
			) );

			// 3. Load Services based on Staff id
			add_action('wp_ajax_dt_load_services', array(
				$this,
				'dt_load_services'
			) );

			// 3.1  Load Customers
			add_action('wp_ajax_dt_set_customer', array(
				$this,
				'dt_set_customer'
			) );

			// 4. Add New Reservation
			add_action( 'wp_ajax_dt_add_new_reservation', array(
				$this,
				'dt_add_new_reservation'
			) );

			// 5. Update Reservation
			add_action( 'wp_ajax_dt_update_reservation',  array(
				$this,
				'dt_update_reservation'
			) );

			// 6. Delete Reservation
			add_action( 'wp_ajax_dt_delete_reservation', array(
				$this,
				'dt_delete_reservation'
			) );
		}

		function register_calendar_menu() {

			$calender_menu = add_menu_page( __( 'Reservations', 'dt_themes'), __( 'Calender', 'dt_themes'), 'manage_options', 'dt_calender', array( $this, 'calender_menu' ), 'dashicons-clipboard', 24 );

			add_action( 'load-'.$calender_menu , array(
				$this,
				'dt_load_js_css'
			), 11 );
		}

		function calender_menu(){
			include_once plugin_dir_path ( __FILE__ ) . 'menu/calender/calender.php';
		}

		function dt_load_js_css(){

			wp_enqueue_style( 'jquery-ui-css', 'http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css' );	
			wp_enqueue_style( 'dt-weekcalender-css', plugin_dir_url ( __FILE__ ).'menu/calender/jquery.weekcalendar.css' );
			wp_enqueue_style( 'dt-custom-css', plugin_dir_url ( __FILE__ ).'menu/calender/custom.css' );

			wp_enqueue_script('dt-date-js' , plugin_dir_url ( __FILE__ ).'menu/calender/js/date.js');
			wp_enqueue_script('dt-weekcalender-js' , plugin_dir_url ( __FILE__ ).'menu/calender/js/jquery.weekcalendar.js');
			wp_enqueue_script('dt-calender-js' , plugin_dir_url ( __FILE__ ).'menu/calender/js/dt-calender.js', array(
				'jquery',
				'jquery-ui-widget',
				'jquery-ui-dialog',
				'jquery-ui-button',
				'jquery-ui-draggable',
				'jquery-ui-droppable',
				'jquery-ui-resizable')
			 );
			wp_localize_script('dt-calender-js', 'reservation', array(
				'new_event' => __('Add New Reservation','dt_themes'),
				'edit' => __('Edit Reservation','dt_themes'),
			));
		}

		function dt_list_member_reservations(){
			if ( !empty($_REQUEST['id'] ) ) {

				$mid =$_REQUEST['id'];
				$start =$_REQUEST['start'];
				$end =$_REQUEST['end'];

				$result = array( 'events' => array() , 'freebusys' => array());

				# To generate events
				global $wpdb;
				$q = "SELECT option_name FROM $wpdb->options WHERE option_name LIKE '_dt_reservation_mid_{$mid}%' ORDER BY option_id ASC";
				$rows = $wpdb->get_results( $q );
				if ( $rows ) {
					foreach ( $rows as $row ) {
						$result['events'][] = get_option( $row->option_name );
					}
				}

				# To generate freebusys
				$timer = get_post_meta( $mid, "_timer",true);
				$timer = is_array($timer) ? $timer : array();
				$days = array();

				foreach ( array('monday','tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday') as $day ):
					if( !empty($timer["{$day}_start"]) ){
						$days[$day] = array( 'start' => $timer["{$day}_start"], 'end' => $timer["{$day}_end"]  );
					}
				endforeach;

				$working_days = dates_range( $start, $end , array_keys($days));
				foreach ($working_days as $working_day ) {
					$date = date_i18n('Y-m-d', strtotime($working_day) );
					$wdate = new DateTime($date);
					$day = strtolower($wdate->format('l'));

					$s = new DateTime($date.' '. $timer["{$day}_start"]);
					$s = $s->format( 'm/d/Y H:i');

					$e = new DateTime($date.' '. $timer["{$day}_end"]);
					$e = $e->format( 'm/d/Y H:i');
					$result['freebusys'][] = array( "start" => $s , "end"=>$e, "free"=>true);
				}
				echo json_encode( $result );
			}
			die('');
		}

		function dt_new_reservation_id(){
			global $wpdb;
			$rs = $wpdb->get_var( "SELECT max(option_id) FROM $wpdb->options" );
			echo $rs;
			die( '' );
		}

		function dt_load_services() {
			$out = "<option value=''>".__('Select Service','dt_themes')."</option>";
			$current = "";

			if( !empty($_REQUEST['option']) ){
				if( !get_option($_REQUEST['option'].'_agenda') ){
					$option = get_option( $_REQUEST['option']);
				}else{
					$option = get_option( $_REQUEST['option'].'_agenda');
				}

				$current = $option['service'];
			}

			if( !empty($_REQUEST['memberid']) ) {

				$services = get_post_meta( $_REQUEST['memberid'] , "_services",true);
				$services = is_array($services) ? $services : array();

				if( !empty($services) ){
					$services = implode(",", $services);
					$cp_services = get_posts( array('post_type'=>'dt_services','posts_per_page'=>'-1','order'=> 'ASC', 'orderby' => 'title', 'include'=>$services ) );
					foreach( $cp_services as $cp_service ){
						$id = $cp_service->ID; 
						$title = $cp_service->post_title;

						$info = get_post_meta( $id, "_info",true);
						$info = is_array($info) ? $info : array();
						$duration = array_key_exists('duration', $info) ? durationToString( $info['duration'] ) : "";

						$selected = ( $current == $id ) ? " selected='selected' " : "";
						$out .= "<option value='{$id}' {$selected}>{$title} ( {$duration} ) </option>";
					}
				}
			}
			echo $out;
			die('');
		}

		function dt_add_new_reservation() {

			$now =  new DateTime( "now" );
			$start = new DateTime( $_REQUEST['c_start'] );
			$readOnly =  ( $now < $start ) ? true : false;
			$data = array( 
				'id'=>$_REQUEST['id'],
				'title'=>$_REQUEST['title'],
				'body'=>$_REQUEST['body'],
				'start'=>$_REQUEST['start'],
				'end'=>$_REQUEST['end'],
				'user' => $_REQUEST['user'],
				'service'=>$_REQUEST['service'],
				'readOnly'=> $readOnly );
			update_option( $_REQUEST['option'], $data );

				# Sending Mail
				$staff_name = get_the_title($_POST['memberid']);
				$service_name = get_the_title( $_POST['service'] );
				$info = get_post_meta( $_POST['memberid'] , "_info",true);
				$info = is_array($info) ? $info : array();
				if( array_key_exists("emailid", $info) ) {

					#Calculating Price
						$amount = "";
						$staff_price = array_key_exists("price", $info) ? $info['price'] : 0;
						if( !empty($_POST['service']) ){

							$sinfo = get_post_meta( $_POST['service'] , "_info",true);
							$sinfo = is_array($sinfo) ? $sinfo : array();
							$service_price = array_key_exists("price", $sinfo) ? $sinfo['price'] : 0;
						}
						$price = floatval($staff_price) + floatval($service_price);
						$currency = dt_currency_symbol( dttheme_option('company', 'currency') );
						$amount = $currency.' '.$price;
					#Calculating Price


					$client_name = $client_phone = $client_email = "";
					$client = $data['user'];
					if( !empty($client) ){
						$client_name = get_the_title($client);

						$cinfo = get_post_meta( $client, "_info",true);
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

					$message = dttheme_option('company', 'appointment_notification_to_staff_message' );
					$message = dt_replace( $message, $array);
					
					dt_send_mail( $info["emailid"], $subject, $message);

					#Client Mail
					if( !empty($client_email) ) {
						$subject = dttheme_option('company', 'appointment_notification_to_client_subject');
						$subject = dt_replace( $subject, $array);

						$message =dttheme_option('company', 'appointment_notification_to_client_message' );
						$message = dt_replace( $message, $array);

						dt_send_mail( $client_email, $subject, $message);
					}
				}
			die( '' );
		}

		function dt_set_customer(){
			$out = "";
			if( !empty($_REQUEST['option']) ){
				if( !get_option($_REQUEST['option'].'_agenda') ){
					$option = get_option( $_REQUEST['option']);
				}else{
					$option = get_option( $_REQUEST['option'].'_agenda');
				}

				$out = $option['user'];
			}
			echo $out;
			die();
		}

		function dt_update_reservation() {

			$now =  new DateTime( "now" );
			$start = new DateTime( $_REQUEST['c_start'] );
			$readOnly =  ( $now < $start ) ? true : false;

			$data = array( 
				'id'=>$_REQUEST['id'],
				'title'=>$_REQUEST['title'],
				'body'=>$_REQUEST['body'],
				'start'=>$_REQUEST['start'],
				'end'=>$_REQUEST['end'],
				'user' => $_REQUEST['user'],
				'service'=>$_REQUEST['service'],
				'readOnly'=> $readOnly );

			if ( !get_option($_REQUEST['option'].'_agenda') ) {
				update_option( $_REQUEST['option'], $data );
			} else {
				update_option( $_REQUEST['option'].'_agenda', $data );
			}

			#Send Mail To Staff
			$staff_name = get_the_title($_REQUEST['memberid']);
			$service_name = get_the_title( $_REQUEST['service'] );
			$info = get_post_meta( $_REQUEST['memberid'] , "_info",true);
			$info = is_array($info) ? $info : array();

			if( array_key_exists("emailid", $info) ) {

				#Calculating Price
				$amount = "";
				$staff_price = array_key_exists("price", $info) ? $info['price'] : 0;

				if( !empty($_REQUEST['service']) ) {
					$sinfo = get_post_meta( $_REQUEST['service'] , "_info",true);
					$sinfo = is_array($sinfo) ? $sinfo : array();
					$service_price = array_key_exists("price", $sinfo) ? $sinfo['price'] : 0;
				}

				$price = floatval($staff_price) + floatval($service_price);
				$currency = dt_currency_symbol( dttheme_option('company', 'currency') );
				$amount = $currency.' '.$price;
				#Calculating Price

				$client_name = $client_phone = $client_email = "";
				$client = $data['user'];
				if( !empty($client) ){
					$client_name = get_the_title($client);
					$cinfo = get_post_meta( $client, "_info",true);
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
					'appointment_time' => $_REQUEST['time'],
					'appointment_date' => $_REQUEST['date'],
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
				$subject =  dttheme_option('company', 'modified_appointment_notification_to_admin_subject');
				$subject = dt_replace( $subject, $array);
				
				$message =  dttheme_option('company', 'modified_appointment_notification_to_admin_message' );
				$message = dt_replace( $message, $array);
				
				dt_send_mail( $admin_email, $subject, $message);					
					
				# Staff
				$subject = dttheme_option('company', 'modified_appointment_notification_to_staff_subject');
				$subject = dt_replace( $subject, $array);

				$message = dttheme_option('company', 'modified_appointment_notification_to_staff_message' );
				$message = dt_replace( $message, $array);
				dt_send_mail( $info["emailid"], $subject, $message);

				if( !empty($client_email) ) {
					$subject = dttheme_option('company', 'modified_appointment_notification_to_client_subject');
					$subject = dt_replace( $subject, $array);

					$message =dttheme_option('company', 'modified_appointment_notification_to_client_message' );
					$message = dt_replace( $message, $array);
					dt_send_mail( $client_email, $subject, $message);
				}
			}
			#Send Mail
			die('');
		}

		function dt_delete_reservation() {
			$options = array();

			if( get_option($_REQUEST['option']) ){
				$options = get_option($_REQUEST['option']);
			} else {
				$options = get_option( $_REQUEST['option'].'_agenda');
			}

			if( !delete_option( $_REQUEST['option'] )){
				delete_option( $_REQUEST['option'].'_agenda');
			}

			if( !empty($options) ) {

				$client_name = $client_phone = $client_email = "";

				#Staff
				$staff_name = get_the_title($_REQUEST['memberid']);
				$service_name = get_the_title( $_REQUEST['service'] );
				$info = get_post_meta( $_REQUEST['memberid'] , "_info",true);
				$info = is_array($info) ? $info : array();

				#Client
				$client =  array_key_exists('user', $options) ? $options['user'] : '';
				if( !empty($client) ) {

					$client_name = get_the_title($client);
					$cinfo = get_post_meta( $client, "_info",true);
					$cinfo = is_array($cinfo) ? $cinfo : array();

					$client_email = array_key_exists('emailid', $cinfo) ? $cinfo['emailid'] : "";
					$client_phone = array_key_exists('phone', $cinfo) ? $cinfo['phone'] : "";
				}
				
				#Admin
				$user_info = get_userdata(1);
				$admin_name = $user_info->nickname;
				$admin_email = $user_info->user_email;

				$array = array(
					'admin_name' => $admin_name,
					'staff_name' => $staff_name,
					'service_name' => $service_name,
					'appointment_id' => $options['id'],
					'appointment_time' => $_REQUEST['time'],
					'appointment_date' => $_REQUEST['date'],
					'appointment_title' => $options['title'],
					'appointment_body' =>  $options['body'],
					'client_name' => $client_name,
					'client_phone' => $client_phone,
					'client_email' => $client_email,
					'company_logo' => 'Company Logo',
					'company_name' => 'Company Name',
					'company_phone' => 'Company Phone',
					'company_address' => 'Company Address',
					'company_website' => 'Company Website');
					
				# Admin	
				$subject = dttheme_option('company', 'deleted_appointment_notification_to_admin_subject');
				$subject = dt_replace( $subject, $array);

				$message = dttheme_option('company', 'deleted_appointment_notification_to_admin_message' );
				$message = dt_replace( $message, $array);
				dt_send_mail( $admin_email, $subject, $message);
				
				# Staff
				$subject = dttheme_option('company', 'deleted_appointment_notification_to_staff_subject');
				$subject = dt_replace( $subject, $array);

				$message = dttheme_option('company', 'deleted_appointment_notification_to_staff_message' );
				$message = dt_replace( $message, $array);
				dt_send_mail( $info["emailid"], $subject, $message);

				if( !empty($client_email) ) {
					$subject = dttheme_option('company', 'deleted_appointment_notification_to_client_subject');
					$subject = dt_replace( $subject, $array);

					$message = dttheme_option('company', 'deleted_appointment_notification_to_client_message' );
					$message = dt_replace( $message, $array);
					dt_send_mail( $client_email, $subject, $message);
				}
			}
		}
	}
} ?>
