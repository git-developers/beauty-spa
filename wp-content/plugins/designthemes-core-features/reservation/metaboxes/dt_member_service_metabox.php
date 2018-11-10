<?php global $post;
$services = get_post_meta( $post->ID, "_services", true );
$services = is_array( $services ) ? $services : array();

$cp_services = get_posts( array( 'post_type'=>'dt_services', 'posts_per_page'=>'-1' ) );
if ( $cp_services ) {

	foreach ( $cp_services as $cp_service ) {
		$id = $cp_service->ID;
		$title = $cp_service->post_title;
		$checked = in_array( $id, $services ) ? ' checked ': '';

		$info = get_post_meta( $id, "_info", true );
		$info = is_array( $info ) ? $info : array();
		$currency = dt_currency_symbol( dttheme_option( 'company', 'currency' ) );

		$price = array_key_exists( 'price', $info ) ? " ( {$currency} ".$info['price'] .' )' : "";?>
			<label> <input type="checkbox" name="_services[]" value="<?php echo esc_attr( $id ); ?>" <?php echo $checked;?> /> <?php echo $title.$price;?> </label> <br /><?php
	}
} else {
	echo '<h6>'.__( 'Add At least one service', 'text_domain' ).'</h6>';
}
?>