<?php
namespace BooklyAuthorizeNet\Lib;

/**
 * Class Installer
 * @package BooklyAuthorizeNet\Lib
 */
class Installer extends \Bookly\Lib\Base\Installer
{
    public function __construct()
    {
        // Load l10n for fixtures creating.
        load_plugin_textdomain( Plugin::getTextDomain(), false, Plugin::getSlug() . '/languages' );

        $status = get_option( 'bookly_pmt_authorize_net', '0' );
        $this->options = array(
            'bookly_authorize_net_enabled'         => $status == 'disabled' ? '0' : $status,
            'bookly_authorize_net_api_login_id'    => get_option( 'bookly_pmt_authorize_net_api_login_id' ),
            'bookly_authorize_net_transaction_key' => get_option( 'bookly_pmt_authorize_net_transaction_key' ),
            'bookly_authorize_net_sandbox'         => get_option( 'bookly_pmt_authorize_net_sandbox', '0' ),
            'bookly_authorize_net_increase'        => '0',
            'bookly_authorize_net_addition'        => '0',
            'bookly_authorize_net_send_tax'        => '0',
        );

        $deprecated = array(
            'bookly_pmt_authorize_net',
            'bookly_pmt_authorize_net_api_login_id',
            'bookly_pmt_authorize_net_transaction_key',
            'bookly_pmt_authorize_net_sandbox',
        );
        foreach ( $deprecated as $option_name ) {
            delete_option( $option_name );
        }
    }

}