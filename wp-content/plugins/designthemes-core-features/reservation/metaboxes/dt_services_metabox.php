<?php global $post;
	$info = get_post_meta( $post->ID, "_info", true );
	$info = is_array( $info ) ? $info : array();?>

<div class="custom-box">
	<div class="column one-sixth"><?php _e( 'Price', 'dt_themes' );?></div>
	<div class="column five-sixth last"><?php 
		$price = array_key_exists('price', $info) ? $info['price'] : "";?>
		<input type="text" name="_info[price]" class='small-text' value="<?php echo esc_attr( $price ); ?>" placeholder="<?php _e( 'Price','dt_themes');?>">
		<?php echo dt_currency_symbol( dttheme_option( 'company', 'currency' ) );?>
	</div>
</div>

<div class="custom-box">
	<div class="column one-sixth"><?php _e( 'Duration', 'dt_themes' );?></div>
	<div class="column five-sixth last">
		<select name="_info[duration]">
			<option value=""><?php _e('Select','dt_themes');?></option><?php
			$current = array_key_exists('duration', $info) ? $info['duration'] : "";
			for ( $i = 0; $i < 12; $i++ ) :
				for ( $j = 15; $j <= 60; $j += 15 ) :
					$duration = ( $i * 3600 ) + ( $j * 60 );
					$duration_output = durationToString( $duration );
					$selected = $current == $duration ? ' selected="selected"' : '';
					echo "<option value='{$duration}' {$selected}>{$duration_output}</option>";
				endfor;
			endfor;?>
		</select>
	</div>
</div>