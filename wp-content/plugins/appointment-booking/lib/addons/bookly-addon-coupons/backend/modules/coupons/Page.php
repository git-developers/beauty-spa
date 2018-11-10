<?php
namespace BooklyCoupons\Backend\Modules\Coupons;

use Bookly\Lib as BooklyLib;

/**
 * Class Page
 * @package BooklyCoupons\Backend\Modules\Coupons
 */
class Page extends BooklyLib\Base\Component
{
    /**
     * Render page.
     */
    public static function render()
    {
        /** @var \WP_Locale $wp_locale */
        global $wp_locale;

        self::enqueueStyles( array(
            'bookly' => array(
                'backend/resources/bootstrap/css/bootstrap-theme.min.css',
                'backend/resources/css/jquery-ui-theme/jquery-ui.min.css',
                'backend/resources/css/select2.min.css',
                'frontend/resources/css/ladda.min.css',
            ),
        ) );

        self::enqueueScripts( array(
            'bookly' => array(
                'backend/resources/bootstrap/js/bootstrap.min.js' => array( 'jquery' ),
                'backend/resources/js/datatables.min.js' => array( 'jquery' ),
                'backend/resources/js/select2.full.min.js' => array( 'jquery' ),
                'backend/resources/js/help.js' => array( 'jquery' ),
                'frontend/resources/js/spin.min.js'  => array( 'jquery' ),
                'frontend/resources/js/ladda.min.js' => array( 'jquery' ),
            ),
            'module' => array( 'js/coupons.js' => array( 'jquery', 'jquery-ui-datepicker' ) )
        ) );

        $services = BooklyLib\Entities\Service::query()
            ->select( 'id, title' )
            ->whereNot( 'type', BooklyLib\Entities\Service::TYPE_PACKAGE )
            ->indexBy( 'id' )
            ->fetchArray();
        $staff_members = BooklyLib\Entities\Staff::query()
            ->select( 'id, full_name AS title' )
            ->indexBy( 'id' )
            ->fetchArray();
        $customers = array();
        /** @var BooklyLib\Entities\Customer $customer */
        foreach ( BooklyLib\Entities\Customer::query()->sortBy( 'full_name' )->find() as $customer ) {
            $name = $customer->getFullName();
            if ( $customer->getEmail() != '' || $customer->getPhone() != '' ) {
                $name .= ' (' . trim( $customer->getEmail() . ', ' . $customer->getPhone(), ', ' ) . ')';
            }
            $customers[ $customer->getId() ] = array( 'id' => $customer->getId(), 'name' => $name );
        }

        wp_localize_script( 'bookly-coupons.js', 'BooklyCouponL10n', array(
            'csrfToken'   => BooklyLib\Utils\Common::getCsrfToken(),
            'edit'        => __( 'Edit', 'bookly-coupons' ),
            'duplicate'   => __( 'Duplicate', 'bookly-coupons' ),
            'zeroRecords' => __( 'No coupons found.', 'bookly-coupons' ),
            'processing'  => __( 'Processing...', 'bookly-coupons' ),
            'areYouSure'  => __( 'Are you sure?', 'bookly-coupons' ),
            'dateOptions' => array(
                'dateFormat'      => BooklyLib\Utils\DateTime::convertFormat( 'date', BooklyLib\Utils\DateTime::FORMAT_JQUERY_DATEPICKER ),
                'monthNamesShort' => array_values( $wp_locale->month_abbrev ),
                'monthNames'      => array_values( $wp_locale->month ),
                'dayNamesMin'     => array_values( $wp_locale->weekday_abbrev ),
                'longDays'        => array_values( $wp_locale->weekday ),
                'firstDay'        => (int) get_option( 'start_of_week' ),
            ),
            'noResultFound'  => __( 'No result found', 'bookly-coupons' ),
            'removeCustomer' => __( 'Remove customer', 'bookly-coupons' ),
            'services' => array(
                'allSelected'     => __( 'All services', 'bookly-coupons' ),
                'nothingSelected' => __( 'No service selected', 'bookly-coupons' ),
                'collection'      => $services,
            ),
            'staff' => array(
                'allSelected'     => __( 'All staff', 'bookly-coupons' ),
                'nothingSelected' => __( 'No staff selected', 'bookly-coupons' ),
                'collection'      => $staff_members,
            ),
            'customers' => array(
                'allSelected'     => __( 'All customers', 'bookly-coupons' ),
                'nothingSelected' => __( 'No limit', 'bookly-coupons' ),
                'collection'      => $customers,
            ),
            'defaultCodeMask'     => get_option( 'bookly_coupons_default_code_mask' ),
        ) );

        self::renderTemplate( 'index', compact( 'services', 'staff_members', 'customers' ) );
    }
}