<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/** @var Bookly\Lib\CartInfo $cart_info */
use Bookly\Lib\Utils;
use Bookly\Lib\Entities\Payment;
?>
<div class="bookly-box bookly-list">
    <label>
        <input type="radio" class="bookly-payment" name="payment-method-<?php echo $form_id ?>" value="payu_latam"/>
        <span><?php echo Utils\Common::getTranslatedOption( 'bookly_l10n_label_pay_ccard' ) ?>
            <?php if ( $show_price ) : ?>
                <span class="bookly-js-pay"><?php echo Utils\Price::format( $cart_info->getPayNow() ) ?></span>
            <?php endif ?>
        </span>
        <img src="<?php echo $url_cards_image ?>" alt="cards" />
    </label>
    <?php if ( $payment['gateway'] == Payment::TYPE_PAYULATAM && $payment['status'] == 'error' ) : ?>
        <div class="bookly-label-error" style="padding-top: 5px;">* <?php echo $payment['data'] ?></div>
    <?php endif ?>
</div>