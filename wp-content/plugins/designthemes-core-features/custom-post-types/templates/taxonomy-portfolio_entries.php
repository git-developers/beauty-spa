<?php get_header();?>
<?php $page_layout  = dttheme_option( 'specialty', 'gallery-archives-layout' );
	$page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
	
	$post_layout = dttheme_option( 'specialty', 'gallery-archives-post-layout' );
	$post_layout  = !empty( $post_layout ) ? $post_layout : "one-column";
	  
	  $show_sidebar = false;
	  $sidebar_class = "";
	  $post_class = "";
	  $columns = NULL;
	  $post_thumbnail = 'gallery';
	  
	#TO SET PAGE LAYOUT
	switch($page_layout):
		case 'with-left-sidebar':
			$page_class = $page_layout;
			$show_sidebar = true;
			$sidebar_class = "left-sidebar";
			$page_layout .= " with-sidebar ";
		break;

		case 'with-right-sidebar':
			$show_sidebar = true;
			$sidebar_class = "right-sidebar";
			$page_layout .= " with-sidebar ";
		break;
	endswitch;
	
	#TO SET POST LAYOUT
	switch($post_layout):
		case 'one-column':
			if($show_sidebar){
				$post_class =  "  portfolio column dt-sc-one-column with-sidebar ";
				$post_thumbnail = "gallery-default-one-col-wit-sidebar";
				$placeholder_image = "http".dt_ssl()."://placehold.it/900x623#ffffff?text=Add+Image";
			}else{
				$post_class =  " portfolio column dt-sc-one-column ";
				$post_thumbnail = "gallery-default-one-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/1170x810#ffffff?text=Add+Image";
			}
		break;
		
		case 'one-half-column';
			if($show_sidebar){ 
				$post_class = "  portfolio column dt-sc-one-half with-sidebar ";
				$post_thumbnail = "gallery-default-two-col-wit-sidebar";
				$placeholder_image = "http".dt_ssl()."://placehold.it/440x305#ffffff?text=Add+Image";
			}else{
				$post_class = "  portfolio column dt-sc-one-half ";
				$post_thumbnail = "gallery-default-two-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/572x396#ffffff?text=Add+Image";
			}
			$columns = 2;
		break;
		
		case 'one-third-column':
			if($show_sidebar){
				$post_class = "  portfolio column dt-sc-one-third with-sidebar ";
				$post_thumbnail = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}else{
				$post_class = "  portfolio column dt-sc-one-third ";
				$post_thumbnail = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}
			$columns = 3;
		break;

		case 'one-fourth-column':
			if($show_sidebar){
				$post_class = "  portfolio column dt-sc-one-fourth with-sidebar " ;
				$post_thumbnail = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}else{
				$post_class = "  portfolio column dt-sc-one-fourth";
				$post_thumbnail = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}
			$columns = 4;
		break;
	endswitch;?>
    
      <!-- **Primary Section** -->
      <section id="primary" class="gallery <?php echo $page_layout;?>">
<?php	if( have_posts() ):
			$i = 1;
			while( have_posts() ):
				the_post();
				$the_id = get_the_ID();
				
				$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
				
				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == $columns) $i = 1; else $i = $i + 1;?>
				
				<!-- Portfolio Item -->
				<div id="<?php echo "portfolio-{$the_id}";?>" class="<?php echo esc_attr( $temp_class ); ?>">
					<div class="portfolio-thumb"><?php
					
						if( array_key_exists("items_name",$portfolio_item_meta) ):
							$item =  $portfolio_item_meta['items_name'][0];
							$image = $popup = "";	
							
							if( "video" === $item ):
								$image = "http".dt_ssl()."://placehold.it/1060x713/#ffffff/&text=Video%20Portfolio";
								$popup = $portfolio_item_meta['items'][0];
								
							else:
								$attachment_id = dt_get_attachment_id_from_url($portfolio_item_meta['items'][0]);
								$img_attributes = wp_get_attachment_image_src($attachment_id, $post_thumbnail);
								echo "<img src='".$img_attributes[0]."' width='".$img_attributes[1]."' height='".$img_attributes[2]."' alt='".$item."'/>";
							endif;
							
						else:
							$popup = $image = $placeholder_image;
							echo "<img src='{$popup}'/>";
						endif;?>
						
						<div class="image-overlay">
							<div class="portfolio-detail"><?php
								if(dttheme_is_plugin_active('roses-like-this/likethis.php')): ?>
									<div class="views">
										<i class="fa fa-heart-o"> </i><?php printLikes($post->ID); ?> </div><?php
								endif;?>
								<div class="portfolio-meta-content"><h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5><?php
									if( array_key_exists("sub-title",$portfolio_item_meta) ):
										echo "<p>".esc_html($portfolio_item_meta['sub-title'])."</p>";
									endif;?>
								</div>
							</div>
						</div>
					  </div>
					  
				</div><!-- Portfolio Item End-->
<?php		endwhile;
		endif;?>
                   
           <!-- **Pagination** -->
           <div class="pagination">
                <div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','dt_themes'));?></div>
                <?php echo dttheme_pagination();?>
                <div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','dt_themes'));?></div>
           </div><!-- **Pagination - End** -->
      
      </section><!-- **Primary Section** -->
        
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>
          
<?php get_footer();?>