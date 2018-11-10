<?php
namespace BooklyMigrator\Lib;

/**
 * Class Plugin
 * @package BooklyMigrator\Lib
 */
abstract class Plugin
{
    /**
     * Run plugin.
     */
    public static function run()
    {
        add_action( 'plugins_loaded', function () {
            load_plugin_textdomain( 'bookly-migrator', false, 'appointment-booking/migrator/languages' );
        } );

        add_action( 'admin_menu',         array( __CLASS__, 'addAdminMenu' ), 10, 0 );
        add_action( 'network_admin_menu', array( __CLASS__, 'addAdminMenu' ), 10, 0 );
        if ( get_option( 'bookly_migration_started' ) ) {
            register_uninstall_hook( 'appointment-booking/main.php', array( __CLASS__, 'uninstall' ) );
        }

        /**
         * Verify purchase codes.
         */
        add_action( 'wp_ajax_bookly_migrator_verify_pc', function () {
            $plugins = stripslashes_deep( $_POST['plugins'] );

            $result = array();
            foreach ( $plugins as $plugin ) {
                $result[ $plugin['slug'] ] = Plugin::verifyPurchaseCode( $plugin['pc'], $plugin['slug'] );
            }

            wp_send_json( array( 'result' => $result ) );
        } );

        /**
         * Delete add-on.
         */
        add_action( 'wp_ajax_bookly_migrator_delete_addon', function () {
            $slug = stripslashes_deep( $_GET['slug'] );
            $to_delete = array( $slug . '/main.php' );

            if ( strpos( $slug, 'bookly-addon-' ) === 0 ) {
                deactivate_plugins( $to_delete );
                if ( delete_plugins( $to_delete ) === true ) {
                    wp_send_json( array( 'success' => true ) );
                }
            }

            wp_send_json( array( 'success' => false, 'error' => __( 'Could not delete the add-on. Please try to delete it from WordPress Plugins page.', 'bookly-migrator' ) ) );
        } );

        /**
         * Upgrade Bookly.
         */
        add_action( 'wp_ajax_bookly_migrator_upgrade_bookly', function () {
            set_time_limit( 0 );

            $upgrader = new Upgrader();
            $source   = add_query_arg(
                array(
                    'purchase_code'    => stripslashes_deep( $_POST['pc'] ),
                    'bookly'           => '16.0',
                    'bookly-addon-pro' => '1.0',
                    'site_url'         => site_url(),
                ),
                'https://api.booking-wp-plugin.com/1.1/plugins/bookly-addon-pro/download'
            );
            $result = $upgrader
                ->addPlugin( 'bookly-responsive-appointment-booking-tool', null )
                ->addPlugin( 'bookly-addon-pro', $source )
                ->install();

            if ( $result && ! get_option( 'bookly_migration_started' ) ) {
                // Prepare options for new plugins.
                add_option( 'bookly_migration_started', 1 );
                if ( is_multisite() ) {
                    /** @var \wpdb $wpdb */
                    global $wpdb;

                    $basename = 'appointment-booking/main.php';
                    $results  = $wpdb->get_col( 'SELECT `blog_id` FROM ' . $wpdb->blogs );
                    $active   = is_plugin_active_for_network( $basename );
                    foreach ( $results as $blog_id ) {
                        if ( $active || in_array( $basename, get_blog_option( $blog_id, 'active_plugins', array() ) ) ) {
                            add_blog_option( $blog_id, 'bookly_pro_db_version', '1.0' );
                            add_blog_option( $blog_id, 'bookly_pro_installation_time', time() );
                            $options = array( 'data_loaded', 'grace_start', 'envato_purchase_code', );
                            foreach ( $options as $option ) {
                                add_blog_option( $blog_id, 'bookly_pro_' . $option, get_blog_option( $blog_id, 'bookly_' . $option ) );
                            }
                        }
                    }
                } else {
                    add_option( 'bookly_pro_db_version', '1.0' );
                    add_option( 'bookly_pro_installation_time', time() );
                    $options = array( 'data_loaded', 'grace_start', 'envato_purchase_code', );
                    foreach ( $options as $option ) {
                        add_option( 'bookly_pro_' . $option, get_option( 'bookly_' . $option ) );
                    }
                }
            }

            wp_send_json( array( 'success' => $result, 'error' => $upgrader->getErrorMessage() ) );
        } );

        /**
         * Activate Bookly.
         */
        add_action( 'wp_ajax_bookly_migrator_activate_bookly', function () {
            $network_wide = is_multisite() && is_plugin_active_for_network( 'appointment-booking/main.php' );
            activate_plugins( array( 'bookly-responsive-appointment-booking-tool/main.php', 'bookly-addon-pro/main.php' ), '', $network_wide );

            wp_send_json( array( 'success' => true ) );
        });

        /**
         * Upgrade add-ons.
         */
        add_action( 'wp_ajax_bookly_migrator_upgrade_addons', function () {
            set_time_limit( 0 );

            $addons = stripslashes_deep( $_POST['addons'] );

            $upgrader = new Upgrader();
            $to_activate = array();
            foreach ( $addons as $addon ) {
                if ( $addon['pc'] != '' ) {
                    $source = add_query_arg(
                        array(
                            'purchase_code'    => $addon['pc'],
                            'bookly'           => class_exists( '\Bookly\Lib\Plugin', false ) ? \Bookly\Lib\Plugin::getVersion() : '16.0',
                            'bookly-addon-pro' => class_exists( '\BooklyPro\Lib\Plugin', false ) ? \BooklyPro\Lib\Plugin::getVersion() : '1.0',
                            'site_url'         => site_url(),
                        ),
                        'https://api.booking-wp-plugin.com/1.1/plugins/' . $addon['slug'] . '/download'
                    );
                    $upgrader->addPlugin( $addon['slug'], $source );
                    if ( $addon['active'] ) {
                        $to_activate[] = $addon['slug'] . '/main.php';
                    }
                }
            }
            $result = $upgrader->upgrade();

            if ( $result ) {
                // Activate add-ons.
                $network_wide = is_multisite() && is_plugin_active_for_network( 'appointment-booking/main.php' );
                activate_plugins( $to_activate, '', $network_wide );
            }

            wp_send_json( array( 'success' => $result, 'error' => $upgrader->getErrorMessage() ) );
        } );

        /**
         * Delete old Bookly.
         */
        add_action( 'wp_ajax_bookly_migrator_delete_old_bookly', function () {
            set_time_limit( 0 );

            deactivate_plugins( array( 'appointment-booking/main.php' ) );
            $result = delete_plugins( array( 'appointment-booking/main.php' ) );
            if ( $result === true ) {
                wp_send_json( array( 'success' => true ) );
            } else if ( is_wp_error( $result ) ) {
                wp_send_json( array( 'success' => false, 'error' => implode( "\n", $result->get_error_messages() ) ) );
            }

            wp_send_json( array( 'success' => false, 'error' => __( 'Could not delete Bookly v15.2. Please delete it manually from WordPress Plugins page.', 'bookly-migrator' ) ) );
        } );
    }

    /**
     * Admin menu.
     */
    public static function addAdminMenu()
    {
        /** @var \WP_User $current_user */
        global $current_user;

        if ( $current_user->has_cap( 'administrator' ) ) {
            if ( get_option( 'bookly_migration_started' ) ) {
                $dynamic_position = '80.00000001';
                add_menu_page(
                    __( 'Bookly Migrator', 'bookly-migrator' ),
                    __( 'Bookly Migrator', 'bookly-migrator' ),
                    'manage_options',
                    'bookly-migrator',
                    array( __CLASS__, 'renderPage' ),
                    plugins_url( 'backend/resources/images/menu.png', dirname( dirname( __DIR__ ) ) . '/main.php' ),
                    $dynamic_position
                );
            } else {
                $badge_number = (int) ! get_user_meta( get_current_user_id(), 'bookly_migrator_page_visited', true );
                add_submenu_page(
                    'bookly-menu',
                    __( 'Migrator', 'bookly-migrator' ),
                    __( 'Migrator', 'bookly-migrator' ) . ( $badge_number ? sprintf( ' <span class="update-plugins count-%d"><span class="update-count">%d</span></span>', $badge_number, $badge_number ) : '' ),
                    'manage_options',
                    'bookly-migrator',
                    array( __CLASS__, 'renderPage' )
                );
            }
        }
    }

    /**
     * Render migrator page.
     */
    public static function renderPage()
    {
        global $wpdb;

        add_user_meta( get_current_user_id(), 'bookly_migrator_page_visited', 1 );

        $bookly_main_file = dirname( dirname( __DIR__ ) ) . '/main.php';

        wp_enqueue_style(
            'bookly-bootstrap-theme.min',
            plugins_url( 'backend/resources/bootstrap/css/bootstrap-theme.min.css', $bookly_main_file ),
            array(),
            '15.2'
        );
        wp_enqueue_script(
            'bookly-bootstrap.min',
            plugins_url( 'backend/resources/bootstrap/js/bootstrap.min.js', $bookly_main_file ),
            array( 'jquery' ),
            '15.2'
        );

        // Bookly.
        $bookly_upgraded = is_plugin_active( 'bookly-responsive-appointment-booking-tool/main.php' ) && is_plugin_active( 'bookly-addon-pro/main.php' );
        // Add-ons.
        $addons = array();
        $needle = array(
            'bookly-addon-2checkout' => '1.4',
            'bookly-addon-advanced-google-calendar' => '1.2',
            'bookly-addon-authorize-net' => '1.4',
            'bookly-addon-cart' => '1.2',
            'bookly-addon-chain-appointments' => '1.6',
            'bookly-addon-compound-services' => '1.4',
            'bookly-addon-coupons' => '1.4',
            'bookly-addon-custom-duration' => '1.1',
            'bookly-addon-custom-fields' => '1.4',
            'bookly-addon-customer-cabinet' => '1.2',
            'bookly-addon-customer-groups' => '1.4',
            'bookly-addon-customer-information' => '1.2',
            'bookly-addon-deposit-payments' => '2.1',
            'bookly-addon-files' => '1.3',
            'bookly-addon-google-maps-address' => '1.2',
            'bookly-addon-group-booking' => '1.2',
            'bookly-addon-invoices' => '1.2',
            'bookly-addon-locations' => '2.1',
            'bookly-addon-mollie' => '1.4',
            'bookly-addon-multiply-appointments' => '1.8',
            'bookly-addon-packages' => '1.7',
            'bookly-addon-paypal-payments-standard' => '1.7',
            'bookly-addon-payson' => '1.5',
            'bookly-addon-payu-biz' => '1.1',
            'bookly-addon-payu-latam' => '1.6',
            'bookly-addon-ratings' => '1.4',
            'bookly-addon-recurring-appointments' => '2.1',
            'bookly-addon-service-extras' => '2.1',
            'bookly-addon-service-schedule' => '1.9',
            'bookly-addon-special-days' => '2.3',
            'bookly-addon-special-hours' => '2.0',
            'bookly-addon-staff-cabinet' => '1.9',
            'bookly-addon-stripe' => '1.4',
            'bookly-addon-tasks' => '1.0',
            'bookly-addon-taxes' => '1.2',
            'bookly-addon-waiting-list' => '1.3',
        );
        foreach ( get_plugins() as $basename => $plugin ) {
            $slug = dirname( $basename );
            if ( isset ( $needle[ $slug ] ) && version_compare( $plugin['Version'], $needle[ $slug ], '<' ) ) {
                $addons[ $slug ] = array(
                    'name'   => $plugin['Name'],
                    'pc'     => get_option( str_replace( array( '-addon', '-' ), array( '', '_' ), $slug ) . '_envato_purchase_code' ),
                    'active' => is_plugin_active( $basename ),
                );
            }
        }
        // Cron.
        $tables = $wpdb->get_col( sprintf(
            'SELECT `TABLE_NAME` FROM `information_schema`.`TABLES`
              WHERE `TABLE_NAME` IN ("%1$sbookly_notifications","%1$sab_notifications")
                AND `TABLE_SCHEMA`=SCHEMA() ORDER BY `TABLE_NAME` DESC',
            $wpdb->prefix
        ) );
        $cron_step = ! empty ( $tables ) && $wpdb->get_row(
            'SELECT `id` FROM `' . $tables[0] .'`
                WHERE `active` = 1 AND `type` IN ("staff_agenda", "client_follow_up", "client_reminder", "client_reminder_1st", "client_reminder_2nd", "client_reminder_3rd", "client_birthday_greeting", "appointment_start_time", "customer_birthday", "last_appointment", "staff_day_agenda")',
            ARRAY_A
            );

        include dirname( __DIR__ ) . '/templates/migrator.php';
    }

    /**
     * Verify purchase code.
     *
     * @param string   $purchase_code
     * @param string   $slug
     * @param int|null $blog_id
     * @return array
     */
    public static function verifyPurchaseCode( $purchase_code, $slug, $blog_id = null )
    {
        $purchase_code = trim( $purchase_code );

        if ( $purchase_code == '' ) {
            return array(
                'valid'   => false,
                'message' => __( 'no purchase code', 'bookly-migrator' )
            );
        }

        $url = add_query_arg(
            array(
                'purchase_code' => $purchase_code,
                'site_url'      => get_site_url( $blog_id ),
            ),
            'https://api.booking-wp-plugin.com/1.0/plugins/' . $slug . '/purchase-code'
        );
        $response = wp_remote_get( $url, array(
            'timeout' => 25,
        ) );
        if ( $response instanceof \WP_Error ) {

        } else if ( isset( $response['body'] ) ) {
            $json = json_decode( $response['body'], true );
            if ( isset( $json['success'] ) ) {
                if ( (bool) $json['success'] ) {
                    return array(
                        'valid'   => true,
                        'message' => '',
                        );
                } else {
                    if ( isset ( $json['error'] ) ) {
                        switch ( $json['error'] ) {
                            case 'already_in_use':
                                return array(
                                    'valid'   => false,
                                    'message' => sprintf(
                                        __( '%s is used on another domain %s.<br/>In order to use the purchase code on this domain, please dissociate it in the admin panel of the other domain.<br/>If you do not have access to the admin area, please contact our technical support at support@bookly.info to transfer the license manually', 'bookly-migrator' ),
                                        $purchase_code,
                                        isset ( $json['data'] ) ? implode( ', ', $json['data'] ) : ''
                                    ),
                                );
                            case 'connection':
                                // ... Please try again later.
                                break;
                            case 'invalid':
                            default:
                                return array(
                                    'valid'   => false,
                                    'message' => __( 'not valid', 'bookly-migrator' ),
                                );
                        }
                    }
                }
            }
        }

        return array(
            'valid'   => false,
            'message' => __( 'Purchase code verification is temporarily unavailable. Please try again later', 'bookly-migrator' )
        );
    }

    /**
     * Uninstall plugin.
     */
    public static function uninstall()
    {
        delete_option( 'bookly_migration_started' );
        delete_option( 'bookly_grace_start' );
        delete_option( 'bookly_envato_purchase_code' );
        delete_option( 'bookly_migration_admin_reminder_after' );
        foreach ( get_users( array( 'role' => 'administrator' ) ) as $admin ) {
            delete_user_meta( $admin->ID, 'bookly_migrator_page_visited' );
            delete_user_meta( $admin->ID, 'bookly_dismiss_migrator_notice' );
        }
    }
}