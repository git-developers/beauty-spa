<?php
if ( !class_exists( 'DTReservationSystem' ) ) {

	class DTReservationSystem {

		function __construct() {

			// Register Staff Custom Post
			require_once plugin_dir_path ( __FILE__ ) . '/dt-staff-post-type.php';
			if( class_exists('DTStaffPostType') ){
				$dt_staff_post_type = new DTStaffPostType();
			}

			// Register Services Custom Post
			require_once plugin_dir_path ( __FILE__ ) . '/dt-service-post-type.php';
			if( class_exists('DTServicePostType') ){
				$dt_service_post_type = new DTServicePostType();
			}

			// Register Customers Custom Post
			require_once plugin_dir_path ( __FILE__ ) . '/dt-customer-post-type.php';
			if( class_exists('DTCustomerPostType') ){
				$dt_customer_post_type = new DTCustomerPostType();
			}

			//Register Calender Menu
			require_once plugin_dir_path ( __FILE__ ) . '/dt-calender-menu.php';
			if( class_exists('DTCalenderMenu')) {
				$dt_calender_menu = new DTCalenderMenu();
			}
			
			//Register Payments Menu
			require_once plugin_dir_path ( __FILE__ ) . '/dt-payments-menu.php';
			if( class_exists('DTPaymentsMenu')) {
				$dt_payments_menu = new DTPaymentsMenu();
			}
		}
	}
}?>