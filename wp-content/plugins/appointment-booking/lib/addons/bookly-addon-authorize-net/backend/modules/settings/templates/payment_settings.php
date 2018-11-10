<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Settings\Inputs;
use Bookly\Backend\Components\Settings\Payments;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="panel panel-default bookly-js-collapse" data-slug="bookly-addon-authorize-net">
    <div class="panel-heading">
        <i class="bookly-js-handle bookly-margin-right-sm bookly-icon bookly-icon-draghandle bookly-cursor-move ui-sortable-handle" title="<?php esc_attr_e( 'Reorder', 'bookly' ) ?>"></i>
        <a href="#bookly_pmt_authorize_net" class="panel-title" role="button" data-toggle="collapse">
            Authorize.Net
        </a>
        <img style="margin-left: 10px; float: right" src="<?php echo plugins_url( 'frontend/resources/images/authorize_net.png', \BooklyAuthorizeNet\Lib\Plugin::getMainFile() ) ?>"/>
    </div>
    <div id="bookly_pmt_authorize_net" class="panel-collapse collapse in">
        <div class="panel-body">
            <?php Selects::renderSingle( 'bookly_authorize_net_enabled', null, null, array( array( '0', __( 'Disabled', 'bookly' ) ), array( 'aim', 'Authorize.Net AIM' ) ) ) ?>
            <div class="bookly-authorize-net">
                <?php Inputs::renderText( 'bookly_authorize_net_api_login_id', __( 'API Login ID', 'bookly-authorize-net' ) ) ?>
                <?php Inputs::renderText( 'bookly_authorize_net_transaction_key', __( 'API Transaction Key', 'bookly-authorize-net' ) ) ?>
                <?php Selects::renderSingle( 'bookly_authorize_net_sandbox', __( 'Sandbox Mode', 'bookly' ), null, array( array( 1, __( 'Yes', 'bookly' ) ), array( 0, __( 'No', 'bookly' ) ) ) ) ?>
                <?php Payments::renderTax( 'authorize_net' ) ?>
                <?php Payments::renderPriceCorrection( 'authorize_net' ) ?>
            </div>
        </div>
    </div>
</div>