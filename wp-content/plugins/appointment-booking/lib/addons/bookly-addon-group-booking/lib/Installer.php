<?php
namespace BooklyGroupBooking\Lib;

use Bookly\Lib as BooklyLib;

/**
 * Class Installer
 * @package BooklyGroupBooking\Lib
 */
class Installer extends BooklyLib\Base\Installer
{
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $this->options = array(
            'bookly_l10n_label_number_of_persons' => __( 'Number of persons', 'bookly-group-booking' ),
            'bookly_group_booking_app_show_nop'   => 0,
            'bookly_group_booking_nop_format'     => 'busy',
        );
    }

}