<?php
namespace BooklyCart\Backend\Modules\Appearance\ProxyProviders;

use Bookly\Backend\Modules\Appearance\Proxy;
use BooklyCart\Lib;

/**
 * Class Local
 * @package BooklyCart\Backend\Modules\Appearance\ProxyProviders
 */
class Local extends Proxy\Cart
{
    /**
     * @inheritdoc
     */
    public static function renderStep( $progress_tracker )
    {
        if ( Lib\Plugin::enabled() ) {
            self::renderTemplate( 'cart_step', compact( 'progress_tracker' ) );
        }
    }
}