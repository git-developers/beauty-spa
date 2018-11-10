<?php add_action("admin_init", "page_metabox");?>
<?php function page_metabox(){
		add_meta_box("page-template-slider-meta-container", __('Slider Options','dt_themes'), "page_sllider_settings", "page", "normal", "low");	
		add_meta_box("page-template-meta-container", __('Default page Options','dt_themes'), "page_settings", "page", "normal", "low");
		add_action('save_post','page_meta_save');
	}

	#Slider Meta Box
	function page_sllider_settings($args){	
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>

		<!-- Show Slider -->        
        <div class="custom-box">
        	<div class="column one-sixth">
                <label><?php _e('Show Slider','dt_themes');?> </label>
            </div>
            <div class="column four-sixth last">
				<?php $switchclass = array_key_exists("show_slider",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                      $checked = array_key_exists("show_slider",$tpl_default_settings) ? ' checked="checked"' : '';?>
                <div data-for="mytheme-show-slider" class="checkbox-switch <?php echo $switchclass;?>"></div>
                <input id="mytheme-show-slider" class="hidden" type="checkbox" name="mytheme-show-slider" value="true"  <?php echo $checked;?>/>
                <p class="note"> <?php _e('YES! to show slider on this page.','dt_themes');?> </p>
            </div>
        </div><!-- Show Slider End-->

        <!-- Slider Types -->
        <div class="custom-box">
        	<div class="column one-sixth">
                <label><?php _e('Choose Slider','dt_themes');?></label>
            </div>
            <div class="column four-sixth last">
	            <?php $slider_types = array( '' => __("Select",'dt_themes'),
											 'layerslider' => __("Layer Slider",'dt_themes'),
											 'revolutionslider' => __("Revolution Responsive",'dt_themes'),
											 'imageonly' => __( "Image Only", "dt_themes"));
											 
	 				  $v =  array_key_exists("slider_type",$tpl_default_settings) ?  $tpl_default_settings['slider_type'] : '';
					  
					  echo "<select class='slider-type' name='mytheme-slider-type'>";
					  foreach($slider_types as $key => $value):
					  	$rs = selected($key,$v,false);
						echo "<option value='{$key}' {$rs}>{$value}</option>";
					  endforeach;
	 				 echo "</select>";?>
            <p class="note"> <?php _e("Choose which slider you wish to use ( eg: Layer or Revolution )",'dt_themes');?> </p>
            </div>
        </div><!-- Slider Types End-->
        
        <!-- slier-container starts-->
    	<div id="slider-conainer">
        
        <?php $layerslider = $revolutionslider = $imageonly = $specialshortcodes = 'style="display:none"';
			  if(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "layerslider"):
			  	$layerslider = 'style="display:block"';
			  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "revolutionslider"):
			  	$revolutionslider = 'style="display:block"';
			  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "imageonly"):
                $imageonly = 'style="display:block"';
			  endif;?>
              
          
              <!-- Layered Slider -->
              <div id="layerslider" class="custom-box" <?php echo $layerslider;?>>
              	<h3><?php _e('Layer Slider','dt_themes');?></h3>
                <?php if(dttheme_is_plugin_active('LayerSlider/layerslider.php')):?>
                <?php 
					  $sliders = LS_Sliders::find(array('limit' => 50));
					  
						  if(!empty($sliders)):
								echo '<div class="one-half-content">';
								echo '	<div class="bpanel-option-set">';
								echo ' <div class="column one-sixth">';
								echo '	<label>'.__('Select LayerSlider','dt_themes').'</label>';
								echo ' 	</div>';
								echo ' <div class="column two-sixth">';
								echo '	<select name="layerslider_id">';
								echo '		<option value="0">'.__("Select Slider",'dt_themes').'</option>';
											foreach($sliders as $key => $item):
												$id = $item['id'];
												$name = $item['name'];
												$rs = isset($tpl_default_settings['layerslider_id']) ? $tpl_default_settings['layerslider_id']:'';
												$rs = selected($id,$rs,false);
												echo "	<option value='{$id}' {$rs}>{$name}</option>";
											endforeach;
											
								echo '	</select>';
								echo '<p class="note">';
								_e("Choose Which LayerSlider you would like to use..",'dt_themes');
								echo "</p>";
								echo ' 	</div>';
								echo '	</div>';
								echo '</div>';
						  else:
							 echo '<p id="j-no-images-container">'.__('Please add atleat one layer slider','dt_themes').'</p>';
						  endif;
					  else:?>
                      <p id="j-no-images-container"><?php _e('Please activate Layered Slider','dt_themes'); ?></p>
               <?php endif;   ?>        
                
              </div><!-- Layered Slider End-->

              <!-- Revolution Slider -->
              <div id="revolutionslider" class="custom-box" <?php echo $revolutionslider;?>>
	            <h3><?php _e('Revolution Slider','dt_themes');?></h3><?php
            	# Check revolution slider active
				if(dttheme_is_plugin_active('revslider/revslider.php')):
					$sld = new RevSlider();
					$sliders = $sld->getArrSliders();
					if(!empty($sliders)):
						echo '<div class="one-half-content">';
						echo '	<div class="bpanel-option-set">';
						echo ' <div class="column one-sixth">';
						echo '	<label>'.__('Select Slider','dt_themes').'</label>';
						echo ' 	</div>';
						echo ' <div class="column three-sixth">';
						echo '	<select name="revolutionslider_id">';
							echo '		<option value="0">'.__("Select Slider",'dt_themes').'</option>';
							foreach($sliders as $key => $item):
								$alias = $item->getAlias();
								$title = $item->getTitle();
								$rs = isset($tpl_default_settings['revolutionslider_id']) ? $tpl_default_settings['revolutionslider_id']:'';
								$rs = selected($alias,$rs,false);
								echo "	<option value='{$alias}' {$rs}>{$title}</option>";
							endforeach;
						echo '	</select>';
						echo '<p class="note">'.__("Choose which Revolution slider would you like to use!","dt_themes").'</p>';
						echo ' 	</div>';
						echo '	</div>';
						echo '</div>';
					else:
						echo '<p id="j-no-images-container">'.__('Please add atleat one revolution slider','dt_themes').'</p>';
					endif;
				else:
					echo '<p id="j-no-images-container">'.__('Please activate Revolution Slider , and add at least one slider.','dt_themes').'</p>';
				endif; ?>

              </div><!-- Revolution Slider End-->
              
              <!-- Image Only -->
            <div id="imageonly" class="custom-box" <?php echo $imageonly;?>>
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Choose Image','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="image-preview-container">
                            <?php $slider_image = array_key_exists ( "slider-image", $tpl_default_settings ) ? $tpl_default_settings ['slider-image'] : '';?>
                            <input name="slider-image" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo esc_attr( $slider_image );?>"/>
                            <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                            <?php if( !empty($subtitlebg) ) dttheme_adminpanel_image_preview($slider_image );?>
                            <p class="note"><?php _e("Upload an image instead of slider",'dt_themes');?></p>
                        </div>                    
                    </div>
                </div>                
            </div><!-- Image Only -->
            
            <?php if(isset($tpl_default_settings['slider_type']) || isset($tpl_default_settings['slider-shortcode'])):
			    	$specialshortcodes = 'style="display:block"';
				  endif; ?>
                   
            <!-- Special Shortcodes Only -->
            <div id="specialshortcodes" <?php echo $specialshortcodes; ?>>
                
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Content','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <?php $slider_shortcode = array_key_exists ( "slider-shortcode", $tpl_default_settings ) ? $tpl_default_settings ['slider-shortcode'] : '';?>
                        <textarea class="large" name="slider-shortcode" rows="12"><?php echo $slider_shortcode; ?></textarea>
                        <p class="three-fourth note"> <?php _e('You can add shortcode here to display it along with slider/image. This will work only if enable the "Show Slide" option.','dt_themes');?> </p>
                    </div>
                </div>
                
            </div><!-- Special Shortcodes Only -->
            
        </div><!-- slier-container ends-->
<?php  wp_reset_postdata();
	}
	
	#Page Meta Box	
	function page_settings($args){
		 
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>
        
        <div class="j-pagetemplate-container">
        
            <div id="tpl-common-settings">
            
                <!-- Breadcrumb Section Settings -->
                <div id="tpl-breadcrumbsection-settings">
                    <div class="custom-box">
                        <div class="column one-sixth">
                            <label><?php _e('Breadcrumb Section','dt_themes');?> </label>
                        </div>
                        <div class="column four-sixth last">
                            <?php $switchclass = array_key_exists("disable_breadcrumb_section",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                                  $checked = array_key_exists("disable_breadcrumb_section",$tpl_default_settings) ? ' checked="checked"' : '';?>
                            <div data-for="mytheme-disable-breadcrumb-section" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input id="mytheme-disable-breadcrumb-section" class="hidden" type="checkbox" name="mytheme-disable-breadcrumb-section" value="true"  <?php echo $checked;?>/>
                            <p class="note"> <?php _e('YES! to disable breadcrumb section completely in this page.','dt_themes');?> </p>
                        </div>
                    </div>
                   
                   <!--Sub tile--> 
                   <div class="custom-box">
                        <div class="column one-sixth">
                            <label><?php _e('Breadcrumb Title','dt_themes');?></label>
                        </div>
                        <div class="column five-sixth last">
                        <?php $breadcrumbsubtitle = array_key_exists ( "breadcrumb-sub-title", $tpl_default_settings ) ? $tpl_default_settings ['breadcrumb-sub-title'] : '';?>
                        
                            <input id="breadcrumb-sub-title" name="breadcrumb-sub-title" type="text" class="widefat" 	value="<?php echo esc_attr( $breadcrumbsubtitle );?>" />
                            <p class="note"> <?php _e("If you wish! You can add Breadcrumb title.",'dt_themes');?> </p>
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                    <div class="custom-box">
                        <div class="column one-sixth"></div>
                        <div class="column five-sixth last">
                            <div class="image-preview-container">
                                 <div class="clear"></div>
                                <?php $subtitlebg = array_key_exists ( "breadcrumb-bg", $tpl_default_settings ) ? $tpl_default_settings ['breadcrumb-bg'] : '';?>
                                <input name="breadcrumb-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo $subtitlebg;?>"/>
                                <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                                <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                                <?php //if( !empty($subtitlebg) ) dttheme_adminpanel_image_preview($subtitlebg );?>
                                <p class="note"><?php _e("Upload an image for the breadcrumb background",'dt_themes');?></p>
                            </div>                    
                        </div>
                    </div>
                    
                    <div class="custom-box">
                        <div class="column one-sixth"></div>
                        <div class="column five-sixth last">
                            <div class="column one-third">
                                <label><?php _e('Background Repeat','dt_themes');?></label>
                                <?php $bgrepeat =  array_key_exists ( "breadcrumb-bg-repeat", $tpl_default_settings ) ? $tpl_default_settings ['breadcrumb-bg-repeat'] : ''; ?>
                                <div class="clear"></div>
                                <select name="breadcrumb-bg-repeat">
                                    <option value=""><?php _e("Select",'dt_themes');?></option>
                                    <?php foreach( array("repeat","repeat-x","repeat-y","no-repeat") as $option): ?>
                                           <option value="<?php echo $option;?>" <?php selected($option,$bgrepeat);?>><?php echo $option;?></option> 
                                    <?php endforeach;?>
                                </select>
                                <p class="note"><?php _e("Select how would you like to repeat the background image ",'dt_themes');?></p>
                            </div>
    
                            <div class="column one-third">
                                <label><?php _e('Background Position','dt_themes');?></label>
                                <?php $bgposition =  array_key_exists ( "breadcrumb-bg-position", $tpl_default_settings ) ? $tpl_default_settings ['breadcrumb-bg-position'] : ''; ?>
                                <div class="clear"></div>
                                <select name="breadcrumb-bg-position">
                                    <option value=""><?php _e("Select",'dt_themes');?></option>
                                    <?php foreach( array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right") as $option): ?>
                                        <option value="<?php echo $option;?>" <?php selected($option,$bgposition);?>> <?php echo $option;?></option> 
                                    <?php endforeach;?>
                                </select>
                                <p class="note"><?php _e("Select how would you like to position the background",'dt_themes');?></p>
                            </div>
    
                            <div class="column one-third last">
                                <label><?php _e('Apply Dark Background','dt_themes');?></label>
                                <div class="clear"></div><?php
                                    $switchclass = array_key_exists("breadcrumb-darkbg",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                                    $checked = array_key_exists("breadcrumb-darkbg",$tpl_default_settings) ? ' checked="checked"' : '';?>
    
                                    <div data-for="breadcrumb-darkbg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                                    <input id="breadcrumb-darkbg" class="hidden" type="checkbox" name="breadcrumb-darkbg" value="true" <?php echo $checked;?>/>
                                    <p class="note"> <?php _e('YES! to apply dark background.','dt_themes');?> </p>
    
                            </div>
                        </div>
                    </div>
                    
                </div><!-- Breadcrumb Section Settings End-->
            
                <!-- 1. Layout -->
                <div id="page-layout" class="custom-box">
                	<div class="column one-sixth"><label><?php _e('Layout','dt_themes');?> </label></div>
                    <div class="column five-sixth last">
                    	<ul class="bpanel-layout-set"><?php 
							$homepage_layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
							$v =  array_key_exists("layout",$tpl_default_settings) ?  $tpl_default_settings['layout'] : 'content-full-width';
							
							foreach($homepage_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach;?></ul>
						 <?php $v = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : 'content-full-width';
						 	   $cs = ( $v == "content-full-width") ? "display:none;": "";?>
                         <input id="mytheme-page-layout" name="layout" type="hidden"  value="<?php echo esc_attr( $v );?>"/>
                         <p class="note"> <?php _e("You can choose between a left, right or no sidebar layout.",'dt_themes');?> </p>
                    </div>
                 </div> <!-- Layout End-->
                 
                 <!-- Widget Area Options -->
                 <div id="widget-area-options" style=" <?php echo esc_attr($cs);?> ">
                 	   <!-- Every Where Sidebar Start -->
                     <div class="custom-box">
                        <div class="column one-sixth"><label><?php _e('Disable Every Where Sidebar','dt_themes');?></label></div>
                        <div class="column five-sixth last"><?php 
                            $switchclass = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                            $checked = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? ' checked="checked"' : '';?>
                            
                            <div data-for="mytheme-disable-everywhere-sidebar" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input id="mytheme-disable-everywhere-sidebar" class="hidden" type="checkbox" name="disable-everywhere-sidebar" value="true"  <?php echo $checked;?>/>
                            <p class="note"> <?php _e('Yes! to hide "Every Where Sidear" on this page.','dt_themes');?> </p>
                         </div>
                     </div><!-- Every Where Sidebar End-->
                     
                     <div id="page-sidebars" class="sidebar-section custom-box">
                     	<div class="column one-sixth"><label><?php _e('Choose Widget Area','dt_themes');?></label></div>
                        <div class="column five-sixth last"><?php
							if( array_key_exists('widget-area', $tpl_default_settings)):
								$widgetareas =  array_unique($tpl_default_settings["widget-area"]);
								$widgetareas = array_filter($widgetareas);
								
								foreach( $widgetareas as $widgetarea ){
									echo '<div class="multidropdown">';
									echo dttheme_custom_widgetarea_list("widgetareas",$widgetarea,"multidropdown");
									echo '</div>';
								}
								
								echo '<div class="multidropdown">';
								echo dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
								echo '</div>';
							else:
								echo '<div class="multidropdown">';
								echo dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
								echo '</div>';
							endif;?></div>
            		 </div>
                 </div><!-- Widget Area Options -->
            </div><!-- .tpl-common-settings end -->

            <div id="tpl-default-settings">
            	<!-- 4. Allow Commenet -->
                <div class="custom-box">
                	<div class="column one-sixth"><label><?php _e('Allow Comments','dt_themes');?></label></div>
                    <div class="column five-sixth last"><?php 
						$switchclass = array_key_exists("comment",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
						$checked = array_key_exists("comment",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        
                        <div data-for="mytheme-page-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-page-comment" class="hidden" type="checkbox" name="mytheme-page-comment" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('YES! to allow comments on this page.','dt_themes');?> </p>
                    </div>
                 </div><!-- Allow Commenet End-->
             </div><!-- tpl-default-settings end-->
             
            <div id="tpl-contact-settings">
            	<div class="column one-sixth"><label><?php _e('Full Width Section','dt_themes');?></label></div>
                <div class="column five-sixth last"><?php 
					$content =  array_key_exists("full-width-section",$tpl_default_settings) ? stripcslashes($tpl_default_settings['full-width-section']) : "" ;?>
                    <textarea name="page-full-width-section" class="widefat" rows="15"><?php echo $content; ?></textarea>
                    <p class="note"> <?php _e('This content will appear in full width','dt_themes');?> </p>
                </div>
             </div><!-- tpl-contact-settings end-->     
            
            <!-- Blog Template Settings -->
            <div id="tpl-blog">
            
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Posts Layout','dt_themes');?> </label></div>
                    
                    <div class="column five-sixth last">
                    	<ul class="bpanel-post-layout bpanel-layout-set"><?php 
							$posts_layout = array(	'one-column'=>	__("Single post per row.",'dt_themes'),
							'one-half-column'=>	__("Two posts per row.",'dt_themes'),
							);
							
							$v = array_key_exists("blog-post-layout",$tpl_default_settings) ?  $tpl_default_settings['blog-post-layout'] : 'one-column';
							
							foreach($posts_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
							endforeach;?></ul>
                            
                        <input id="mytheme-blog-post-layout" name="mytheme-blog-post-layout" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        <p class="note"> <?php _e("Choose layout style for your Blog",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Playout End-->

				<!-- Allow Excerpt -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Allow Excerpt','dt_themes');?></label></div>
                    <div class="column five-sixth last">                     
						<?php $switchclass = array_key_exists("blog-post-excerpt",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                              $checked = array_key_exists("blog-post-excerpt",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        <div data-for="mytheme-blog-post-excerpt" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-blog-post-excerpt" class="hidden" type="checkbox" name="mytheme-blog-post-excerpt" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('Enable Excerpt','dt_themes');?> </p>
                    </div>
                </div><!-- Allow Excerpt End-->

                <!-- Excerpt Length-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Excerpt Length','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                    	<?php $v = array_key_exists("blog-post-excerpt-length",$tpl_default_settings) ?  $tpl_default_settings['blog-post-excerpt-length'] : '45';?>
                        <input id="mytheme-blog-post-excerpt-length" name="mytheme-blog-post-excerpt-length" type="text" value="<?php echo esc_attr( $v );?>" />
                        <p class="note"> <?php _e("Limit! Number of words from the content to appear on each blog post (Number Only)",'dt_themes');?> </p>
                    </div>
                </div><!-- Excerpt Length End-->

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Post per page','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                        <select name="mytheme-blog-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("blog-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['blog-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"><?php _e("Your blog pages show at most selected number of posts per page.",'dt_themes');?></p>
                    </div>
                </div><!-- Post Count End-->
                
                <!-- Post Meta-->
                <div class="custom-box">
	                <h3><?php _e('Post Meta Options','dt_themes');?></h3>
                	<?php $post_meta = array(array(
								"id"=>		"disable-author-info",
								"label"=>	__("Disable the Author info.",'dt_themes'),
								"tooltip"=>	__("By default the author info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							), array(
								"id"=>		"disable-date-info",
								"label"=>	__("Disable the date info.",'dt_themes'),
								"tooltip"=>	__("By default the date info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-comment-info",
								"label"=>	__("Disable the comment",'dt_themes'),
								"tooltip"=>	__("By default the comment will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-category-info",
								"label"=>	__("Disable the category",'dt_themes'),
								"tooltip"=>	__("By default the category will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-tag-info",
								"label"=>	__("Disable the tag",'dt_themes'),
								"tooltip"=>	__("By default the tag will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							));
						$count = 1;
						foreach($post_meta as $p_meta):
							$last = ($count%3 == 0)?"last":'';
							$id = 		$p_meta['id'];
							$label =	$p_meta['label'];
							$tooltip =  $p_meta['tooltip'];
							$v =  array_key_exists($id,$tpl_default_settings) ?  $tpl_default_settings[$id] : '';
							$rs =		checked($id,$v,false);
						 	$switchclass = ($v<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-third-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<label>{$label}</label>";							
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme-blog-{$id}' value='{$id}' {$rs} />";
							echo '<p class="note">';
							echo ($tooltip);
							echo '</p>';
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- Post Meta End-->
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Exclude Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("blog-post-exclude-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["blog-post-exclude-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  dttheme_categorylist("blog,exclude_cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  dttheme_categorylist("blog,exclude_cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose certain categories to exclude from your blog page.",'dt_themes');?> </p>
                </div><!-- Categories End-->
            </div><!-- Blog Template Settings End-->
            
            
            <!-- Catalog Template Settings -->
               <div id="tpl-catalog">
                  <!-- Post Playout -->
                  <div class="custom-box">
                      <div class="column one-sixth">                 
                          <label><?php _e('Posts Layout','dt_themes');?> </label>
                      </div>
                      <div class="column five-sixth last">       
                          <ul class="bpanel-post-layout bpanel-layout-set">
                          <?php $posts_layout = array(	'one-column'=>	__("Single post per row.",'dt_themes'),
                                                        'one-half-column'=>	__("Two posts per row.",'dt_themes'));
                                  $v = array_key_exists("catalog-post-layout",$tpl_default_settings) ?  $tpl_default_settings['catalog-post-layout'] : 'one-column';
                                  foreach($posts_layout as $key => $value):
                                      $class = ($key == $v) ? " class='selected' " : "";
                                      echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                                  endforeach;?>
                          </ul>
                          <input id="mytheme-catalog-post-layout" name="mytheme-catalog-post-layout" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                          <p class="note"> <?php _e("Choose layout style for your Catalog",'dt_themes');?> </p>
                      </div>      
  
                  </div><!-- Post Playout End-->
  
                  <!-- Categories -->
                  <div class="custom-box">
                      <h3><?php _e('Choose Categories','dt_themes');?></h3>
                      <?php if(array_key_exists("catalog-categories",$tpl_default_settings)):
                               $exclude_cats = array_unique($tpl_default_settings["catalog-categories"]);
                               foreach($exclude_cats as $cats):
                                  echo "<!-- Category Drop Down Container -->
                                        <div class='multidropdown'>";
                                  echo  dt_theme_catalog_categorylist("catalog,cats",$cats,"multidropdown");
                                  echo "</div><!-- Category Drop Down Container end-->";		
                               endforeach;
                            else:
                              echo "<!-- Category Drop Down Container -->";
                              echo "<div class='multidropdown'>";
                        	  echo  dt_theme_catalog_categorylist("catalog,cats","","multidropdown");
                              echo "</div><!-- Category Drop Down Container end-->";
                             endif; ?>
                      <p class="note"> <?php _e("You can choose only certain categories to show in catalog items. ",'dt_themes');?> </p>
                  </div><!-- Categories End-->                
                 
               </div><!-- Catalog Template Settings End-->


             <!-- Portfolio Template Settings -->
             <div id="tpl-portfolio">
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Posts Layout','dt_themes');?> </label>
                    </div>
                    <div class="column five-sixth last">       
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $posts_layout = array( 
								'one-column'=>	__("single_post_per_row",'dt_themes'),
								'one-half-column'=>	__("Two posts per row.",'dt_themes'),
								'one-third-column'=>	__("Three posts per row.",'dt_themes'),
								'one-fourth-column' => __("Four Posts per row",'dt_themes'));
                                $v = array_key_exists("portfolio-post-layout",$tpl_default_settings) ?  $tpl_default_settings['portfolio-post-layout'] : 'one-column';
                                foreach($posts_layout as $key => $value):
                                    $class = ($key == $v) ? " class='selected' " : "";
                                    echo "<li><a href='#' rel='{$key}' {$class} title='{$value}' id='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                                endforeach;?>
                        </ul>
                        <input id="mytheme-portfolio-post-layout" name="mytheme-portfolio-post-layout" type="hidden" value="<?php echo esc_attr( $v );?>"/>
                        <p class="note"> <?php _e("Choose layout style for your Portfolio",'dt_themes');?> </p>
                    </div>      

                </div><!-- Post Playout End-->
                
                <!-- Post Design Type -->
                  <div class="custom-box">
                      <div class="column one-sixth">
                          <label><?php _e('Type of Posts Design','dt_themes');?></label>
                      </div>
                      <div class="column five-sixth last">
                      	  <?php $post_design = array( 'default' => __('Default', 'dt_themes'),
						  							  'shape-one' => __('Shape One', 'dt_themes'),
													  'shape-two'  => __('Shape Two', 'dt_themes'),
													  'shape-three'  => __('Shape Three', 'dt_themes'),
													  'shape-four'  => __('Shape Four', 'dt_themes')); ?>
                                                
                          <select name="mytheme-gallery-post-design-type" id="mytheme-gallery-post-design-type">
                              <?php $selected = array_key_exists("gallery-post-design-type",$tpl_default_settings) ?  $tpl_default_settings['gallery-post-design-type'] : 'default';
									foreach($post_design as $key => $pdesign):
	                                  echo "<option value='{$key}'".selected($selected, $key, false).">{$pdesign}</option>";
                                    endforeach; ?>
                          </select>
                          <p class="note"> <?php _e("Your gallery posts show with choosen shape.",'dt_themes');?> </p>
                      </div>
                  </div><!-- Post Design Type End-->
                  
                 <!-- Portfolio Hover Design Type -->
                 <div id="gallery_hover_types">
                  <div class="custom-box">
                      <div class="column one-sixth">
                          <label><?php _e('Type of Hover Design','dt_themes');?></label>
                      </div>
                      <div class="column five-sixth last">
                      	  <?php $post_hover_design = array( 'default' => __('Type1', 'dt_themes'),
						  							  'type2' => __('Type2', 'dt_themes'),
													  'type3'  => __('Type3', 'dt_themes'),
													  'type4'  => __('Type4', 'dt_themes')); ?>
                                                
                          <select name="mytheme-gallery-post-hover-design-type" id="mytheme-gallery-post-hover-design-type">
                              <?php $selected = array_key_exists("gallery-post-hover-design-type",$tpl_default_settings) ?  $tpl_default_settings['gallery-post-hover-design-type'] : 'default';
									foreach($post_hover_design as $key => $phoverdesign):
	                                  echo "<option value='{$key}'".selected($selected, $key, false).">{$phoverdesign}</option>";
                                    endforeach; ?>
                          </select>
                          <p class="note"> <?php _e("Your gallery posts show with choosen hover types.",'dt_themes');?> </p>
                      </div>
                  </div>
                 </div><!-- Portfolio Hover Design Type End-->

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Post per page','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">   
                        <select name="mytheme-portfolio-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("portfolio-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['portfolio-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                	echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"> <?php _e("Your portfolio pages show at most selected number of posts per page.",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Count End-->

                <div class="custom-box">
                    <div class="column one-sixth">                
	                    <label><?php _e('Allow Filters','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">                       
						<?php $switchclass = array_key_exists("filter",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                              $checked = array_key_exists("filter",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        <div data-for="mytheme-portfolio-filter" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-portfolio-filter" class="hidden" type="checkbox" name="mytheme-portfolio-filter" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('Allow filter options for portfolio items','dt_themes');?> </p>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Choose Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("portfolio-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["portfolio-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  dttheme_portfolio_categorylist("portfolio,cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  dttheme_portfolio_categorylist("portfolio,cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose only certain categories to show in portfolio items. ",'dt_themes');?> </p>
                </div><!-- Categories End-->                
                
             </div><!-- Portfolio Template Settings End-->
        </div>    
<?php  wp_reset_postdata();
   } 
   
	function page_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;

			$settings = array();
			$post_template = !empty($_POST['page_template']) ? $_POST['page_template'] : '';
			
			if( isset($_POST['layout'])){
				$settings['layout'] = $_POST['layout'];
			}
			if( !empty($_POST['disable-everywhere-sidebar']) ) { 
				$settings['disable-everywhere-sidebar'] = $_POST['disable-everywhere-sidebar'];
			}
			if( !empty($_POST['mytheme']['widgetareas']) ) {
				$settings['widget-area'] =  array_unique(array_filter($_POST['mytheme']['widgetareas']));
			}
			
			$settings['breadcrumb-sub-title'] = $_POST['breadcrumb-sub-title'];
			$settings['disable_breadcrumb_section'] =  $_POST['mytheme-disable-breadcrumb-section'];
			$settings['breadcrumb-bg'] = $_POST['breadcrumb-bg'];
			$settings['breadcrumb-bg-repeat'] = $_POST['breadcrumb-bg-repeat'];
			$settings['breadcrumb-bg-position'] = $_POST['breadcrumb-bg-position'];
			$settings['breadcrumb-darkbg'] = $_POST['breadcrumb-darkbg'];
		
			if(isset($_POST["page_template"]) && ( 'default' == $post_template)  || 'tpl-sitemap.php' == $post_template 
			|| 'tpl-home.php' == $post_template || 'tpl-feature.php' ==  $post_template || 'tpl-contact.php' == $post_template || 'tpl-fullwidth.php' == $post_template ) :

				if( !empty($_POST['mytheme-show-slider'])){
					$settings['show_slider'] =  $_POST['mytheme-show-slider'];
				}
				$settings['slider_type'] = $_POST['mytheme-slider-type'];
				if( !empty($_POST['mytheme-page-comment'])){
					$settings['comment'] = $_POST['mytheme-page-comment'];
				}
				if( isset($_POST['layerslider_id']) ){
					$settings['layerslider_id'] = $_POST['layerslider_id'];
				}
				if( isset($_POST['revolutionslider_id'])){
					$settings['revolutionslider_id'] = $_POST['revolutionslider_id'];
				}
				if( isset($_POST['slider-image'])){
					$settings['slider-image'] = $_POST['slider-image'];
				}
				$settings['full-width-section'] = $_POST['page-full-width-section'];
				$settings['slider-shortcode'] = $_POST['slider-shortcode'];
				
			elseif( "tpl-blog.php" == $post_template ):
				$settings['blog-post-layout'] = $_POST['mytheme-blog-post-layout'];
				$settings['blog-post-per-page'] = $_POST['mytheme-blog-post-per-page'];
				$settings['blog-post-excerpt'] = $_POST['mytheme-blog-post-excerpt'];
				$settings['blog-post-excerpt-length'] = $_POST['mytheme-blog-post-excerpt-length'];
				$settings['blog-post-exclude-categories'] = $_POST['mytheme']['blog']['exclude_cats'];
				$settings['disable-date-info'] = $_POST['mytheme-blog-disable-date-info'];
				$settings['disable-author-info'] = $_POST['mytheme-blog-disable-author-info'];
				$settings['disable-comment-info'] = $_POST['mytheme-blog-disable-comment-info'];
				$settings['disable-category-info'] = $_POST['mytheme-blog-disable-category-info'];
				$settings['disable-tag-info'] = $_POST['mytheme-blog-disable-tag-info'];
				
			elseif( "tpl-catalog.php" == $post_template ):
				$settings['catalog-post-layout'] = $_POST['mytheme-catalog-post-layout'];
				$settings['catalog-categories'] = $_POST['mytheme']['catalog']['cats'];
							
			elseif( "tpl-portfolio.php" == $post_template ):
				$settings['portfolio-post-layout'] = $_POST['mytheme-portfolio-post-layout'];
				$settings['gallery-post-design-type'] = $_POST['mytheme-gallery-post-design-type'];
				$settings['gallery-post-hover-design-type'] = $_POST['mytheme-gallery-post-hover-design-type'];
				$settings['portfolio-post-per-page'] = $_POST['mytheme-portfolio-post-per-page'];
				$settings['filter'] = $_POST['mytheme-portfolio-filter'];	
				$settings['portfolio-categories'] = $_POST['mytheme']['portfolio']['cats'];
			endif;
		
		update_post_meta($post_id, "_tpl_default_settings", array_filter($settings));
		
	}?>