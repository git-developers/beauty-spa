<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="col-md-3">
    <div class="checkbox">
        <label>
            <input type="checkbox" id=bookly-show-nop-on-time-step <?php checked( get_option( 'bookly_group_booking_app_show_nop' ) ) ?>>
            <?php _e( 'Show information about group bookings', 'bookly-group-booking' ) ?>
        </label>
    </div>
</div>