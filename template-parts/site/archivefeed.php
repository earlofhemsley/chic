<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>">
    <div class="sewchic-loop-post__image" style="background-image: url('<?php echo common_get_feed_image_url('feednail'); ?>');">
    </div>
        <h2 class="sewchic-loop-post__title"><?php the_title(); ?></h2>
    </a>
</li>
