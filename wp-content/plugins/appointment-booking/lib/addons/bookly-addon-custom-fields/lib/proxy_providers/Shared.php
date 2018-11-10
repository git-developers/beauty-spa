<?php
namespace BooklyCustomFields\Lib\ProxyProviders;

use Bookly\Lib as BooklyLib;
use Bookly\Lib\NotificationCodes;

/**
 * Class Shared
 * @package BooklyCustomFields\Lib\ProxyProviders
 */
class Shared extends BooklyLib\Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function prepareNotificationCodesForOrder( NotificationCodes $codes )
    {
        $codes->custom_fields    = Local::getFormatted( $codes->getItem()->getCA(), 'text' );
        $codes->custom_fields_2c = Local::getFormatted( $codes->getItem()->getCA(), 'html' );
    }

    /**
     * @inheritdoc
     */
    public static function prepareReplaceCodes( array $codes, NotificationCodes $notification_codes, $format )
    {
        $codes['{custom_fields}']    = $notification_codes->custom_fields;
        $codes['{custom_fields_2c}'] = $format == 'html' ? $notification_codes->custom_fields_2c : $notification_codes->custom_fields;

        return $codes;
    }
}