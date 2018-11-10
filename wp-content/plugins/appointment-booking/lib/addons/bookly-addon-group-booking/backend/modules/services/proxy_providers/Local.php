<?php
namespace BooklyGroupBooking\Backend\Modules\Services\ProxyProviders;

use Bookly\Backend\Modules\Services\Proxy;

/**
 * Class Shared
 * @package BooklyGroupBooking\Backend\Modules\Services
 */
class Local extends Proxy\GroupBooking
{
    /**
     * @inheritdoc
     */
    public static function renderCapacity( array $service )
    {
        self::renderTemplate( 'capacity', compact( 'service' ) );
    }

}