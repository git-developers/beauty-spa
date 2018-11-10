<?php
namespace BooklyCart\Backend\Modules\Appearance\ProxyProviders;

use Bookly\Backend\Modules\Appearance\Proxy;
use BooklyCart\Lib;

/**
 * Class Shared
 * @package BooklyCart\Backend\Modules\Appearance\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function prepareOptions( array $options_to_save, array $options )
    {
        if ( Lib\Plugin::enabled() ) {
            $options_to_save = array_merge( $options_to_save, array_intersect_key( $options, array_flip( array (
                'bookly_l10n_button_book_more',
                'bookly_l10n_info_cart_step',
                'bookly_l10n_step_cart',
                'bookly_l10n_step_cart_button_next',
                'bookly_l10n_step_cart_slot_not_available',
            ) ) ) );
        }

        return $options_to_save;
    }
}