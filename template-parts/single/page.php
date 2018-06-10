<!--
This template part is for single page, non-post content. It is a trimmed down, bare-bones approach to page content.
-->
<article id="page-<?php the_ID(); ?>" <?php post_class("header page-header"); ?>>
    <h1 class="sewchic-single-title"><?php echo get_the_title(); ?></h1>
<?php 
    if(has_post_thumbnail(get_the_ID()) && common_is_on_page_one() ){
        Enhanced_Featured_Image_Meta_Box::display('post-hero', 'sewchic-single-featured-image');
    }
    
    printf('<div class="%s">%s</div>',
        'sewchic-single-content sewchic-page',
        apply_filters('the_content', get_the_content())
    );

?>
</article>
