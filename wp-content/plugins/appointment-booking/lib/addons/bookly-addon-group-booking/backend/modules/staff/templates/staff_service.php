<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/** @var Bookly\Lib\Entities\Service $service */
?>
<div class="bookly-flex-cell bookly-padding-left-sm">
    <div class="form-group bookly-js-capacity-form-group">
        <div class="bookly-font-smaller bookly-margin-bottom-xs bookly-color-gray visible-xs visible-sm visible-md text-center">
            <?php _e( 'Capacity (min and max)', 'bookly-group-booking' ) ?>
        </div>
        <div class="bookly-flex-row">
            <div class="bookly-flex-cell" style="padding-right: 12px">
                <input class="form-control bookly-js-capacity bookly-js-capacity-min" type="number" min="1" <?php disabled( ! array_key_exists( $service->getId(), $services_data ) ) ?>
                       name="capacity_min[<?php echo $service->getId() ?>]"
                       value="<?php echo array_key_exists( $service->getId(), $services_data ) ? $services_data[ $service->getId() ]['capacity_min'] : $service->getCapacityMin() ?>"
                       <?php if ( $read_only ) : ?>readonly<?php endif ?>
                >
            </div>
            <div class="bookly-flex-cell">
                <input class="form-control bookly-js-capacity bookly-js-capacity-max" type="number" min="1" <?php disabled( ! array_key_exists( $service->getId(), $services_data ) ) ?>
                       name="capacity_max[<?php echo $service->getId() ?>]"
                       value="<?php echo array_key_exists( $service->getId(), $services_data ) ? $services_data[ $service->getId() ]['capacity_max'] : $service->getCapacityMax() ?>"
                       <?php if ( $read_only ) : ?>readonly<?php endif ?>
                >
            </div>
        </div>
    </div>
</div>