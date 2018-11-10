<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components;
use Bookly\Backend\Components\Settings\Inputs;
use Bookly\Backend\Components\Settings\Selects;
use Bookly\Lib\Utils\DateTime;
?>
<div class="panel panel-default bookly-js-collapse" data-slug="bookly-addon-mollie">
    <div class="panel-heading">
        <i class="bookly-js-handle bookly-margin-right-sm bookly-icon bookly-icon-draghandle bookly-cursor-move ui-sortable-handle" title="<?php esc_attr_e( 'Reorder', 'bookly' ) ?>"></i>
        <a href="#bookly_pmt_mollie" class="panel-title" role="button" data-toggle="collapse">
            Mollie
        </a>
        <img class="pull-right" src="<?php echo plugins_url( 'frontend/resources/images/mollie.png', \BooklyMollie\Lib\Plugin::getMainFile() ) ?>"/>
    </div>
    <div id="bookly_pmt_mollie" class="panel-collapse collapse in">
        <div class="panel-body">
            <?php Selects::renderSingle( 'bookly_mollie_enabled' ) ?>
            <div class="bookly-mollie">
                <?php Inputs::renderText( 'bookly_mollie_api_key', __( 'API Key', 'bookly-mollie' ) ) ?>
                <?php Components\Settings\Payments::renderPriceCorrection( 'mollie' ) ?>
                <?php
                $values = array( array( '0', __( 'OFF', 'bookly' ) ) );
                foreach ( array_merge( range( 1, 23, 1 ), range( 24, 168, 24 ), array( 336, 504, 672 ) ) as $hour ) {
                    $values[] = array( $hour * HOUR_IN_SECONDS, DateTime::secondsToInterval( $hour * HOUR_IN_SECONDS ) );
                }
                Selects::renderSingle( 'bookly_mollie_timeout', __( 'Time interval of payment gateway', 'bookly' ), __( 'This setting determines the time limit after which the payment made via the payment gateway is considered to be incomplete. This functionality requires a scheduled cron job.', 'bookly' ), $values );
                ?>
            </div>
        </div>
    </div>
</div>