<?php
namespace BooklyMigrator\Lib;

/**
 * Class UpgraderSkin
 * @package BooklyMigrator\Lib
 */
class UpgraderSkin extends \WP_Upgrader_Skin
{
    /** @var \WP_Error */
    protected $errors;

    /**
     * @inheritdoc
     */
    public function __construct( $args = array() )
    {
        parent::__construct( $args );

        $this->errors = new \WP_Error();
    }

    /**
     * @inheritdoc
     */
    public function error( $errors )
    {
        if ( is_string( $errors ) ) {
            $string = $errors;
            if ( ! empty( $this->upgrader->strings[ $string ] ) ) {
                $string = $this->upgrader->strings[ $string ];
            }

            if ( false !== strpos( $string, '%' ) ) {
                $args = func_get_args();
                $args = array_splice( $args, 1 );
                if ( ! empty( $args ) ) {
                    $string = vsprintf( $string, $args );
                }
            }

            // Count existing errors to generate an unique error code.
            $errors_count = count( $this->errors->get_error_codes() );
            $this->errors->add( 'unknown_upgrade_error_' . ( $errors_count + 1 ) , $string );
        } elseif ( is_wp_error( $errors ) ) {
            foreach ( $errors->get_error_codes() as $error_code ) {
                $this->errors->add( $error_code, $errors->get_error_message( $error_code ), $errors->get_error_data( $error_code ) );
            }
        }

        $args = func_get_args();
        call_user_func_array( array( $this, 'parent::error' ), $args );
    }

    /**
     * Retrieves a string for error messages.
     *
     * @return array Error messages during an upgrade.
     */
    public function get_error_messages()
    {
        $messages = array();

        foreach ( $this->errors->get_error_codes() as $error_code ) {
            if ( $this->errors->get_error_data( $error_code ) && is_string( $this->errors->get_error_data( $error_code ) ) ) {
                $messages[] = $this->errors->get_error_message( $error_code ) . ' ' . esc_html( strip_tags( $this->errors->get_error_data( $error_code ) ) );
            } else {
                $messages[] = $this->errors->get_error_message( $error_code );
            }
        }

        return $messages;
    }

    /**
     * @inheritdoc
     */
    public function feedback( $data )
    {
    }

    /**
     * @inheritdoc
     */
    public function header()
    {
    }

    /**
     * @inheritdoc
     */
    public function footer()
    {
    }
}
