<?php
    if ( is_page() && !is_front_page() ):
        global $post;
        dttheme_title_section( $post->ID, 'page' );
    elseif( is_singular('post') ):    
        global $post;
        dttheme_title_section( $post->ID, 'post' );
	elseif( is_singular('dt_portfolios' )):
    	global $post;
        dttheme_title_section( $post->ID, 'dt_portfolios' );
    elseif( is_singular( 'product' ) ):  
        global $post;
        $title = get_the_title($post->ID);
        echo "<div class='container'>";
		echo '	<h1 class="hr-title dt-page-title">';
		echo '		<span>';
		echo "			{$title}";
        echo '		</span>';					
		echo '	</h1>';
		echo '</div>';
    elseif( is_attachment() ):
        global $post;
        $my_query = get_post($post->post_parent);            
        $subtitle =  get_the_title($my_query->ID);
        dttheme_custom_subtitle_section( __('Attachment','dt_themes') ,$subtitle);
    elseif( is_tax() ):
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $title = $term->name;
        dttheme_custom_subtitle_section($title);
    elseif( is_post_type_archive('product') ):
        dttheme_title_section( get_option('woocommerce_shop_page_id'), 'page' );
	elseif( is_category( ) ):
        dttheme_custom_subtitle_section(single_cat_title('',FALSE) );
    elseif( is_tag( ) ):
        dttheme_custom_subtitle_section(single_tag_title('',FALSE) );
    elseif( is_author() ):
        $curauth = get_user_by('slug',get_query_var('author_name')) ;   
        dttheme_custom_subtitle_section($curauth->nickname );
    elseif( is_year() ): 
        dttheme_custom_subtitle_section(get_the_time('Y'));   
    elseif( is_month() ): 
        dttheme_custom_subtitle_section(get_the_time('F'));   
    elseif( is_search() ):
        dttheme_custom_subtitle_section(__('Search','dt_themes'));
    elseif( is_404() ):
        dttheme_custom_subtitle_section(__('LOST','dt_themes'));
    endif; ?>