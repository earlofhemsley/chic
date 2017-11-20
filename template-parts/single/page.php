<!--
This template part is for single page, non-post content. It is a trimmed down, bare-bones approach to page content.
-->
<div id="header page-header">
    <h1><?php the_title(); ?></h1>
    <?php if(has_post_thumbnail(get_the_ID())): ?>
        <?php $caption = get_post(get_post_thumbnail_id())->post_excerpt; ?>
        <figure class="single-featured-image">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-hero'); ?>" />
            <?php if($caption) printf('<figcaption>%s</figcaption>',$caption); ?>    
        </figure>
    <?php endif; ?>
</div>
<div class="content page-content">
    <?php the_content(); ?>
</div>
