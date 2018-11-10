<?php
namespace BooklyAuthorizeNet\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyAuthorizeNet\Lib;

/**
 * Class Shared
 * @package BooklyAuthorizeNet\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySelector( $payment_data, $form_id, $payment, BooklyLib\CartInfo $cart_info, $show_price )
    {
        $url_cards_image = plugins_url( 'frontend/resources/images/cards.png', BooklyLib\Plugin::getMainFile() );
        $cart_info->setPriceCorrection( get_option( 'bookly_authorize_net_increase' ), get_option( 'bookly_authorize_net_addition' ) );

        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate(
            'gateway_selector',
            compact( 'form_id', 'payment', 'url_cards_image', 'show_price', 'cart_info' ),
            false
        );

        return $payment_data;
    }
}