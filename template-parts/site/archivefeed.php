<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>">
    <div class="sewchic-loop-post_image" style="background-image: url('<?php echo common_get_feed_image_url(); ?>'); width:200px; height:200px;" ></div>
        <h2 class="sewchic-loop-post_title"><?php the_title(); ?></h2>
    </a>
</li>
