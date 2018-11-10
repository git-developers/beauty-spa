<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;
use Bookly\Backend\Components\Controls\Inputs as Inputs1;
use Bookly\Backend\Components\Settings\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="tab-pane" id="bookly_settings_coupons">
    <form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'coupons' ) ) ?>">
        <?php Selects::renderSingle( 'bookly_coupons_enabled', __( 'Coupons', 'bookly-coupons' ), __( 'Enable this setting to allow your clients to use coupons at the payment step.', 'bookly-coupons' ) ) ?>
        <?php Inputs::renderText( 'bookly_coupons_default_code_mask', __( 'Default code mask', 'bookly-coupons' ), __( 'Enter default mask for auto-generated codes.', 'bookly-coupons' ) ) ?>
        <div class="panel-footer">
            <?php Inputs1::renderCsrf() ?>
            <?php Buttons::renderSubmit() ?>
            <?php Buttons::renderReset() ?>
        </div>
    </form>
</div>