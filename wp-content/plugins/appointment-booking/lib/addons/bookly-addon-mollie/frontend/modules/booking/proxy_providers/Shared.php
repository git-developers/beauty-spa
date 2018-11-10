<?php
namespace BooklyMollie\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyMollie\Lib;

/**
 * Class Shared
 * @package BooklyMollie\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySelector( $payment_data, $form_id, $payment, BooklyLib\CartInfo $cart_info, $show_price )
    {
        $cart_info->setPriceCorrection( get_option( 'bookly_mollie_increase' ), get_option( 'bookly_mollie_addition' ) );

        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate( 'gateway_selector', compact( 'form_id', 'payment', 'show_price', 'cart_info' ), false );

        return $payment_data;
    }

    /**
     * @inheritdoc
     */
    public static function renderPaymentGatewayForm( $form_id, $page_url )
    {
        self::renderTemplate( 'gateway_form', compact( 'form_id', 'page_url' ) );
    }
}