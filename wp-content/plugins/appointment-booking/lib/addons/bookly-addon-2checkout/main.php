<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Bookly 2Checkout (Add-on)
Plugin URI: http://booking-wp-plugin.com
Description: Bookly 2Checkout add-on allows your client to use 2Checkout Standard Checkout payment method.
Version: 1.3
Author: Ladela Interactive
Author URI: http://booking-wp-plugin.com
Text Domain: bookly-2checkout
Domain Path: /languages
License: Commercial
*/

if ( ! function_exists( 'bookly_2checkout_loader' ) ) {
    include_once __DIR__ . '/autoload.php';

    if ( class_exists( '\Bookly\Lib\Plugin' ) && version_compare( Bookly\Lib\Plugin::getVersion(), '15.0', '>=' ) ) {
        Bookly2checkout\Lib\Plugin::run();
    } else {
        add_action( 'init', function () {
            if ( current_user_can( 'activate_plugins' ) ) {
                add_action( 'admin_init', function () {
                    deactivate_plugins( 'bookly-addon-2checkout/main.php', false, is_network_admin() );
                } );
                add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', function () {
                    printf( '<div class="updated"><h3>Bookly 2Checkout (Add-on)</h3><p>The plugin has been <strong>deactivated</strong>.</p><p><strong>Bookly v%s</strong> is required.</p></div>',
                        '15.0'
                    );
                } );
                unset ( $_GET['activate'], $_GET['activate-multi'] );
            }
        } );
    }
}