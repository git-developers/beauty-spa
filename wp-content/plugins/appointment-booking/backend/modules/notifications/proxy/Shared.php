<?php
namespace Bookly\Backend\Modules\Notifications\Proxy;

use Bookly\Lib;
use Bookly\Backend\Modules\Notifications\Forms;

/**
 * Class Shared
 * @package Bookly\Backend\Modules\Notifications\Proxy
 *
 * @method static array buildNotificationCodesList( array $codes, string $notification_type, array $codes_data ) Build array of codes to be displayed in notification template.
 * @method static array prepareNotificationCodes( array $codes, string $type ) Alter codes for displaying in notification templates.
 * @method static array prepareNotificationTypes( array $types ) Prepare notification types.
 * @method static void  renderEmailNotifications( Forms\Notifications $form ) Render email notification(s).
 */
abstract class Shared extends Lib\Base\Proxy
{

}