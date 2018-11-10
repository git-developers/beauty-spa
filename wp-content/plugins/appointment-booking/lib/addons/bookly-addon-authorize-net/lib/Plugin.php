<?php
namespace BooklyAuthorizeNet\Lib;

use Bookly\Lib as BooklyLib;
use BooklyAuthorizeNet\Backend\Modules as Backend;
use BooklyAuthorizeNet\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package BooklyAuthorizeNet\Lib
 */
abstract class Plugin extends BooklyLib\Base\Plugin
{
    protected static $prefix;
    protected static $title;
    protected static $version;
    protected static $slug;
    protected static $directory;
    protected static $main_file;
    protected static $basename;
    protected static $text_domain;
    protected static $root_namespace;
    protected static $embedded;

    /**
     * Register hooks.
     */
    public static function registerHooks()
    {
        parent::registerHooks();

        // Init proxy.
        Backend\Appearance\ProxyProviders\Shared::init();
        Backend\Payments\ProxyProviders\Shared::init();
        Backend\Settings\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
            Frontend\AuthorizeNet\Ajax::init();
            Frontend\Booking\ProxyProviders\Shared::init();
        }
        ProxyProviders\Shared::init();
    }

    /**
     * Check if plugin is enabled (applicable to add-ons).
     *
     * @return bool
     */
    public static function enabled()
    {
        return get_option( 'bookly_authorize_net_enabled' ) != '0';
    }

    /**
     * Enable plugin (applicable to add-ons).
     */
    public static function enable()
    {
        update_option( 'bookly_authorize_net_enabled', 'aim' );
    }
}