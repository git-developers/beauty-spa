<?php
namespace BooklyMollie\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use BooklyMollie\Lib;
use BooklyMollie\Frontend\Modules\Mollie;

/**
 * Class Shared
 * @package BooklyMollie\Lib\ProxyProviders
 */
class Shared extends BooklyLib\Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function handleRequestAction( $action )
    {
        if ( Lib\Plugin::enabled() ) {
            switch ( $action ) {
                case 'mollie-checkout':
                    Mollie\Controller::checkout();
                    break;
                case 'mollie-response':
                    Mollie\Controller::response();
                    break;
                case 'mollie-ipn':
                    Lib\Payment\Mollie::ipn();
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
            return (float) get_option( 'bookly_mollie_increase' ) != 0 || (float) get_option( 'bookly_mollie_addition' ) != 0;
        }

        return $show;
    }

    /**
     * @inheritdoc
     */
    public static function applyPaymentSpecificPrice( BooklyLib\CartInfo $cart_info, $gateway = BooklyLib\Entities\Payment::TYPE_MOLLIE )
    {
        if ( $gateway === BooklyLib\Entities\Payment::TYPE_MOLLIE && Lib\Plugin::enabled() ) {
            $cart_info->setPriceCorrection( get_option( 'bookly_mollie_increase' ), get_option( 'bookly_mollie_addition' ) );
        }

        return $cart_info;
    }

    /**
     * @inheritdoc
     */
    public static function getOutdatedUnpaidPayments( $payments )
    {
        $timeout = (int) get_option( 'bookly_mollie_timeout' );
        if ( $timeout ) {
            $rows = BooklyLib\Entities\Payment::query( 'p' )
                ->select( 'p.id, p.details' )
                ->where( 'p.type', BooklyLib\Entities\Payment::TYPE_MOLLIE )
                ->where( 'p.status', BooklyLib\Entities\Payment::STATUS_PENDING )
                ->whereLt( 'p.created', date_create( current_time( 'mysql' ) )->modify( sprintf( '- %s seconds', $timeout ) )->format( 'Y-m-d H:i:s' ) )
                ->fetchArray();
            foreach ( $rows as $row ) {
                $payments[ $row['id'] ] = $row['details'];
            }
        }

        return $payments;
    }
}