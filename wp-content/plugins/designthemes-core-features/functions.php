<?php
if(get_option( 'dt-plugin-notice-dismissed') != 1) {
	add_action( 'admin_notices', 'dtplugin_admin_notice' );
}

function dtplugin_admin_notice() {
    ?>
    <div class="notice error dt-plugin-notice is-dismissible" >
        <p>
        	<?php echo sprintf( esc_html__('%1$s in %2$s comes with major update. In order to make your existing pages to work properly click %3$s button in %4$s', 'dt_themes'), '<strong>Spalab Page Builder</strong>', '<strong>DesignThemes Core Features Plugin</strong>', '<strong>Update Content</strong>', '<strong>Dashboard > Spalab > Page Builder > Update Content</strong>.'  ); ?>
        </p>
    </div>
    <?php
}

add_action("wp_ajax_dt_plugin_dismiss_notice", "dt_plugin_dismiss_notice");
add_action("wp_ajax_dt_plugin_dismiss_notice", "dt_plugin_dismiss_notice");
function dt_plugin_dismiss_notice() {
	update_option('dt-plugin-notice-dismissed', 1);
}
?>