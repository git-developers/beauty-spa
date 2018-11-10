<?php
global $post;
$catalog_settings = get_post_meta ( $post->ID, '_catalog_settings', TRUE );
$catalog_settings = is_array ( $catalog_settings ) ? $catalog_settings : array (); ?>

<!-- Additional Fields -->
<div class="custom-box">
    			<!-- Breadcrumb Section Settings -->
                <div id="tpl-breadcrumbsection-settings">
                    <div class="custom-box">
                        <div class="column one-sixth">
                            <label><?php _e('Breadcrumb Section','dt_themes');?> </label>
                        </div>
                        <div class="column four-sixth last">
                            <?php $switchclass = array_key_exists("disable_breadcrumb_section",$catalog_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                                  $checked = array_key_exists("disable_breadcrumb_section",$catalog_settings) ? ' checked="checked"' : '';?>
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
                        <?php $breadcrumbsubtitle = array_key_exists ( "breadcrumb-sub-title", $catalog_settings ) ? $catalog_settings ['breadcrumb-sub-title'] : '';?>
                        
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
                                <?php $subtitlebg = array_key_exists ( "breadcrumb-bg", $catalog_settings ) ? $catalog_settings ['breadcrumb-bg'] : '';?>
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
                                <?php $bgrepeat =  array_key_exists ( "breadcrumb-bg-repeat", $catalog_settings ) ? $catalog_settings ['breadcrumb-bg-repeat'] : ''; ?>
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
                                <?php $bgposition =  array_key_exists ( "breadcrumb-bg-position", $catalog_settings ) ? $catalog_settings ['breadcrumb-bg-position'] : ''; ?>
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
                                    $switchclass = array_key_exists("breadcrumb-darkbg",$catalog_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                                    $checked = array_key_exists("breadcrumb-darkbg",$catalog_settings) ? ' checked="checked"' : '';?>
    
                                    <div data-for="breadcrumb-darkbg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                                    <input id="breadcrumb-darkbg" class="hidden" type="checkbox" name="breadcrumb-darkbg" value="true" <?php echo $checked;?>/>
                                    <p class="note"> <?php _e('YES! to apply dark background.','dt_themes');?> </p>
    
                            </div>
                        </div>
                    </div>
                    
                </div><!-- Breadcrumb Section Settings End-->
    <div class="column one-half">
        <label><?php _e('Sub Title','dt_themes');?></label>
    </div>
    <div class="column one-half last">
        <?php $v = array_key_exists("subtitle", $catalog_settings) ?  $catalog_settings['subtitle'] : '';?>
        <textarea id="subtitle" name="_subtitle" class="large" rows="3" style="width:100%;"><?php echo $v; ?></textarea>
        <p class="note"> <?php _e("You can given your sub title",'dt_themes');?> </p>
    </div>

    <div class="column one-half">
        <label><?php _e('Price','dt_themes');?></label>
    </div>
    <div class="column one-half last">
        <?php $v = array_key_exists("price",$catalog_settings) ?  $catalog_settings['price'] : '';?>
        <input id="price" name="_price" class="large" type="text" value="<?php echo esc_attr( $v ); ?>" style="width:100%;" />
        <p class="note"> <?php _e("Enter item price here (eg : $12.50)",'dt_themes'); ?> </p>
    </div>
    
    <div class="column one-half">
        <label><?php _e('Dummy Price','dt_themes');?></label>
    </div>
    <div class="column one-half last">
        <?php $v = array_key_exists("dummyprice",$catalog_settings) ?  $catalog_settings['dummyprice'] : '';?>
        <input id="dummyprice" name="_dummyprice" class="large" type="text" value="<?php echo esc_attr( $v ); ?>" style="width:100%;" />
        <p class="note"> <?php _e("Enter dummy item price here (eg : $12.50)",'dt_themes'); ?> </p>
    </div>

    <div class="column one-half">
        <label><?php _e('Link','dt_themes');?></label>
    </div>
    <div class="column one-half last">
        <?php $v = array_key_exists("link",$catalog_settings) ?  $catalog_settings['link'] : '';?>
        <input id="link" name="_link" class="large" type="text" value="<?php echo esc_attr( $v );?>" style="width:100%;" />
        <p class="note"> <?php _e("Enter item link here (eg : http://somedomain.com)",'dt_themes'); ?> </p>
    </div>
</div>
<!-- Additional Fields End -->