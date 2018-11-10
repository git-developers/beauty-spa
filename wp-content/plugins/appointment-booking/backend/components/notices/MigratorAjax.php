<?php
namespace Bookly\Backend\Components\Notices;

use Bookly\Lib;
use Bookly\Backend\Modules;

/**
 * Class MigratorAjax
 * @package Bookly\Backend\Components\Notices
 */
class MigratorAjax extends Lib\Base\Ajax
{
    /**
     * Dismiss migrator notice.
     */
    public static function dismissMigratorNotice()
    {
        update_user_meta( get_current_user_id(), 'bookly_dismiss_migrator_notice', 1 );

        wp_send_json_success();
    }
}