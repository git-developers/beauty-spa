<?php
namespace Bookly2checkout\Lib;

/**
 * Class Updates
 * @package Bookly2checkout\Lib
 */
class Updater extends \Bookly\Lib\Base\Updater
{
    public function update_1_2()
    {
        add_option( 'bookly_2checkout_send_tax', '0' );
    }

    public function update_1_1()
    {
        add_option( 'bookly_2checkout_increase', '0' );
        add_option( 'bookly_2checkout_addition', '0' );
    }
}