<?php
namespace BooklyStripe\Backend\Modules\Payments\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Backend\Modules\Payments\Proxy;
use BooklyStripe\Lib\Plugin;

/**
 * Class Shared
 * @package BooklyStripe\Backend\Modules\Payments\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function paymentSpecificPriceExists( $gateway )
    {
        if ( $gateway === BooklyLib\Entities\Payment::TYPE_STRIPE && Plugin::enabled() ) {
            return get_option( 'bookly_stripe_increase' ) != 0
                || get_option( 'bookly_stripe_addition' ) != 0;
        }

        return $gateway;
    }
}