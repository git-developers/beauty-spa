<?php get_header();?>
<?php $page_layout  = dttheme_option( 'specialty', 'catalog-archives-layout' );
	$page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
	
	$post_layout = dttheme_option( 'specialty', 'catalog-archives-post-layout' );
	$post_layout  = !empty( $post_layout ) ? $post_layout : "one-column";
	  
	  $show_sidebar = false;
	  $sidebar_class = "";
	  $post_class = "";
	  $columns = NULL;
	  
	#TO SET PAGE LAYOUT
	switch($page_layout):
		case 'with-left-sidebar':
			$page_class = $page_layout;
			$show_sidebar = true;
			$sidebar_class = "left-sidebar";
		break;

		case 'with-right-sidebar':
			$show_sidebar = true;
			$sidebar_class = "right-sidebar";
		break;
	endswitch;
	
	#TO SET POST LAYOUT
	switch($post_layout):
		case 'one-column':
			$post_class = $show_sidebar ? " catalog column dt-sc-one-column " : " catalog column dt-sc-one-column ";
		break;
		
		case 'one-half-column';
			$post_class = $show_sidebar ? " catalog column dt-sc-one-half" : " catalog column dt-sc-one-half ";
			$columns = 2;
		break;
		
	endswitch;?>
    
      <!-- **Primary Section** -->
      <section id="primary" class="catalog <?php echo $page_layout;?>">
<?php	if( have_posts() ):
			$i = 1;
			while( have_posts() ):
				the_post();
				$the_id = get_the_ID();

				if($post_layout == 'one-column'):
					$item_meta = get_post_meta($post->ID, '_catalog_settings', true);
					$subtitle = isset( $item_meta['subtitle']) ? $item_meta['subtitle'] : NULL;
					$price = isset( $item_meta['price']) ? $item_meta['price'] : NULL;
					$link = isset( $item_meta['link']) ? $item_meta['link'] : NULL; ?>
					
					<article class="menu-list">
						<div class="menu-thumb">
							<?php if(has_post_thumbnail()): ?>
								<span class="rounded">
									<?php the_post_thumbnail("full"); ?>
								</span>
							<?php endif; ?>    
						</div>
						<div class="menu-details">
							<div class="menu-title">
								<h3><?php the_title(); ?></h3>
								<?php if(!empty($subtitle)): ?><span><?php echo esc_html($subtitle); ?></span><?php endif; ?>
								<?php if(!empty($price)): ?><a class="price dt-sc-button small" href="<?php echo esc_attr( $link ); ?>"><?php echo esc_html($price); ?></a><?php endif; ?>
							</div>
							<?php the_content(); ?>
						</div>
					</article><?php			
				elseif($post_layout == 'one-half-column'):
					  $temp_class = "";
					  if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				      if($i == $columns) $i = 1; else $i = $i + 1;
							
					  //TWO COLUMN...
					  $item_meta = get_post_meta($the_id, '_catalog_settings', true);
					  $subtitle = isset( $item_meta['subtitle']) ? $item_meta['subtitle'] : NULL;
					  $price = isset( $item_meta['price']) ? $item_meta['price'] : NULL;
					  $link = isset( $item_meta['link']) ? $item_meta['link'] : NULL; ?>
					  
					  <div class="dt-sc-one-half column <?php echo $temp_class; ?>">
						  <div class="dt-sc-catalog-menu">
							  <?php if(has_post_thumbnail()): ?>
							  <span class="rounded">
								  <?php the_post_thumbnail("full"); ?>
							  </span>
							  <?php endif; ?>
							  <h5><?php the_title(); ?></h5>
							  <?php if(!empty($price)): ?><a class="price dt-sc-button small" href="<?php echo esc_attr( $link ); ?>"><?php echo $price; ?></a><?php endif; ?>
						  </div>
					  </div><?php
				endif; 
				endwhile;
        else: ?>
			<h2><?php _e('Nothing Found.', 'dt_themes'); ?></h2>
			<p><?php _e('Apologies, but no results were found for the requested archive.', 'dt_themes'); ?></p><?php
        endif;?>
      </section><!-- **Primary Section** -->
        
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>
          
<?php get_footer();?>