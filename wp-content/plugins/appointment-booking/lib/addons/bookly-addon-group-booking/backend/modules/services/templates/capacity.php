<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="col-sm-4 bookly-js-service bookly-js-service-simple">
    <div class="form-group">
        <label for="capacity_<?php echo $service['id'] ?>"><?php _e( 'Capacity (min and max)', 'bookly-group-booking' ) ?></label>
        <p class="help-block"><?php _e( 'The minimum and maximum number of customers allowed to book the service for the certain time period.', 'bookly' ) ?></p>
        <div class="row">
            <div class="col-xs-6">
                <input id="capacity_min_<?php echo $service['id'] ?>" class="form-control bookly-question bookly-js-capacity" type="number" min="1" step="1" name="capacity_min" value="<?php echo esc_attr( $service['capacity_min'] ) ?>">
            </div>
            <div class="col-xs-6">
                <input id="capacity_max_<?php echo $service['id'] ?>" class="form-control bookly-question bookly-js-capacity" type="number" min="1" step="1" name="capacity_max" value="<?php echo esc_attr( $service['capacity_max'] ) ?>">
            </div>
        </div>
    </div>
</div>