<?php ob_start();
/** create_admin_menu()
  * Objective:
  *		Hook to create thme option page at back end.
**/
function create_admin_menu() {
	
	$role = get_role('administrator');
	if(!$role->has_cap('manage_theme')) $role->add_cap('manage_theme');

	add_theme_page( IAMD_THEME_NAME . esc_html__(' Theme Options', 'dt_themes'), IAMD_THEME_NAME . esc_html__(' Options', 'dt_themes'), 'manage_theme', 'spalab', 'dttheme_options_page'	);	

}
### --- ****  create_admin_menu() *** --- ###
add_action('admin_menu', 'create_admin_menu');
require_once(TEMPLATEPATH.'/framework/theme_options/settings.php');
#ob_flush();?>