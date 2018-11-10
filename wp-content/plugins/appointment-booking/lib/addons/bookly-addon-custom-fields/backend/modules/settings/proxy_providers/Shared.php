<?php
namespace BooklyCustomFields\Backend\Modules\Settings\ProxyProviders;

use Bookly\Backend\Modules\Settings\Proxy;

/**
 * Class Shared
 * @package BooklyCustomFields\Backend\Modules\Settings\ProxyProviders
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
    public static function prepareCalendarAppointmentCodes( array $codes, $participants )
    {
        if ( $participants == 'one' ) {
            $codes[] = array( 'code' => 'custom_fields', 'description' => __( 'combined values of all custom fields', 'bookly-custom-fields' ) );
        }

        return $codes;
    }

    /**
     * @inheritdoc
     */
    public static function prepareWooCommerceCodes( array $codes )
    {
        $codes[] = array( 'code' => 'custom_fields', 'description' => __( 'combined values of all custom fields', 'bookly-custom-fields' ) );

        return $codes;
    }

    /**
     * @inheritdoc
     */
    public static function saveSettings( array $alert, $tab, $_post )
    {
        if ( $tab == 'custom_fields' && ! empty( $_post ) ) {
            $options = array( 'bookly_custom_fields_enabled' );
            foreach ( $options as $option_name ) {
                if ( array_key_exists( $option_name, $_post ) ) {
                    update_option( $option_name, $_post[ $option_name ] );
                }
            }
            $alert['success'][] = __( 'Settings saved.', 'bookly-custom-fields' );
        }

        return $alert;
    }
}