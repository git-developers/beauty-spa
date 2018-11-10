    <div id="bbar-wrapper" class="type6">
    	<div id="bbar-body">
        	<div class="container">
            	<!-- **Logo - Start** -->
                <div id="logo">
                <?php if( dttheme_option('general', 'logo') ):
                            $url = dttheme_option('general', 'logo-url');
                            $url = !empty( $url ) ? $url : IAMD_BASE_URL."images/logo.png"; 
							
							$retina_url = dttheme_option('general','retina-logo-url');
							$retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/logo@2x.png";
							
							$width = dttheme_option('general','retina-logo-width');
							$width = !empty($width) ? $width."px;" : "156px";
							
							$height = dttheme_option('general','retina-logo-height');
							$height = !empty($height) ? $height."px;" : "73px";	?>
                            
                            <a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>">
                                <img class="normal_logo" src="<?php echo esc_attr( $url ); ?>" alt="<?php echo dttheme_blog_title(); ?>" title="<?php echo dttheme_blog_title(); ?>" />
                                <img class="retina_logo" src="<?php echo $retina_url;?>" alt="<?php echo dttheme_blog_title();?>"
                    	 							title="<?php echo dttheme_blog_title(); ?>" style="width:<?php echo $width;?> height:<?php echo $height;?>"/>
                            </a>
                <?php else: ?>
                            <h2><a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>"><?php echo do_shortcode(get_option('blogname')); ?></a></h2>
                <?php endif;?>
                </div><!-- **Logo - End** -->
                
                <div class="column dt-sc-one-half alignright"><?php
					global $dt_allowed_html_tags;
					$top_msg = stripslashes(dttheme_option('general','top-message'));
					$top_msg = do_shortcode($top_msg);
					echo wp_kses($top_msg, $dt_allowed_html_tags );
				?></div>
            </div>
        </div>
        <span class="bbar-divider"></span>
    </div>