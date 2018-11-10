<?php
namespace BooklyCustomFields\Lib;

use Bookly\Lib as BooklyLib;
use BooklyCustomFields\Backend;
use BooklyCustomFields\Frontend;

/**
 * Class Plugin
 * @package BooklyCustomFields\Lib
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
        Backend\Components\Dialogs\Appointment\CustomerDetails\ProxyProviders\Shared::init();

        // Init proxy.
        Backend\Modules\Calendar\ProxyProviders\Shared::init();
        Backend\Modules\CustomFields\Ajax::init();
        Backend\Modules\Notifications\ProxyProviders\Shared::init();
        Backend\Modules\Settings\ProxyProviders\Shared::init();
        if ( self::enabled() ) {
            Frontend\Modules\Booking\Ajax::init();
            Frontend\Modules\Booking\ProxyProviders\Shared::init();
            Frontend\Modules\CustomerProfile\ProxyProviders\Local::init();
        }
        ProxyProviders\Local::init();
        ProxyProviders\Shared::init();
    }
}