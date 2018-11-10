<?php global $post;
	$info = get_post_meta( $post->ID, "_info", true );
	$info = is_array( $info ) ? $info : array();

	$phone = array_key_exists( 'phone', $info ) ? $info['phone'] : "";
	$emailid = array_key_exists( 'emailid', $info ) ? $info['emailid'] : "";?>

	<div class="custom-box">
		<div class="column one-sixth"><?php _e( 'Email Id', 'dt_themes' );?></div>
		<div class="column five-sixth last">
			<input type="text" name="_info[emailid]" class='regular-text' value="<?php echo esc_attr( $emailid ); ?>">
		</div>
	</div>

	<div class="custom-box">
		<div class="column one-sixth"><?php _e( 'phone', 'dt_themes' );?></div>
		<div class="column five-sixth last">
		<input type="text" name="_info[phone]" class='regular-text' value="<?php echo esc_attr( $phone ); ?>">
	</div>
</div>