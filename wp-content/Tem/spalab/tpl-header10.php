<?php /*Template Name: Header 10 Template*/?>
<?php get_header();?>
<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : $GLOBALS['page_layout'];
	 	
  	  $show_sidebar = false;
	  $sidebar_class= "";
	  global $dt_allowed_html_tags;
	  
	  switch($page_layout):
		case 'with-left-sidebar':
			$page_layout 	=	"page-with-sidebar with-left-sidebar";
			$show_sidebar 	= 	true;
			$sidebar_class 	=	"left-sidebar";
		break;
		
		case 'with-right-sidebar':
			$show_sidebar 	= 	true;
			$page_layout 	=	"page-with-sidebar with-right-sidebar";
		break;
	  endswitch;
	  
	  #Page Top Code Section
	  $dttheme_options = get_option(IAMD_THEME_SETTINGS);
	  $dttheme_integration = $dttheme_options['integration'];
	  if(isset($dttheme_integration['enable-single-page-top-code'])){
		  echo wp_kses('<p>'.stripslashes($dttheme_integration['single-page-top-code']).'</p>', $dt_allowed_html_tags );
	  }?>
      
      <!-- **Primary Section** -->
      <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">
<?php	if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content', 'page' );
			endwhile;
		endif;?>     
      </section><!-- **Primary Section** -->
        
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>

<?php #Page Top Code Section
	  $dttheme_integration = $dttheme_options['integration'];
	  if(isset($dttheme_integration['enable-single-page-bottom-code'])){
		  echo wp_kses('<p>'.stripslashes($dttheme_integration['single-page-bottom-code']).'</p>', $dt_allowed_html_tags );
	  }
	  
	  get_footer();?>