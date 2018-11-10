<?php
namespace Bookly2checkout\Lib;

use Bookly2checkout\Backend\Modules as Backend;
use Bookly2checkout\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package Bookly2checkout\Lib
 */
abstract class Plugin extends \Bookly\Lib\Base\Plugin
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
        Backend\Payments\ProxyProviders\Shared::init();
        Backend\Settings\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
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
        return get_option( 'bookly_2checkout_enabled' ) != '0';
    }

    /**
     * Enable plugin (applicable to add-ons).
     */
    public static function enable()
    {
        update_option( 'bookly_2checkout_enabled', 'standard_checkout' );
    }
}