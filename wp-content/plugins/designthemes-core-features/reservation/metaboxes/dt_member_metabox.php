<?php global $post;
	$info = get_post_meta( $post->ID, "_info", true );
	$info = is_array( $info ) ? $info : array();

	$price = array_key_exists('price', $info) ? $info['price'] : "";
	$emailid = array_key_exists('emailid', $info) ? $info['emailid'] : "";?>

<div class="custom-box">
	<div class="column one-sixth"><?php _e( 'Price', 'dt_themes' );?></div>
	<div class="column five-sixth last">
		<input type="text" name="_info[price]" class='small-text' value="<?php echo esc_attr( $price ); ?>">
		<?php echo dt_currency_symbol( dttheme_option( 'company', 'currency' ) );?>
	</div>
</div>

<div class="custom-box">
	<div class="column one-sixth"><?php _e( 'Email Id', 'dt_themes' );?></div>
	<div class="column five-sixth last">
		<input type="text" name="_info[emailid]" class='regular-text' value="<?php echo esc_attr( $emailid ); ?>">
	</div>
</div>