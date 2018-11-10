<?php
namespace Bookly\Backend\Components\Notices;

use Bookly\Lib;
use Bookly\Backend\Modules;

/**
 * Class Migrator
 * @package Bookly\Backend\Components\Notices
 */
class Migrator extends Lib\Base\Component
{
    /**
     * Render Net Promoter Score notice.
     */
    public static function render()
    {
        if ( Lib\Utils\Common::isCurrentUserAdmin()
            && ! get_user_meta( get_current_user_id(), 'bookly_dismiss_migrator_notice', true )
            && $_REQUEST['page'] != 'bookly-migrator'
        ) {
            self::renderTemplate( 'migrator' );
        }
    }
}