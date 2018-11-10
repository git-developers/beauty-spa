<?php
/** dttheme_options_page()
  * Objective:
  *		To create thme option page at back end.
**/
function dttheme_options_page(){ ?>
<!-- wrapper -->
<div id="wrapper">

	<!-- Result -->
    <div id="bpanel-message" style="display:none;"></div>
    <div id="ajax-feedback" style="display:none;"><img src="<?php echo IAMD_FW_URL.'theme_options/images/loading.png';?>" alt="" title=""/> </div>
    <!-- Result -->


	<!-- panel-wrap -->
	<div id="panel-wrap">
    
       	<!-- bpanel-wrapper -->
        <div id="bpanel-wrapper">
        
           	<!-- bpanel -->
           	<div id="bpanel">
            
                	<!-- bpanel-left -->
                	<div id="bpanel-left">
                    	<div id="logo"> 
                        <?php $logo =  IAMD_FW_URL.'theme_options/images/logo.png';
							  $advance = dttheme_option('advance');
							  if(isset($advance['buddhapanel-logo-url']) && isset( $advance['enable-buddhapanel-logo-url'])):
							  	$logo = $advance['buddhapanel-logo-url'];
							  endif;?>
                        <img src="<?php echo esc_attr( $logo );?>" width="186" height="101" alt="" title="" /> </div>                        
                        <?php $status = dttheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php')|| dttheme_is_plugin_active('wordpress-seo/wp-seo.php');
							  $tabs = NULL;
							  if(!$status):
								$tabs = array(
									array('id'=>'general' , 'name'=>__('General','dt_themes')),
									array('id'=>'appearance', 'name'=>__('Appearance','dt_themes')),
									array('id'=>'color-options', 'name'=>__('Color Options','dt_themes')),
									array('id'=>'skin', 'name'=>__('Skins','dt_themes')),
									array('id'=>'integration', 'name'=>__('Integration','dt_themes')),
									array('id'=>'seo', 'name'=>__('SEO','dt_themes')),																		
									array('id'=>'specialty-pages', 'name'=>__('Speciality Pages','dt_themes')),
									array('id'=>'theme-footer', 'name'=>__('Footer','dt_themes')),																		
									array('id'=>'widgetarea', 'name'=>__('Widget Area','dt_themes')),
									array('id'=>'woocommerce', 'name'=>__('WooCommerce','dt_themes')),
									array('id'=>'pagebuilder', 'name'=>__('Page Builder','dt_themes')),
									array('id'=>'mobile', 'name'=>__('Responsive &amp; Mobile','dt_themes')),
									array('id'=>'branding', 'name'=>__('Branding','dt_themes')),
									array('id'=>'company', 'name'=>__('Company','dt_themes')),
									array('id'=>'import', 'name'=>__('Importer','dt_themes')),
									array('id'=>'backup', 'name'=>__('Backup','dt_themes'))
								);
							  else:
								$tabs = array(
									array('id'=>'general' , 'name'=>__('General','dt_themes')),
									array('id'=>'appearance', 'name'=>__('Appearance','dt_themes')),
									array('id'=>'color-options', 'name'=>__('Color Options','dt_themes')),
									array('id'=>'skin', 'name'=>__('Skins','dt_themes')),
									array('id'=>'integration', 'name'=>__('Integration','dt_themes')),
									array('id'=>'specialty-pages', 'name'=>__('Speciality Pages','dt_themes')),
									array('id'=>'theme-footer', 'name'=>__('Footer','dt_themes')),																		
									array('id'=>'widgetarea', 'name'=>__('Widget Area','dt_themes')),
									array('id'=>'woocommerce', 'name'=>__('WooCommerce','dt_themes')),
									array('id'=>'pagebuilder', 'name'=>__('Page Builder','dt_themes')),
									array('id'=>'mobile', 'name'=>__('Responsive &amp; Mobile','dt_themes')),
									array('id'=>'branding', 'name'=>__('Branding','dt_themes')),
									array('id'=>'company', 'name'=>__('Company','dt_themes')),
									array('id'=>'import', 'name'=>__('Importer','dt_themes')),
									array('id'=>'backup', 'name'=>__('Backup','dt_themes')),
								);
							  endif;
								
							  $output = "<!-- bpanel-mainmenu -->\n\t\t\t\t\t\t<ul id='bpanel-mainmenu'>\n";
									foreach($tabs as $tab ):
									$output .= "\t\t\t\t\t\t\t\t<li><a href='#{$tab['id']}' title='{$tab['name']}'><span class='{$tab['id']}'></span>{$tab['name']}</a></li>\n";
									endforeach;
							  $output .= "\t\t\t\t\t\t</ul><!-- #bpanel-mainmenu -->\n";
							  echo $output;?>
                    </div><!-- #bpanel-left  end-->
                    
                    <form id="mytheme_options_form" name="mytheme_options_form" method="post" action="options.php">
		                <?php settings_fields(IAMD_THEME_SETTINGS);?>
                        <input type="hidden" id="mytheme-full-submit" name="mytheme-full-submit" value="0" />
                        <input type="hidden" name="mytheme_admin_wpnonce" value="<?php echo wp_create_nonce(IAMD_THEME_SETTINGS.'_wpnonce');?>" />
                        
                    	<?php 	#General
								$dt_file_path = '/framework/theme_options/general.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Appearance
								$dt_file_path = '/framework/theme_options/appearance.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Color Options
								$dt_file_path = '/framework/theme_options/color-options.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Integration
								$dt_file_path = '/framework/theme_options/integration.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Speciality pages
								$dt_file_path = '/framework/theme_options/specialty-pages.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Footer 
								$dt_file_path = '/framework/theme_options/footer.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Widget area
								$dt_file_path = '/framework/theme_options/widgetarea.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Woocommerce
								$dt_file_path = '/framework/theme_options/woocommerce.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Page Builder
								$dt_file_path = '/framework/theme_options/pagebuilder.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Responsive
								$dt_file_path = '/framework/theme_options/responsive.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Branding
								$dt_file_path = '/framework/theme_options/branding.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
								#Skins
								$dt_file_path = '/framework/theme_options/skins.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
						
							    #SEO
								$status = dttheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php')|| dttheme_is_plugin_active('wordpress-seo/wp-seo.php');
							    if(!$status):
									$dt_file_path = '/framework/theme_options/seo.php';
										if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
											require_once (STYLESHEETPATH .$dt_file_path);
										}
										else{
											require_once (TEMPLATEPATH .$dt_file_path);
										}
							    endif;
								
								#Company
								$dt_file_path = '/framework/theme_options/company.php';
								if( TEMPLATEPATH != STYLESHEETPATH && is_file(STYLESHEETPATH . $dt_file_path) ){
									require_once (STYLESHEETPATH .$dt_file_path);
								}
								else{
									require_once (TEMPLATEPATH .$dt_file_path);
								}
						
								// importer
								if(class_exists('spalab_DTCorePlugin')):
									require_once(TEMPLATEPATH.'/framework/theme_options/import.php');
								endif;
							  
								#Backup
								require_once(TEMPLATEPATH.'/framework/theme_options/backup.php'); ?>
                                
						<!-- #bpanel-bottom -->
                        <div id="bpanel-bottom">
                           <input type="submit" value="<?php _e('Reset All','dt_themes');?>" class="save-reset mytheme-reset-button bpanel-button white-btn" name="mytheme[reset]" />
						   <input type="submit" value="<?php _e('Save All','dt_themes');?>" name="submit"  class="save-reset mytheme-footer-submit bpanel-button white-btn" />
                        </div><!-- #bpanel-bottom end-->        
                    </form>

            </div><!-- #bpanel -->
            
        </div><!-- #bpanel-wrapper -->
    </div><!-- #panel-wrap end -->
</div><!-- #wrapper end-->
<?php
}
### --- ****  dttheme_options_page() *** --- ###
?>