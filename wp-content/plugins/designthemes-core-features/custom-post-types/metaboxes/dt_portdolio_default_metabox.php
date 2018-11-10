<?php
global $post;
$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();?>

<!-- Sub Title -->
<div class="custom-box">

      <!-- Breadcrumb Section Settings -->
      <div id="tpl-breadcrumbsection-settings">
          <div class="custom-box">
              <div class="column one-sixth">
                  <label><?php _e('Breadcrumb Section','dt_themes');?> </label>
              </div>
              <div class="column four-sixth last">
                  <?php $switchclass = array_key_exists("disable_breadcrumb_section",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                        $checked = array_key_exists("disable_breadcrumb_section",$portfolio_settings) ? ' checked="checked"' : '';?>
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
              <?php $breadcrumbsubtitle = array_key_exists ( "breadcrumb-sub-title", $portfolio_settings ) ? $portfolio_settings ['breadcrumb-sub-title'] : '';?>
              
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
                      <?php $subtitlebg = array_key_exists ( "breadcrumb-bg", $portfolio_settings ) ? $portfolio_settings ['breadcrumb-bg'] : '';?>
                      <input name="breadcrumb-bg" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo $subtitlebg;?>"/>
                      <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                      <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                      <p class="note"><?php _e("Upload an image for the breadcrumb background",'dt_themes');?></p>
                  </div>                    
              </div>
          </div>
          
          <div class="custom-box">
              <div class="column one-sixth"></div>
              <div class="column five-sixth last">
                  <div class="column one-third">
                      <label><?php _e('Background Repeat','dt_themes');?></label>
                      <?php $bgrepeat =  array_key_exists ( "breadcrumb-bg-repeat", $portfolio_settings ) ? $portfolio_settings ['breadcrumb-bg-repeat'] : ''; ?>
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
                      <?php $bgposition =  array_key_exists ( "breadcrumb-bg-position", $portfolio_settings ) ? $portfolio_settings ['breadcrumb-bg-position'] : ''; ?>
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
                          $switchclass = array_key_exists("breadcrumb-darkbg",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("breadcrumb-darkbg",$portfolio_settings) ? ' checked="checked"' : '';?>

                          <div data-for="breadcrumb-darkbg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                          <input id="breadcrumb-darkbg" class="hidden" type="checkbox" name="breadcrumb-darkbg" value="true" <?php echo $checked;?>/>
                          <p class="note"> <?php _e('YES! to apply dark background.','dt_themes');?> </p>
                  </div>
              </div>
          </div>
          
      </div><!-- Breadcrumb Section Settings End-->
        
    <div class="column one-sixth">
		<label><?php _e('Sub Title','dt_themes');?></label>
	</div>

	<div class="column five-sixth last">
	<?php $subtitle = array_key_exists ( "sub-title", $portfolio_settings ) ? $portfolio_settings ['sub-title'] : '';?>
    
		<input id="sub-title" name="sub-title" type="text" class="widefat" 	value="<?php echo esc_attr( $subtitle );?>" />
		<p class="note"> <?php _e("If you wish! You can add sub title.",'dt_themes');?> </p>
        <div class="clear"></div>
	</div>
</div>
<!-- Sub Title End -->

<!-- Layout -->
<div class="custom-box ">
	<div class="column one-sixth">
		<label><?php _e('Layout','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<ul class="dt-bpanel-layout-set"><?php
		
		$layouts = array (
				'single-portfloio-layout-one' => 'portfolio-fullwidth',
				'single-portfloio-layout-two' => 'portfolio-with-left-gallery',
				'single-portfloio-layout-three' => 'portfolio-with-right-gallery' 
		);
		
		$v = array_key_exists ( "layout", $portfolio_settings ) ? $portfolio_settings ['layout'] : 'single-portfloio-layout-one';
		foreach ( $layouts as $key => $value ) {
			$class = ($key == $v) ? " class='selected' " : "";
			echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
		}
		?></ul>
		<?php $v = array_key_exists("layout",$portfolio_settings) ? $portfolio_settings['layout'] : 'single-portfloio-layout-one';?>
		<input id="mytheme-portfolio-layout" name="layout" type="hidden"
			value="<?php echo esc_attr( $v );?>" />
		<p class="note"> <?php _e("You can choose between a left, right or full width.",'dt_themes');?> </p>
	</div>

</div>
<!-- Layout End-->

<!-- Show Related Posts -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Related Projects','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	
	$switchclass = array_key_exists ( "show-related-items", $portfolio_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$checked = array_key_exists ( "show-related-items", $portfolio_settings ) ? ' checked="checked"' : '';
	?><div data-for="mytheme-related-item"
			class="dt-checkbox-switch <?php echo $switchclass;?>"></div>
		<input id="mytheme-related-item" class="hidden" type="checkbox"
			name="mytheme-related-item" value="true" <?php echo $checked;?> />
		<p class="note"> <?php _e('Would you like to show the related projects at the bottom','dt_themes');?> </p>
	</div>
</div>
<!-- Show Related Posts End-->

<!-- Show Social Share -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Social Share','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	$switchclass = array_key_exists ( "show-social-share", $portfolio_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$checked = array_key_exists ( "show-social-share", $portfolio_settings ) ? ' checked="checked"' : '';
	?><div data-for="mytheme-social-share"
			class="dt-checkbox-switch <?php echo $switchclass;?>"></div>
		<input id="mytheme-social-share" class="hidden" type="checkbox"
			name="mytheme-social-share" value="true" <?php echo $checked;?> />
		<p class="note"> <?php _e('Would you like to show the social share at the bottom','dt_themes');?> </p>
	</div>
</div>
<!-- Show Social Share End -->

<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Images','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php _e( 'Click Here to Add Images', 'dt_themes' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php _e( 'Click Here to Add Video', 'dt_themes' );?> </a>
		</div>
		<div class="clear"></div>

		<div class="dt-media-container">
			<ul class="dt-items-holder"><?php
			if (array_key_exists ( "items", $portfolio_settings )) {
				foreach ( $portfolio_settings ["items_thumbnail"] as $key => $thumbnail ) {
					$item = $portfolio_settings ['items'] [$key];
					$out = "";
					$name = "";
					$foramts = array (
							'jpg',
							'jpeg',
							'gif',
							'png' 
					);
					$parts = explode ( '.', $item );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					if (in_array ( $ext, $foramts )) {
						$name = $portfolio_settings ['items_name'] [$key];
						$out .= "<li>";
						$out .= "<img src='{$thumbnail}' alt='' />";
						$out .= "<span class='dt-image-name'>{$name}</span>";
						$out .= "<input type='hidden' name='items[]' value='{$item}' />";
					} else {
						$name = "video";
						$out .= "<li>";
						$out .= "<span class='dt-video'></span>";
						$out .= "<input type='text' name='items[]' value='{$item}' />";
					}
					
					$out .= "<input class='dt-image-name' type='hidden' name='items_name[]' value='{$name}' />";
					$out .= "<input type='hidden' name='items_thumbnail[]' value='{$thumbnail}' />";
					$out .= "<span class='my_delete'></span>";
					$out .= "</li>";
					echo $out;
				}
			}
			?></ul>
		</div>
	</div>
</div>
<!-- Medias End -->