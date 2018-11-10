<?php
namespace BooklyStripe\Frontend\Modules\Stripe;

use BooklyStripe\Lib;
use Bookly\Lib as BooklyLib;
use Bookly\Frontend\Modules\Booking\Lib\Errors;

/**
 * Class Controller
 * @package Bookly\Frontend\Modules\Stripe
 */
class Ajax extends BooklyLib\Base\Ajax
{
    /**
     * @inheritdoc
     */
    protected static function permissions()
    {
        return array( '_default' => 'anonymous' );
    }

    /**
     * Do payment.
     */
    public static function payment()
    {
        $response = null;
        $userData = new BooklyLib\UserBookingData( self::parameter( 'form_id' ) );

        if ( $userData->load() ) {
            $failed_cart_key = $userData->cart->getFailedKey();
            if ( $failed_cart_key === null ) {
                include_once Lib\Plugin::getDirectory() . '/lib/payment/Stripe/init.php';
                \Stripe\Stripe::setApiKey( get_option( 'bookly_stripe_secret_key' ) );
                \Stripe\Stripe::setApiVersion( '2015-08-19' );

                $cart_info = $userData->cart->getInfo( BooklyLib\Entities\Payment::TYPE_STRIPE );
                $cart_info->setPaymentMethodSettings( false, 'tax_in_the_price' );
                try {
                    if ( in_array( get_option( 'bookly_pmt_currency' ),
                        array( 'BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW', 'MGA', 'PYG', 'RWF', 'VND', 'VUV', 'XAF', 'XOF', 'XPF', ) ) ) {
                        // Zero-decimal currency
                        $stripe_amount = $cart_info->getPaymentSystemPayNow();
                    } else {
                        $stripe_amount = $cart_info->getPaymentSystemPayNow() * 100; // amount in cents
                    }
                    $charge = \Stripe\Charge::create( array(
                        'amount'      => (int) $stripe_amount,
                        'currency'    => get_option( 'bookly_pmt_currency' ),
                        'source'      => self::parameter( 'card' ), // contain token or card data
                        'description' => 'Charge for ' . $userData->getEmail(),
                    ) );

                    if ( $charge->paid ) {
                        $coupon = $userData->getCoupon();
                        if ( $coupon ) {
                            $coupon->claim();
                            $coupon->save();
                        }
                        $payment = new BooklyLib\Entities\Payment();
                        $payment
                            ->setType( BooklyLib\Entities\Payment::TYPE_STRIPE )
                            ->setStatus( BooklyLib\Entities\Payment::STATUS_COMPLETED )
                            ->setCartInfo( $cart_info )
                            ->save();
                        $order = $userData->save( $payment );
                        $payment->setDetailsFromOrder( $order, $cart_info )->save();
                        BooklyLib\NotificationSender::sendFromCart( $order );

                        $response = array( 'success' => true );
                    } else {
                        $response = array( 'success' => false, 'error' => Errors::PAYMENT_ERROR, 'error_message' => __( 'Error', 'bookly' ) );
                    }
                } catch ( \Exception $e ) {
                    $response = array( 'success' => false, 'error' => Errors::PAYMENT_ERROR, 'error_message' => $e->getMessage() );
                }
            } else {
                $response = array(
                    'success'         => false,
                    'error'           => Errors::CART_ITEM_NOT_AVAILABLE,
                    'failed_cart_key' => $failed_cart_key,
                );
            }
        } else {
            $response = array( 'success' => false, 'error' => Errors::SESSION_ERROR );
        }

        // Output JSON response.
        wp_send_json( $response );
    }
}