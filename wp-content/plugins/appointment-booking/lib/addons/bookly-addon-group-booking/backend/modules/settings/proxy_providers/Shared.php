<?php
namespace BooklyGroupBooking\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;

/**
 * Class Shared
 * @package BooklyGroupBooking\Backend\Modules\Settings\ProxyProviders
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
        if ( $tab == 'group_booking' && ! empty( $_post ) ) {
            $options = array( 'bookly_group_booking_enabled', 'bookly_group_booking_nop_format' );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly-group-booking' );
        }

        return $alert;
    }
}