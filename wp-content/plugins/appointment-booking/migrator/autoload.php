<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Bookly Migrator autoload.
 * @param $class
 */
function bookly_migrator_loader( $class )
{
    if ( preg_match( '/^BooklyMigrator\\\\(.+)?([^\\\\]+)$/U', ltrim( $class, '\\' ), $match ) ) {
        $file = __DIR__ . DIRECTORY_SEPARATOR
                . strtolower( str_replace( '\\', DIRECTORY_SEPARATOR, preg_replace( '/([a-z])([A-Z])/', '$1_$2', $match[1] ) ) )
                . $match[2]
                . '.php';
        if ( is_readable( $file ) ) {
            require_once $file;
        }
    }
}
spl_autoload_register( 'bookly_migrator_loader', true, true );