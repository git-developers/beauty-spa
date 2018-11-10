<?php
class DTCoreShortcodesDefination {
	
	function __construct() {
		
		/* Accordion Shortcode */
		add_shortcode ( "dt_sc_accordion_group", array (
				$this,
				"dt_sc_accordion_group" 
		) );

		/* Button Shortcode */
		add_shortcode ( "dt_sc_button", array (
				$this,
				"dt_sc_button" 
		) );

		/* BlockQuotes Shortcode */
		add_shortcode ( "dt_sc_blockquote", array (
				$this,
				"dt_sc_blockquote" 
		) );

		/* Callout Box Shortcode */
		add_shortcode ( "dt_sc_callout_box", array (
				$this,
				"dt_sc_callout_box"
		));
		
		/* Callout Box With Moving Background Shortcode */
		add_shortcode ( "dt_sc_callout_box_with_moving_bg", array (
				$this,
				"dt_sc_callout_box_with_moving_bg"
		));

		/* Columns Shortcode */
		add_shortcode ( "dt_sc_one_half", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_one_third", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_one_fourth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_one_fifth", array (
				$this,
				"dt_sc_columns" 
		) );		
		add_shortcode ( "dt_sc_one_sixth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_two_sixth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_two_third", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_three_fourth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_two_fifth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_three_fifth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_four_fifth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_three_sixth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_four_sixth", array (
				$this,
				"dt_sc_columns" 
		) );
		add_shortcode ( "dt_sc_five_sixth", array (
				$this,
				"dt_sc_columns" 
		) );
		
		/* Column with inner */
		add_shortcode ( "dt_sc_one_half_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_third_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fourth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_third_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fourth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_four_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_five_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		/* Contact Information */
		#Address
		add_shortcode ( "dt_sc_address", array (
				$this,
				"dt_sc_address"
		) );
		
		#Phone
		add_shortcode ( "dt_sc_phone", array (
				$this,
				"dt_sc_phone"
		) );

		#Mobile
		add_shortcode ( "dt_sc_mobile", array (
				$this,
				"dt_sc_mobile"
		) );
		
		#Fax
		add_shortcode ( "dt_sc_fax", array (
				$this,
				"dt_sc_fax"
		) );
		
		#Email
		add_shortcode ( "dt_sc_email", array (
				$this,
				"dt_sc_email"
		) );

		#Web
		add_shortcode ( "dt_sc_web", array (
				$this,
				"dt_sc_web"
		) );

		#Online Form
		add_shortcode ( "dt_sc_online_form", array (
				$this,
				"dt_sc_online_form"
		) );

		#Book Appointment
		add_shortcode ( "dt_sc_book_appointment", array (
				$this,
				"dt_sc_book_appointment"
		) );
		
		/* Contact Information End */
		
		/* Donutchart Start */
		add_shortcode ( "dt_sc_donutchart_small", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		add_shortcode ( "dt_sc_donutchart_medium", array ( 
				$this,
				"dt_sc_donutchart"
		) );

		add_shortcode ( "dt_sc_donutchart_large", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		/* Donutchart End */
		
		/* Donutchart Type II Start */
		add_shortcode ( "dt_sc_donutchart_small_type2", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		add_shortcode ( "dt_sc_donutchart_medium_type2", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		add_shortcode ( "dt_sc_donutchart_large_type2", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		/* Donutchart Type II End */
		
		/* Dividers */
		
		/* Clear Shortcode */
		add_shortcode ( "dt_sc_clear", array ( 
				$this,
				"dt_sc_clear"
		) );
		
		/* HR With Border */
		add_shortcode( "dt_sc_hr_border", array (
				$this,
				"dt_sc_hr_border"
		) );
		
		add_shortcode ( "dt_sc_hr_border_small", array (
				$this,
				"dt_sc_hr_border_small" 
		) );				

		add_shortcode ( "dt_sc_hr_top", array (
				$this,
				"dt_sc_hr_top"
		) );
		
		add_shortcode ( "dt_sc_hr", array (
				$this,
				"dt_sc_dividers" 
		) );

		
		add_shortcode ( "dt_sc_hr_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_large", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible_small", array (
				$this,
				"dt_sc_dividers" 
		) );

		
		add_shortcode ( "dt_sc_hr_invisible_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible_large", array (
				$this,
				"dt_sc_dividers" 
		) );
		/* Dividers End */
		
		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box", array (
				$this,
				"dt_sc_icon_box" 
		) );
		/* Icon Boxes Shortcode End*/
		
		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box_with_image", array (
				$this,
				"dt_sc_icon_box_with_image" 
		) );
		/* Icon Boxes Shortcode End*/
		

		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box_colored", array (
				$this,
				"dt_sc_icon_box_colored" 
		) );
		/* Icon Boxes Shortcode End*/
		
		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box_available_image", array (
				$this,
				"dt_sc_icon_box_available_image" 
		) );
		/* Icon Boxes Shortcode End*/
		
		/* Dropcap Shortcode */
		add_shortcode ( "dt_sc_dropcap", array (
				$this,
				"dt_sc_dropcap" 
		) );
		
		/* Code Shortcode */
		add_shortcode ( "dt_sc_code", array (
				$this,
				"dt_sc_code" 
		) );

		/* Ordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ol", array (
				$this,
				"dt_sc_fancy_ol" 
		) );
		
		/* Unordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ul", array (
				$this,
				"dt_sc_fancy_ul" 
		) );

		/* Manual List Shortcode */
		add_shortcode ( "dt_sc_manual_list", array (
				$this,
				"dt_sc_manual_list" 
		) );

		/* Manual List = Add Shortcode [box] Shortcode */
		add_shortcode ( "dt_sc_box", array (
				$this,
				"dt_sc_box" 
		) );


		/* Pricing Table */
		add_shortcode ( "dt_sc_pricing_table", array (
				$this,
				"dt_sc_pricing_table" 
		) );

		/* Pricing Table Item */
		add_shortcode ( "dt_sc_pricing_table_item", array (
				$this,
				"dt_sc_pricing_table_item" 
		) );
		
		/* Pricing Table Item With Image*/
		add_shortcode ( "dt_sc_pricing_table_item_with_image", array (
				$this,
				"dt_sc_pricing_table_item_with_image" 
		) );

		/* Progress Bar Shortcode */
		add_shortcode ( "dt_sc_progressbar", array (
				$this,
				"dt_sc_progressbar" 
		) );

		/* Tabs */
		add_shortcode ( "dt_sc_tab", array (
				$this,
				"dt_sc_tab" 
		) );

		add_shortcode ( "dt_sc_tabs_horizontal", array (
				$this,
				"dt_sc_tabs_horizontal" 
		) );

		add_shortcode ( "dt_sc_tabs_vertical", array (
				$this,
				"dt_sc_tabs_vertical" 
		) );

		/* Team Shortcode */
		add_shortcode ( "dt_sc_team", array (
				$this,
				"dt_sc_team" 
		) );

		/* Testimonial Shortcode */
		add_shortcode ( "dt_sc_testimonial", array (
				$this,
				"dt_sc_testimonial" 
		) );
		
		/* Testimonial Carousel Shortcode */
		add_shortcode ( "dt_sc_testimonial_carousel", array (
				$this,
				"dt_sc_testimonial_carousel"
		) );

		/* Toggle Shortcode */
		add_shortcode ( "dt_sc_toggle", array (
				$this,
				"dt_sc_toggle" 
		) );

		/* Toogle Framed Shortcode */
		add_shortcode ( "dt_sc_toggle_framed", array (
				$this,
				"dt_sc_toggle_framed" 
		) );
		
		/* Titles Box Shortcode */
		add_shortcode ( "dt_sc_titled_box", array (
				$this,
				"dt_sc_titled_box" 
		) );
		
		/* Tooltip Shortcode */
		add_shortcode ( "dt_sc_tooltip", array (
				$this,
				"dt_sc_tooltip"
		) );
		
		/* PullQuotes Shortcode */
		add_shortcode ( "dt_sc_pullquote", array (
				$this,
				"dt_sc_pullquote" 
		) );

		/* Portfolio Shortcode */
		add_shortcode ( "dt_sc_three_columns_portfolio", array (
				$this,
				"dt_sc_portfolio" 
		) );

		add_shortcode ( "dt_sc_four_columns_portfolio", array (
				$this,
				"dt_sc_portfolio" 
		) );

		add_shortcode ( "dt_sc_infographic_bar", array (
				$this,
				"dt_sc_infographic_bar" 
		) );
		
		/* Catalog items */
		add_shortcode ( "dt_sc_catalog_items", array (
				$this,
				"dt_sc_catalog_items" 
		) );
		
		/* Catalog items with categories */
		add_shortcode ( "dt_sc_catalog_items_with_category", array (
				$this,
				"dt_sc_catalog_items_with_category" 
		) );
		
		/* h1- h6 title  */
		add_shortcode ( "dt_sc_h1_title", array (
				$this,
				"my_title" 
		) );
		
		add_shortcode ( "dt_sc_h2_title", array (
				$this,
				"my_title" 
		) );
		
		add_shortcode ( "dt_sc_h3_title", array (
				$this,
				"my_title" 
		) );
		
		add_shortcode ( "dt_sc_h4_title", array (
				$this,
				"my_title" 
		) );
		
		add_shortcode ( "dt_sc_h5_title", array (
				$this,
				"my_title" 
		) );
		
		add_shortcode ( "dt_sc_h6_title", array (
				$this,
				"my_title" 
		) );
		
		/* h1- h6 tag  */
		add_shortcode ( "dt_sc_h1", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_h2", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_h3", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_h4", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_h5", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_h6", array (
				$this,
				"tag" 
		) );
		
		add_shortcode ( "dt_sc_fullwidth_section", array (
				$this,
				"dt_sc_fullwidth_section" 
		) );
		
		add_shortcode("dt_sc_animation", array(
			$this,
			"dt_sc_animation"
		) );
		
		add_shortcode ( "dt_sc_catalog_menu_items_list", array (
				$this,
				"dt_sc_catalog_menu_items_list" 
		) );
		
		add_shortcode ( "list_with_font_awesome_icons", array (
				$this,
				"list_with_font_awesome_icons" 
		) );
		
		add_shortcode ( "font_awesome_icon", array (
				$this,
				"font_awesome_icon" 
		) );
		
		add_shortcode ( "dt_sc_spa_procedure", array (
				$this,
				"dt_sc_spa_procedure" 
		) );
		
		/* Data counter */	
		add_shortcode('dt_sc_counter', array ( 
				$this, 
				"dt_sc_counter" 
		) );
		
		/* Icon Box Process Shortcode */
		add_shortcode('dt_sc_icon_box_process', array ( 
				$this, 
				"dt_sc_icon_box_process" 
		) );
		
		/* NewsLetter Shortcode */
		add_shortcode('dt_sc_news_letter', array ( 
				$this, 
				"dt_sc_news_letter" 
		) );
		
		/* Appointment Schedule */
		add_shortcode('dt_sc_reserve_appointment', array ( 
				$this, 
				"dt_sc_reserve_appointment" 
		) );
		
		
		/* Page Builder Utils 
		
		/* Resizeable Column */
		add_shortcode ( "dt_sc_resizable", array ( $this, "dt_sc_resizable" ) );

		add_shortcode ( "dt_sc_resizable_inner", array ( $this, "dt_sc_resizable" ) ); 
		
		add_shortcode ( "dt_sc_widgets", array ( $this, "dt_sc_widgets" ) );
		/* Page Builder Utils */
		
		
		add_shortcode ( "dt_sc_align_left", array (
				$this,
				"dt_sc_align_left" 
		) );
		
		add_shortcode ( "dt_sc_align_right", array (
				$this,
				"dt_sc_align_right" 
		) );
		
		add_shortcode ( "dt_sc_align_center", array (
				$this,
				"dt_sc_align_center" 
		) );
		
	}
	
	/**
	 *
	 * @param string $content        	
	 * @return string
	 */
	function dtShortcodeHelper($content = null) {
		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}
	
	/**
	 *
	 * @param string $dir        	
	 * @return multitype:
	 */
	function dtListImages($dir = null) {
		$images = array ();
		$icon_types = array (
				'jpg',
				'jpeg',
				'gif',
				'png' 
		);
		
		if (is_dir ( $dir )) {
			$handle = opendir ( $dir );
			while ( false !== ($dirname = readdir ( $handle )) ) {
				
				if ($dirname != "." && $dirname != "..") {
					$parts = explode ( '.', $dirname );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					
					if (in_array ( $ext, $icon_types )) {
						$option = $parts [count ( $parts ) - 2];
						$images [$dirname] = str_replace ( ' ', '', $option );
					}
				}
			}
			closedir ( $handle );
		}
		
		return $images;
	}
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_accordion_group($attrs, $content = null) {
		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = str_replace ( "<h5 class='dt-sc-toggle", "<h5 class='dt-sc-toggle-accordion ", $out );
		$out = "<div class='dt-sc-toggle-frame-set'>{$out}</div>";
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_button($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'size' => '',
				'link' => '#',
				'target' => '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '',
				'class' =>'',
				'type' => '',
				'icon' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		if( ( $type == "with-icon-type1" || $type == "with-icon-type2" ) && !empty($icon)  ){
			if( $type == 'with-icon-type1'){
				$content = '<span>'.$content.'</span>'."<i class='fa {$icon}'> </i>";
				$btn_wit_icn_class = 'with-icon';
			}else{
				$content = '<span class="text">'.$content.'</span>'."<span class='ico'><i class='fa {$icon}'> </i></span>";
				$btn_wit_icn_class = 'with-ico';
			}
		}
		$btn_wit_icn_class = !empty ( $btn_wit_icn_class ) ? $btn_wit_icn_class : ' ';
		
		$size = ($size == 'xlarge') ? ' xlarge' : $size;
		$size = ($size == 'large') ? ' large' : $size;
		$size = ($size == 'medium') ? ' medium' : $size;
		$size = ($size == 'small') ? ' small' : $size;
		
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$variation = (($variation) && (empty ( $bgcolor ))) ? ' ' . $variation : '';
		
		$styles = array ();
		if ($bgcolor)
			$styles [] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if ($textcolor)
			$styles [] = 'color:' . $textcolor . ';';
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';
		
		$link = esc_url ( $link );
		
		
		$out = "<a href='{$link}' {$target} class='dt-sc-button {$btn_wit_icn_class} {$class} {$size} {$variation} ' {$style}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_blockquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => "type1",	
				'align' => '',
				'variation' => '',
				'textcolor' => '',
				'cite'=> ''		
		), $attrs ) );
		
		$class = array();
		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
		if( $variation)
			$class[] = ' ' . $variation;
		
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : "";
		
		$cite = ! empty ( $cite ) ? ' <cite>&ndash; ' . $cite . '</cite>' : "";
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );

		$out = "<blockquote class='{$type} {$class}' {$style}><q>{$content}</q> {$cite}</blockquote>";
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_callout_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => "type1",
				'link' => '#',
				'button_text'=> __('Purchase Now','dt_themes'),
				'class' => '',
				'target' => ''
		), $attrs ) );

		$attribute = " class='dt-sc-callout-box {$type} {$class}' ";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<div {$attribute}>";
		$out .= ( !empty( $title ) ) ? "<h2>{$title}</h2>" : "";
		if( $type === "type1" ) {
			$out .= $content;
			
		}else{
			$out .= '<div class="column dt-sc-four-fifth first">';
			$out .= $content;
			$out .= '</div>';
			
			$out .= '<div class="column dt-sc-one-fifth">';
			$out .= ( !empty($link) ) ? "<a href='{$link}' class='dt-sc-button medium' target='{$target}'>{$button_text}</a>" : "";
			$out .= '</div>';			
		}
		$out .= "</div>";
		
		return $out;
	}
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_callout_box_with_moving_bg($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'background_image_url' => "",
				'bgcolor' => ""
		), $attrs ) );

		$styles = array ();
		if ($bgcolor)
			$styles [] = 'background-color:' . $bgcolor . ';';
		if ($background_image_url)
			$styles [] = "background-image:url({$background_image_url});";
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';
		
		$attribute = " class='dt-sc-moving-bg ' {$style} ";
				
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out =  "<div {$attribute}>";
		$out .=  '<div class="dt-sc-moving-bg-content">';
		$out .=   '<div class="container">';
		$out .=     $content;
		$out .=   '</div>';
		$out .=  "</div>";
		$out .= "</div>";
		
		return $out;
	}
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_columns($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'id' => '',
				'class' => '' 
		), $attrs ) );
		
		$shortcodename = str_replace ( "_", "-", $shortcodename );
		$shortcodename = str_replace ( "-inner", "", $shortcodename );
		
		$id = ($id != '') ? " id = '{$id}'" : '';
		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = "<div {$id} class='column {$shortcodename} {$class} {$first}'>{$content}</div>";
		return $out;
	}

	/* Contact Information */
	
	/**
	 * Shortcode : Address
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_address($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'line1' => '',
				'line2' => '',
				'line3' => '',
				'line4' => ''
		), $attrs ) );
		
		
		$out = '<p class="dt-sc-contact-info address">';
		$out .= "<i class='fa fa-pagelines'></i>";
		$out .= "<span>";
		$out .= ( !empty($line1) ) ? $line1 : "";
		$out .= ( !empty($line2) ) ? "<br>$line2" : "";
		$out .= ( !empty($line3) ) ? "<br>$line3" : "";
		$out .= ( !empty($line4) ) ? "<br>$line4" : "";
		$out .= "</span>";
		$out .= '</p>';
		
		return $out;
	 }

	/**
	 * Shortcode : Phone
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_phone($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'phone' => ''
		), $attrs ) );

		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i class='fa fa-phone'></i>";
		$out .= __('Phone : ','dt_themes');
		$out .= ( !empty($phone) ) ?"<span>{$phone}</span>": "";
		$out .= '</p>';
		
		return $out;
	 }
	 
	 /**
	 * Shortcode : Align Left
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_align_left($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = '<div style="text-align: left;">'.$content.'</div>';
		return $out;
	 }
	 
	 /**
	 * Shortcode : Align Right
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_align_right($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = '<div style="text-align: right;">'.$content.'</div>';
		return $out;
	 }
	 
	 /**
	 * Shortcode : Align Center
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_align_center($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = '<div style="text-align: center;">'.$content.'</div>';
		return $out;
	 }
	 
	/**
	 * Shortcode : Mobile
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_mobile($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'mobile' => ''
		), $attrs ) );

		
		
		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i  class='fa fa-mobile-phone'></i>";
		$out .= __('Mobile : ','dt_themes');
		$out .= ( !empty($mobile) ) ?"<span>{$mobile}</span>": "";
		$out .= '</p>';
		
		return $out;
	 }

	/**
	 * Shortcode : Fax
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_fax($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'fax' => ''
		), $attrs ) );

		$attribute = "  ";

		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i class='fa fa-fax'></i>";
		$out .= __('Fax : ','dt_themes');
		$out .= ( !empty($fax) ) ? "<span>{$fax}</span>" : "";
		$out .= '</p>';
		
		return $out;
	 }

	/**
	 * Shortcode : Email id
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_email($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'emailid' => ''
		), $attrs ) );

		$attribute = "  ";

		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i class='fa fa-envelope'></i>";
		$out .= __('Email : ','dt_themes');
		$out .= ( !empty($emailid) ) ? "<a href='mailto:$emailid'>{$emailid}</a>" : "";
		$out .= '</p>';
		
		return $out;
	 }

	/**
	 * Shortcode : Website Url
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_web($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'url' => ''
		), $attrs ) );
		
		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i class='fa fa-globe' ></i>";
		$out .= __('Web : ','dt_themes');
		if( !empty( $url ) ) {
			$out .= "<a target='_blank' href='{$url}'>";
			$a = preg_replace('#^[^:/.]*[:/]+#i', '',urldecode( $url ));
			$out .=	preg_replace('!\bwww3?\..*?\b!', '', $a);
			$out .= "</a>";
		}
		$out .= '</p>';
		
		return $out;
	 }

	/**
	 * Shortcode : Website Online Form  Url
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_online_form($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'url' => ''
		), $attrs ) );

		$out = '<p class="dt-sc-contact-info">';
		$out .= "<i class='fa fa-pencil'></i>";
		$out .= __('Online Form : ','dt_themes');
		if( !empty( $url ) ) {
			$out .= "<a href='{$url}'>".__("Fill out this form")."</a>";
		}
		$out .= '</p>';
		
		return $out;
	 }


	/* Book Appointment Section */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_book_appointment($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return '<div class="dt-sc-appointment">'.$content.'</div>';
	}
	 
	 

	/* Contact Information End*/
	
	/* Dividers */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_clear($attrs, $content = null) {
		return '<div class="dt-sc-clear"></div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_hr_border($attrs, $content = null) {
		return '<div class="dt-sc-hr-border"></div>';
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_hr_border_small($attrs, $content = null) {
		return '<div class="dt-sc-hr-border-small"></div>';
	}	


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_donutchart($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'title' => '',
				'bgcolor' => '',
				'fgcolor' => '',
				'percent' =>'30',
				'description' => ''
		), $attrs ) );
		
		$medium_type2_class = ' ';
		$size = "100";
		$size = ( "dt_sc_donutchart_medium" === $shortcodename ) ? "160" : $size;
		$size = ( "dt_sc_donutchart_medium_type2" === $shortcodename ) ? "190" : $size;
		$size = ( "dt_sc_donutchart_large" === $shortcodename ) || ( "dt_sc_donutchart_large_type2" === $shortcodename ) ? "300" : $size;
		
		$shortcodename = str_replace ( "_", "-", $shortcodename );
		
		//type 2
		if( $shortcodename == 'dt-sc-donutchart-small-type2' || $shortcodename == 'dt-sc-donutchart-medium-type2' || $shortcodename == 'dt-sc-donutchart-large-type2'){
			$medium_type2_class = 'type2';
		}
		
		if($shortcodename == 'dt-sc-donutchart-small-type2'){
			$shortcodename = 'dt-sc-donutchart-small type2';
		}else if($shortcodename == 'dt-sc-donutchart-medium-type2'){
			$shortcodename = 'dt-sc-donutchart-medium type2';
		}else if($shortcodename == 'dt-sc-donutchart-large-type2'){
			$shortcodename = 'dt-sc-donutchart-large type2';
		}
		
		$out = "<div class='{$shortcodename}'>";
		$out .= ( empty($title) ) ? $out : "<h5 class='dt-sc-donutchart-title'>{$title}</h5>";
		$out .= "<div class='dt-sc-donutchart {$medium_type2_class}' data-size='{$size}' data-percent='{$percent}' data-bgcolor='{$bgcolor}' data-fgcolor='$fgcolor'></div>";
		$out .= ( empty($description) ) ? $out : "<p>{$description}</p>";
		$out .= '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dividers($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'class' => '',
				'top' => '' 
		), $attrs ) );
		
		if ("dt_sc_hr" === $shortcodename || "dt_sc_hr_medium" === $shortcodename || "dt_sc_hr_large" === $shortcodename) {
			
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			
			$out = "<div class='{$shortcodename} {$class}'>";
			
			if ((isset ( $attrs [0] ) && trim ( $attrs [0] == 'top' ))) {
				
				$out = "<div class='{$shortcodename} top {$class}'>";
				$out .= "<a href='#top' class='scrollTop'><span class='fa fa-angle-up'></span>" . __ ( "top", 'dt_themes' ) . "</a>";
			}
			
			$out .= "</div>";
		} else {
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			$out = "<div class='{$shortcodename}  {$class}'></div>";
		}
		return $out;
	}
	
	function dt_sc_hr_top($attrs, $content = null, $shortcodename="" ){
		$out = do_shortcode("[dt_sc_hr top]");
		return $out;
	}
	
	/* Dividers End*/
	
	/* Icon Boxes Shortcode */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'fontawesome_icon' => '',
				'title' => '',
				'link' => '',
				'target' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out =  "<div class='dt-sc-ico-content {$type}'>";
		if( !empty($fontawesome_icon) ){
			$out .= "<div class='icon'> <span class='fa fa-{$fontawesome_icon}'> </span> </div>";
		
		}
		$out .= empty( $title ) ? $out : "<h5><a href='{$link}' target='{$target}'> {$title} </a></h5>";
		$out .= $content;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Shortcode End*/

	/* Icon Boxes Colored Shortcode */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box_colored($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'fontawesome_icon' => '',
				'custom_icon' => '',
				'title' => '',
				'bgcolor' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$bgcolor = empty ( $bgcolor ) ? "" : " style='background:{$bgcolor};' ";
		
		$type = ( trim($type) === 'type1' ) ? "no-space" : "space";
		
		$out =  "<div class='dt-sc-colored-box {$type}' {$bgcolor}>";
		
		$icon = "";
		if( !empty($fontawesome_icon) ){
			$icon = "<i class='fa fa-{$fontawesome_icon}'> </i>";
		
		}elseif( !empty($custom_icon) ){
			$icon = "";	
		}
		
		$out .= "<h5>{$icon}<span>{$title}</span></h5>";
		$out .= $content;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Colored Shortcode End*/

	
	/* Icon Boxes With Image Shortcode */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box_with_image($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'image_url' => '',
				'title' => '',
				'link' => '',
				'description' => '',
				'image_title' => '',
				'image_alt' => '',
				'target' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out =  "<div class='dt-sc-ico-content {$type}'>";
		if( !empty($image_url) ){
			$out .= "<div class='icon'> <span class='ico-pic'> <a href='{$link}' target='{$target}'> <img src='".$image_url."' alt='{$image_alt}' title='{$image_title}'> </a> </span> </div>";
		}
		
		$out .= empty( $title ) ? "" : "<h3><a href='{$link}' target='{$target}'> {$title} </a></h3>";
		if( $description != '') {
			$description = '<p>'.$description.'</p>';
		}else{
			$description = "";
		}
		$out .= $description;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Shortcode End*/
	
	
	/* Icon Boxes Available Images Shortcode */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box_available_image($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'class_name' => '',
				'title' => '',
				'link' => '',
				'description' => '',
				'target' => ''
		), $attrs ) );
		
		$out =  "<div class='dt-sc-ico-content type6'>";
			$out .= "<div class='icon'> <span class='".$class_name."'> </span> </div>";
		$out .= empty( $title ) ? "" : "<h3><a href='{$link}' target='{$target}'> {$title} </a></h3>";
		if( $description != '') {
			$description = '<p>'.$description.'</p>';
		}else{
			$description = "";
		}
		$out .= $description;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Shortcode End*/
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dropcap($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$type = str_replace ( " ", "-", $type );
		$type = "dt-sc-dropcap-".strtolower ( $type );
		
		$bgcolor = ( $type == 'dt-sc-dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<span class='dt-sc-dropcap $type {$variation}' {$style}>{$content}</span>";
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_code($attrs, $content = null) {
		$array = array (
				'[' => '&#91;',
				']' => '&#93;',
				'/' => '&#47;',
				'<' => '&#60;',
				'>' => '&#62;',
				'<br />' => '&nbsp;' 
		);
		$content = strtr ( $content, $array );
		$out = "<pre>{$content}</pre>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ol($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		
		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ol>', "<ol class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		$content = str_replace ( '<li>', '<li><span>', $content );
		$content = str_replace ( '</li>', '</span></li>', $content );
		return $content;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ul($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_manual_list($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => 'type1'
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		if( $type === "type1"){
			$content = str_replace ( '<ul>', "<ul class='dt-sc-numbered-list'>", $content );
		}else{
			$content = str_replace ( '<ul>', "<ul class='dt-sc-numbered-list-type2'>", $content );
		}
		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_box($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<span>$content</span>";
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => 'type1' 
		), $attrs ) );
		
		$type = ( trim($type) === 'type1' ) ? "space type1" : "space type2";
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		return "<div class='dt-sc-pricing-table {$type}'>" . $content . '</div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'heading' => __ ( "Heading", 'dt_themes' ),
				'per' => 'month',
				'price' => '',
				"button_link" => "#",
				"button_text" => __ ( "Buy Now", 'dt_themes' ),
				"button_size" => "small" 
		), $attrs ) );
		
		$selected = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'selected' )) ? 'selected' : '';
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '</ol>', '</ul>', $content );
		$price = ! empty ( $price ) ? "<div class='dt-sc-price'> $price <span> $per</span> </div>" : "";
		
		$out = "<div class='dt-sc-pr-tb-col $selected'>";
		$out .= '	<div class="dt-sc-tb-header">';
		$out .= '		<div class="dt-sc-tb-title">';
		$out .= "			<h5>$heading</h5>";
		$out .= '		</div>';
		$out .= $price;
		$out .= '	</div>';
			$out .= $content;
			$out .= '<div class="dt-sc-buy-now">';
			$out .= do_shortcode ( "[dt_sc_button size='$button_size' link='$button_link']" . $button_text . "[/dt_sc_button]" );
			$out .= '</div>';
		
		$out .= '</div>';
		return $out;
	}


	/**
	 * #Pricing Table Thumb Image#
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table_item_with_image($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'thumb' => '',
				'heading' => __ ( "Heading", 'dt_themes' ),
				'per' => 'month',
				'price' => '',
				"button_link" => "#",
				"button_text" => __ ( "Buy Now", 'dt_themes' ),
				"button_size" => "small" 
		), $attrs ) );
		
		$selected = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'selected' )) ? 'selected' : '';
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '</ol>', '</ul>', $content );
		$price = ! empty ( $price ) ? "<div class='dt-sc-price'> <span class='ico-border'> <i class='ico-bg flower'></i></span> $price <span> $per</span> </div>" : "";
		
		$out = "<div class='dt-sc-pr-tb-col $selected'>";
		$out .= '	<div class="dt-sc-tb-header">';
		$out .= '		<div class="dt-sc-tb-thumb">';
		if($thumb != '') {
				$out .= '<img src="'.$thumb.'" alt="thumb" />';
			}
		$out .= '<div class="dt-sc-tb-title">';
		$out .= "			<h5>$heading</h5>";
		$out .= '</div>';
		$out .= '		</div>';
		
		$out .= '	</div>';
		$out .= '<div class="dt-sc-tb-body">';
		
		$out .= '<div class="dt-sc-price-wrapper">';
		$out .= $price;
		$out .= '</div>';
			$out .= $content;
			$out .= '<div class="dt-sc-buy-now">';
			$out .= do_shortcode ( "[dt_sc_button size='$button_size' link='$button_link']" . $button_text . "[/dt_sc_button]" );
			$out .= '</div>';
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_progressbar($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => 'standard',
				'color' => '',
				'value' => '55',
				'textcolor' => '' 
		), $attrs ) );
		
		
		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}

		
		$color = ! empty ( $color ) ? "style='background-color:$color;'" : "";
		$textcolor = ! empty ( $textcolor ) ? " style='color:{$textcolor}'" : "";
		
		$value_in_percentage = "<span>$value%</span>";
		$value = "data-value='$value'";
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = $content.$value_in_percentage;
		
		$out = "<div class='dt-sc-bar-text' {$textcolor}>$content</div>";
		$out .="<div class='dt-sc-progress $type'>";
		$out .= "   <div class='dt-sc-bar' $color $value> </div>";
		$out .= "</div>";
		
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tab($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		$out = '<li class="tab_head"><a href="#">' . $title . '</a></li><div class="tabs_content">' . DTCoreShortcodesDefination::dtShortcodeHelper ( $content ) . '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	
	function dt_sc_tabs_horizontal($attrs, $content = null) {
		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);

		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = '<ul class="dt-sc-tabs-frame">';
			for($i = 0; $i < count($matches[0]); $i++) {
				$out .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
			}
		$out .= '</ul>';

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="dt-sc-tabs-frame-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
		return "<div class='dt-sc-tabs-container'>$out</div>";
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tabs_vertical($attrs, $content = null) {
		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);

		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = '<ul class="dt-sc-tabs-vertical-frame">';
			for($i = 0; $i < count($matches[0]); $i++) {
				$out .= '<li> <span></span> <a href="#">' . $matches[3][$i]['title'] . '</a></li>';
			}
		$out .= '</ul>';

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="dt-sc-tabs-vertical-frame-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
		return "<div class='dt-sc-tabs-vertical-container'>$out</div>";
	}

	/**
	 *
	 * @param unknown $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_team($attrs, $content = null) {
		$dir_path = plugin_dir_path ( __FILE__ ) . "images/sociables/";
		$sociables_icons = DTCoreShortcodesDefination::dtListImages ( $dir_path );
		
		$sociables = array_values ( $sociables_icons );
		$attributes = array (
				'name' => '',
				'image' => 'http://placehold.it/300',
				'role' => '',
				'email' => '',
				'alt' => __('Please specify image url','dt_themes'),
				'title' => __('Please specify image url','dt_themes')
		);
		
		foreach ( $sociables as $sociable ) {
			$attributes [$sociable] = '';
		}
		
		extract ( shortcode_atts ( $attributes, $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$image = "<img src='{$image}' alt='{$alt}' title='{$title}' />";
		
		$name = empty ( $name ) ? "" : "<h4>{$name}</h4>";
		$role = empty ( $role ) ? "" : "<span>{$role}</span>";
		
		$email =  empty ( $email ) ? "" : "<p class='email'>".__('Email : ','dt_themes')."<a href='mailto:{$email}'>{$email}</a></p>";
		
		$s = "";
		$path = plugin_dir_url ( __FILE__ ) . "images/sociables/";
		foreach ( $sociables as $sociable ) {
			$img = array_search ( $sociable, $sociables_icons );
			$class = explode(".",$img);
			$class = $class[0];
			$s .= empty ( $$sociable ) ? "" : "<li class='{$class}'><a href='{$$sociable}' target='_blank'> <img src='{$path}hover/{$img}' alt='{$sociable}'/>  <img src='{$path}{$img}' alt='{$sociable}'/> </a></li>";
		}
		
		$s = ! empty ( $s ) ? "<div class='dt-sc-social-icons'><ul>$s</ul></div>" : "";
		
		
		$class = "dt-sc-team ";
		
		$out = "<div class='{$class}'>";
		$out .= "	<div class='image'>{$image}</div>";
		$out .= '	<div class="team-details">';
		$out .= $name.$role;
		$out .= '<span class="ico-border"> <i class="ico-bg flower"></i></span>';
		$out .= $content.$email.$s;
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'name' => '',
				'role' => '',
				'image' => 'http://placehold.it/300',
				'custom_class' => ''
		), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : "";
		$name = ! empty ( $name ) ? " {$name}" : "";
		$role = ! empty ( $role ) ? "<span>, {$role}</span>" : "";
		
		$content = (! empty ( $content ) ) ? '<blockquote>"'.$content.'"</blockquote>' : "";
		$content.= "<cite> - $name$role</cite>";
		
		$image = "<img src='{$image}' alt='{$role}' title='{$name}' />";
		$image = "<div class='author'>{$image}</div>";

		
		return "<div class='dt-sc-testimonial ".$custom_class."'>$image$content</div>";
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'custom_class' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-testimonial-carousel'>", $content );
		
		
		$out = '<div class="dt-sc-testimonial-carousel-wrapper '.$custom_class.'">';
		$out .= $content;
		$out .= '<div class="carousel-arrows">';
		$out .= '	<a href="" class="testimonial-prev"> <span class="fa fa-caret-left"> </span> </a>';
		$out .= '	<a href="" class="testimonial-next">  <span class="fa fa-caret-right"> </span> </a>';
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out = "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle_framed($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out = '<div class="dt-sc-toggle-frame">';
		$out .= "	<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '	<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '		<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_titled_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '',
				'icon' => '',
				'type'	=> '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '',
				'custom_class' => '' 
		), $attrs ) );
		
		$type = (empty($type)) ? 'dt-sc-titled-box' :"dt-sc-$type";
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		if($type == 'dt-sc-titled-box') :
			$icon = ( empty($icon) ) ? "" : "<span class='fa {$icon} '></span>";
			$title = "<h6 class='{$type}-title' {$style}> {$icon} {$title}</h6>";
			$out = "<div class='{$type} {$variation} {$custom_class}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>";
		else :
			$out = "<div class='{$type}'>{$content}</div>";
		endif;
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tooltip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type'	=> 'default',
				'tooltip' => '',
				'position' => 'top',
				'href' => '',
				'target' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$class  = "class=' ";
		$class .=  ( $type == "boxed" ) ? "dt-sc-boxed-tooltip" : "";
		$class .= " dt-sc-tooltip-{$position}'";
		
		$href = " href='{$href}' ";
		$title = " title = '{$tooltip}' ";
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$style = ( $type == "boxed" ) ? $style : "";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$out = "<a {$href} {$title} {$class} {$style} {$target}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pullquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type'	=> 'pullquote1',
				'align' => '',
				'icon' => '',
				'textcolor' => '',
				'cite' => ''
		), $attrs ) );
		
		$class = array();
		if( isset($type) )
			$class[] = " dt-sc-{$type}";
			
		if( trim( $icon ) == 'yes' )
			$class[] = ' quotes';

		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
			
		$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite .'</cite>' : '' ;
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = "<span class='{$class}' {$style}> {$content} {$cite}</span>";
		
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_portfolio($attrs, $content = null, $shortcodename ="") {
		extract ( shortcode_atts ( array (
				'showposts'	=> '-1',
				'categories' => ''
		), $attrs ) );
		
		if(empty($categories)):
			$args = array(	'paged' => get_query_var( 'paged' ) ,'posts_per_page' =>$showposts  ,'post_type' => 'dt_portfolios');
		else:
			$categories = explode(",",$categories);
			$categories = array_filter($categories);
			
			$args = array(	'orderby' 	=> 'ID'
						,'order' 			=> 'ASC'
						,'paged' 			=> get_query_var( 'paged' )
						,'posts_per_page' 	=> $showposts
						,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$categories  ) ) );	
		endif;
		
		$class = ( $shortcodename === "dt_sc_three_columns_portfolio") ? "three-columns-portfolio-carousel" : "four-columns-portfolio-carousel";
		$liclass = ( $shortcodename === "dt_sc_three_columns_portfolio") ? "dt-sc-one-third" : "dt-sc-one-fourth";
		
		$out = "";
		query_posts($args);
		if( have_posts() ):
			$out .= '	<!-- **Portfolio Carousel Wrapper** -->';
			$out .= '	<div class="portfolio-carousel-wrapper gallery">';
			$out .= '		<!-- **Portfolio Carousel** -->';
			$out .= "		<ul class='portfolio-carousel {$class}'>";
			
			while( have_posts() ):
				the_post();
				$the_id = get_the_ID();
				$title = get_the_title();
				$permalink = get_permalink( $the_id );
				
				$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
				
				$out .= "		<li class='portfolio {$liclass}'>";
				$out .=	'			<div class="portfolio-thumb">';
									if( array_key_exists("items_name",$portfolio_item_meta) ):
										$item =  $portfolio_item_meta['items_name'][0];
										$image = $popup = "";	
										if( "video" === $item ):
											$image = "http".dt_ssl()."://placehold.it/520x350/#dddddd/&text=Video%20Portfolio";
											$popup = $portfolio_item_meta['items'][0];
										else:
											$image = $popup = $portfolio_item_meta['items'][0];
										endif;
									else:
										$popup = $image = "http".dt_ssl()."://placehold.it/520x350/#dddddd/&text=Add%20Image%20/%20Video%20%20to%20Portfolio";
									endif;
				$out .= "				<img src='{$image}' alt='{$title}' />";
				$out .= '				<div class="image-overlay">';
				$out .= '					<div class="portfolio-detail">';
												if(dttheme_is_plugin_active('roses-like-this/likethis.php')):
				$out .= '							<div class="views"><i class="fa fa-heart"> </i>'.generateLikeString($the_id, isset($_COOKIE["like_" . $the_id])).'</div>';
												endif;
				$out .= "						<div class='portfolio-meta-content'><h5><a href='{$permalink}' title='{$title}'>{$title}</a></h5>";					
													if( array_key_exists("sub-title",$portfolio_item_meta) ):
               	$out .="								<p>".esc_html($portfolio_item_meta['sub-title'])."</p>";
													endif;
				$out .="						</div>";				
				$out .= '					</div>';							
				$out .= '				</div>';					
				$out .= '			</div>';
				
				$out .= "		</li>";
			endwhile;
			
			$out .= "		</ul>";
            $out .= '      <div class="carousel-arrows">';
            $out .= '      	<a href="#" title="" class="portfolio-prev-arrow"> <span class="fa fa-caret-left"> </span> </a>';
			$out .= '			<a href="#" title="" class="portfolio-next-arrow"> <span class="fa fa-caret-right"> </span> </a>';
			$out .= '       </div>';
			$out .= '	</div>';
			
		else:
			$out .= "<p>".__("Please add few portfolio items before using this shortcode",'dt_themes')."</p>";		
		endif;
		wp_reset_query();
		
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_infographic_bar($attrs, $content = null, $shortcodename ="") {
		extract ( shortcode_atts ( array (
				'type' => 'standard',
				'icon' =>'',
				'icon_size'=>'150',
				'color' => '',
				'value' => '55'
		), $attrs ) );

		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = '<div class="dt-sc-infographic-bar">';
		
		if( !empty($icon) ){
		$out .= "<i class='fa {$icon}' style='font-size:{$icon_size}px; color:{$color};'> </i>";
		}
		$out .= '	<div class="info">';
		
		$out .= "		<div class='dt-sc-progress $type'>";
		$out .= "		 <div data-value={$value} style='background-color:{$color};' class='dt-sc-bar'></div>";
		$out .= '		</div>';
		
		$out .= "		<div class='dt-sc-bar-percentage'> <span> {$value}%  </span> </div>";
		$out .= "		<div class='dt-sc-bar-text'>$content</div>";
		$out .= '	</div>';
		
		$out .= '</div>';
		
		return $out;
	}

	# catalog items
	function dt_sc_catalog_items($atts, $content = null) {
		extract(shortcode_atts(array(
			'item_ids' => '',
			'column' => '3',
			'excerpt_length' => '',
			'count' => '',
			'link' => '',
			'target' => ''
		), $atts));

		$col_class = $out = "";
		if($count == -1){
			$args = array('post_type' => 'dt_catalog', 'posts_per_page' => '-1');
		}else {
			$args = array('post_type' => 'dt_catalog', 'posts_per_page' => '-1', 'post__in' => explode(',', $item_ids));
		}
		$wp_query = new WP_Query($args);
		
		if($wp_query->have_posts()):
		
			while($wp_query->have_posts()): $wp_query->the_post();
			
			$id = get_the_ID();
			if($column == 1) {
				$col_class = 'dt-sc-one-column column';
				
			}else if($column == 2){
				if(($wp_query->current_post % 2) == 0) {
					$col_class = "column dt-sc-one-half first";
				}else{
					$col_class = "column dt-sc-one-half";
				}
			}else{
				
				if(($wp_query->current_post % 3) == 0){
					$col_class = "column dt-sc-one-third first";
					
				}else{
					$col_class = "column dt-sc-one-third";
				}
			}
			
			$item_meta = get_post_meta(get_the_ID(), '_catalog_settings', true);
			$price = isset( $item_meta['price']) ? $item_meta['price'] : NULL;
			$sub_title = isset( $item_meta['subtitle']) ? $item_meta['subtitle'] : NULL;
				
			$out .= '<div class="'.$col_class.'">';
				$out .= '<div class="dt-sc-catalog-menu type1">';
					$out .= '<span class="rounded">';
								if( has_post_thumbnail($id) ):
									$out .= get_the_post_thumbnail(get_the_ID(), "full");
								else:
									$out .= '<img src="http'.dt_ssl().'://placehold.it/600x600/#dddddd/&text=Image" alt="catalog-image" title="catalog-image" />';
								endif;
					$out .= '</span>';
					$out .= '<div class="dt-sc-catalog-meta"> <h4> <a href="'.$link.'" target="'.$target.'">'.get_the_title().'</a></h4>';
					$out .= '<a class="dt-sc-button small" href="'.$link.'">'.esc_html($price).'</a>';
					
					if($column == 1){
						$out .= '<span>'.esc_html($sub_title).'</span>';
					}
						$out .= '</div></div>';
						$out .= empty($excerpt_length)? '' : '<p class="dt-sc-catalog-detail">'.do_shortcode(wp_trim_words(get_the_content(),$excerpt_length)).'</p>';
			$out .= '</div>';
			if($column == 1) {
				$out .= '<div class="dt-sc-hr-invisible-small"></div>';
			}
			endwhile;
		
		else:
			echo "Apologize, Catalog Menu item IDS does not Exists";	
		
		endif;
		wp_reset_query($wp_query);
		
		return $out;
	}
	
	# catalog items with category
	function dt_sc_catalog_items_with_category($atts, $content = null) {
		extract(shortcode_atts(array(
			'category_ids' => '',
			'column' => '3',
			'excerpt_length' => '',
			'count' => '',
			'link' => '',
			'target' => ''
		), $atts));

		$col_class = $out = "";
		if(empty($category_ids)){
			$args = array('post_type' => 'dt_catalog', 'posts_per_page' => '-1');
		}else {
			$category_ids = explode(",",$category_ids);
			$category_ids = array_filter($category_ids);
			$args = array(	'orderby' 	=> 'ID'
						,'order' 			=> 'ASC'
						,'posts_per_page' 	=> '-1'
						,'tax_query'		=> array( array( 'taxonomy'=>'catalog_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$category_ids  ) ) );
		}
		
		$wp_query = new WP_Query($args);
		
		if($wp_query->have_posts()):
		
			while($wp_query->have_posts()): $wp_query->the_post();
			
			$id = get_the_ID();
			if($column == 1) {
				$col_class = 'dt-sc-one-column column';
				
			}else if($column == 2){
				if(($wp_query->current_post % 2) == 0) {
					$col_class = "column dt-sc-one-half first";
				}else{
					$col_class = "column dt-sc-one-half";
				}
			}else{
				
				if(($wp_query->current_post % 3) == 0){
					$col_class = "column dt-sc-one-third first";
					
				}else{
					$col_class = "column dt-sc-one-third";
				}
			}
			
			$item_meta = get_post_meta(get_the_ID(), '_catalog_settings', true);
			$price = isset( $item_meta['price']) ? $item_meta['price'] : NULL;
			$sub_title = isset( $item_meta['subtitle']) ? $item_meta['subtitle'] : NULL;
				
			$out .= '<div class="'.$col_class.'">';
				$out .= '<div class="dt-sc-catalog-menu type1">';
					$out .= '<span class="rounded">';
								if( has_post_thumbnail($id) ):
									$out .= get_the_post_thumbnail(get_the_ID(), "full");
								else:
									$out .= '<img src="http'.dt_ssl().'://placehold.it/600x600/#dddddd/&text=Image" alt="catalog-image" title="catalog-image" />';
								endif;
					$out .= '</span>';
					$out .= '<div class="dt-sc-catalog-meta"> <h4> <a href="'.$link.'" target="'.$target.'">'.get_the_title().'</a></h4>';
					$out .= '<a class="dt-sc-button small" href="javascript:void(0)">'.esc_html($price).'</a>';
					
					if($column == 1){
						$out .= '<span>'.esc_html($sub_title).'</span>';
					}
						$out .= '</div></div>';
						$out .= empty($excerpt_length)? '' : '<p class="dt-sc-catalog-detail">'.do_shortcode(wp_trim_words(get_the_content(),$excerpt_length)).'</p>';
			$out .= '</div>';
			if($column == 1) {
				$out .= '<div class="dt-sc-hr-invisible-small"></div>';
			}
			endwhile;
		
		else:
			echo "Apologize, Catalog Menu item IDS does not Exists";	
		
		endif;
		wp_reset_query($wp_query);
		
		return $out;
	}
	
	# Catalog Menu Items List 
	 function dt_sc_catalog_menu_items_list($atts, $content = null) {
		extract(shortcode_atts(array(
			'item_ids' => '',
			'show_dummy_price' => 'true',
			'count' => '',
			'link' => '',
			'target' => '',
			'icon' => ''
		), $atts));

		$out = '';
		if($count == -1){
			$args = array('post_type' => 'dt_catalog', 'posts_per_page' => '-1');
		}else {
			$args = array('post_type' => 'dt_catalog', 'posts_per_page' => '-1', 'post__in' => explode(',', $item_ids));
		}
		$wp_query = new WP_Query($args);
		
		if($wp_query->have_posts()):
		
			$out = '<ul class="dt-sc-specials-list">';
			while($wp_query->have_posts()): $wp_query->the_post();
				
				$item_meta = get_post_meta(get_the_ID(), '_catalog_settings', true);
				$dummy_price = isset( $item_meta['dummyprice']) ? $item_meta['dummyprice'] : NULL;
				$price = isset( $item_meta['price']) ? $item_meta['price'] : NULL;
				
				$out .= '<li>';
					$out .= '<a href="'.$link.'" target="'.$target.'"><span class="'.'fa '.$icon.'"></span><span class="item-name">'.get_the_title().'</span></a>';
					$out .= '<span class="item-price">';
					
					if($show_dummy_price == 'true'){
						$out .= '<del>'.esc_html($dummy_price).'</del>';
					}
					$out .= esc_html($price).'</span>';
				$out .= '</li>';
				
			endwhile;
			$out .= '</ul>';
			wp_reset_query($wp_query);
			
		endif;
		return $out;
	}

	
	# H1 - H6 Title 
	function my_title($attrs, $content=null, $shortcodename =""){
		extract(shortcode_atts(array( 'title'=>'','description' => '', 'class'=>''), $attrs));
		$tag = explode("_",$shortcodename);
		$tag = $tag[2];
		$description = $description != '' ? '<span class="tag-line">'.$description.'</span>' : "";
		
		return "<div class='border-title ".$class."'>
				  <$tag>$title</$tag>
				  <div class='ico-border'> <i class='ico-bg flower'></i> </div>
				  $description
				</div>";
	}
	
	# H1 - H6 Tag 
	function tag($attrs, $content=null, $shortcodename =""){
		extract(shortcode_atts(array( 'title'=>'', 'class'=>''), $attrs));
		$tag = explode("_",$shortcodename);
		$tag = $tag[2];
				
		return "<$tag class='".$class."'><span>$title</span></$tag>";
	}
	
   #Fullwidth
   function dt_sc_fullwidth_section($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'backgroundcolor' => '',
			'backgroundimage' => '',
			'backgroundrepeat' => '',
			'backgroundposition' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'textcolor' =>'',
			'opacity' => '',
			'class' =>'',
			'parallax' => 'no'
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$styles = array ();
		$styles[] = !empty( $textcolor ) ? "color:{$textcolor};" : "";
		if( !empty( $opacity ) ) {
			$hex = str_replace ( "#", "", $backgroundcolor );
			if (strlen ( $hex ) == 3) :
				$r = hexdec ( substr ( $hex, 0, 1 ) . substr ( $hex, 0, 1 ) );
				$g = hexdec ( substr ( $hex, 1, 1 ) . substr ( $hex, 1, 1 ) );
				$b = hexdec ( substr ( $hex, 2, 1 ) . substr ( $hex, 2, 1 ) );
			else :
				$r = hexdec ( substr ( $hex, 0, 2 ) );
				$g = hexdec ( substr ( $hex, 2, 2 ) );
				$b = hexdec ( substr ( $hex, 4, 2 ) );
			endif;
			$rgb = array ( $r,$g,$b);
			$styles[] = "background-color:rgba($rgb[0],$rgb[1],$rgb[2],$opacity); ";
		} else {
			$styles[] = !empty( $backgroundcolor ) ? "background-color:{$backgroundcolor};" : "";
		}	

		$styles[] = !empty( $backgroundimage ) ? "background-image:url({$backgroundimage});" : "";
		$styles[] = !empty( $backgroundrepeat ) ? "background-repeat:{$backgroundrepeat};" : "";
		$styles[] = !empty( $backgroundposition ) ? "background-position:{$backgroundposition};" : "";
		$styles[] = !empty( $paddingtop ) ? "padding-top:{$paddingtop}px;" : "";
		$styles[] = !empty( $paddingbottom ) ? "padding-bottom:{$paddingbottom}px;" : "";

		$parallaxclass = '';
		if( $parallax === "yes") {
			$styles[] = "background-attachment:fixed; ";
			$parallaxclass = "dt-sc-parallax-section";
		}

		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';
		
		$out = 	"<div class='fullwidth-section {$class} {$parallaxclass}' {$style}>";
		$out .= '  <div class="fullwidth-bg">';
		$out .=	'	<div class="container">';
		$out .= 	$content;
		$out .= '	</div>';
		$out .= '  </div>';
		$out .= '</div>';
		return $out;
	}
	
	#Animation
	function dt_sc_animation( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'effect' => '','delay'=>''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<div class='animate' data-animation='{$effect}' data-delay='{$delay}'>{$content}</div>";
	}
	
	#List_with_font_awesome_icons
	function list_with_font_awesome_icons( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
				'style' => '' 
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list ".$style."'>", $content );
		
		return $content;
	}
	
	function font_awesome_icon( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
				'class' => '',
		), $attrs ) );
		
		$out = '<i class="fa '.$class.'"></i>';
		return $out;
	}
	
	# Spa Procedure
	function dt_sc_spa_procedure( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
				'image_link' => '', 
				'procedure_title' => '',
				'procedure_highlight1' => '',
				'procedure_highlight2' => '',
				'procedure_highlight3' => '',
				'procedure_highlight4' => '',
				'procedure_highlight5' => '',
				'rang_title' => '',
				'catalog_item_ids' => '',
				'catalog_show_dummy_price' => '',
				'button_text' => '',
				'button_link' => '',
				'button_target' => '_blank'
		), $attrs ) );
		
		$out = '<div class="procedures-wrapper">';
		$out .= '<img src="'.$image_link.'" alt="" title="">';
		$out .= '<div class="procedures-detail">';
		$out .=   '<h3>'.$procedure_title.'</h3>';
		$out .= '<ul class="dt-sc-fancy-list caret-right">';
		$out .= ! empty ($procedure_highlight1) ? '<li>'.$procedure_highlight1.'</li>' : '';
		$out .= ! empty ($procedure_highlight2) ? '<li>'.$procedure_highlight2.'</li>' : '';
		$out .= ! empty ($procedure_highlight3) ? '<li>'.$procedure_highlight3.'</li>' : '';
		$out .= ! empty ($procedure_highlight4) ? '<li>'.$procedure_highlight4.'</li>' : '';
		$out .= ! empty ($procedure_highlight5) ? '<li>'.$procedure_highlight5.'</li>' : '';
		$out .= '</ul>';
		$out .= ' <div class="hr-invisible-very-small "> </div> <div class="clear"> </div>';
		$out .= '<h3>'.$rang_title.'</h3>';
		$out .= do_shortcode( "[dt_sc_catalog_menu_items_list item_ids='".$catalog_item_ids."' show_dummy_price='".$catalog_show_dummy_price."']" );
		$out .= '<div class="aligncenter">';
		$out .= do_shortcode ( "[dt_sc_button class='gradient large' link='".$button_link."' target='".$button_target."']" . $button_text . "[/dt_sc_button]" );
		$out .= '</div></div>';
		$out .= '</div>';	
		
		return $out;
	}
	
	# Counter
	function dt_sc_counter( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title' => 'Title Comes Here',
			'number' => 2000,
		), $atts));

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = '<div class="dt-sc-counter" data-counter="'.$number.'">
					<div class="dt-sc-counter-number"> '.$number.' </div>
					<h5> '.$title.' <span> </span></h5>
				</div>';
		
		return $out;
	}
	
	#Icon Box Process shortcode
	 function dt_sc_icon_box_process($attrs, $content = null, $shortcodename = "") {
               extract ( shortcode_atts ( array (
                               'type' => '',
                               'value' => '',
                               'title' => '',
                               'link' => '',
               ), $attrs ) );
               
               $content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
               
               $out =  "<div class='dt-sc-ico-content {$type}'>";
               $out .= empty($value) ? $out : "<div class='icon'> <span> {$value} </span> </div>";
               $out .= empty( $title ) ? $out : "<h5><a href='{$link}' target='_blank'> {$title} </a></h5>";
               $out .= $content;
               $out .= "</div>";
               return $out;
       }
	   
	 #NewsLetter Shortcode
	 function dt_sc_news_letter($attrs, $content = null, $shortcodename = "") {
		 extract ( shortcode_atts ( array (
						 'title' => '',
						 'description' => '',
						 'placeholder_text' => '',
						 'list_id' => ''
		 ), $attrs ) );
	 	
			$out = '';

		$out .= '<div id="newsletter" class="newsletter-form">';
		$out .=     empty($title) ? "" : "<h2>{$title}</h2>";
		$out .= '	<div class="column dt-sc-one-half first">';   
		$out .=     	empty($description) ? "" : "<p>{$description}</p>";
		$out .= '	</div>';
		
			$out .= '<div class="column dt-sc-one-half">';
			
			$mcapi = dttheme_option('general','mailchimp-key');

			$out .= '<form name="frmsubscribe" method="post">';
				//$out .= '<input type="text" placeholder="'.__('Enter Name', 'dt_themes').'" name="dt_mc_fname" id="dt_mc_fname">';
				$out .= '<input type="email" placeholder="'.__($placeholder_text, 'dt_themes').'" name="dt_mc_emailid" id="dt_mc_emailid" required>';
				$out .= "<input type='hidden' name='dt_mc_apikey' id='dt_mc_apikey' value='$mcapi' />";
				$out .= "<input type='hidden' name='dt_mc_listid' id='dt_mc_listid' value='$list_id' />";
				$out .= '<input type="submit" name="submit" class="dt-sc-button small" value="'.__('Subscribe', 'dt_themes').'" />';
			$out .= '</form>';

			$out .= '<div id="ajax_newsletter_msg"></div>';

			$out .= '<div class="dt-sc-clear"></div>';

			$out .= '</div>';
		$out .= '</div>';

		return $out;
	 }
	 
	# Resizable - Page builder
	function dt_sc_resizable($attrs, $content = null) {		
		extract ( shortcode_atts ( array (
				'width' => '',
				'class' => '',
				'animation' => '',
				'animation_delay' => ''
		), $attrs ) );

		$danimation = !empty( $animation ) ? " data-animation='{$animation}' ": "";
		$ddelay = (!empty( $animation ) && !empty( $animation_delay )) ? " data-delay='{$animation_delay}' " : "";
		$danimate = !empty( $animation ) ? "animate": "";

		$style = (!empty( $width ) ) ? ' style="width:'.$width.'%;" ' : "";
	
		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$content = do_shortcode(DTCoreShortcodesDefination::dtShortcodeHelper ( $content ));
		$out = "<div class='column {$class} {$danimate} {$first}' {$danimation} {$ddelay} {$style}>{$content}</div>";
		return $out;
	}
	
	 
	# Page Widget -  Page builder 
	function dt_sc_widgets($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'widget_name' => '',
				'widget_wpname' => '',
				'widget_wpid' => ''
		), $attrs ) );
		
		if($widget_name != ''):	
			
			foreach($attrs as $key=>$value):
				$instance[$key] = $value;			
			endforeach;
			
			$instance = array_filter($instance);
			
			if(substr($widget_name, 0, 2) == 'WC') $add_cls = 'woocommerce';
			else $add_cls = '';
			
			ob_start();
			
			the_widget($widget_name, $instance, 'before_widget=<aside id="'.$widget_wpid.'" class="widget '.$add_cls.' '.$widget_wpname.'">&after_widget=</aside>&before_title=<h3 class="widgettitle">&after_title=<span></span></h3>&widget_id='.$instance['widget_wpid']);

			$output = ob_get_contents();
			ob_end_clean();
			
			return $output;
							
		endif;
	}
	
	#Appointment Schedule
	function dt_sc_reserve_appointment($attrs, $content = null) {
		
		extract(shortcode_atts(array( 
			'serviceids' => '', 
			'staffids' => '', 
		), $attrs)); 
		
		$out = '';
		
	//if(class_exists('DTAppointmentAddon')) {
			
		$url = dttheme_get_page_permalink_by_its_template('tpl-reservation.php');
			$url = isset($url) ? $url : '';
			
			if($url != '') {
				
		$out = '<form class="dt-sc-reservation-form " name="reservation-schedule-form" method="post" action="'.$url.'">';
		$out .= '<div class="booking-wrapper light-bg">';
		$out .= '<div class="dt-sc-titled-box"> <h6 class="dt-sc-titled-box-title">'.__("Book an Appointment","dt_themes").'</h6>';
		$out .= '<div class="dt-sc-titled-box-content">';
		$out .= '<div class="column dt-sc-one-half first">
				  <p>'.__('Available Services','dt_themes').'</p>
				  <select name="services" id="services" class="dt-select-service">
					<option value="">'. __('Select','dt_themes').'</option>';
						if($serviceids != '') {
							$serviceids_arr = explode(',', $serviceids);
							$cp_services = get_posts( array('post_type'=>'dt_services', 'posts_per_page'=>'-1', 'post__in' => $serviceids_arr, 'suppress_filters' => false ) );
						} else {
							$cp_services = get_posts( array('post_type'=>'dt_services', 'posts_per_page'=>'-1', 'suppress_filters' => false ) );
						}

						if( $cp_services ){
							foreach( $cp_services as $cp_service ){
								$id = $cp_service->ID; 
								$title = $cp_service->post_title;
								$out .= "<option value='{$id}'>{$title}</option>";
							}
						}
		$out .= ' </select>
                </div>';

		$out .= '<div class="column dt-sc-one-half">
        			<p>'.__('Staffs','dt_themes').'</p>
					<select name="staff" class="dt-select-staff">
						<option value="">'.__('Select','dt_themes').'</option>';
							if($staffids != '') {
								$staffids_arr = explode(',', $staffids);
								$cp_staffs = get_posts( array('post_type'=>'dt_staffs', 'posts_per_page'=>'-1', 'post__in' => $staffids_arr ) );
							} else {
								$cp_staffs = get_posts( array('post_type'=>'dt_staffs', 'posts_per_page'=>'-1' ) );
							}
							if( $cp_staffs ){
								foreach( $cp_staffs as $cp_staff ){
									$id = $cp_staff->ID;
									$title = $cp_staff->post_title;
									$out .= '<option value="'.$id.'">'.$title.'</option>';
								}
							}
		$out .=    '</select>
               </div>';
		
        $out .='<div class="dt-sc-hr-invisible-small"> </div>';
           
        $out .='<div class="column dt-sc-one-fourth first">
            		<p>'.__('I am available on','dt_themes').'</p>
            		<p><input type="text" id="datepicker" name="date" value="'.date('Y-m-d').'"/></p>
        		</div>';

		$out .='<div class="column dt-sc-three-fourth">
        			<div class="column dt-sc-one-half first">
						<p>'. __('Start :','dt_themes').'</p><select name="start-time" class="start-time">';
	
						$time_format = get_option( 'time_format' );
	
						$out .= '<option value="00:00">'.__(date($time_format, strtotime('12:00 am')),'dt_themes').'</option>';
						$out .= '<option value="01:00">'.__(date($time_format, strtotime('1:00 am')),'dt_themes').'</option>';
						$out .= '<option value="02:00">'.__(date($time_format, strtotime('2:00 am')),'dt_themes').'</option>';
						$out .= '<option value="03:00">'.__(date($time_format, strtotime('3:00 am')),'dt_themes').'</option>';
						$out .= '<option value="04:00">'.__(date($time_format, strtotime('4:00 am')),'dt_themes').'</option>';
						$out .= '<option value="05:00">'.__(date($time_format, strtotime('5:00 am')),'dt_themes').'</option>';
						$out .= '<option value="06:00">'.__(date($time_format, strtotime('6:00 am')),'dt_themes').'</option>';
						$out .= '<option value="07:00">'.__(date($time_format, strtotime('7:00 am')),'dt_themes').'</option>';
						$out .= '<option value="08:00" selected="selected">'.__(date($time_format, strtotime('8:00 am')),'dt_themes').'</option>';
						$out .= '<option value="09:00">'.__(date($time_format, strtotime('9:00 am')),'dt_themes').'</option>';
						$out .= '<option value="10:00">'.__(date($time_format, strtotime('10:00 am')),'dt_themes').'</option>';
						$out .= '<option value="11:00">'.__(date($time_format, strtotime('11:00 am')),'dt_themes').'</option>';
						$out .= '<option value="12:00">'.__(date($time_format, strtotime('12:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="13:00">'.__(date($time_format, strtotime('1:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="14:00">'.__(date($time_format, strtotime('2:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="15:00">'.__(date($time_format, strtotime('3:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="16:00">'.__(date($time_format, strtotime('4:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="17:00">'.__(date($time_format, strtotime('5:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="18:00">'.__(date($time_format, strtotime('6:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="19:00">'.__(date($time_format, strtotime('7:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="20:00">'.__(date($time_format, strtotime('8:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="21:00">'.__(date($time_format, strtotime('9:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="22:00">'.__(date($time_format, strtotime('10:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="23:00">'.__(date($time_format, strtotime('11:00 pm')),'dt_themes').'</option>';
						$out .= '</select> ';
        	$out .='</div>';
            
		    $out .='<div class="column dt-sc-one-half">
						<p>-'.__('End :','dt_themes').'</p><select name="end-time" class="end-time">';
						$out .= '<option value="09:00">'.__(date($time_format, strtotime('9:00 am')),'dt_themes').'</option>';
						$out .= '<option value="10:00">'.__(date($time_format, strtotime('10:00 am')),'dt_themes').'</option>';
						$out .= '<option value="11:00">'.__(date($time_format, strtotime('11:00 am')),'dt_themes').'</option>';
						$out .= '<option value="12:00">'.__(date($time_format, strtotime('12:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="13:00">'.__(date($time_format, strtotime('1:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="14:00">'.__(date($time_format, strtotime('2:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="15:00">'.__(date($time_format, strtotime('3:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="16:00">'.__(date($time_format, strtotime('4:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="17:00">'.__(date($time_format, strtotime('5:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="18:00">'.__(date($time_format, strtotime('6:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="19:00">'.__(date($time_format, strtotime('7:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="20:00">'.__(date($time_format, strtotime('8:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="21:00">'.__(date($time_format, strtotime('9:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="22:00">'.__(date($time_format, strtotime('10:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="23:00">'.__(date($time_format, strtotime('11:00 pm')),'dt_themes').'</option>';
						$out .= '<option value="23:59">'.__(date($time_format, strtotime('12:00 am')),'dt_themes').'</option>';
						$out .= '</select> ';
		    $out .='</div>';
		$out .='</div>';
		$out .='<div class="hr-invisible-very-small"> </div><div class="clear"></div>';
		$out .= '<div class="aligncenter"><button class="dt-sc-button small show-time-shortcode" value="'.__('Show Time', 'dt_themes').'" type="submit">'.__('Book Now', 'dt_themes').'</button></div>';
			
		$out .= '<input type="hidden" id="staffids" name="staffids" value="'.$staffids.'" />
				 <input type="hidden" id="serviceids" name="serviceids" value="'.$serviceids.'" />';
		
		  $out .='</div>';
		 $out .='</div>';
		$out .='</div>';
		$out .= '</form>';

		} else {
				$out .= '<div class="dt-sc-info-box">'.__('Please create Reservation template page in order to make this shortcode work properly!', 'dt_themes').'</div>';		
			}
		return $out;		
	
	}
}
new DTCoreShortcodesDefination (); ?>