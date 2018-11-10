<?php
namespace BooklyPayuLatam\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;
use BooklyPayuLatam\Lib;

/**
 * Class Shared
 * @package BooklyPayuLatam\Backend\Modules\Settings\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function preparePaymentGatewaySettings( $payment_data )
    {
        $payment_data[ Lib\Plugin::getSlug() ] = self::renderTemplate( 'payment_settings', array(), false );

        return $payment_data;
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        $options = array(
            'bookly_payu_latam_enabled',
            'bookly_payu_latam_api_key',
            'bookly_payu_latam_api_account_id',
            'bookly_payu_latam_api_merchant_id',
            'bookly_payu_latam_sandbox',
            'bookly_payu_latam_increase',
            'bookly_payu_latam_addition',
            'bookly_payu_latam_timeout',
            'bookly_payu_latam_send_tax',
        );
        foreach ( $options as $option_name ) {
            if ( array_key_exists( $option_name, $_post ) ) {
                update_option( $option_name, trim( $_post[ $option_name ] ) );
            }
        }

        return $alert;
    }
}