<?php
namespace BooklyCart\Backend\Modules\Settings\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Backend\Modules\Settings\Proxy;

/**
 * Class Shared
 * @package BooklyCart\Backend\Modules\Settings\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function renderSettingsMenu()
    {
        self::renderTemplate( 'settings_menu' );
    }

    /**
     * @inheritdoc
     */
    public static function renderSettingsForm()
    {
        $cart_columns = array(
            'service'  => BooklyLib\Utils\Common::getTranslatedOption( 'bookly_l10n_label_service' ),
            'date'     => __( 'Date', 'bookly-cart' ),
            'time'     => __( 'Time', 'bookly-cart' ),
            'employee' => BooklyLib\Utils\Common::getTranslatedOption( 'bookly_l10n_label_employee' ),
            'price'    => __( 'Price', 'bookly-cart' ),
            'deposit'  => __( 'Deposit', 'bookly-cart' ),
            'tax'      => __( 'Tax', 'bookly-cart' ),
        );

        self::renderTemplate( 'settings_form', compact( 'cart_columns' ) );
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        if ( $tab == 'cart' && ! empty( $_post ) ) {
            $options = array( 'bookly_cart_enabled', 'bookly_cart_show_columns' );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly-cart' );
            if ( get_option( 'bookly_wc_enabled' ) && $_post['bookly_cart_enabled'] ) {
                $alert['error'][] = sprintf(
                    __( 'To use the cart, disable integration with WooCommerce <a href="%s">here</a>.', 'bookly-cart' ),
                    BooklyLib\Utils\Common::escAdminUrl( \Bookly\Backend\Modules\Settings\Ajax::pageSlug(), array( 'tab' => 'woocommerce' ) )
                );
            }
        }

        return $alert;
    }
}