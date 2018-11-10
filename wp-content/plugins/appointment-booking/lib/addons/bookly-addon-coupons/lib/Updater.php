<?php
namespace BooklyCoupons\Lib;

use Bookly\Lib as BooklyLib;

/**
 * Class Updates
 * @package BooklyCoupons\Lib
 */
class Updater extends BooklyLib\Base\Updater
{
    public function update_1_1()
    {
        /** @global \wpdb $wpdb */
        global $wpdb;

        add_option( 'bookly_coupons_default_code_mask', 'COUPON-****' );

        $this->alterTables( array(
            'ab_coupons' => array(
                'ALTER TABLE `%s` ADD COLUMN `once_per_customer` TINYINT(1) NOT NULL DEFAULT 0',
                'ALTER TABLE `%s` ADD COLUMN `date_limit_start` DATE DEFAULT NULL',
                'ALTER TABLE `%s` ADD COLUMN `date_limit_end` DATE DEFAULT NULL',
                'ALTER TABLE `%s` ADD COLUMN `min_appointments` INT UNSIGNED NOT NULL DEFAULT 1',
                'ALTER TABLE `%s` ADD COLUMN `max_appointments` INT UNSIGNED DEFAULT NULL',
            ),
        ) );

        $wpdb->query(
            'ALTER TABLE `' . $this->getTableName( 'ab_payments' ) . '`
             ADD CONSTRAINT
                FOREIGN KEY (coupon_id)
                REFERENCES ' . $this->getTableName( 'ab_coupons' ) . '(id)
                ON DELETE SET NULL
                ON UPDATE CASCADE'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . $this->getTableName( 'ab_coupon_staff' ) . '` (
                `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `coupon_id` INT UNSIGNED NOT NULL,
                `staff_id`  INT UNSIGNED NOT NULL,
                CONSTRAINT
                    FOREIGN KEY (coupon_id)
                    REFERENCES  ' . $this->getTableName( 'ab_coupons' ) . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT
                    FOREIGN KEY (staff_id)
                    REFERENCES  ' . $this->getTableName( 'ab_staff' ) . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );

        $wpdb->query(
            'CREATE TABLE IF NOT EXISTS `' . $this->getTableName( 'ab_coupon_customers' ) . '` (
                `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `coupon_id`   INT UNSIGNED NOT NULL,
                `customer_id` INT UNSIGNED NOT NULL,
                CONSTRAINT
                    FOREIGN KEY (coupon_id)
                    REFERENCES  ' . $this->getTableName( 'ab_coupons' ) . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE,
                CONSTRAINT
                    FOREIGN KEY (customer_id)
                    REFERENCES  ' . $this->getTableName( 'ab_customers' ) . '(id)
                    ON DELETE   CASCADE
                    ON UPDATE   CASCADE
            ) ENGINE = INNODB
            DEFAULT CHARACTER SET = utf8
            COLLATE = utf8_general_ci'
        );
    }
}