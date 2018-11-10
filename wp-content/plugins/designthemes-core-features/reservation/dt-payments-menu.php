<?php if ( !class_exists( 'DTPaymentsMenu' ) ) {

	class DTPaymentsMenu {

		function __construct() {

			add_action( 'admin_menu', array( 
				$this,
				'register_payments_menu'
			) );

			add_action( 'plugins_loaded', array( $this, 'screen_options' ) );
		}

		function register_payments_menu() {

			$payments_menu = add_menu_page( __( 'Payments', 'dt_themes'), __( 'Payments', 'dt_themes'), 'manage_options', 'dt_payments', array( $this, 'payment_menu' ), 'dashicons-welcome-write-blog', 29 );
			add_action( "load-$payments_menu", array( $this, 'add_options' ) );
			
		}

		function screen_options() {
			add_filter('set-screen-option',  array( $this,'cmi_set_option'), 10, 3);
		}

		function cmi_set_option($status, $option, $value) {
			if ( 'payments_per_page' == $option ) return $value;
			return $status;
		}

		function add_options(){
			global $paymentsListTable;

			include_once plugin_dir_path ( __FILE__ ) . 'menu/payments/payments.php';
			$paymentsListTable  = new PaymentsListTable();

			$option = 'per_page';
			$args = array('label' => __('Payments','dt_themes'),'default' => 10,'option' =>'payments_per_page');
			add_screen_option( $option, $args );
		}

		function payment_menu(){
			echo '<div class="wrap">';
				global $paymentsListTable;
				$paymentsListTable->prepare_items(); 
				$paymentsListTable->display();
			echo '</div>';
		}
	}
} ?>
