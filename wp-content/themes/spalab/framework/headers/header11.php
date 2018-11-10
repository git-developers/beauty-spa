    <div id="bbar-wrapper" class="type11">
    	<div id="bbar-body">
        	<div class="container">
            	<div class="column dt-sc-one-half first"><?php
					echo do_shortcode('[social/]'); ?></div>
                <div class="column dt-sc-one-half alignright"><?php
					global $dt_allowed_html_tags;
					$top_msg = stripslashes(dttheme_option('general','top-message'));
					echo wp_kses(do_shortcode($top_msg), $dt_allowed_html_tags );				
				?></div>
            </div>
        </div>
        <span class="bbar-divider"></span>
    </div>