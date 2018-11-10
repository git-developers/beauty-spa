<?php /*
Template Name: Blank - No Header, no Footer
*/?>
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
        
     <link rel="profile" href="http://gmpg.org/xfn/11" />
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
<?php $body_class_arg  = ' coming-soon-pg'; ?>
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

<!-- **Wrapper** -->
<div class="wrapper">
    <!-- **Inner Wrapper** -->
    <div class="inner-wrapper">
	    <!-- **Main** -->
	    <div id="main">
	    	<!-- ** Blank Template Container -->
	    	<div class="blank-template-container">
                <!-- ** Blank Template Container -->
                <div class="blank-template">
                    <!-- ** Blank Template Wrapper -->
                    <div class="blank-template-wrapper">                
                        <!-- ** Container ** -->
                        <div class="container">
                            <!-- ** Primary Section ** -->
                            <section id="primary" class="content-full-width"><?php
                                if( have_posts() ):
                                    while( have_posts() ):
                                        the_post();
                                        get_template_part( 'framework/loops/content', 'page' );
                                    endwhile;
                                endif;?>
                            </section><!-- ** Primary Section End ** -->
                        </div><!-- **Container - End** -->
                    </div><!-- ** Blank Template Wrapper -->
            	</div><!-- ** Blank Template -->
	    	</div><!-- ** Blank Template Container -->
	    </div><!-- **Main - End** -->
    </div><!-- **Inner Wrapper - End** -->
</div><!-- **Wrapper - End** -->
<?php $dttheme_options = get_option(IAMD_THEME_SETTINGS);
	if(dttheme_option('integration', 'enable-body-code') != '') 
		echo "<script type='text/javascript'>".wp_kses(stripslashes(dttheme_option('integration', 'body-code')), $dt_allowed_html_tags )."</script>";
 wp_footer(); ?>
</body>
</html>