<?php
namespace BooklyGroupBooking\Lib;

use Bookly\Lib as BooklyLib;
use BooklyGroupBooking\Backend;
use BooklyGroupBooking\Frontend;

/**
 * Class Plugin
 * @package BooklyGroupBooking\Lib
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

        // Init components.
        Backend\Components\TinyMce\ProxyProviders\Local::init();
        Backend\Components\TinyMce\ProxyProviders\Shared::init();

        // Init proxy.
        Backend\Modules\Appearance\ProxyProviders\Local::init();
        Backend\Modules\Appearance\ProxyProviders\Shared::init();
        Backend\Modules\Services\ProxyProviders\Local::init();
        Backend\Modules\Settings\ProxyProviders\Shared::init();
        Backend\Modules\Staff\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
            Frontend\Modules\Booking\ProxyProviders\Local::init();
            Frontend\Modules\Booking\ProxyProviders\Shared::init();
        }
    }
}