<?php

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class PaymentsListTable extends WP_List_Table {
	var $payments_data = array();

	function __construct(){
		global $status, $page;

		global $wpdb;
		$payments = "SELECT option_id, option_name,option_value FROM $wpdb->options WHERE option_name LIKE '_dt_payment_mid_%' ORDER BY option_id ASC";
		$rows = $wpdb->get_results( $payments );
		if($rows):
			foreach( $rows as $row ){
				$option = get_option($row->option_name);
				$this->payments_data[] = array(
					'ID' => $row->option_id,
					'customer' => get_the_title($option['customer_id']),
					'amount' => $option['total'],
					'type' => $option['type'],
					'service' => $option['service'],
					'paypal_status' =>  isset( $option['status'] ) ? $option['status'] : '-' ,
					'paypal_transaction_id' =>  isset( $option['transaction_id'] ) ? $option['transaction_id'] : '-',
					'time' => $option['date'],
				);
			}			
		endif;

		parent::__construct( array(
			'singular'  => __( 'payment', 'dt_themes' ),     //singular name of the listed records
            'plural'    => __( 'payments', 'dt_themes' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
    	) );
	}

  	function column_default( $item, $column_name ) {
  		switch( $column_name ) { 
  			case 'customer':
  			case 'amount':
  			case 'type':
  			case 'service':
  			case 'time':
  			case 'paypal_status':
  			#case 'paypal_token':
  			case 'paypal_transaction_id':
  				return $item[ $column_name ];
  			default:
  				return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    	}
	}

	function get_columns() {

		$columns = array(
            'customer'  => __( 'Customer', 'dt_themes' ),
            'amount'    => __( 'Amount (', 'dt_themes' ).dttheme_option('company', 'currency').')',
            'type'      => __( 'Type', 'dt_themes' ),
            'service'   => __( 'Service', 'dt_themes' ),
            'paypal_status'	=> __( 'Status', 'dt_themes'),
            'paypal_transaction_id' => __('Transaction Id','dt_themes'),
           	'time'      => __( 'Time', 'dt_themes' )
        );
        return $columns;
    }

	function no_items() {
  		_e( 'No payments found, dude.', 'dt_themes' );
	}

	function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		usort( $this->payments_data, array( &$this, 'usort_reorder' ) );
		
		$this->items = $this->payments_data;		
	}

	function get_sortable_columns() {
		$sortable_columns = array(
			'customer'  => array('customer',false),
			'type' => array('type',false),
			'time' => array('time',false),
			'service'   => array('service',false),
			'paypal_status' => array('paypal_status',false)
		);
		return $sortable_columns;
	}

	function usort_reorder( $a, $b ) {

		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'customer';

		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';

		// Determine sort order
  		$result = strcmp( $a[$orderby], $b[$orderby] );

  		// Send final sort direction to usort
  		return ( $order === 'asc' ) ? $result : -$result;
	}


    function column_customer($item) {
    	
    	$actions = array(
    		'delete' => sprintf('<a href="?page=%s&action=%s&payment=%s">%s</a>',$_REQUEST['page'],'delete',$item['ID'], __('Trash','dt_themes')),
    	);

    	return sprintf('%1$s %2$s', $item['customer'], $this->row_actions($actions) );
    }

    function process_bulk_action() {
        if( 'delete'=== $this->current_action() ) {
        	global $wpdb;
        	$option_id = $_REQUEST['payment'];
        	$action = $wpdb->delete( 'wp_options', array( 'option_id' => $option_id ) );
        	wp_redirect(admin_url('admin.php?page=dt_payments', 'http'), 301);
        }
    }
}?>