<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;
use Bookly\Backend\Components\Controls\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<div class="tab-pane" id="bookly_settings_custom_fields">
    <form method="post" action="<?php echo esc_url( add_query_arg( 'tab', 'custom_fields' ) ) ?>">
        <?php Selects::renderSingle( 'bookly_custom_fields_enabled', __( 'Custom Fields', 'bookly-custom-fields' ), __( 'Enable this setting to display custom fields on your booking form.', 'bookly-custom-fields' ) ) ?>
        <div class="panel-footer">
            <?php Inputs::renderCsrf() ?>
            <?php Buttons::renderSubmit() ?>
            <?php Buttons::renderReset() ?>
        </div>
    </form>
</div>