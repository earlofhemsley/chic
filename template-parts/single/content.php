<article id="post-<?php the_ID(); ?>" <?php post_class(array('sewchic-single', 'post-type-default')); ?> >
    <h1 class="sewchic-single-title"><?php echo get_the_title(); ?></h1>
<?php 
    echo common_get_single_meta(); 
    if(has_post_thumbnail(get_the_ID()) && common_is_on_page_one() ){
        Enhanced_Featured_Image_Meta_Box::display('post-hero','sewchic-single-featured-image');

    }
    printf('<div class="%s">%s</div>',
        'sewchic-single-content sewchic-post',
        apply_filters('the_content', get_the_content())
    );

    wp_link_pages(array(
        'before'            =>  sewchic_link_pages_before(),
        'after'             =>  sewchic_link_pages_after(),
        'next_or_number'    =>  'number',
        'separator'         =>  "</li>\r\n<li>"
    ));

    $prev_post_link = get_previous_post_link('<div class="sewchic-post-link sewchic-prev-post-link"><span class="sewchic-post-link-arrow">&larr; </span><span class="sewchic-post-link-label">Previously: </span>%link</div>');
    $next_post_link = get_next_post_link('<div class="sewchic-post-link sewchic-next-post-link"><span class="sewchic-post-link-label">Next: </span>%link<span class="sewchic-post-link-arrow"> &rarr;</div>');
    
    if(!empty($prev_post_link) || !empty($next_post_link)){
        echo '<hr style="clear:both;"/>';
        printf('<h3 class="sewchic-post-link-read-more">%s</h3>', __('Read more', 'sewchic'));
        printf('<div class="%1$s">%2$s %3$s</div>',
            'sewchic-post-links',
            $prev_post_link,
            $next_post_link
        );
    }

?>
</article>
