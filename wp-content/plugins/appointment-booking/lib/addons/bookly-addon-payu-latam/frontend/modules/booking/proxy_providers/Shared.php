<?php
namespace BooklyPayuLatam\Frontend\Modules\Booking\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Proxy;
use BooklyPayuLatam\Lib;

/**
 * Class Shared
 * @package BooklyPayuLatam\Frontend\Modules\Booking\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySelector( $payment_data, $form_id, $payment, BooklyLib\CartInfo $cart_info, $show_price )
    {
        $url_cards_image = plugins_url( 'frontend/resources/images/cards.png', BooklyLib\Plugin::getMainFile() );
        $cart_info->setPriceCorrection( get_option( 'bookly_payu_latam_increase' ), get_option( 'bookly_payu_latam_addition' ) );

        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate( 'gateway_selector', compact( 'form_id', 'payment', 'url_cards_image', 'show_price', 'cart_info' ), false );

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