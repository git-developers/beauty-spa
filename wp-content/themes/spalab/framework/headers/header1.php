    <div id="bbar-wrapper" class="type1">
    	<div id="bbar-body">
        	<div class="container">
            	<div class="column dt-sc-one-half first"><?php
					echo '<p class="bbar-text">'.get_bloginfo ( 'description' ).'</p>';
                    ?></div>
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