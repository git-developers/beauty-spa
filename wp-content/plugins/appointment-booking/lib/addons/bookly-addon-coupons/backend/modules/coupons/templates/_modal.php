<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components\Controls\Buttons;
use Bookly\Backend\Components\Controls\Inputs;
use Bookly\Backend\Components\Settings\Selects;
?>
<style type="text/css">
    #bookly-coupon-modal input#bookly-coupon-date-limit-start,
    #bookly-coupon-modal input#bookly-coupon-date-limit-end,
    #bookly-coupon-modal input#bookly-coupon-code {
        position: static;
        width: calc(100% - 1px);
    }
    #bookly-coupon-modal input::-moz-placeholder {
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
    }
</style>
<div class="modal fade" id="bookly-coupon-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="bookly-new-coupon-series-title"><?php esc_html_e( 'New coupon series', 'bookly-coupons' ) ?></h4>
                    <h4 class="modal-title" id="bookly-new-coupon-title"><?php esc_html_e( 'New coupon', 'bookly-coupons' ) ?></h4>
                    <h4 class="modal-title" id="bookly-edit-coupon-title"><?php esc_html_e( 'Edit coupon', 'bookly-coupons' ) ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 bookly-js-coupon-field">
                            <div class=form-group>
                                <label for="bookly-coupon-code"><?php esc_html_e( 'Code', 'bookly-coupons' ) ?></label>
                                <p class="help-block"><?php esc_html_e( 'You can enter a mask containing asterisks "*" for variables here and click Generate.', 'bookly-coupons' ) ?></p>
                                <div class="input-group">
                                    <input type="text" id="bookly-coupon-code" class="form-control" name="code" autocomplete="off" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default ladda-button" type="button" id="bookly-generate-code" data-style="zoom-in" data-spinner-size="30" data-spinner-color="#333"><span class="ladda-label"><?php esc_html_e( 'Generate', 'bookly-coupons' ) ?></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 bookly-js-series-field">
                            <div class=form-group>
                                <label for="bookly-coupon-series-mask"><?php esc_html_e( 'Mask', 'bookly-coupons' ) ?></label>
                                <p class="help-block"><?php esc_html_e( 'Enter a mask containing asterisks "*" for variables.', 'bookly-coupons' ) ?></p>
                                <input type="text" id="bookly-coupon-series-mask" class="form-control" name="mask" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-sm-3 bookly-js-series-field">
                            <div class=form-group>
                                <label for="bookly-coupon-series-amount"><?php esc_html_e( 'Amount', 'bookly-coupons' ) ?></label>
                                <input type="number" id="bookly-coupon-series-amount" class="form-control" name="amount" min="1" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <label for="bookly-coupon-discount"><?php esc_html_e( 'Discount (%)', 'bookly-coupons' ) ?></label>
                                <input type="number" id="bookly-coupon-discount" class="form-control" name="discount" min="0"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <label for="bookly-coupon-deduction"><?php esc_html_e( 'Deduction', 'bookly-coupons' ) ?></label>
                                <input type="text" id="bookly-coupon-deduction" class="form-control" name="deduction" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div><label><?php esc_html_e( 'Services', 'bookly-coupons' ) ?></label></div>
                                <div class="btn-group" id="bookly-coupon-services">
                                    <button class="btn btn-default dropdown-toggle bookly-flexbox" data-toggle="dropdown">
                                        <div class="bookly-flex-cell"><i class="glyphicon glyphicon-tag bookly-margin-right-md"></i></div>
                                        <div class="bookly-flex-cell text-left"><span class="bookly-js-entity-counter"></span></div>
                                        <div class="bookly-flex-cell">
                                            <div class="bookly-margin-left-md"><span class="caret"></span></div>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu bookly-entity-selector">
                                        <li>
                                            <a class="checkbox" href="javascript:void(0)">
                                                <label><input type="checkbox" class="bookly-js-check-all-entities"/><?php esc_html_e( 'All services', 'bookly-coupons' ) ?></label>
                                            </a>
                                        </li>
                                        <?php foreach ( $services as $service ): ?>
                                            <li>
                                                <a class="checkbox" href="javascript:void(0)">
                                                    <label>
                                                        <input type="checkbox" name="service_ids[]" class="bookly-js-check-entity" value="<?php echo $service['id'] ?>">
                                                        <?php echo esc_html( $service['title'] ) ?>
                                                    </label>
                                                </a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div><label><?php esc_html_e( 'Providers', 'bookly-coupons' ) ?></label></div>
                                <div class="btn-group" id="bookly-coupon-providers">
                                    <button class="btn btn-default dropdown-toggle bookly-flexbox" data-toggle="dropdown">
                                        <div class="bookly-flex-cell"><i class="dashicons dashicons-admin-users bookly-margin-right-md"></i></div>
                                        <div class="bookly-flex-cell text-left"><span class="bookly-js-entity-counter"></span></div>
                                        <div class="bookly-flex-cell">
                                            <div class="bookly-margin-left-md"><span class="caret"></span></div>
                                        </div>
                                    </button>
                                    <ul class="dropdown-menu bookly-entity-selector">
                                        <li>
                                            <a class="checkbox" href="javascript:void(0)">
                                                <label><input type="checkbox" class="bookly-js-check-all-entities"/><?php esc_html_e( 'All staff', 'bookly-coupons' ) ?></label>
                                            </a>
                                        </li>
                                        <?php foreach ( $staff_members as $staff ): ?>
                                            <li>
                                                <a class="checkbox" href="javascript:void(0)">
                                                    <label>
                                                        <input type="checkbox" name="staff_ids[]" class="bookly-js-check-entity" value="<?php echo $staff['id'] ?>">
                                                        <?php echo esc_html( $staff['title'] ) ?>
                                                    </label>
                                                </a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <label for="bookly-coupon-usage-limit"><?php esc_html_e( 'Usage limit', 'bookly-coupons' ) ?></label>
                                <input type="number" id="bookly-coupon-usage-limit" class="form-control" name="usage_limit" min="0" step="1" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <?php Selects::renderSingle( 'once_per_customer', __( 'Once per customer', 'bookly-coupons' ), __( 'Select this option to limit the use of the coupon to 1 time per customer.', 'bookly-coupon' ) ) ?>
                        </div>
                        <div class="col-sm-12">
                            <label for="bookly-coupon-date-limit-start"><?php esc_html_e( 'Date limit (from and to)', 'bookly-coupons' ) ?></label>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <div class="input-group">
                                    <input type="text" id="bookly-coupon-date-limit-start" class="form-control" autocomplete="off" placeholder="<?php esc_attr_e( 'No limit', 'bookly-coupons' ) ?>" />
                                    <input type="hidden" name="date_limit_start" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="bookly-clear-date-limit-start" title="<?php esc_attr_e( 'Clear field', 'bookly-coupons' ) ?>">&times;</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <div class="input-group">
                                    <input type="text" id="bookly-coupon-date-limit-end" class="form-control" autocomplete="off" placeholder="<?php esc_attr_e( 'No limit', 'bookly-coupons' ) ?>" />
                                    <input type="hidden" name="date_limit_end" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="bookly-clear-date-limit-end" title="<?php esc_attr_e( 'Clear field', 'bookly-coupons' ) ?>">&times;</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="bookly-coupon-min-appointments"><?php _e( 'Limit appointments in cart (min and max)', 'bookly-coupons' ) ?></label>
                            <p class="help-block"><?php esc_html_e( 'Specify minimum and maximum (optional) number of services of the same type required to apply a coupon.', 'bookly-coupons' ) ?></p>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <input type="number" id="bookly-coupon-min-appointments" class="form-control" name="min_appointments" min="1" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class=form-group>
                                <input type="number" id="bookly-coupon-max-appointments" class="form-control" name="max_appointments" min="1" placeholder="<?php esc_attr_e( 'No limit', 'bookly-coupons' ) ?>" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class=form-group>
                                <label for="bookly-coupon-customers"><?php esc_html_e( 'Limit to customers', 'bookly-coupons' ) ?></label>
                                <ul id="bookly-customers-list"></ul>
                                <select id="bookly-coupon-customers" multiple data-placeholder="<?php esc_attr_e( 'No limit', 'bookly-coupons' ) ?>" class="form-control" name="customer_ids[]">
                                    <?php foreach ( $customers as $customer ): ?>
                                        <option value="<?php echo $customer['id'] ?>"><?php echo esc_html( $customer['name'] ) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="checkbox pull-left bookly-js-coupon-field">
                        <label>
                            <input type="checkbox" id="bookly-create-another-coupon" />
                            <?php esc_html_e( 'Create another coupon', 'bookly-coupons' ) ?>
                        </label>
                    </div>
                    <?php Inputs::renderCsrf() ?>
                    <?php Buttons::renderSubmit( 'bookly-coupon-save' ) ?>
                    <button class="btn btn-lg btn-default" data-dismiss="modal">
                        <?php esc_html_e( 'Cancel', 'bookly' ) ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>