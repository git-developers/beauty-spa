<?php
if (! class_exists ( 'DTCoreShortcodes' )) {
	
	/**
	 * Used to "Loades Core Shortcodes & Add button to tinymce"
	 *
	 * @author iamdesigning11
	 */
	class DTCoreShortcodes {
		
		/**
		 * Constructor for DTCoreShortcodes
		 */
		function __construct() {
			define ( 'DESIGNTHEMES_TINYMCE_URL', plugin_dir_url ( __FILE__ ) . 'tinymce' );
			define ( 'DESIGNTHEMES_TINYMCE_PATH', plugin_dir_path ( __FILE__ ) . 'tinymce' );
			
			require_once plugin_dir_path ( __FILE__ ) . 'shortcodes.php';
			
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
			
			add_filter ( 'the_content', array (
					$this,
					'dt_the_content_filter' 
			) );
		}
		
		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			
			/* Front End CSS & jQuery */
			if (! is_admin ()) {
				wp_enqueue_style ( 'dt-animation-css', plugin_dir_url ( __FILE__ ) . 'css/animations.css' );
				wp_enqueue_style ( 'dt-sc-css', plugin_dir_url ( __FILE__ ) . 'css/shortcodes.css' );
				
				wp_enqueue_script ( 'jquery' );
				wp_enqueue_script ( 'dt-sc-inview-script', plugin_dir_url ( __FILE__ ) . 'js/inview.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-tabs-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.tabs.min.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-viewport-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.viewport.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-carouFredSel-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.carouFredSel-6.2.1-packed.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-tipTip-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.tipTip.minified.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-donutchart-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.donutchart.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-countTo-script', plugin_dir_url ( __FILE__ ) . 'js/countTo.js', array (), false, true );
				wp_enqueue_script ( 'dt-sc-parallax-script', plugin_dir_url ( __FILE__ ) . 'js/jquery.parallax-1.1.3.js', array(), false, true);
				wp_enqueue_script ( 'dt-sc-touchswipemin', plugin_dir_url ( __FILE__ ) . 'js/jquery.touchSwipe.min.js', array(), false, true);

				wp_enqueue_script ( 'dt-sc-script', plugin_dir_url ( __FILE__ ) . 'js/shortcodes.js', array (), false, true );
			}
			
			if (! current_user_can ( 'edit_posts' ) && ! current_user_can ( 'edit_pages' )) {
				return;
			}
			
			if ("true" === get_user_option ( 'rich_editing' )) {
				add_filter ( 'mce_buttons', array (
						$this,
						'dt_register_rich_buttons' 
				) );
				
				add_filter ( 'mce_external_plugins', array (
						$this,
						'dt_add_external_plugins' 
				) );
			}
		}
		
		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {
			wp_enqueue_style ( 'wp-color-picker' );
			wp_enqueue_script ( 'wp-color-picker' );
			
			// css
			wp_enqueue_style ( 'spalab_DTCorePlugin-sc-dialog', DESIGNTHEMES_TINYMCE_URL . '/css/styles.css', false, '1.0', 'all' );
			
			wp_localize_script ( 'jquery', 'spalab_DTCorePlugin', array (
					'plugin_folder' => WP_PLUGIN_URL . '/designthemes-core-features',
					'tinymce_folder' => DESIGNTHEMES_TINYMCE_URL 
			) );
		}
		
		/**
		 * A function hook that used to filter the content - to remove unwanted codes
		 *
		 * @param string $content        	
		 * @return string
		 */
		function dt_the_content_filter($content) {
			$dt_shortcodes = array("dt_sc_accordion_group","dt_sc_button","dt_sc_blockquote","dt_sc_callout_box",
								  "dt_sc_one_half","dt_sc_one_third","dt_sc_one_fourth","dt_sc_one_fifth","dt_sc_one_sixth",
								  "dt_sc_two_sixth","dt_sc_two_third","dt_sc_three_fourth","dt_sc_two_fifth","dt_sc_three_fifth",
								  "dt_sc_four_fifth","dt_sc_three_sixth","dt_sc_four_sixth","dt_sc_five_sixth",
								  "dt_sc_address","dt_sc_phone","dt_sc_mobile","dt_sc_fax","dt_sc_email",
								  "dt_sc_web","dt_sc_online_form","dt_sc_book_appointment","dt_sc_donutchart_small",
								  "dt_sc_donutchart_medium","dt_sc_donutchart_large","dt_sc_clear","dt_sc_hr_border",
								  "dt_sc_hr_border_small","dt_sc_hr","dt_sc_hr_medium","dt_sc_hr_large","dt_sc_hr_invisible",
								  "dt_sc_hr_invisible_small","dt_sc_hr_invisible_medium","dt_sc_hr_invisible_large","dt_sc_icon_box",
								  "dt_sc_icon_box_with_image","dt_sc_icon_box_colored","dt_sc_dropcap","dt_sc_code",
								  "dt_sc_fancy_ol","dt_sc_fancy_ul","dt_sc_manual_list","dt_sc_box","dt_sc_pricing_table",
								  "dt_sc_pricing_table_item","dt_sc_pricing_table_item_with_image","dt_sc_progressbar",
								  "dt_sc_tab","dt_sc_tabs_horizontal","dt_sc_tabs_vertical","dt_sc_team","dt_sc_testimonial",
								  "dt_sc_testimonial_carousel","dt_sc_toggle","dt_sc_toggle_framed","dt_sc_titled_box",
								  "dt_sc_tooltip","dt_sc_pullquote","dt_sc_three_columns_portfolio","dt_sc_four_columns_portfolio",
								  "dt_sc_infographic_bar","dt_sc_catalog_items","dt_sc_catalog_items_with_category","dt_sc_h1_title","dt_sc_h2_title","dt_sc_h3_title",
								  "dt_sc_h4_title","dt_sc_h5_title","dt_sc_h6_title","dt_sc_animation",
								  "dt_sc_fullwidth_section","dt_sc_catalog_menu_items_list","dt_sc_reserve_appointments");

			$block = join("|", $dt_shortcodes );
			// opening tag
			$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

			// closing tag
			$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
			
			return $rep;
		}

		
		/**
		 * Adds DesignThemes custom shortcode rich buttons to TinyMCE
		 *
		 * @param unknown $buttons        	
		 * @return unknown
		 */
		function dt_register_rich_buttons($buttons) {
			array_push ( $buttons, "|", "designthemes_sc_button" );
			return $buttons;
		}
		
		/**
		 * Adds DesignThemes javascript to TinyMCE
		 *
		 * @param unknown $plugins        	
		 * @return unknown
		 */
		function dt_add_external_plugins($plugins) {
			global $wp_version;
			
			if(  version_compare( $wp_version, '3.9' , '<') ) {
				$url = DESIGNTHEMES_TINYMCE_URL . '/plugin-wp-3.8.js';
			} else {
				$url = DESIGNTHEMES_TINYMCE_URL . '/plugin-wp-3.9.js';
			}
			
			$plugins ['DTCoreShortcodePlugin'] = $url;
			return $plugins;
		}
	}
}
?>