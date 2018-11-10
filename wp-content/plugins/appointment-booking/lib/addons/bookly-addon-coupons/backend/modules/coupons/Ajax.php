<?php
namespace BooklyCoupons\Backend\Modules\Coupons;

use BooklyCoupons\Lib;
use Bookly\Lib as BooklyLib;

/**
 * Class Ajax
 * @package BooklyCoupons\Backend\Modules\Coupons
 */
class Ajax extends BooklyLib\Base\Ajax
{
     /**
     * Get coupons list
     */
    public static function getCoupons()
    {
        global $wpdb;

        $columns = self::parameter( 'columns' );
        $order   = self::parameter( 'order' );
        $filter  = self::parameter( 'filter' );

        $total = Lib\Entities\Coupon::query( 'c' )->count();

        $query = Lib\Entities\Coupon::query( 'c' )
            ->select( 'DISTINCT c.id' )
            ->leftJoin( 'CouponService', 'cs', 'cs.coupon_id = c.id' )
            ->leftJoin( 'CouponStaff', 'cst', 'cst.coupon_id = c.id' )
            ->leftJoin( 'CouponCustomer', 'cc', 'cc.coupon_id = c.id' );

        // Filters.
        if ( $filter['service'] != '' ) {
            $query->where( 'cs.service_id', $filter['service'] );
        }
        if ( $filter['staff'] != '' ) {
            $query->where( 'cst.staff_id', $filter['staff'] );
        }
        if ( $filter['customer'] != '' ) {
            $query->where( 'cc.customer_id', $filter['customer'] );
        }
        if ( $filter['only_active'] ) {
            $today = BooklyLib\Slots\DatePoint::now()->format( 'Y-m-d' );
            $query->whereRaw(
                'c.used < c.usage_limit AND (c.date_limit_start IS NULL OR %s >= c.date_limit_start) AND (c.date_limit_end IS NULL OR %s <= c.date_limit_end)',
                array( $today, $today )
            );
        }

        $ids = array();
        foreach ( $query->fetchArray() as $row ) {
            $ids[] = $row['id'];
        }

        $query = Lib\Entities\Coupon::query( 'c' )
            ->select( 'SQL_CALC_FOUND_ROWS c.*,
                GROUP_CONCAT(DISTINCT cs.service_id) AS service_ids,
                GROUP_CONCAT(DISTINCT cst.staff_id) AS staff_ids,
                GROUP_CONCAT(DISTINCT cc.customer_id) AS customer_ids,
                COUNT(DISTINCT cs.service_id) AS services_count,
                COUNT(DISTINCT cst.staff_id) AS staff_count,
                COUNT(DISTINCT cc.customer_id) AS customers_count'
            )
            ->leftJoin( 'CouponService', 'cs', 'cs.coupon_id = c.id' )
            ->leftJoin( 'CouponStaff', 'cst', 'cst.coupon_id = c.id' )
            ->leftJoin( 'CouponCustomer', 'cc', 'cc.coupon_id = c.id' )
            ->whereIn( 'c.id', $ids )
            ->groupBy( 'c.id' );

        foreach ( $order as $sort_by ) {
            $query
                ->sortBy( str_replace( '.', '_', $columns[ $sort_by['column'] ]['data'] ) )
                ->order( $sort_by['dir'] == 'desc' ? BooklyLib\Query::ORDER_DESCENDING : BooklyLib\Query::ORDER_ASCENDING );
        }

        $coupons = $query
            ->limit( self::parameter( 'length' ) )
            ->offset( self::parameter( 'start' ) )
            ->fetchArray();

        foreach ( $coupons as &$coupon ) {
            $coupon['service_ids']  = is_null( $coupon['service_ids'] )  ? array() : explode( ',', $coupon['service_ids'] );
            $coupon['staff_ids']    = is_null( $coupon['staff_ids'] )    ? array() : explode( ',', $coupon['staff_ids'] );
            $coupon['customer_ids'] = is_null( $coupon['customer_ids'] ) ? array() : explode( ',', $coupon['customer_ids'] );
            $coupon['date_limit_end_formatted'] = is_null( $coupon['date_limit_end'] ) ? '' : BooklyLib\Utils\DateTime::formatDate( $coupon['date_limit_end'] );
        }

        wp_send_json( array(
            'draw'            => (int) self::parameter( 'draw' ),
            'recordsTotal'    => $total,
            'recordsFiltered' => (int) $wpdb->get_var( 'SELECT FOUND_ROWS()' ),
            'data'            => $coupons,
        ) );
    }

    /**
     * Create/update coupon
     */
    public static function saveCoupon()
    {
        $params = array_map( function ( $value ) { return $value != '' ? $value : null; }, self::postParameters() );

        if ( $params['code'] === null ) {
            $params['code'] = '';
        }

        if ( $params['discount'] < 0 || $params['discount'] > 100 ) {
            wp_send_json_error( array( 'message' => __( 'Discount should be between 0 and 100.', 'bookly-coupons' ) ) );
        } else if ( $params['deduction'] < 0 ) {
            wp_send_json_error( array( 'message' => __( 'Deduction should be a positive number.', 'bookly-coupons' ) ) );
        } else if ( $params['min_appointments'] < 1 ) {
            wp_send_json_error( array( 'message' => __( 'Min appointments should be greater than zero.', 'bookly-coupons' ) ) );
        } else if ( $params['max_appointments'] !== null && $params['max_appointments'] < 1 ) {
            wp_send_json_error( array( 'message' => __( 'Max appointments should be greater than zero.', 'bookly-coupons' ) ) );
        } else {
            if ( isset ( $params['create_series'] ) ) {
                if ( $params['mask'] == '' ) {
                    wp_send_json_error( array( 'message' => __( 'Please enter a non empty mask.', 'bookly-coupons' ) ) );
                }
                try {
                    $codes = Lib\CodeGenerator::generateUniqueCodeSeries( $params['mask'], $params['amount'] );
                } catch ( \Exception $e ) {
                    wp_send_json_error( array( 'message' => sprintf(
                        __( 'It is not possible to generate %d codes for this mask. Only %d codes available.', 'bookly-coupons' ),
                        $params['amount'],
                        $e->getMessage()
                    ) ) );
                }
            } else {
                $codes = array( $params['code'] );
            }

            foreach ( $codes as $code ) {
                $params['code'] = $code;
                $form = new Forms\Coupon();
                $form->bind( $params );

                $coupon = $form->save();
                // Services.
                $service_ids = (array) self::parameter( 'service_ids' );
                if ( empty ( $service_ids ) ) {
                    Lib\Entities\CouponService::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->execute();
                } else {
                    Lib\Entities\CouponService::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->whereNotIn( 'service_id', $service_ids )
                        ->execute();
                    $existing_services = Lib\Entities\CouponService::query()
                        ->select( 'service_id' )
                        ->where( 'coupon_id', $coupon->getId() )
                        ->indexBy( 'service_id' )
                        ->fetchArray();
                    foreach ( $service_ids as $service_id ) {
                        if ( ! isset ( $existing_services[ $service_id ] ) ) {
                            $coupon_service = new Lib\Entities\CouponService();
                            $coupon_service
                                ->setCouponId( $coupon->getId() )
                                ->setServiceId( $service_id )
                                ->save();
                        }
                    }
                }
                // Staff.
                $staff_ids = (array) self::parameter( 'staff_ids' );
                if ( empty ( $staff_ids ) ) {
                    Lib\Entities\CouponStaff::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->execute();
                } else {
                    Lib\Entities\CouponStaff::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->whereNotIn( 'staff_id', $staff_ids )
                        ->execute();
                    $existing_staff = Lib\Entities\CouponStaff::query()
                        ->select( 'staff_id' )
                        ->where( 'coupon_id', $coupon->getId() )
                        ->indexBy( 'staff_id' )
                        ->fetchArray();
                    foreach ( $staff_ids as $staff_id ) {
                        if ( ! isset ( $existing_staff[ $staff_id ] ) ) {
                            $coupon_staff = new Lib\Entities\CouponStaff();
                            $coupon_staff
                                ->setCouponId( $coupon->getId() )
                                ->setStaffId( $staff_id )
                                ->save();
                        }
                    }
                }
                // Customers.
                $customer_ids = (array) self::parameter( 'customer_ids' );
                if ( empty ( $customer_ids ) ) {
                    Lib\Entities\CouponCustomer::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->execute();
                } else {
                    Lib\Entities\CouponCustomer::query()
                        ->delete()
                        ->where( 'coupon_id', $coupon->getId() )
                        ->whereNotIn( 'customer_id', $customer_ids )
                        ->execute();
                    $existing_customers = Lib\Entities\CouponCustomer::query()
                        ->select( 'customer_id' )
                        ->where( 'coupon_id', $coupon->getId() )
                        ->indexBy( 'customer_id' )
                        ->fetchArray();
                    foreach ( $customer_ids as $customer_id ) {
                        if ( ! isset ( $existing_customers[ $customer_id ] ) ) {
                            $coupon_customer = new Lib\Entities\CouponCustomer();
                            $coupon_customer
                                ->setCouponId( $coupon->getId() )
                                ->setCustomerId( $customer_id )
                                ->save();
                        }
                    }
                }
            }

            wp_send_json_success();
        }
    }

    /**
     * Generate code.
     */
    public static function generateCode()
    {
        $mask = self::parameter( 'mask' );

        if ( $mask == '' ) {
            $mask = get_option( 'bookly_coupons_default_code_mask' );
        }
        if ( $mask == '' ) {
            wp_send_json_error( array( 'message' => __( 'Please enter a non empty mask.', 'bookly-coupons' ) ) );
        }

        try {
            $code = Lib\CodeGenerator::generateUniqueCode( $mask );
        } catch ( \Exception $e ) {
            wp_send_json_error( array( 'message' => __( 'All possible codes have already been generated for this mask.', 'bookly-coupons' ) ) );
        }

        wp_send_json_success( compact( 'code' ) );
    }

    /**
     * Delete coupons.
     */
    public static function deleteCoupons()
    {
        $coupon_ids = array_map( 'intval', self::parameter( 'data', array() ) );
        Lib\Entities\Coupon::query()->delete()->whereIn( 'id', $coupon_ids )->execute();

        wp_send_json_success();
    }
}