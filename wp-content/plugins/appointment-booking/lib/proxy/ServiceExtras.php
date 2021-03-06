<?php
namespace Bookly\Lib\Proxy;

use Bookly\Lib;

/**
 * Class ServiceExtras
 * @package Bookly\Lib\Proxy
 *
 * @method static \BooklyServiceExtras\Lib\Entities\ServiceExtra[] findByIds( array $extras_ids ) Return extras entities.
 * @method static \BooklyServiceExtras\Lib\Entities\ServiceExtra[] findByServiceId( int $service_id ) Return extras entities.
 * @method static \BooklyServiceExtras\Lib\Entities\ServiceExtra[] findAll() Return all extras entities.
 * @method static array getInfo( array $extras, bool $translate, string $locale = null ) Get extras data for given json data of appointment.
 * @method static int getTotalDuration( array $extras )  Get total duration of given extras.
 * @method static float getTotalPrice( array $extras )  Get total price if given extras.
 * @method static float prepareServicePrice( $default, $service_price, $nop, array $extras )  Prepare total price of a service with given original service price, number of persons and set of extras.
 */
abstract class ServiceExtras extends Lib\Base\Proxy
{

}