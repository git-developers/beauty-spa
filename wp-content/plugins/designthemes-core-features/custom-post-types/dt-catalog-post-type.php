<?php
if (! class_exists ( 'DTCatalogPostType' )) {
	class DTCatalogPostType {
		
		/**
		 */
		function __construct() {
			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this,
					'dt_init' 
			) );
			
			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array (
					$this,
					'dt_admin_init' 
			) );
			
			add_filter ( 'template_include', array (
					$this,
					'dt_template_include' 
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			$this->createPostType ();
			add_action ( 'save_post', array (
					$this,
					'save_post_meta' 
			) );
			
			add_action ( 'pre_post_update', array (
					$this,
					'save_post_meta' 
			) );
			
			add_action ( 'wp_ajax_save_bulk_edit_book', array (
					$this,
					'save_post_meta' 
			) );
			
			add_action ( 'edited_catalog_entries', array (
					$this,
					'save_taxonomy_custom_fields' 
			) );

			add_action ( 'create_catalog_entries', array (
					$this,
					'save_taxonomy_custom_fields' 
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			
			add_action ( 'add_meta_boxes', array (
					$this,
					'dt_add_catalog_meta_box' 
			) );
			
			add_filter ( "manage_edit-dt_catalog_columns", array (
					$this,
					"dt_catalog_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_catalog_columns_display" 
			), 10, 2 );
			
			add_action ( 'catalog_entries_add_form_fields', array (
					$this,
					'add_taxonomy_custom_fields' 
			) );
			
			add_action ( 'catalog_entries_edit_form_fields', array (
					$this,
					'edit_taxonomy_custom_fields' 
			) );
		}
		
		/**
		 Taxonomy add custom field
		 */
		function add_taxonomy_custom_fields($tag) { ?>  
		  
            <tr class="form-field">  
                <th scope="row" valign="top">  
                    <label for="icon_class"><?php _e('Custom Icon Class'); ?></label>  
                </th>  
                <td>  
                    <input type="text" name="term_meta[icon_class]" id="term_meta[icon_class]" style="width:60%;" value=""><br />  
                    <span class="description"><?php _e('Add custom icon class'); ?></span>  
                </td>  
            </tr><?php
		}
		
		/**
		 Taxonomy edit custom field
		 */
		function edit_taxonomy_custom_fields($tag) {  
		   // Check for existing taxonomy meta for the term you're editing  
			$t_id = $tag->term_id; // Get the ID of the term you're editing  
			$term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check ?>  
		  
            <tr class="form-field">  
                <th scope="row" valign="top">  
                    <label for="icon_class"><?php _e('Custom Icon Class'); ?></label>  
                </th>  
                <td>  
                    <input type="text" name="term_meta[icon_class]" id="term_meta[icon_class]" style="width:60%;" value="<?php echo isset($term_meta['icon_class']) ? $term_meta['icon_class'] : ''; ?>"><br />  
                    <span class="description"><?php _e('Add custom icon class'); ?></span>  
                </td>  
            </tr><?php
		}
		
		/**
		 Taxonomy save custom field
		 */
		function save_taxonomy_custom_fields( $term_id ) {  
			if ( isset( $_POST['term_meta'] ) ) {  
				$t_id = $term_id;  
				$term_meta = get_option( "taxonomy_term_$t_id" );  
				$cat_keys = array_keys( $_POST['term_meta'] );  
				foreach ( $cat_keys as $key ){  
					if ( isset( $_POST['term_meta'][$key] ) ){  
						$term_meta[$key] = $_POST['term_meta'][$key];  
					}  
				}  
				//save the option array  
				update_option( "taxonomy_term_$t_id", $term_meta );  
			}  
		}

		/**
		 */
		function createPostType() {
			$labels = array (
					'name' => __ ( 'Catalog', 'dt_themes' ),
					'all_items' => __ ( 'All Catalog', 'dt_themes' ),
					'singular_name' => __ ( 'Catalog', 'dt_themes' ),
					'add_new' => __ ( 'Add New', 'dt_themes' ),
					'add_new_item' => __ ( 'Add New Item', 'dt_themes' ),
					'edit_item' => __ ( 'Edit Item', 'dt_themes' ),
					'new_item' => __ ( 'New Item', 'dt_themes' ),
					'view_item' => __ ( 'View Item', 'dt_themes' ),
					'search_items' => __ ( 'Search Items', 'dt_themes' ),
					'not_found' => __ ( 'No Items found', 'dt_themes' ),
					'not_found_in_trash' => __ ( 'No Items found in Trash', 'dt_themes' ),
					'parent_item_colon' => __ ( 'Parent Item:', 'dt_themes' ),
					'menu_name' => __ ( 'Catalog', 'dt_themes' ) 
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => 'This is custom post type catalog menu items',
					'supports' => array (
							'title',
							'editor',
							'thumbnail'
					),
					
					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 5,
					'menu_icon' => plugin_dir_url ( __FILE__ ) . 'images/icon_catalog.png',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => true,
					'capability_type' => 'post' 
			);
			
			register_post_type ( 'dt_catalog', $args );
			
			register_taxonomy ( "catalog_entries", array (
					"dt_catalog" 
			), array (
					"hierarchical" => true,
					"label" => "Categories",
					"singular_label" => "Category",
					"show_admin_column" => true,
					"rewrite" => true,
					"query_var" => true 
			) );
		}
		
		/**
		 */
		function dt_add_catalog_meta_box() {
			add_meta_box ( "dt-catalog-default-metabox", __ ( 'Catalog Options', 'dt_themes' ), array (
					$this,
					'dt_default_metabox' 
			), 'dt_catalog', "normal", "default" );
		}
		
		/**
		 */
		function dt_default_metabox() {
			include_once plugin_dir_path ( __FILE__ ) . 'metaboxes/dt_catalog_default_metabox.php';
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_catalog_edit_columns($columns) {
			$columns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_thumb" => "Image",
				"title" => "Title",
				"catalog_entries"=>"Categories",
				"author" => "Author"
			);
			return $columns;
		}
		
		/**
		 *
		 * @param unknown $columns        	
		 * @param unknown $id        	
		 */
		function dt_catalog_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {
				
				case "dt_thumb" :
				
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo $image;
				    else:
						echo __("No Image",'dt_themes');
					endif;
				break;
				
				case "catalog_entries":
					echo get_the_term_list($post->ID, 'catalog_entries', '', ', ','');
				break;
			}
		}
		
		/**
		 */
		function save_post_meta($post_id) {
			if (defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
				return $post_id;
				
			if (!current_user_can('edit_posts'))
		        return;
				
		    if (!isset($id))
		        $id = (int) $post_id;
				
			if(isset($_POST['_subtitle']) || isset($_POST['_price']) || isset($_POST['_link']) || isset ( $_POST ['breadcrumb-sub-title'] ) || isset ( $_POST ['mytheme-disable-breadcrumb-section'] ) || isset ( $_POST ['breadcrumb-bg'] ) || isset ( $_POST ['breadcrumb-bg-repeat'] ) || isset ( $_POST ['breadcrumb-bg-position'] ) || isset ( $_POST ['breadcrumb-darkbg'] ) ) :
			
				$settings = array ();
				$settings ['subtitle'] = isset ( $_POST ['_subtitle'] ) ? stripslashes ( $_POST ['_subtitle'] ) : "";
				$settings ['price'] = isset ( $_POST ['_price'] ) ? stripslashes ( $_POST ['_price'] ) : "";
				$settings ['dummyprice'] = isset ( $_POST ['_dummyprice'] ) ? stripslashes ( $_POST ['_dummyprice'] ) : "";
				$settings ['link'] = isset ( $_POST ['_link'] ) ? stripslashes ( $_POST ['_link'] ) : "";				
				
				$settings['breadcrumb-sub-title'] = isset ( $_POST ['breadcrumb-sub-title'] ) ? ( $_POST ['breadcrumb-sub-title'] ) : "";
				$settings['disable_breadcrumb_section'] =  isset ( $_POST ['mytheme-disable-breadcrumb-section'] ) ? ( $_POST ['mytheme-disable-breadcrumb-section'] ) : "";
				$settings['breadcrumb-bg'] = isset ( $_POST ['breadcrumb-bg'] ) ?  ( $_POST ['breadcrumb-bg'] ) : "";
				$settings['breadcrumb-bg-repeat'] = isset ( $_POST ['breadcrumb-bg-repeat'] ) ?  ( $_POST ['breadcrumb-bg-repeat'] ) : "";
				$settings['breadcrumb-bg-position'] = isset ( $_POST ['breadcrumb-bg-position'] ) ?  ( $_POST ['breadcrumb-bg-position'] ) : "";
				$settings['breadcrumb-darkbg'] = isset ( $_POST ['breadcrumb-darkbg'] ) ?  ( $_POST ['breadcrumb-darkbg'] ) : "";
			
				update_post_meta ( $post_id, "_catalog_settings", array_filter ( $settings ) );
	
				//For default category...
				$terms = wp_get_object_terms ( $post_id, 'catalog_entries' );
				if (empty ( $terms )) :
					wp_set_object_terms ( $post_id, 'Uncategorized', 'catalog_entries', true );
				endif;
				
			endif;
		}
		
		/**
		 * To load catalog pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_tax ( 'catalog_entries' )) {
				if (! file_exists ( get_stylesheet_directory () . '/taxonomy-catalog_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-catalog_entries.php';
				}
			}
			return $template;
		}
	}
}
?>