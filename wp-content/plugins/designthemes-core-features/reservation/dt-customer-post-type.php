<?php
if ( !class_exists( 'DTCustomerPostType' ) ) {

	class DTCustomerPostType {

		function __construct() {
			add_action ( 'init', array (
				$this,
				'dt_init'
			) );

			add_action( 'admin_init', array(
				$this,
				'dt_admin_init'
			) );
		}

		function dt_init() {
			$labels = array(
				'name' => __('Customers', 'dt_themes' ),
				'singular_name' => __('Customer', 'dt_themes' ),
				'menu_name' => __('Customers', 'dt_themes' ),
				'add_new' => __('Add Customer', 'dt_themes' ),
				'add_new_item' => __('Add New Customer', 'dt_themes' ),
				'edit' => __('Edit Customer', 'dt_themes' ),
				'edit_item' => __('Edit Customer', 'dt_themes' ),
				'new_item' => __('New Customer', 'dt_themes' ),
				'view' => __('View Customer', 'dt_themes' ),
				'view_item' => __('View Customer', 'dt_themes' ),
				'search_items' => __('Search Customers', 'dt_themes' ),
				'not_found' => __('No Customers found', 'dt_themes' ),
				'not_found_in_trash' => __('No Customers found in Trash', 'dt_themes' ),
				'parent_item_colon' => __('Parent Customer:', 'dt_themes' ),
			);

			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'description' => __('This is Custom Post type named as Customers','dt_themes'),
				'supports' => array('title'),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-groups',
			);

			register_post_type('dt_customers', $args );
		}

		function dt_admin_init() {
			add_action ( 'add_meta_boxes', array (
				$this,
				'dt_add_customer_meta_box' 
			) );

			add_action ( 'save_post', array (
				$this,
				'save_customer_post_meta' 
			) );
			
			add_action ( 'pre_post_update', array (
				$this,
				'save_customer_post_meta' 
			) );
		}

		function dt_add_customer_meta_box() {

			add_meta_box( 'dt-member-metabox', __('Set Personal Information','dt_themes'),
				array( $this, 'dt_customer_metabox'), 'dt_customers', 'normal',  'default');
		}

		function dt_customer_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_customer_metabox.php';
		}

		function save_customer_post_meta( $post_id ) {

			if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
				return $post_id;

			if ( isset($_POST['_info']) ):
				$info = array_unique(array_filter($_POST['_info']));
				update_post_meta ( $post_id, "_info", array_filter ( $info ) );
			endif;
		}
	}
}?>
