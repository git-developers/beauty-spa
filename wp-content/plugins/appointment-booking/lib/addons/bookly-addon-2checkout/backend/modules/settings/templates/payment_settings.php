<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components;
use Bookly\Backend\Components\Settings\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="panel panel-default bookly-js-collapse" data-slug="bookly-addon-2checkout">
    <div class="panel-heading">
        <i class="bookly-js-handle bookly-margin-right-sm bookly-icon bookly-icon-draghandle bookly-cursor-move ui-sortable-handle" title="<?php esc_attr_e( 'Reorder', 'bookly' ) ?>"></i>
        <a href="#bookly_pmt_2checkout" class="panel-title" role="button" data-toggle="collapse">
            2Checkout
        </a>
        <img style="margin-left: 10px; float: right" src="<?php echo plugins_url( 'frontend/resources/images/2Checkout.png', \Bookly2checkout\Lib\Plugin::getMainFile() ) ?>"/>
    </div>
    <div id="bookly_pmt_2checkout" class="panel-collapse collapse in">
        <div class="panel-body">
            <?php Selects::renderSingle( 'bookly_2checkout_enabled', null, null, array( array( '0', __( 'Disabled', 'bookly' ) ), array( 'standard_checkout', '2Checkout Standard Checkout' ) ) ) ?>
            <div class="bookly-2checkout">
                <div class="form-group">
                    <h4><?php _e( 'Instructions', 'bookly' ) ?></h4>
                    <p>
                        <?php _e( 'In <b>Checkout Options</b> of your 2Checkout account do the following steps:', 'bookly-2checkout' ) ?>
                    </p>
                    <ol>
                        <li><?php _e( 'In <b>Direct Return</b> select <b>Header Redirect (Your URL)</b>.', 'bookly-2checkout' ) ?></li>
                        <li><?php _e( 'In <b>Approved URL</b> enter the URL of your booking page.', 'bookly-2checkout' ) ?></li>
                    </ol>
                    <p>
                        <?php _e( 'Finally provide the necessary information in the form below.', 'bookly-2checkout' ) ?>
                    </p>
                </div>
                <?php Inputs::renderText( 'bookly_2checkout_api_seller_id', __( 'Account Number', 'bookly-2checkout' ) ) ?>
                <?php Inputs::renderText( 'bookly_2checkout_api_secret_word', __( 'Secret Word', 'bookly-2checkout' ) ) ?>
                <?php Selects::renderSingle( 'bookly_2checkout_sandbox', __( 'Sandbox Mode', 'bookly' ), null, array( array( 0, __( 'No', 'bookly' ) ), array( 1, __( 'Yes', 'bookly' ) ) ) ) ?>
                <?php Components\Settings\Payments::renderTax( '2checkout' ) ?>
                <?php Components\Settings\Payments::renderPriceCorrection( '2checkout' ) ?>
            </div>
        </div>
    </div>
</div>