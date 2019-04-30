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

    common_link_posts();

?>
</article>
