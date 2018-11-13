<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<?php dttheme_is_mobile_view(); ?>
	<title><?php
		$status = dttheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') || dttheme_is_plugin_active('wordpress-seo/wp-seo.php');
		if (!$status) :
			$title = dttheme_public_title();
			if( !empty( $title) )
				echo $title;
			else
			wp_title( '|', true, 'right' );
		else :
			wp_title( '|', true, 'right' );
		endif;
		 ?></title>
        
     <link rel="profile" href="http<?php dt_ssl();?>://gmpg.org/xfn/11" />
     <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php
	 
	 do_action('load_head_styles_scripts');
	 
	 global $dt_allowed_html_tags;
	 if ((dttheme_option('integration', 'enable-header-code'))) {
		 echo "<script type='text/javascript'>".wp_kses(stripslashes(dttheme_option('integration', 'header-code')), $dt_allowed_html_tags )."</script>";
	 }
	 #WordPress Default head hook
	 wp_head();?>
</head>
<?php $body_class_arg  = ( dttheme_option("appearance","layout") === "boxed" ) ? array("boxed") : array(); ?>
<body <?php body_class( $body_class_arg ); ?>>
<!-- Page Loader Starts-->
<?php if(dttheme_option('general','loading-bar') != "true") : ?>
        <div id="loading">
        	<div id="loading-center">
        		<div id="loading-center-absolute">
        
        			<div class="object" id="object_four"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_one"></div>
        
        		</div>
        	</div>
        </div>
<?php endif; ?>
<!-- Page Loader Starts-->


<?php $picker = dttheme_option("general","disable-picker");
	  if(!isset($picker) && !is_user_logged_in() ):	dttheme_color_picker();	endif; ?>
<!-- **Wrapper** -->
<div class="wrapper">
    <!-- **Inner Wrapper** -->
    <div class="inner-wrapper">

	  <?php if( is_page_template('tpl-header1.php') ):
        		$header = "header1";
        	elseif( is_page_template('tpl-header2.php') ):
        		$header = "header2";
        	elseif( is_page_template('tpl-header3.php') ):
        		$header = "header3";
        	elseif( is_page_template('tpl-header4.php') ):
        		$header = "header4";
			elseif( is_page_template('tpl-header5.php') ):
        		$header = "header5";
			elseif( is_page_template('tpl-header6.php') ):
        		$header = "header6";
			elseif( is_page_template('tpl-header7.php') ):
        		$header = "header7";
			elseif( is_page_template('tpl-header8.php') ):
        		$header = "header8";
			elseif( is_page_template('tpl-header9.php') ):
        		$header = "header9";
			elseif( is_page_template('tpl-header10.php') ):
        		$header = "header10";
			elseif( is_page_template('tpl-header11.php') ):
        		$header = "header11";
			elseif( is_page_template('tpl-header12.php') ):
        		$header = "header12";
        	else:
		  		$header = dttheme_option("appearance","header_type");
            	$header = !empty($header) ? $header : "header1";
        	endif;
			
			$dt_file_path = "/framework/headers/{$header}.php";
			if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
				require_once (STYLESHEETPATH .$dt_file_path);
			}
			else{
				require_once (TEMPLATEPATH .$dt_file_path);
			} ?>
            
        <!-- Header Wrapper -->
        <div id="header-wrapper">

        <!-- **Header** -->
        <header id="header" class="<?php echo esc_attr( $header ); ?> <?php if($header == "header1" || $header == "header5" || $header == "header6" || $header == "header7" || $header == "header8" || $header == "header9" || $header == "header10" || $header == "header11" || $header == "header12" ): echo "gradient-bg"; endif; ?>">
        
    <?php if(  $header != 'header6' && $header != 'header7' && $header != 'header10' && $header != 'header12'  ): ?>
            <!-- **Header Container** -->
            <div class="container">
                <!-- **Logo - start** -->
                <div id="logo">
                <?php if( dttheme_option('general', 'logo') ):
                            $url = dttheme_option('general', 'logo-url');
                            $url = !empty( $url ) ? $url : IAMD_BASE_URL."images/logo.png"; 
							
							$retina_url = dttheme_option('general','retina-logo-url');
							$retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/logo@2x.png";
							
							$width = dttheme_option('general','retina-logo-width');
							$width = !empty($width) ? $width."px;" : "156px";
							
							$height = dttheme_option('general','retina-logo-height');
							$height = !empty($height) ? $height."px;" : "73px";	?>
                            
                            <a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>">
                                <img class="normal_logo" src="<?php echo esc_attr( $url ); ?>" alt="<?php echo dttheme_blog_title(); ?>" title="<?php echo dttheme_blog_title(); ?>" />
                                <img class="retina_logo" src="<?php echo $retina_url;?>" alt="<?php echo dttheme_blog_title();?>"
                    	 							title="<?php echo dttheme_blog_title(); ?>" style="width:<?php echo $width;?> height:<?php echo $height;?>"/>
                            </a>
                <?php else: ?>
                            <h2><a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>"><?php echo do_shortcode(get_option('blogname')); ?></a></h2>
                <?php endif;?>
                </div><!-- **Logo - End** -->
     <?php endif; ?>
    
                <!-- **Navigation** -->
                <div id="primary-menu">
                    <?php if(
                            (is_page_template('tpl-header6.php') ||
                                $header == 'header6') ||
                            (is_page_template('tpl-header7.php') ||
                                $header == 'header7') ||
                            (is_page_template('tpl-header10.php') ||
                                $header == 'header10') ||
                            (is_page_template('tpl-header12.php') ||
                                $header == 'header12')  ): ?>
                  <div class="container">
                      <?php endif; ?>
                    <nav id="main-menu">
                    <div class="dt-menu-toggle" id="dt-menu-toggle">
						<?php _e('Menu','dt_themes');?>
                        <span class="dt-menu-toggle-icon"></span>
					</div>
                    
                    <?php
                    
                    $primaryMenu = NULL;
                    
                    if (function_exists('wp_nav_menu')) :
							
							$menu_hover_class = dttheme_option("appearance","submenu-hover");
							$menu_hover_class = !empty($menu_hover_class) ? " with-hover-style" : "";
							
							$menu_class = "menu";
							if( $header == "header1" || $header == "header6" || $header == "header7" || $header == "header11" || $header == "header12"): $menu_class = "menu rounded"; endif;
							if($header == "header2"): $menu_class = "menu with-hover-style"; endif;
							if($header == "header3"): $menu_class = "menu with-hover-style"; endif;
							if($header == "header5"): $menu_class = "menu rounded type2"; endif;
							
							$primaryMenu = wp_nav_menu(array(
							        'theme_location'=>'header_menu',
                                    'menu_id'=>'','menu_class'=>$menu_class.$menu_hover_class,
                                    'fallback_cb'=>'dttheme_default_navigation' ,
                                    'echo'=>false,
                                    'container'=>false,
                                    'walker' => new DTFrontEndMenuWalker())
                            );
                    endif;
                    
                    if(!empty($primaryMenu))
                        echo $primaryMenu;?>
                    </nav>
                      <!-- **Navigation - End** -->
                      <?php if( (is_page_template('tpl-header6.php') || $header == 'header6') || (is_page_template('tpl-header7.php') || $header == 'header7') || (is_page_template('tpl-header10.php') || $header == 'header10') || (is_page_template('tpl-header12.php') || $header == 'header12') ): ?>
                        </div>
                      <?php endif; ?>
                 </div>
                
         <?php if( (!is_page_template('tpl-header6.php') || $header != 'header6') && (!is_page_template('tpl-header7.php') || $header != 'header7') && (!is_page_template('tpl-header10.php') || $header != 'header10')  && (!is_page_template('tpl-header12.php') || $header != 'header12') ): ?>
            </div><!-- **Header Container End** -->
         <?php endif; ?>

        </header><!-- **Header - End** -->
          
        </div><!-- Header Wrapper -->
    
        <!-- **Main** -->
        <div id="main"><?php
            if( is_page() ):
                global $post;
                dttheme_slider_section( $post->ID);	
            elseif( is_post_type_archive('product') ):
                dttheme_slider_section( get_option('woocommerce_shop_page_id') );	
            endif;		
			
            if( is_page_template('tpl-contact.php') ):
                global $post;
                $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
                $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
                if(array_key_exists("full-width-section",$tpl_default_settings)):
                    echo '<div class="fullwidth-map">';
                    echo do_shortcode($tpl_default_settings['full-width-section']);
                    echo '</div>';
                endif;
            endif;
			
						$disable_breadcrumb = dttheme_option('general','disable-breadcrumb');
						
						if( empty($disable_breadcrumb) and ( !is_front_page() ) ):
							global $post;
							$show_slider = '';
							if( !(is_null($post)) ) {
								$tpl_default_settings = get_post_meta($post->ID, '_tpl_default_settings', TRUE);
								$show_slider = isset($tpl_default_settings['show_slider']) ? TRUE : FALSE;
							}

							if(!is_page_template('tpl-home.php') && ($show_slider != TRUE ) ):
								echo '<!-- **Breadcrumb** -->';
								//new dttheme_breadcrumb;
								$dt_file_path = '/framework/sub-title.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
							endif;
						endif;
			?>
            <?php if( !is_page_template( 'tpl-fullwidth.php' ) ):?>
                    <!-- ** Container ** -->
                    <div class="container">
                <?php endif; ?> 
                
        <?php $dttheme_options = get_option(IAMD_THEME_SETTINGS);
	  		  $dttheme_general = $dttheme_options['general'];
	  
			  $globally_enable_page_title =  array_key_exists('disable-page-title',$dttheme_general) ? true : false;
			  
			  if($globally_enable_page_title) : 
			  	#Title Section
				$dt_file_path = '/framework/title.php';
				if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
					require_once (STYLESHEETPATH .$dt_file_path);
				}
				else{
					require_once (TEMPLATEPATH .$dt_file_path);
				}
			  endif; ?>