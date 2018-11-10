<?php /*Template Name: Portfolio Template*/?>
<?php get_header();?>
<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout  = isset( $tpl_default_settings['layout'] ) ? $tpl_default_settings['layout'] : $GLOBALS['page_layout'];
	  	
	  $show_sidebar		= false;
	  $sidebar_class	= "";
	  
	  $show_content_in_one_column = false;
	  
	  $post_layout		= isset( $tpl_default_settings['portfolio-post-layout'] ) ? $tpl_default_settings['portfolio-post-layout'] : "one-half-column";
	  $post_per_page 	= $tpl_default_settings['portfolio-post-per-page'];
	  $last 			= NULL;
	  $categories 		= isset($tpl_default_settings['portfolio-categories']) ? array_filter($tpl_default_settings['portfolio-categories']) : "";
	  $design_type = !empty($tpl_default_settings['gallery-post-design-type']) ? $tpl_default_settings['gallery-post-design-type'] : 'default';
	  $design_hover_type = !empty($tpl_default_settings['gallery-post-hover-design-type']) ? $tpl_default_settings['gallery-post-hover-design-type'] : 'default';
	  
	  if($design_type == 'default'):
	  	$design_hover_type = $design_hover_type;
	  else:
	  	$design_hover_type = 'type1';
	  endif;
	  

	  if(empty($categories)):
		$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
	  else:
		$args = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
		$categories = get_categories($args);			
	  endif;
	  

	#TO SET PAGE LAYOUT
	switch($page_layout):
		case 'with-left-sidebar':
			$page_class = $page_layout;
			$show_sidebar = true;
			$sidebar_class = "left-sidebar";
		break;

		case 'with-right-sidebar':
			$show_sidebar = true;
		break;
	endswitch;

	#TO SET POST LAYOUT
	switch($post_layout):
		case 'one-column':
			if($show_sidebar){
				$post_class =  " {$design_type} portfolio dt-sc-one-column with-sidebar ";
				$post_thumbnail_default = "gallery-default-one-col-wit-sidebar";
				$placeholder_image = "http".dt_ssl()."://placehold.it/900x623#ffffff?text=Add+Image";
			}else{
				$post_class =  " {$design_type} portfolio dt-sc-one-column ";
				$post_thumbnail_default = "gallery-default-one-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/1170x810#ffffff?text=Add+Image";
			}
			$show_content_in_one_column = true;
		break;
		
		case 'one-half-column';
			if($show_sidebar){ 
				$post_class = " {$design_type} portfolio dt-sc-one-half with-sidebar ";
				$post_thumbnail_default = "gallery-default-two-col-wit-sidebar";
				$placeholder_image = "http".dt_ssl()."://placehold.it/440x305#ffffff?text=Add+Image";
			}else{
				$post_class = " {$design_type} portfolio dt-sc-one-half ";
				$post_thumbnail_default = "gallery-default-two-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/572x396#ffffff?text=Add+Image";
			}
			$last = 2;
		break;
		
		case 'one-third-column':
			if($show_sidebar){
				$post_class = " {$design_type} portfolio dt-sc-one-third with-sidebar ";
				$post_thumbnail_default = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}else{
				$post_class = " {$design_type} portfolio dt-sc-one-third ";
				$post_thumbnail_default = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}
			$last = 3;
		break;

		case 'one-fourth-column':
			if($show_sidebar){
				$post_class = " {$design_type} portfolio dt-sc-one-fourth with-sidebar " ;
				$post_thumbnail_default = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}else{
				$post_class = " {$design_type} portfolio dt-sc-one-fourth";
				$post_thumbnail_default = "gallery-default-three-four-col";
				$placeholder_image = "http".dt_ssl()."://placehold.it/420x291#ffffff?text=Add+Image";
			}
			$last = 4;
		break;
		
	endswitch;
	
	  if($design_type == 'default'):
		$post_thumbnail = $post_thumbnail_default;
	  else:
		$post_thumbnail = 'gallery-shapes';
		$placeholder_image = "http".dt_ssl()."://placehold.it/572x572#ffffff?text=Add+Image";
	  endif;
	?>
       <!-- **Primary Section** -->
       <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">
<?php	if( have_posts() ):
			while( have_posts() ):
				the_post(); ?>
                <!-- #post-<?php the_ID(); ?> -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); 
					  wp_link_pages( array(	'before' =>	'<div class="page-link">', 'after' => '</div>','link_before' =>	'<span>','link_after' => '</span>',
					  						'next_or_number' =>	'number','pagelink' =>	'%', 'echo' =>1 ) );
					  edit_post_link( __( ' Edit ','dt_themes' ) );?>
				</div><!-- #post-<?php the_ID(); ?> -->
<?php 		endwhile;
		endif;?>
        
        
        <!-- ** Portfolio Item Loop Begin ** -->
        <?php if( sizeof($categories) > 1 ) :
				if( array_key_exists("filter",$tpl_default_settings) && (!empty($categories)) ):
					$post_class .= " all-sort ";?>
                	<div class="dt-sc-sorting-container">
                    	<a href="#" class="active-sort" title="" data-filter=".all-sort"><?php _e('All','dt_themes');?></a>
	                    <?php foreach( $categories as $category ): ?>
    	                    <a href='#' data-filter=".<?php echo $category->category_nicename;?>-sort"><?php echo $category->cat_name;?></a>
        	            <?php endforeach; ?>
            	    </div>
		<?php 	endif;
			  endif;?>
              
               <!-- **Portfolio Container** -->
               <div class="dt-sc-portfolio-container gallery <?php echo $design_hover_type; ?>"><?php
			   
			   if ( get_query_var('paged') ) {
				   $paged = get_query_var('paged');
			   } elseif ( get_query_var('page') ) { 
			   	   $paged = get_query_var('page');
			   } else { 
			   	   $paged = 1;
			   }
			   
                    $args = array();
                    $categories = array_filter($tpl_default_settings['portfolio-categories']);
                    
                    if(is_array($categories) && !empty($categories)):
                        $terms = $categories;
                        $args = array(	'orderby'	=> 'ID'
                                        ,'order'	=> 'ASC'
                                        ,'paged'	=> $paged
                                        ,'posts_per_page' 	=> $post_per_page
                                        ,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms  ) ) );
                    else:
                        $args = array(	'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios' ,'suppress_filters'=>'0');
                    endif;


				  query_posts($args);
					if( have_posts() ):
						while( have_posts() ):
							the_post();
							$the_id = get_the_ID();
							
							$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
							$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
							
							#Find sort class by using the portfolio_entries
                            $sort = " ";
                            if( array_key_exists("filter",$tpl_default_settings) ):
                                $item_categories = get_the_terms( $the_id, 'portfolio_entries' );
                                if(is_object($item_categories) || is_array($item_categories)):
                                    foreach ($item_categories as $category):
                                        $sort .= $category->slug.'-sort ';
                                    endforeach;
                                endif;
                            endif;?>
                            
                            <!-- Portfolio Item -->
                            <div id="<?php echo "portfolio-{$the_id}";?>" class="<?php echo esc_attr( $post_class.$sort ); ?>">
                            	<div class="portfolio-thumb <?php echo $design_type; ?>"><?php
								    if($design_type != 'default'): ?>
				    					<img class="item-mask" alt="mask" src="<?php echo get_template_directory_uri(); ?>/skins/<?php echo dttheme_option('appearance','skin'); ?>/images/<?php echo $design_type; ?>.png" /><?php
								    endif;			
								
									$item = '';
									if( array_key_exists("items_name",$portfolio_item_meta) ):
										$item =  $portfolio_item_meta['items_name'][0];
										$image = $popup = "";	
										if( "video" === $item ):
											$popup = $portfolio_item_meta['items'][0];
											$width = 1170;
											$height = 810;
											if ( strpos($popup,"vimeo") ) : #For Vimeo
												$url = substr( strrchr($popup,"/"),1);
												echo "<div class='dt-video-wrap'><iframe src='http".dt_ssl()."://player.vimeo.com/video/{$url}' width='{$width}' height='{$height}' frameborder='0'></iframe></div>";
												
											elseif( strpos($popup,"?v=") ): #For Youtube
												$url = substr( strrchr($popup,"="),1);
												echo "<div class='dt-video-wrap'><iframe src='http".dt_ssl()."://www.youtube.com/embed/{$url}?wmode=opaque' width='{$width}' height='{$height}' frameborder='0'></iframe></div>";
											endif;
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
                                            <div class="portfolio-meta-content"><h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s','dt_themes'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5><?php
                                                if( array_key_exists("sub-title",$portfolio_item_meta) ):
                                                    echo "<p>".esc_html($portfolio_item_meta['sub-title'])."</p>";
                                                endif;?>
                                            </div>
                                        </div>
									</div>
                              	</div>
                                
                            </div><!-- Portfolio Item End--><?php
						endwhile;
					endif;?>
                            
               </div><!-- **Portfolio Section Container End** -->
               
               <div class="clear"></div>
               <div class="hr-invisible-small"> </div> 
               
               <!-- **Pagination** -->
               <div class="pagination">
               	<div class="prev-post"><?php previous_posts_link(__('<span class="fa fa-angle-double-left"></span> Prev','dt_themes'));?></div>
                <?php echo dttheme_pagination();?>
                <div class="next-post"><?php next_posts_link(__('Next <span class="fa fa-angle-double-right"></span>','dt_themes'));?></div>
		      </div><!-- **Pagination - End** -->

        
        <!-- ** Portfolio Item Loop End ** -->
       </section>
<?php if($show_sidebar): ?>
	  <!-- **Secondary Section ** -->
      <section id="secondary" class="<?php echo esc_attr( $sidebar_class ); ?>">
<?php 	get_sidebar();?>      
      </section><!-- **Secondary Section - End** -->
<?php endif; ?>       
    
<?php get_footer();?>