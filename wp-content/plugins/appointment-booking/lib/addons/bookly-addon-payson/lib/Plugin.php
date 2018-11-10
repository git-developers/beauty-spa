<?php
namespace BooklyPayson\Lib;

use BooklyPayson\Backend\Modules as Backend;
use BooklyPayson\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package BooklyPayson\Lib
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
}