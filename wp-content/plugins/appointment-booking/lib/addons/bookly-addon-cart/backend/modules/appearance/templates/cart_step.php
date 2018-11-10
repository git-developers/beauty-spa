<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Lib\Utils\Price;
use Bookly\Lib\Utils\DateTime;
use Bookly\Backend\Modules\Appearance\Proxy;
use Bookly\Backend\Components\Appearance\Codes;
use Bookly\Backend\Components\Appearance\Editable;
?>
<div class="bookly-form">
    <?php echo $progress_tracker ?>

    <div class="bookly-box">
        <?php Editable::renderText( 'bookly_l10n_info_cart_step', Codes::getHtml( 5 ) ) ?>
    </div>
    <div class="bookly-box bookly-label-error">
        <?php Editable::renderText( 'bookly_l10n_step_cart_slot_not_available', null, 'bottom', __( 'Visible when the chosen time slot has been already booked', 'bookly-cart' ) ) ?>
    </div>
    <div class="bookly-box">
        <div class="bookly-btn bookly-add-item bookly-inline-block">
            <?php Editable::renderString( array( 'bookly_l10n_button_book_more', ) ) ?>
        </div>
    </div>

    <div class="bookly-cart-step">
        <div class="bookly-cart bookly-box">
            <table>
                <thead class="bookly-desktop-version">
                <tr>
                    <th class="bookly-js-option bookly_l10n_label_service"><?php echo esc_html( get_option( 'bookly_l10n_label_service' ) ) ?></th>
                    <th><?php esc_html_e( 'Date', 'bookly-cart' ) ?></th>
                    <th><?php esc_html_e( 'Time', 'bookly-cart' ) ?></th>
                    <th class="bookly-js-option bookly_l10n_label_employee"><?php echo esc_html( get_option( 'bookly_l10n_label_employee' ) ) ?></th>
                    <th><?php esc_html_e( 'Price', 'bookly-cart' ) ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="bookly-desktop-version">
                <tr class="bookly-cart-primary">
                    <td>Crown and Bridge</td>
                    <td><?php echo DateTime::formatDate( '+2 days' ) ?></td>
                    <td><?php echo DateTime::formatTime( 28800 ) ?></td>
                    <td>Nick Knight</td>
                    <td><?php echo Price::format( 350 ) ?></td>
                    <td>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Edit', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-edit"></i></button>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Remove', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-drop"></i></button>
                    </td>
                </tr>
                <tr class="bookly-cart-primary">
                    <td>Teeth Whitening</td>
                    <td><?php echo DateTime::formatDate( '+3 days' ) ?></td>
                    <td><?php echo DateTime::formatTime( 57600 ) ?></td>
                    <td>Wayne Turner</td>
                    <td><?php echo Price::format( 400 ) ?></td>
                    <td>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Edit', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-edit"></i></button>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Remove', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-drop"></i></button>
                    </td>
                </tr>
                </tbody>
                <tbody class="bookly-mobile-version">
                <tr class="bookly-cart-primary">
                    <th class="bookly-js-option bookly_l10n_label_service"><?php echo esc_html( get_option( 'bookly_l10n_label_service' ) ) ?></th>
                    <td>Crown and Bridge</td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Date', 'bookly-cart' ) ?></th>
                    <td><?php echo DateTime::formatDate( '+2 days' ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Time', 'bookly-cart' ) ?></th>
                    <td><?php echo DateTime::formatTime( 28800 ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th class="bookly-js-option bookly_l10n_label_employee"><?php echo esc_html( get_option( 'bookly_l10n_label_employee' ) ) ?></th>
                    <td>Nick Knight</td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Price', 'bookly-cart' ) ?></th>
                    <td><?php echo Price::format( 350 ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th></th>
                    <td>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Edit', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-edit"></i></button>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Remove', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-drop"></i></button>
                    </td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th class="bookly-js-option bookly_l10n_label_service"><?php echo esc_html( get_option( 'bookly_l10n_label_service' ) ) ?></th>
                    <td>Teeth Whitening</td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Date', 'bookly-cart' ) ?></th>
                    <td><?php echo DateTime::formatDate( '+3 days' ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Time', 'bookly-cart' ) ?></th>
                    <td><?php echo DateTime::formatTime( 57600 ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th class="bookly-js-option bookly_l10n_label_employee"><?php echo esc_html( get_option( 'bookly_l10n_label_employee' ) ) ?></th>
                    <td>Wayne Turner</td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th><?php esc_html_e( 'Price', 'bookly-cart' ) ?></th>
                    <td><?php echo Price::format( 400 ) ?></td>
                </tr>
                <tr class="bookly-cart-primary">
                    <th></th>
                    <td>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Edit', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-edit"></i></button>
                        <button class="bookly-round" title="<?php esc_attr_e( 'Remove', 'bookly-cart' ) ?>"><i class="bookly-icon-sm bookly-icon-drop"></i></button>
                    </td>
                </tr>
                </tbody>
                <tfoot class="bookly-desktop-version">
                <tr class="bookly-cart-total">
                    <td colspan="4"><strong><?php esc_html_e( 'Total', 'bookly-cart' ) ?>:</strong></td>
                    <td><strong class="bookly-js-total-price"><?php echo Price::format( 750 ) ?></strong></td>
                    <td></td>
                </tr>
                </tfoot>
                <tfoot class="bookly-mobile-version">
                <tr class="bookly-cart-total">
                    <th><strong><?php esc_html_e( 'Total', 'bookly-cart' ) ?>:</strong></th>
                    <td><strong class="bookly-js-total-price"><?php echo Price::format( 750 ) ?></strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <?php Proxy\RecurringAppointments::renderInfoMessage() ?>

    <div class="bookly-box bookly-nav-steps">
        <div class="bookly-back-step bookly-js-back-step bookly-btn">
            <?php Editable::renderString( array( 'bookly_l10n_button_back' ) ) ?>
        </div>
        <div class="bookly-next-step bookly-js-next-step bookly-btn">
            <?php Editable::renderString( array( 'bookly_l10n_step_cart_button_next' ) ) ?>
        </div>
    </div>
</div>