<?php
#Gift field...
add_action( 'product_type_options', 'wc_gift_product_field' );
function wc_gift_product_field($types) {

	$types['gift'] = array('id' => '_gift', 
							'wrapper_class' => 'show_if_simple',
							'label' => __( 'Gift', 'dt_themes'),
							'description' => __( 'Gift products.', 'dt_themes'));
	return $types;
}

#Save product...
add_action( 'save_post', 'wc_gift_save_product');
function wc_gift_save_product( $product_id ) {
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	return;
	
	$is_gift = isset( $_POST['_gift'] ) ? 'yes' : 'no';
	update_post_meta($product_id, '_gift', $is_gift);
	update_post_meta($product_id, '_visibility', ($is_gift == 'yes') ? 'hidden' : 'visible');
}

#Gift product shortcode...
function dt_sc_gift_products($atts, $content = null) {
	extract(shortcode_atts(array(
		'limit' => '-1',
		'posts_column' => 'one-fourth-column',	// one-half-column, one-third-column, one-fourth-column
		'category_slug' => '',  // Slugs
	), $atts));
	
	global $post;

	$meta_set = get_post_meta(get_queried_object_id(), '_tpl_default_settings', true);
	$page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : 'content-full-width';
	$post_layout = $posts_column;
	
	$article_class = "";
	$feature_image = "product-full";
	$column = ""; $out = "";

	//POST LAYOUT CHECK...
	if($post_layout == "one-half-column") {
		$article_class = "column dt-sc-one-half";
		$column = 2;
	}
	elseif($post_layout == "one-third-column") {
		$article_class = "column dt-sc-one-third";
		$column = 3;
	}
	elseif($post_layout == "one-fourth-column") {
		$article_class = "column dt-sc-one-fourth";
		$column = 4;
	}
	
	//PAGE LAYOUT CHECK...
	if($page_layout != "content-full-width") {
		$article_class = $article_class." with-sidebar";
	}
	
	$meta_query = array('relation' => 'AND',
				array('key' => '_visibility', 'value' => 'hidden', 'compare' => '='),
				array('key' => '_gift', 'value' => 'yes', 'compare' => '='),
	);
	
	$args = array(
				'post_type' => 'product', 
				'posts_per_page' => $limit, 
				'meta_query' => $meta_query,
				'product_cat' => $category_slug  
	);
	
	
	
	$the_query = new WP_Query($args);
	
	if($the_query->have_posts()): $i = 1;
	  while($the_query->have_posts()): $the_query->the_post();
		
		$temp_class = "";
		
		if($i == 1) $temp_class = $article_class." first"; else $temp_class = $article_class;
		if($i == $column) $i = 1; else $i = $i + 1;
		
			$out .= '<div class="'.$temp_class.'">';
				$out .= '<div class="dt-sc-gift-cards">';
				
					$out .= '<div class="dt-sc-gift product id_'.get_the_ID().'">';
							if(get_post_meta(get_the_ID(), '_sale_price', true)):
								
								ob_start();
								woocommerce_template_loop_price();
								$price = ob_get_clean();
								
								$out .= $price;
							endif;
						
						$out .= '<div class="product-thumb">';
							$out .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
								$attr = array('title' => get_the_title()); $out .= get_the_post_thumbnail(get_the_ID(), 'full', $attr);
								$out .= '<span class="img-overlay"></span>';
							$out .= '</a>';
						$out .= '</div>';
						
						$out .= '<div class="product-details">';
							$out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a> </h4>';
							$out .= '<a href="'.get_permalink().'" target="_self" class="dt-sc-button small gift">'.__('Select', 'dt_themes').'</a>';
						$out .= '</div>';
					$out .= '</div>';
				
				$out .= '</div>';
			$out .= '</div>';
	  endwhile;
	  
	  else:
			_e("Apologies, but no results were found for the requested archive","dt_themes");
			
	  wp_reset_query($the_query);
	endif;  

	return $out;
}
add_shortcode('dt_sc_gift_products', 'dt_sc_gift_products');

#Adding new form fields...
add_action('woocommerce_before_order_notes','wc_gift_before_order_notes');
function wc_gift_before_order_notes() {
	
	global $woocommerce;
	
	$exists_gift = false;
	foreach($woocommerce->cart->get_cart() as $cart_item_key => $p)
	{
		$gift = get_post_meta($p['product_id'], '_gift', 1);
		if( $gift == 'yes' ) {
			$exists_gift = true;
			break;
		}
	}
	if( !$exists_gift )
		return false; ?>

	<div style="clear:both;"></div>
    <div class="dt-sc-hr-invisible-small"></div>
	<h3><?php _e('I\'m sending this Gift Card to someone', 'dt_themes') ;?></h3>
	<p class="form-row form-row-first">
		<label><?php _e('Receiver name' , 'dt_themes'); ?></label>
		<input type="text" class="input-text" name="gift_receipt_name" />
	</p>
	<p class="form-row form-row-last">
		<label><?php _e('Receiver email' , 'dt_themes'); ?></label>
		<input type="text" class="input-text" name="gift_receipt_email" />
	</p>
	<p class="form-row form-row-wide">
		<label><?php _e('Message to Receiver' , 'dt_themes'); ?></label>
		<textarea style="height:100px;" name="gift_receipt_msg"></textarea>
	</p><?php
}

#Updating order meta...
add_action('woocommerce_checkout_update_order_meta', 'wc_gift_checkout_update_order_meta');
function wc_gift_checkout_update_order_meta($order_id) {

	update_post_meta($order_id, '_gift_receiver_name', trim(@$_POST['gift_receipt_name']));
	update_post_meta($order_id, '_gift_receiver_email', trim(@$_POST['gift_receipt_email']));
	update_post_meta($order_id, '_gift_receiver_msg', trim(@$_POST['gift_receipt_msg']));
}

#Update when order processing / complete...
add_action('woocommerce_order_status_completed', 'wc_gift_payment_complete');
add_action('woocommerce_order_status_processing', 'wc_gift_payment_complete');
function wc_gift_payment_complete($order_id) {
	
	$order = new WC_Order($order_id);
	$rname =  get_post_meta($order_id, '_gift_receiver_name', 1);
	$remail = get_post_meta($order_id, '_gift_receiver_email', 1);
	$rmsg = get_post_meta($order_id, '_gift_receiver_msg', 1);
	$email_tpl = dttheme_option('woo', 'gcemail-template');
	$subject = dttheme_option('woo', 'gcemail-subject');
	$customer = new WP_User(get_post_meta($order_id, '_customer_user', 1));
	$to = empty($remail) ? $order->billing_email : $remail;
	$message = str_replace('[receiver_name]', empty($rname) ? sprintf("%s %s", $order->billing_first_name, $order->billing_last_name) : $rname, $email_tpl);
	$coupons = $is_gift = '';
	
	foreach($order->get_items() as $item_id => $item)
	{
		$is_gift = get_post_meta($item['product_id'], '_gift', 1);
		if( $is_gift != 'yes' ) continue;

		$blogname = get_bloginfo();
		$giftname = $item['name'];
		$message = str_replace('[gift_name]', $giftname, $message);
		$message = str_replace('[blog_name]', $blogname, $message);
		$message = str_replace('[additional_message]', $rmsg, $message);
		$message = str_replace('[fname]', $order->billing_first_name, $message);
		$message = str_replace('[lname]', $order->billing_last_name, $message);		
	}
	if( $is_gift == 'yes' ) {

		$subject = $subject.' '.$order->billing_first_name;
		wp_mail($to,$subject, $message, array("From: $blogname <no-reply@nodomain.com>"));
	}
}
#Allow html type content while sending mail.
add_filter( 'wp_mail_content_type', 'wc_gift_set_html_content_type' );
function wc_gift_set_html_content_type() {
	return 'text/html';
}
?>