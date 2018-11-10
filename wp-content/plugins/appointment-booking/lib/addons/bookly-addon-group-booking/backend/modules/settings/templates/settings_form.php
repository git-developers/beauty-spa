<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;
use Bookly\Backend\Components\Controls\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="tab-pane" id="bookly_settings_group_booking">
    <form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'group_booking' ) ) ?>">
        <?php Selects::renderSingle( 'bookly_group_booking_enabled', __( 'Group Booking', 'bookly-group-booking' ), __( 'Enable this setting to allow group bookings.', 'bookly-group-booking' ) ) ?>
        <?php Selects::renderSingle( 'bookly_group_booking_nop_format', __( 'Group bookings information format', 'bookly-group-booking' ), __( 'Select format for displaying the time slot occupancy for group bookings.', 'bookly-group-booking' ), array(
            array( 'busy', __( '[Booked/Max capacity]', 'bookly-group-booking' ) ),
            array( 'free', __( '[Available left]', 'bookly-group-booking' ) ),
        ) ) ?>
        <div class="panel-footer">
            <?php Inputs::renderCsrf() ?>
            <?php Buttons::renderSubmit() ?>
            <?php Buttons::renderReset() ?>
        </div>
    </form>
</div>