<?php
namespace BooklyStripe\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use BooklyStripe\Lib\Plugin;

/**
 * Class Shared
 * @package BooklyStripe\Lib\ProxyProviders
 */
class Shared extends BooklyLib\Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function showPaymentSpecificPrices( $show )
    {
        if ( ! $show && Plugin::enabled() ) {
            return (float) get_option( 'bookly_stripe_increase' ) != 0 || (float) get_option( 'bookly_stripe_addition' ) != 0;
        }

        return $show;
    }

    /**
     * @inheritdoc
     */
    public static function applyPaymentSpecificPrice( BooklyLib\CartInfo $cart_info, $gateway = BooklyLib\Entities\Payment::TYPE_STRIPE )
    {
        if ( $gateway === BooklyLib\Entities\Payment::TYPE_STRIPE && Plugin::enabled() ) {
            $cart_info->setPriceCorrection( get_option( 'bookly_stripe_increase' ), get_option( 'bookly_stripe_addition' ) );
        }

        return $cart_info;
    }
}