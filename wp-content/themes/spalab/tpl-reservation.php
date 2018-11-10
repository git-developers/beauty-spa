<?php /*Template Name: Reservation Template*/?>
<?php get_header();?>
<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : $GLOBALS['page_layout'];
	  	
  	  $show_sidebar = false;
	  $sidebar_class= "";
	  
	  switch($page_layout):
		case 'with-left-sidebar':
			$page_layout 	=	"page-with-sidebar with-left-sidebar";
			$show_sidebar 	= 	true;
			$sidebar_class 	=	"left-sidebar";
		break;
		
		case 'with-right-sidebar':
			$show_sidebar 	= 	true;
			$page_layout 	=	"page-with-sidebar with-right-sidebar";
		break;
	  endswitch; ?>
	
	<!-- ** Primary Section ** -->
	<section id="primary" class="<?php echo esc_attr( $page_layout ); ?>"><?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content', 'page' );
			endwhile;
		endif;?>
    <?php if( isset($_REQUEST['action'] ) ):
		if( $_REQUEST['action'] === "success" ):
			$successmsg = dttheme_option('company', 'success_message');
			$successmsg = isset($successmsg) ? '<div class="dt-sc-success-box">'.$successmsg.'</div>' : '';
			echo $successmsg;
			$page_id = $post->ID;
			$page_link = get_page_link($page_id);
			_e("<p>To continue or make another one, please click this button</p>",'dt_themes');
			echo do_shortcode('[dt_sc_button size="medium" target="_self" link="'.$page_link.'"]Back to Reservation[/dt_sc_button]');

		elseif( $_REQUEST['action'] === "error" ):
			$errormsg = dttheme_option('company', 'error_message');
			$errormsg = isset($errormsg) ? '<div class="dt-sc-error-box">'.$errormsg.'</div>' : '';
			echo $errormsg;
		endif;
	  else: ?>
		  <?php 
          $staffids = isset($_REQUEST['staffids']) ? $_REQUEST['staffids'] : '';
		  $serviceids = isset($_REQUEST['serviceids']) ? $_REQUEST['serviceids'] : '';
		  
		 $time_format = get_option( 'time_format' );
		  $fetch_start_time = isset($_REQUEST['start-time']) ? date($time_format, strtotime($_REQUEST['start-time'])) : date($time_format, strtotime('8:00 am'));
		  
		  $fetch_end_time = isset($_REQUEST['end-time']) ? $_REQUEST['end-time'] : '';
          ?>
          <input type="hidden" id="hidden-end-time" name="hidden-end-time" value="<?php echo $fetch_end_time; ?>">
          
          
	<div class="column dt-sc-one-half first">
		<p><?php _e('Available Services','dt_themes');?></p>
		<select name="services" class="dt-select-service">
			<option value=""><?php _e('Select','dt_themes');?></option><?php 
				$services_args = array('post_type'=>'dt_services', 'posts_per_page'=>'-1' , 'suppress_filters' => false );
							
							if($serviceids != '') {
								$serviceids_arr = explode(',', $serviceids);
								$services_args['post__in'] = $serviceids_arr;
							}
							
                            $cp_services = get_posts( $services_args );
                            if( $cp_services ){
                                foreach( $cp_services as $cp_service ){
                                    $id = $cp_service->ID; 
                                    $title = $cp_service->post_title;
                                    ?>
                                    <option value="<?php echo esc_attr($id); ?>" <?php if(isset($_REQUEST['services'])) echo selected($_REQUEST['services'], $id, false); ?>><?php echo esc_html($title); ?></option>
                                    <?php
                                }
                            }
                            ?>
		</select>
        </div>

		<div class="column dt-sc-one-half">
        <p><?php _e('Staff','dt_themes');?></p>
		<select name="staff" class="dt-select-staff">
			<option value=""><?php _e('Select','dt_themes');?></option><?php
			$staffs_args = array(
				  'post_type' => 'dt_staffs',
				  'posts_per_page' => '-1',
				  'meta_query'=>array()
				  );
			  if($staffids != '') {
				  $staffids_arr = explode(',', $staffids);
				  $staffs_args['post__in'] = $staffids_arr;
			  }
			  if(isset($_REQUEST['services'])) {
				  $staffs_args['meta_query'][] = array(
											  'key'     => '_services',
											  'value'   =>  $_REQUEST['services'],
											  'compare' => 'LIKE'
											  );
			  }
			  $cp_staffs = get_posts( $staffs_args );
			if( $cp_staffs ){
				foreach( $cp_staffs as $cp_staff ){
					$id = $cp_staff->ID;
					$title = $cp_staff->post_title; ?>
					<option value="<?php echo esc_attr($id); ?>" <?php if(isset($_REQUEST['staff'])) echo selected($_REQUEST['staff'], $id, false); ?>><?php echo esc_html($title); ?></option><?php
				}
			}?></select>
            </div>
		
        <div class="dt-sc-hr-invisible-small"> </div>
		<div class="clear"> </div>
        <h5 class="hr-title dark-title"><span><?php _e('Time','dt_themes');?></span></h5>
        <div class="hr-invisible-very-small"> </div>
		<div class="clear"> </div>     
           
        <div class="column dt-sc-one-fourth first">
            <p><?php _e('I am available on','dt_themes');?></p>
            <p><input type="text" id="datepicker" name="date" value="<?php if(isset($_REQUEST['date'])) echo esc_attr($_REQUEST['date']); else echo date('Y-m-d'); ?>"/></p>
            
        </div>

		<div class="column dt-sc-three-fourth">
        	<div class="column dt-sc-one-half first">
                <p><?php _e('Start :','dt_themes');?></p><select name="start-time" class='start-time'>

                <?php $time_format = get_option( 'time_format' ); 
					  $fetch_start_time = isset($_REQUEST['start-time']) ? date($time_format, strtotime($_REQUEST['start-time'])) : date($time_format, strtotime('8:00 am'));
					  $fetch_end_time = date($time_format, strtotime($_REQUEST['end-time']));
					  $selected = 'selected="selected"'; ?>
                    
                    <option value="00:00" <?php if( $fetch_start_time == date($time_format, strtotime('12:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('12:00 am')); ?></option>	
					<option value="01:00" <?php if( $fetch_start_time == date($time_format, strtotime('1:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('1:00 am')); ?></option>	
                    <option value="02:00" <?php if( $fetch_start_time == date($time_format, strtotime('2:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('2:00 am')); ?></option> 
                    <option value="03:00" <?php if( $fetch_start_time == date($time_format, strtotime('3:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('3:00 am')); ?></option>
                    <option value="04:00" <?php if( $fetch_start_time == date($time_format, strtotime('4:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('4:00 am')); ?></option>  
                    <option value="05:00" <?php if( $fetch_start_time == date($time_format, strtotime('5:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('5:00 am')); ?></option>  
                    <option value="06:00" <?php if( $fetch_start_time == date($time_format, strtotime('6:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('6:00 am')); ?></option> 
                    <option value="07:00" <?php if( $fetch_start_time == date($time_format, strtotime('7:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('7:00 am')); ?></option>
                    <option value="08:00" <?php if( $fetch_start_time == date($time_format, strtotime('8:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('8:00 am')); ?></option>
                    <option value="09:00" <?php if( $fetch_start_time == date($time_format, strtotime('9:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('9:00 am')); ?></option> 
                    <option value="10:00" <?php if( $fetch_start_time == date($time_format, strtotime('10:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('10:00 am')); ?></option> 
                    <option value="11:00" <?php if( $fetch_start_time == date($time_format, strtotime('11:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('11:00 am')); ?></option> 
                    <option value="12:00" <?php if( $fetch_start_time == date($time_format, strtotime('12:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('12:00 pm')); ?></option>
                    <option value="13:00" <?php if( $fetch_start_time == date($time_format, strtotime('1:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('1:00 pm')); ?></option> 
                    <option value="14:00" <?php if( $fetch_start_time == date($time_format, strtotime('2:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('2:00 pm')); ?></option>  
                    <option value="15:00" <?php if( $fetch_start_time == date($time_format, strtotime('3:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('3:00 pm')); ?></option> 
                    <option value="16:00" <?php if( $fetch_start_time == date($time_format, strtotime('4:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('4:00 pm')); ?></option>
                    <option value="17:00" <?php if( $fetch_start_time == date($time_format, strtotime('5:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('5:00 pm')); ?></option> 
                    <option value="18:00" <?php if( $fetch_start_time == date($time_format, strtotime('6:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('6:00 pm')); ?></option> 
                    <option value="19:00" <?php if( $fetch_start_time == date($time_format, strtotime('7:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('7:00 pm')); ?></option> 
                    <option value="20:00" <?php if( $fetch_start_time == date($time_format, strtotime('8:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('8:00 pm')); ?></option>
                    <option value="21:00" <?php if( $fetch_start_time == date($time_format, strtotime('9:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('9:00 pm')); ?></option> 
                    <option value="22:00" <?php if( $fetch_start_time == date($time_format, strtotime('10:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('10:00 pm')); ?></option> 
                    <option value="23:00" <?php if( $fetch_start_time == date($time_format, strtotime('11:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('11:00 pm')); ?></option></select> 
            </div>
            
            <div class="column dt-sc-one-half"> 
                <p>- <?php _e('End :','dt_themes');?></p><select name="end-time" class='end-time'>
                    <option value="09:00" <?php if( $fetch_end_time == date($time_format, strtotime('9:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('9:00 am')); ?></option>	
                    <option value="10:00" <?php if( $fetch_end_time == date($time_format, strtotime('10:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('10:00 am')); ?></option>	
                    <option value="11:00" <?php if( $fetch_end_time == date($time_format, strtotime('11:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('11:00 am')); ?></option>	
                    <option value="12:00" <?php if( $fetch_end_time == date($time_format, strtotime('12:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('12:00 pm')); ?></option>
                    <option value="13:00" <?php if( $fetch_end_time == date($time_format, strtotime('1:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('1:00 pm')); ?></option>	
                    <option value="14:00" <?php if( $fetch_end_time == date($time_format, strtotime('2:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('2:00 pm')); ?></option>	
                    <option value="15:00" <?php if( $fetch_end_time == date($time_format, strtotime('3:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('3:00 pm')); ?></option>	
                    <option value="16:00" <?php if( $fetch_end_time == date($time_format, strtotime('4:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('4:00 pmm')); ?></option>
                    <option value="17:00" <?php if( $fetch_end_time == date($time_format, strtotime('5:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('5:00 pm')); ?></option>	
                    <option value="18:00" <?php if( $fetch_end_time == date($time_format, strtotime('6:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('6:00 pm')); ?></option>	
                    <option value="19:00" <?php if( $fetch_end_time == date($time_format, strtotime('7:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('7:00 pm')); ?></option>	
                    <option value="20:00" <?php if( $fetch_end_time == date($time_format, strtotime('8:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('8:00 pm')); ?></option>
                    <option value="21:00" <?php if( $fetch_end_time == date($time_format, strtotime('9:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('9:00 pm')); ?></option>	
                    <option value="22:00" <?php if( $fetch_end_time == date($time_format, strtotime('10:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('10:00 pm')); ?></option> 
                    <option value="23:00" <?php if( $fetch_end_time == date($time_format, strtotime('11:00 pm')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('11:00 pm')); ?></option> 
                    <option value="23:59" <?php if( $fetch_end_time == date($time_format, strtotime('12:00 am')) ){ echo $selected; } ?>><?php echo date($time_format, strtotime('12:00 am')); ?></option>
                    </select>
         </div>
		</div>            
		<div class="clear"></div>
		<p><a href="#" class="dt-sc-button small show-time"><?php _e('Show Time','dt_themes');?></a></p>			
		<div class="hr-invisible-very-small"> </div>
		<div class="clear"> </div> 
		<div class="available-times"></div>

		<div id="personalinfo" class="personal-info personal-info-hide">
			<h5 class="hr-title dark-title"><span><?php _e('Personal Info','dt_themes');?></span></h5>
            <div class="hr-invisible-very-small"> </div>
            <div class="clear"> </div>            
            
            	<div class="column dt-sc-one-half first">
					<p><input type="text" name="name" value="" placeholder="<?php _e('Name:','dt_themes');?>"></p>
                    
                </div>
				<div class="column dt-sc-one-half">                
					<p><input type="email" name="email" value="" required placeholder="<?php _e('Email:','dt_themes');?>"></p>
				</div>  
                
            	<div class="column dt-sc-one-half first">                                  
					<p><input type="text" name="phone" value="" required placeholder="<?php _e('Phone:','dt_themes');?>"></p>
            	</div>
                
				<div class="column dt-sc-one-half">                
                    <div class="choose-payment personal-info-hide">
                        
                        <?php $payatarrival = dttheme_option('company','enable-pay-at-arrival');
                        $paypal = dttheme_option('company','enable-paypal');?>
                        <select name="payment_type">
                            <option value=""><?php _e('Choose Payment','dt_themes');?></option>
                            <?php if( !empty($payatarrival) ): ?>
                                <option value="local"><?php _e('Pay At Arrival','dt_themes');?></option>
                            <?php endif;?>
                            <?php if( !empty($paypal) ): ?>					
                                <option value="paypal"><?php _e('Paypal Express Checkout','dt_themes');?></option>
                            <?php endif;?>
                        </select>
                    </div>
                </div>
                <div class="hr-invisible-very-small"></div>
                <textarea name="note" placeholder="<?php _e('Note:','dt_themes');?>"></textarea>
                
                <?php	$temp = $ctemp = rand(321, 8787);
				$temp = str_split($temp, 1);?>
                <div class="column dt-sc-one-half first">
                	<p><input type="text" name="captcha" required  placeholder="<?php _e('Captcha','dt_themes');?>"></p>
                    <input type="hidden" name="hiddencaptcha" readonly="readonly" value="<?php echo esc_attr($ctemp);?>"/>
                </div>

                <div class="column dt-sc-one-half">
                	<p><span class="dt-sc-captcha">
							<?php echo $temp[0];?>
	                        <sup><?php echo $temp[1];?></sup>
    	                    <?php echo $temp[2];?>
        	                <sub><?php echo $temp[3];?></sub>
                        </span></p>
                </div>
        
		</div>

        <div class="hr-invisible-very-small"> </div>
        <div class="hr-invisible-very-small"> </div>        
        <div class="clear"> </div>
		<p><a href='#' class='dt-sc-button small schedule-it' style='display:none;'>Schedule It</a></p>
	<?php endif;?> 
    </section><!-- ** Primary Section End ** -->

<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>

<?php get_footer(); ?>