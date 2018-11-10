<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div id="bookly-tbs" class="wrap">
    <div id="bookly-js-migrator-notice" class="alert alert-warning bookly-tbs-body bookly-flexbox">
        <div class="bookly-flex-row">
            <div class="bookly-flex-cell" style="width:39px"><i class="alert-icon"></i></div>
            <div class="bookly-flex-cell">
                <button type="button" class="close" data-dismiss="alert"></button>
                <h4><?php esc_html_e( 'Important news from Bookly team', 'bookly' ) ?></h4>
                <?php printf( __( 'We’ve changed the architecture of Bookly to improve the quality and stability of the plugin. To migrate to the new version – Bookly Pro, <a href="%s">open Migrator</a> in Bookly menu. To learn more, check our <a href="%s" target="_blank">blog post</a>.', 'bookly' ), add_query_arg( 'page', 'bookly-migrator' ), 'https://www.booking-wp-plugin.com/bookly-major-update/?utm_source=bookly_admin&utm_medium=pro-active&utm_campaign=notification' ) ?>
                <div class="bookly-margin-top-md">
                    <a href="<?php echo add_query_arg( 'page', 'bookly-migrator' ) ?>" class="btn btn-success"><?php esc_html_e( 'Open', 'bookly' ) ?></a>
                    <button type="button" class="btn btn-default" data-dismiss="alert"><?php esc_html_e( 'Close', 'bookly' ) ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        $('#bookly-js-migrator-notice').on('close.bs.alert', function () {
            $.post(ajaxurl, {action: 'bookly_dismiss_migrator_notice', csrf_token : <?php echo json_encode( Bookly\Lib\Utils\Common::getCsrfToken() )?>});
        });
    });
</script>