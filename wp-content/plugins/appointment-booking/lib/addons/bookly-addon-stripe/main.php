<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Bookly Stripe (Add-on)
Plugin URI: http://booking-wp-plugin.com
Description: Bookly Stripe add-on allows your client to use Stripe payment method.
Version: 1.3
Author: Ladela Interactive
Author URI: http://booking-wp-plugin.com
Text Domain: bookly-stripe
Domain Path: /languages
License: Commercial
*/

if ( ! function_exists( 'bookly_stripe_loader' ) ) {
    include_once __DIR__ . '/autoload.php';

    if ( class_exists( '\Bookly\Lib\Plugin' ) && version_compare( Bookly\Lib\Plugin::getVersion(), '15.0', '>=' ) ) {
        BooklyStripe\Lib\Plugin::run();
    } else {
        add_action( 'init', function () {
            if ( current_user_can( 'activate_plugins' ) ) {
                add_action( 'admin_init', function () {
                    deactivate_plugins( 'bookly-addon-stripe/main.php', false, is_network_admin() );
                } );
                add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', function () {
                    printf( '<div class="updated"><h3>Bookly Stripe (Add-on)</h3><p>The plugin has been <strong>deactivated</strong>.</p><p><strong>Bookly v%s</strong> is required.</p></div>',
                        '15.0'
                    );
                } );
                unset ( $_GET['activate'], $_GET['activate-multi'] );
            }
        } );
    }
}