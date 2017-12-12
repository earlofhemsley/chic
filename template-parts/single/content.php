<article id="post-<?php the_ID(); ?>" <?php post_class(array('sewchic-single', 'post-type-default')); ?> >
    <h1 class="sewchic-single-title"><?php echo get_the_title(); ?></h1>
<?php 
    echo common_get_single_meta(); 
    if(has_post_thumbnail(get_the_ID()) && common_is_on_page_one() ): 
?>            
        <figure class="sewchic-single-featured-image">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-hero'); ?>" />
<?php
            $caption = get_post(get_post_thumbnail_id())->post_excerpt;
            if($caption) echo sprintf('<figcaption>%s</figcaption>', $caption);
?>
        </figure>
<?php
    endif;
    printf('<div class="%s">%s</div>',
        'sewchic-single-content sewchic-post',
        apply_filters('the_content', get_the_content())
    );

    wp_link_pages(array(
        'before'            =>  '<p class="elegance-single-pagination">',
        'after'             =>  '</p>',
        'next_or_number'    =>  'number'
    ));
?>
</article>
