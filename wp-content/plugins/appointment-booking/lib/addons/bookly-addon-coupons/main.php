<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Bookly Coupons (Add-on)
Plugin URI: http://booking-wp-plugin.com
Description: Bookly Coupons add-on allows you to provide discounts to your customers via coupon codes.
Version: 1.3
Author: Ladela Interactive
Author URI: http://booking-wp-plugin.com
Text Domain: bookly-coupons
Domain Path: /languages
License: Commercial
*/

if ( ! function_exists( 'bookly_coupons_loader' ) ) {
    include_once __DIR__ . '/autoload.php';

    if ( class_exists( '\Bookly\Lib\Plugin' ) && version_compare( Bookly\Lib\Plugin::getVersion(), '15.0', '>=' ) ) {
        BooklyCoupons\Lib\Plugin::run();
    } else {
        add_action( 'init', function () {
            if ( current_user_can( 'activate_plugins' ) ) {
                add_action( 'admin_init', function () {
                    deactivate_plugins( 'bookly-addon-coupons/main.php', false, is_network_admin() );
                } );
                add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', function () {
                    printf( '<div class="updated"><h3>Bookly Coupons (Add-on)</h3><p>The plugin has been <strong>deactivated</strong>.</p><p><strong>Bookly v%s</strong> is required.</p></div>',
                        '15.0'
                    );
                } );
                unset ( $_GET['activate'], $_GET['activate-multi'] );
            }
        } );
    }
}