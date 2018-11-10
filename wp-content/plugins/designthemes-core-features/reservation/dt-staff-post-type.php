<?php
if ( !class_exists( 'DTStaffPostType' ) ) {

	class DTStaffPostType {

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
				'name' => __('Staffs', 'dt_themes' ),
				'singular_name' => __('Staff', 'dt_themes' ),
				'menu_name' => __('Staffs', 'dt_themes' ),
				'add_new' => __('Add Staff', 'dt_themes' ),
				'add_new_item' => __('Add New Staff', 'dt_themes' ),
				'edit' => __('Edit Staff', 'dt_themes' ),
				'edit_item' => __('Edit Staff', 'dt_themes' ),
				'new_item' => __('New Staff', 'dt_themes' ),
				'view' => __('View Staff', 'dt_themes' ),
				'view_item' => __('View Staff', 'dt_themes' ),
				'search_items' => __('Search Staffs', 'dt_themes' ),
				'not_found' => __('No Staffs found', 'dt_themes' ),
				'not_found_in_trash' => __('No Staffs found in Trash', 'dt_themes' ),
				'parent_item_colon' => __('Parent Staff:', 'dt_themes' ),
			);

			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'description' => __('This is Custom Post type named as Staffs','dt_themes'),
				'supports' => array('title', 'editor', 'thumbnail'),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-businessman',
			);

			register_post_type('dt_staffs', $args );
		}

		function dt_admin_init() {
			add_action ( 'add_meta_boxes', array (
				$this,
				'dt_add_staff_meta_box' 
			) );

			add_action ( 'save_post', array (
				$this,
				'save_staff_post_meta' 
			) );
			
			add_action ( 'pre_post_update', array (
				$this,
				'save_staff_post_meta' 
			) );
		}

		function dt_add_staff_meta_box() {

			add_meta_box( 'dt-member-service-metabox', __('Choose Services','dt_themes'),
				array( $this, 'dt_member_service_metabox'), 'dt_staffs', 'side', 'default');

			add_meta_box( 'dt-member-metabox', __('Set Personal Information','dt_themes'),
				array( $this, 'dt_member_metabox'), 'dt_staffs', 'normal',  'default');

			add_meta_box( 'dt-member-schedule-metabox', __('Choose Schedule','dt_themes'),
				array( $this, 'dt_member_schedule_metabox'), 'dt_staffs', 'normal', 'default');	
		}

		function dt_member_service_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_member_service_metabox.php';
		}

		function dt_member_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_member_metabox.php';
		}

		function dt_member_schedule_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_member_schedule_metabox.php';
		}

		function save_staff_post_meta( $post_id ) {

			if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
				return $post_id;

			if ( isset($_POST['_info']) ):
				$info = array_unique(array_filter($_POST['_info']));
				update_post_meta ( $post_id, "_info", array_filter ( $info ) );
			endif;

			if (isset($_POST['_timer'])):
				$timer = $_POST['_timer'];
				update_post_meta ( $post_id, "_timer", $timer );
			endif;

			if (isset($_POST['_services'])):
				$services = array_unique(array_filter($_POST['_services']));
				update_post_meta ( $post_id, "_services", array_filter ( $services ) );
			endif;
		}
	}
}?>
