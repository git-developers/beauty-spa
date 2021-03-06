<?php
namespace Bookly\Backend\Components\Dialogs\Customer\Proxy;

use Bookly\Lib;

/**
 * Class CustomerInformation
 * @package Bookly\Backend\Components\Dialogs\Customer\Proxy
 *
 * @method static void renderCustomerDialog() Render 'Customer Information' row in edit customer dialog.
 * @method static array prepareCustomerFormData( array $params ) Prepare customer info fields before saving customer form.
 */
abstract class CustomerInformation extends Lib\Base\Proxy
{

}