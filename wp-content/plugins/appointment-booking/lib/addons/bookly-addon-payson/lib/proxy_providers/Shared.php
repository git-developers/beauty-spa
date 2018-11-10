<?php
namespace BooklyPayson\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use BooklyPayson\Lib;
use BooklyPayson\Frontend\Modules\Payson;

/**
 * Class Shared
 * @package BooklyPayson\Lib\ProxyProviders
 */
class Shared extends BooklyLib\Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function applyPaymentSpecificPrice( BooklyLib\CartInfo $cart_info, $gateway = BooklyLib\Entities\Payment::TYPE_PAYSON )
    {
        if ( $gateway === BooklyLib\Entities\Payment::TYPE_PAYSON && Lib\Plugin::enabled() ) {
            $cart_info->setPriceCorrection( get_option( 'bookly_payson_increase' ), get_option( 'bookly_payson_addition' ) );
        }

        return $cart_info;
    }

    /**
     * @inheritdoc
     */
    public static function getOutdatedUnpaidPayments( $payments )
    {
        $timeout = (int) get_option( 'bookly_payson_timeout' );
        if ( $timeout ) {
            $rows = BooklyLib\Entities\Payment::query( 'p' )
                ->select( 'p.id, p.details' )
                ->where( 'p.type', BooklyLib\Entities\Payment::TYPE_PAYSON )
                ->where( 'p.status', BooklyLib\Entities\Payment::STATUS_PENDING )
                ->whereLt( 'p.created', date_create( current_time( 'mysql' ) )->modify( sprintf( '- %s seconds', $timeout ) )->format( 'Y-m-d H:i:s' ) )
                ->fetchArray();
            foreach ( $rows as $row ) {
                $payments[ $row['id'] ] = $row['details'];
            }
        }

        return $payments;
    }

    /**
     * @inheritdoc
     */
    public static function handleRequestAction( $action )
    {
        if ( Lib\Plugin::enabled() ) {
            switch ( $action ) {
                // Payson.
                case 'payson-checkout':
                    Payson\Controller::checkout();
                    break;
                case 'payson-confirm':
                    Payson\Controller::confirm();
                    break;
                case 'payson-ipn':
                    Lib\Payment\Payson::ipn();
                    break;
            }
        }

    }

    /**
     * @inheritdoc
     */
    public static function showPaymentSpecificPrices( $show )
    {
        if ( ! $show && Lib\Plugin::enabled() ) {
            return (float) get_option( 'bookly_payson_increase' ) != 0 || (float) get_option( 'bookly_payson_addition' ) != 0;
        }

        return $show;
    }
}