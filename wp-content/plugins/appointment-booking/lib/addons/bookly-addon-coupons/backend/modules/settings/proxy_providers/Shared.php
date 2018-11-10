<?php
namespace BooklyCoupons\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;

/**
 * Class Shared
 * @package BooklyCoupons\Backend\Modules\Settings\ProxyProviders
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
        self::renderTemplate( 'settings_form' );
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        if ( $tab == 'coupons' && ! empty( $_post ) ) {
            $options = array( 'bookly_coupons_enabled', 'bookly_coupons_default_code_mask' );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly' );
        }

        return $alert;
    }
}