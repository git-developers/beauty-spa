<?php
namespace BooklyAuthorizeNet\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use BooklyAuthorizeNet\Lib;

/**
 * Class Shared
 * @package BooklyAuthorizeNet\Lib\ProxyProviders
 */
class Shared extends BooklyLib\Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function showPaymentSpecificPrices( $show )
    {
        if ( ! $show && Lib\Plugin::enabled() ) {
            return (float) get_option( 'bookly_authorize_net_increase' ) != 0 || (float) get_option( 'bookly_authorize_net_addition' ) != 0;
        }

        return $show;
    }

    /**
     * @inheritdoc
     */
    public static function applyPaymentSpecificPrice( BooklyLib\CartInfo $cart_info, $gateway = BooklyLib\Entities\Payment::TYPE_AUTHORIZENET )
    {
        if ( $gateway === BooklyLib\Entities\Payment::TYPE_AUTHORIZENET && Lib\Plugin::enabled() ) {
            $cart_info->setPriceCorrection( get_option( 'bookly_authorize_net_increase' ), get_option( 'bookly_authorize_net_addition' ) );
        }

        return $cart_info;
    }
}