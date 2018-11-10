<?php
namespace BooklyPayuLatam\Backend\Modules\Appearance\ProxyProviders;

use Bookly\Backend\Modules\Appearance\Proxy;

/**
 * Class Shared
 * @package BooklyPayuLatam\Backend\Modules\Appearance\ProxyProviders
 */
class Shared extends Proxy\Shared
{
    /**
     * @inheritdoc
     */
    public static function showCreditCard( $required )
    {
        return true;
    }
}