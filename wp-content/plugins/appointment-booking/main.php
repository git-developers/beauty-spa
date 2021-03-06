<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Bookly
Plugin URI: http://booking-wp-plugin.com
Description: Bookly Plugin – is a great easy-to-use and easy-to-manage booking tool for service providers who think about their customers. The plugin supports a wide range of services provided by business and individuals who offer reservations through websites. Set up any reservation quickly, pleasantly and easily with Bookly!
Version: 15.2
Author: Ladela Interactive
Author URI: http://booking-wp-plugin.com
Text Domain: bookly
Domain Path: /languages
License: Commercial
*/

if ( version_compare( PHP_VERSION, '5.3.7', '<' ) ) {
    function bookly_php_outdated()
    {
        echo '<div class="updated"><h3>Bookly</h3><p>To install the plugin - <strong>PHP 5.3.7</strong> or higher is required.</p></div>';
    }
    add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', 'bookly_php_outdated' );
} else {
    if ( ! get_option( 'bookly_migration_started' ) ) {
        include_once __DIR__ . '/autoload.php';

        call_user_func( array( '\Bookly\Lib\Plugin', 'run' ) );
        $app = is_admin() ? '\Bookly\Backend\Backend' : '\Bookly\Frontend\Frontend';
        new $app();
    }

    include_once __DIR__ . '/migrator/main.php';
}