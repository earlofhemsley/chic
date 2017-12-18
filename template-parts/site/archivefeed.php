<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>">
    <div class="sewchic-post" style="background-image:<?php echo common_get_feed_image_url(); ?>;"></div>
        <?php the_title(); ?>
    </a>
</li>
