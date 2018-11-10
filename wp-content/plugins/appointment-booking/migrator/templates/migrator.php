<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$color = get_option( 'bookly_app_color', '#f4662f' );
?>
<style>
    #bookly-tbs ol > li.step-blocked, #bookly-tbs ol > li.step-blocked * {color: #ccc!important;}
    #bookly-tbs ol > li.step-blocked:before{color: #fff;background: #d9dee4;}
    #bookly-tbs .step-blocked .btn-migrator {background-color: #d9dee4!important;color: #fff!important;}
    #bookly-tbs ol {list-style: none;counter-reset: item;}
    #bookly-tbs li {counter-increment: item;margin: 5px!important;}
    #bookly-tbs li span.h4 {font-weight: bold;}
    #bookly-tbs li:before {
        margin: 4px 4px 16px 0px;
        content: counter(item);
        background: <?php echo $color ?>;
        border-radius: 10%;
        color: #000;
        width: 30px;
        height: 30px;
        text-align: center;
        display: inline-block;
        line-height: 30px;
        font-weight: bold;
        opacity: 0.5;
    }

    #bookly-tbs .btn-migrator {background-color: <?php echo $color ?>!important;color: #fff!important;}
    #bookly-tbs .form-control{min-width: 300px;}
    #bookly-tbs a, .bookly_color { color: <?php echo $color ?>!important; }
    #bookly-tbs a.text-muted {color: #878c91 !important;margin-left: 8px;margin-bottom: -2px;}
    #bookly-tbs a.text-muted:hover {color: <?php echo $color ?>!important;}
    #bookly-tbs .form-inline label { margin-bottom: 4px!important; }
</style>
<div id="bookly-tbs" class="bookly-tbs-body">
    <div class="panel panel-default bookly-main" >
        <div class="h1" >
            <img src="<?php echo plugins_url( 'appointment-booking/migrator/resources/images/bookly_80x80.png' ) ?>" style="margin: 8px 12px 8px 28px">
            <?php esc_html_e( 'To benefit from new Bookly, please start the migration process', 'bookly-migrator' ) ?>
        </div>
        <div class="panel-body" style="margin: -38px 10px 10px 0"><hr>
        <p class="about-description"><?php _e( 'You are one step away to complete the migration process to the new version of Bookly – <b>Bookly Pro</b>.', 'bookly-migrator' ) ?></p><p></p>
        <p class="about-description"><?php printf( __( 'We are changing the architecture of the plugin to make Bookly features available to more users and combine the process of developing <b>Free</b> and <b>Pro</b> versions to improve the quality and stability of our plugin. Check our <a href="%s" target="_blank">blog post</a> to find more about new Bookly.', 'bookly-migrator' ),'https://www.booking-wp-plugin.com/bookly-major-update/?utm_source=bookly_admin&utm_medium=pro-active&utm_campaign=migrator_page' ) ?></p><p></p>
        <p class="about-description"><?php esc_html_e( 'The process is automated and takes just a few minutes. After the update, all your settings and appointments will be stored and can be used as before. You will have two plugins installed – Bookly (required free basic version) and Bookly Pro (add-on with advanced features).', 'bookly-migrator' ) ?></p><p></p>
        <p class="about-description"><?php _e( 'In case you face any issues or require further assistance, do not hesitate to contact us at <a href="mailto:support@bookly.info">support@bookly.info</a>.', 'bookly-migrator' ) ?></p>
        <hr>
        <div class="well" style="border-left: 4px solid <?php echo $color ?>; background-color: transparent; width: 50%">
            <div class="welcome-panel-column" style="width: 100%">
                <h3 class="bookly_color" style="margin: 0!important;"><?php esc_html_e( 'To migrate successfully, follow the steps:', 'bookly-migrator' ) ?></h3>
                <ol style="margin-top: 12px;margin-left: 0">
                    <li>
                        <span class="h4"><?php esc_html_e( 'Before you start', 'bookly-migrator' ) ?></span>
                        <p><?php printf( __( 'We suggest to backup Bookly and add-ons (if any) to help restore your data if something goes wrong. To backup your database, use <a href="%s" target="_blank">this instruction</a> or any convenient method.', 'bookly-migrator' ), 'https://codex.wordpress.org/Backing_Up_Your_Database' ) ?></p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="bookly-migrator-backup">
                                <span for="bookly-migrator-backup" style="font-weight: bold; font-size: 16px; padding-left: 8px"><?php esc_html_e( 'I\'ve backed up Bookly', 'bookly-migrator' ) ?></span>
                            </label>
                        </div>
                    </li>
                    <hr>
                    <?php if ( ! $bookly_upgraded || ! empty ( $addons ) ) : ?>
                        <li id="bookly-migrator-step-verify-pc" class="step-blocked">
                            <span class="h4"><?php esc_html_e( 'Verify purchase codes', 'bookly-migrator' ) ?></span>
                            <p><?php esc_html_e( 'Make sure to provide valid purchase codes for Bookly and its add-ons.', 'bookly-migrator' ) ?></p>
                            <div class="well" style="background-color: #fcf8e3">
                                <strong><?php esc_html_e( 'WARNING', 'bookly-migrator' ) ?></strong>: <?php esc_html_e( 'To proceed to the next step, you need to specify the valid purchase codes for all of your add-ons. If you do not have a valid purchase code for some add-on, you need to delete it before migrating to the new version of Bookly (press delete add-on next to its name), otherwise you won’t be able to proceed to the next step.', 'bookly-migrator' ) ?>
                            </div>
                            <?php if ( ! $bookly_upgraded ) : ?>
                                <p class="form-inline">
                                    <label for="bookly-migrator-bookly-pc">Bookly</label><br/>
                                    <input id="bookly-migrator-bookly-pc" class="form-control" type="text" name="bookly" value="<?php echo esc_attr( get_option( 'bookly_pro_envato_purchase_code' ) ?: get_option( 'bookly_envato_purchase_code' ) ) ?>" style="max-width: 300px" />
                                    <span style="vertical-align:middle;"></span><span></span>
                                </p>
                            <?php endif ?>
                            <div class="bookly-migrator-js-addons" style="margin-bottom: 26px">
                                <?php foreach ( $addons as $slug => $addon ) : ?>
                                    <p class="form-inline">
                                        <label for="bookly-migrator-addon-<?php echo $slug ?>-pc"><?php echo esc_html( $addon['name'] ) ?></label>
                                        <a href="#" class="bookly-migrator-js-delete-addon text-muted" data-slug="<?php echo $slug ?>"><i class="glyphicon glyphicon-trash"></i> <?php esc_html_e( 'delete add-on', 'bookly-migrator' ) ?></a><br/>
                                        <input id="bookly-migrator-addon-<?php echo $slug ?>-pc" type="text" class="form-control" name="<?php echo $slug ?>" value="<?php echo esc_attr( $addon['pc'] ) ?>" style="max-width: 300px"  data-active="<?php echo (int) $addon['active'] ?>" />
                                        <span style="vertical-align:middle;"></span><span></span>
                                    </p>
                                <?php endforeach ?>
                            </div>
                            <button disabled id="bookly-migrator-verify-pc" type="button" class="btn btn-migrator"
                                    data-verifying="<?php esc_attr_e( 'Verifying...', 'bookly-migrator' ) ?>"
                                    data-default="<?php esc_attr_e( 'Verify purchase codes', 'bookly-migrator' ) ?>"
                            ><?php _e( 'Verify purchase codes', 'bookly-migrator' ) ?></button>
                        </li>
                        <hr>
                        <li id="bookly-migrator-step-upgrade-plugins" class="step-blocked">
                            <span class="h4"><?php esc_html_e( 'Get the new version of Bookly and its add-ons', 'bookly-migrator' ) ?></span>
                            <p><?php esc_html_e( 'Note that the process of migration can take some time.', 'bookly-migrator' ) ?></p>
                            <button disabled id="bookly-migrator-upgrade-plugins" type="button" class="btn btn-migrator"
                                    data-downloading-bookly="<?php esc_attr_e( '(1/4) Downloading Bookly Pro...', 'bookly-migrator' ) ?>"
                                    data-activating-bookly="<?php esc_attr_e( '(2/4) Activating Bookly Pro...', 'bookly-migrator' ) ?>"
                                    data-upgrading-addons="<?php esc_attr_e( '(3/4) Upgrading add-ons...', 'bookly-migrator' ) ?>"
                                    data-deleting-bookly="<?php esc_attr_e( '(4/4) Deleting old Bookly...', 'bookly-migrator' ) ?>"
                                    data-default="<?php esc_attr_e( 'Start Migration', 'bookly-migrator' ) ?>"
                            ><?php esc_html_e( 'Start Migration', 'bookly-migrator' ) ?></button>
                            <span id="bookly-migrator-plugins-upgraded" class="dashicons dashicons-yes" style="color:green;vertical-align:text-bottom;display:none;"></span>
                        </li>
                        <hr>
                    <?php endif ?>
                    <?php if ( $cron_step ) : ?>
                        <li id="bookly-migrator-step-upgrade-cron" class="step-blocked">
                            <span class="h4"><?php esc_html_e( 'Update cron for scheduled notifications', 'bookly-migrator' ) ?></span>
                            <p><?php esc_html_e( 'If you use cron for scheduled notifications, make sure to update your cron settings by replacing the current command with the following:', 'bookly-migrator' ) ?></p>
                            <p style="font-weight: bold; font-size: 16px;">wget -q -O - <?php echo site_url( 'wp-cron.php' ) ?></p>
                            <div class="checkbox">
                                <label>
                                    <input disabled type="checkbox" id="bookly-migrator-upgrade-cron">
                                    <span for="bookly-migrator-upgrade-cron" style="font-weight: bold; font-size: 16px; padding-left: 8px"><?php esc_html_e( 'I\'ve updated the cron', 'bookly-migrator' ) ?></span>
                                </label>
                            </div>
                        </li>
                        <hr>
                    <?php endif ?>
                    <li id="bookly-migrator-step-finish-migration" class="step-blocked">
                        <span class="h4"><?php esc_html_e( 'Now you are all set!', 'bookly-migrator' ) ?></span>
                        <p><?php esc_html_e( 'You have successfully installed Bookly (required free basic version) and Bookly Pro (add-on with advanced features). All your data and settings are saved, and you can start using the new Bookly as usual.', 'bookly-migrator' ) ?></p>
                        <button disabled id="bookly-migrator-finish-migration" type="button" class="btn btn-migrator" data-target="<?php echo add_query_arg( 'page', 'bookly-calendar' ) ?>"><?php esc_html_e( 'Check the new Bookly', 'bookly-migrator' ) ?></button>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        var $btnBackup           = $('#bookly-migrator-backup'),
            $stepVerifyPC        = $('#bookly-migrator-step-verify-pc'),
            $stepUpgradePlugins  = $('#bookly-migrator-step-upgrade-plugins'),
            $stepUpgradeCron     = $('#bookly-migrator-step-upgrade-cron'),
            $stepFinishMigration = $('#bookly-migrator-step-finish-migration'),
            $btnVerifyPC         = $('#bookly-migrator-verify-pc'),
            $btnUpgradePlugins   = $('#bookly-migrator-upgrade-plugins'),
            $btnUpgradeCron      = $('#bookly-migrator-upgrade-cron'),
            $btnFinishMigration  = $('#bookly-migrator-finish-migration'),
            $flagPluginsUpgraded = $('#bookly-migrator-plugins-upgraded')
        ;

        $btnBackup.on('change', function () {
            $(this).prop('disabled', true);
            $stepVerifyPC.removeClass('step-blocked');
            $btnVerifyPC.prop('disabled', false);
        });

        $btnVerifyPC.on('click', function () {
            var $button = $(this),
                plugins = []
            ;
            $button.addClass('updating-message').html($button.data('verifying')).prop('disabled', true);
            $stepVerifyPC.find('input:not(:disabled)').each(function () {
                plugins.push({slug: this.name, pc: this.value});
                this.disabled = true;
            });
            $.ajax({
                url  : ajaxurl,
                type : 'POST',
                data : {action: 'bookly_migrator_verify_pc', plugins: plugins},
                success : function(response) {
                    $button.removeClass('updating-message').html($button.data('default'));
                    var success = true;
                    $.each(response.result, function (slug, result) {
                        $stepVerifyPC
                            .find('input[name="' + slug + '"]').prop('disabled', result.valid)
                                .next('span').css('color', result.valid ? 'green' : 'red').attr('class', result.valid ? 'dashicons dashicons-yes' : 'dashicons dashicons-dismiss')
                                    .next('span').css('color', result.valid ? 'green' : 'red').html(' ' + result.message)
                        ;
                        if (!result.valid) {
                            success = false;
                        }
                    });
                    if (success) {
                        $stepUpgradePlugins.removeClass('step-blocked');
                        $btnUpgradePlugins.prop('disabled', false);
                    } else {
                        $button.prop('disabled', false);
                    }
                }
            });
        });
        $stepVerifyPC.on('click', 'a.bookly-migrator-js-delete-addon', function (e) {
            e.preventDefault();
            if (confirm(<?php echo json_encode( __( 'Are you sure you want to delete the add-on?', 'bookly-migrator' ) ) ?>)) {
                var $link = $(this),
                    title = $link.html()
                ;
                $link.html(<?php echo json_encode( __( 'deleting...', 'bookly-migrator' ) ) ?>).css('color', '#ccc');
                $.ajax({
                    url  : ajaxurl,
                    data : {action: 'bookly_migrator_delete_addon', slug: $link.data('slug')},
                    success : function(response) {
                        if (response.success) {
                            $link.closest('p').fadeOut('fast', function () {
                                $(this).remove();
                                if (!$stepVerifyPC.find('input:not(:disabled)').length) {
                                    $btnVerifyPC.prop('disabled', true);
                                    $stepUpgradePlugins.removeClass('step-blocked');
                                    $btnUpgradePlugins.prop('disabled', false);
                                }
                            });
                        } else {
                            $link.html(title).css('color', '');
                            alert(response.error);
                        }
                    }
                });
            }
        });
        $btnUpgradePlugins.on('click', function () {
            var $button = $(this),
                pc      = $stepVerifyPC.find('input[name="bookly"]').val(),
                addons  = []
            ;
            $button.addClass('updating-message').html($button.data('downloading-bookly')).prop('disabled', true);
            $stepVerifyPC.find('.bookly-migrator-js-addons input').each(function () {
                addons.push({slug: this.name, pc: this.value, active: this.getAttribute('data-active')});
            });
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {action: 'bookly_migrator_upgrade_bookly', pc: pc},
                success : function(response) {
                    if (response.success) {
                        $button.html($button.data('activating-bookly'));
                        $.ajax({
                            url: ajaxurl,
                            data: {action: 'bookly_migrator_activate_bookly'},
                            success: function (response) {
                                $button.html($button.data('upgrading-addons'));
                                $.ajax({
                                    url: ajaxurl,
                                    type: 'POST',
                                    data: {action: 'bookly_migrator_upgrade_addons', addons: addons},
                                    success: function (response) {
                                        if (response.success) {
                                            $button.html($button.data('deleting-bookly'));
                                            $.ajax({
                                                url: ajaxurl,
                                                data: {action: 'bookly_migrator_delete_old_bookly'},
                                                success: function (response) {
                                                    $button.removeClass('updating-message').html($button.data('default'));
                                                    if (response.success) {
                                                        $flagPluginsUpgraded.show();
                                                        if ($stepUpgradeCron.length) {
                                                            $stepUpgradeCron.removeClass('step-blocked');
                                                            $btnUpgradeCron.prop('disabled', false);
                                                        } else {
                                                            $stepFinishMigration.removeClass('step-blocked');
                                                            $btnFinishMigration.prop('disabled', false);
                                                        }
                                                    } else {
                                                        $button.prop('disabled', false);
                                                        alert(response.error);
                                                    }
                                                }
                                            });
                                        } else {
                                            $button.removeClass('updating-message').html($button.data('default')).prop('disabled', false);
                                            alert(response.error);
                                        }
                                    }
                                });
                            }
                        });
                    } else {
                        $button.removeClass('updating-message').html($button.data('default')).prop('disabled', false);
                        alert(response.error);
                    }
                }
            });
        });
        $btnUpgradeCron.on('change', function () {
            $(this).prop('disabled', true);
            $stepFinishMigration.removeClass('step-blocked');
            $btnFinishMigration.prop('disabled', false);
        });
        $btnFinishMigration.on('click', function(){
            window.location.href = $(this).data('target');
        });

        if (!$stepUpgradePlugins.length) {
            if ($stepUpgradeCron.length) {
                $stepUpgradeCron.removeClass('step-blocked');
                $btnUpgradeCron.prop('disabled', false);
            } else {
                $stepFinishMigration.removeClass('step-blocked');
                $btnFinishMigration.prop('disabled', false);
            }
        }

        $('#bookly-tbs .alert').hide();
        $('.update-nag').hide();
    });
</script>