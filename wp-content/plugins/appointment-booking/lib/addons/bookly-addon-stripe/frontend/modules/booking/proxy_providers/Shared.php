<?php
namespace BooklyStripe\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyStripe\Lib;

/**
 * Class Shared
 * @package BooklyStripe\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySelector( $payment_data, $form_id, $payment, BooklyLib\CartInfo $cart_info, $show_price )
    {
        $url_cards_image = plugins_url( 'frontend/resources/images/cards.png', BooklyLib\Plugin::getMainFile() );
        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate( 'gateway_selector', compact( 'form_id', 'payment', 'show_price', 'cart_info', 'url_cards_image' ), false );

        return $payment_data;
    }
}