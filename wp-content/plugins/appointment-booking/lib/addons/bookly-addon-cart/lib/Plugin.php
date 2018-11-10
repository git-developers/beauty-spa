<?php
namespace BooklyCart\Lib;

use Bookly\Lib;
use BooklyCart\Backend\Modules as Backend;
use BooklyCart\Frontend\Modules as Frontend;

/**
 * Class Plugin
 * @package BooklyCart\Lib
 */
abstract class Plugin extends Lib\Base\Plugin
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
        Backend\Appearance\ProxyProviders\Local::init();
        Backend\Appearance\ProxyProviders\Shared::init();
        Backend\Settings\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
            Frontend\Booking\ProxyProviders\Local::init();
        }
    }
}