<?php
namespace BooklyMigrator\Lib;

/**
 * Class Upgrader
 * @package BooklyMigrator\Lib
 */
class Upgrader
{
    /** @var array  */
    protected $plugins = array();

    /** @var array  */
    protected $errors = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        if ( ! function_exists( 'plugins_api' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        }
        if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        }
    }

    /**
     * Add plugin to installation list.
     *
     * @param string $slug
     * @param string $source
     *
     * @return $this
     */
    public function addPlugin( $slug, $source = null )
    {
        $this->plugins[] = compact( 'slug', 'source' );

        return $this;
    }

    /**
     * Install plugins.
     *
     * @return bool
     */
    public function install()
    {
        $installed_plugins = get_plugins();

        foreach ( $this->plugins as $plugin ) {
            $basename = $plugin['slug'] . '/main.php';
            if ( ! array_key_exists( $basename, $installed_plugins ) ) {
                if ( $plugin['source'] ) {
                    $source = $plugin['source'];
                } else if ( $plugin['slug'] ) {
                    $response = plugins_api(
                        'plugin_information',
                        array(
                            'slug'   => $plugin['slug'],
                            'fields' => array(
                                'sections' => false,
                            ),
                        )
                    );
                    $source = is_wp_error( $response ) ? false : $response->download_link;
                }
                if ( $source ) {
                    $skin     = new UpgraderSkin();
                    $upgrader = new \Plugin_Upgrader( $skin );

                    if ( $upgrader->install( $source ) !== true ) {
                        $this->errors[ $plugin['slug'] ] = implode( "\n", $skin->get_error_messages() );
                        continue;
                    }
                } else {
                    $this->errors[ $plugin['slug'] ] = sprintf( __( 'Plugin %s not found', 'bookly' ), $plugin['slug'] );
                }
            }
        }

        return empty ( $this->errors );
    }

    /**
     * Upgrade plugins.
     *
     * @return bool
     */
    public function upgrade()
    {
        foreach ( $this->plugins as $plugin ) {
            if ( $plugin['source'] ) {
                $source = $plugin['source'];
            } else if ( $plugin['slug'] ) {
                $response = plugins_api(
                    'plugin_information',
                    array(
                        'slug'   => $plugin['slug'],
                        'fields' => array(
                            'sections' => false,
                        ),
                    )
                );
                $source = is_wp_error( $response ) ? false : $response->download_link;
            }
            if ( $source ) {
                $skin     = new UpgraderSkin();
                $upgrader = new \Plugin_Upgrader( $skin );

                $upgrader->init();
                $upgrader->upgrade_strings();

                $upgrader->run( array(
                    'package' => $source,
                    'destination' => WP_PLUGIN_DIR,
                    'clear_destination' => true,
                    'clear_working' => true,
                    'hook_extra' => array(
                        'plugin' => $plugin['slug'] . '/main.php',
                        'type' => 'plugin',
                        'action' => 'update',
                    ),
                ) );

                if ( ! $upgrader->result || is_wp_error( $upgrader->result ) ) {
                    $this->errors[ $plugin['slug'] ] = implode( "\n", $skin->get_error_messages() );
                    continue;
                }

                // Force refresh of plugin update information
                wp_clean_plugins_cache();
            } else {
                $this->errors[ $plugin['slug'] ] = sprintf( __( 'Plugin %s not found', 'bookly' ), $plugin['slug'] );
            }
        }

        return empty ( $this->errors );
    }

    /**
     * Get single error message string.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return implode( "\n\n", $this->errors );
    }
}