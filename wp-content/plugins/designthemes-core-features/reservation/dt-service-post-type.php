<?php
if ( !class_exists( 'DTServicePostType' ) ) {

	class DTServicePostType {
		function __construct() {
			add_action ( 'init', array (
				$this,
				'dt_init'
			) );

/*			add_action ( 'after_setup_theme', array (
				$this,
				'dt_set_featured_image_support'
			), 11 );
*/
			add_action( 'admin_init', array(
				$this,
				'dt_admin_init'
			) );
		}

		function dt_init() {
			$labels = array(
				'name' => __('Services', 'dt_themes' ),
				'singular_name' => __('Service', 'dt_themes' ),
				'menu_name' => __('Services', 'dt_themes' ),
				'add_new' => __('Add Service', 'dt_themes' ),
				'add_new_item' => __('Add New Service', 'dt_themes' ),
				'edit' => __('Edit Service', 'dt_themes' ),
				'edit_item' => __('Edit Service', 'dt_themes' ),
				'new_item' => __('New Service', 'dt_themes' ),
				'view' => __('View Service', 'dt_themes' ),
				'view_item' => __('View Service', 'dt_themes' ),
				'search_items' => __('Search Services', 'dt_themes' ),
				'not_found' => __('No Services found', 'dt_themes' ),
				'not_found_in_trash' => __('No Services found in Trash', 'dt_themes' ),
				'parent_item_colon' => __('Parent Service:', 'dt_themes' ),
			);

			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'description' => __('This is Custom Post type named as Services','dt_themes'),
				'supports' => array('title', 'editor', 'thumbnail'),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-awards',
			);

			register_post_type('dt_services', $args );
		}

/*		function dt_set_featured_image_support() {
			add_theme_support( 'post-thumbnails',array('dt_services','dt_staffs'));
		}
*/
		function dt_admin_init() {

			add_action ( 'add_meta_boxes', array (
				$this,
				'dt_add_service_meta_box' 
			) );

			add_action ( 'save_post', array (
				$this,
				'save_service_post_meta' 
			) );
			
			add_action ( 'pre_post_update', array (
				$this,
				'save_service_post_meta' 
			) );

			add_filter ( "manage_edit-dt_services_columns", array(
				$this,
				"dt_services_edit_columns"
			) );

			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_services_columns_display" 
			), 10, 2 );

		}

		function dt_add_service_meta_box() {
			add_meta_box( 'dt-services-metabox', __('Set Default Options', 'dt_themes'), array( $this, 'dt_services_metabox'),
				'dt_services', "normal","default");
		}

		function dt_services_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_services_metabox.php';
		}

		function save_service_post_meta( $id ) {

			if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
				return $id;

			if ( isset($_POST['_info']) ):
				$info = array_unique(array_filter($_POST['_info']));
				update_post_meta ( $id, "_info", array_filter ( $info ) );
			endif;
		}

		function dt_services_edit_columns( $columns ) {

			$newcolumns = array (
					"cb" => "<input type=\"checkbox\" />",
					"title" => __("Title",'dt_themes'),
					"details" => __("Details",'dt_themes'),
					"author" => __("Author",'dt_themes'),
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		function dt_services_columns_display( $columns, $id ) {
			global $post;
			switch ($columns) {
				case 'details':
					$info = get_post_meta( $post->ID, "_info", true );
					$info = is_array( $info ) ? $info : array();
					$price = array_key_exists('price', $info) ? $info['price'] : "";
					$price = !empty( $price ) ? dt_currency_symbol( dttheme_option( 'company', 'currency' ) ).' '.$price : "";
					$price = !empty( $price ) ? '<p>'. __("Price","dt_themes").' - '.$price .'</p>': ""; 
					echo $price;

					$duration = array_key_exists('duration', $info) ? $info['duration'] : "";
					$duration = !empty($duration) ?'<p>'. __("Duration",'dt_themes').' - '.durationToString($duration).'</p>' : "";
					echo $duration;
				break;
			}
		}
	}
}?>
