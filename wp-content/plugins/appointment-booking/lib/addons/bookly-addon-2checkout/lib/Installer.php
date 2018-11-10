<?php
namespace Bookly2checkout\Lib;

/**
 * Class Installer
 * @package Bookly2checkout\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $status = get_option( 'bookly_pmt_2checkout', '0' );
        $this->options = array(
            'bookly_2checkout_enabled'         => $status == 'disabled' ? '0' : $status,
            'bookly_2checkout_api_secret_word' => get_option( 'bookly_pmt_2checkout_api_secret_word', '' ),
            'bookly_2checkout_api_seller_id'   => get_option( 'bookly_pmt_2checkout_api_seller_id', '' ),
            'bookly_2checkout_sandbox'         => get_option( 'bookly_pmt_2checkout_sandbox', '0' ),
            'bookly_2checkout_increase'        => '0',
            'bookly_2checkout_addition'        => '0',
            'bookly_2checkout_send_tax'        => '0',
        );

        $deprecated = array(
            'bookly_pmt_2checkout',
            'bookly_pmt_2checkout_api_secret_word',
            'bookly_pmt_2checkout_api_seller_id',
            'bookly_pmt_2checkout_sandbox',
        );
        foreach ( $deprecated as $option_name ) {
            delete_option( $option_name );
        }
    }

}