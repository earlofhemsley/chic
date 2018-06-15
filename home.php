<?php get_header(); ?>
<div class="wrap standard-wrap">
    <div class="sewchic-row">
        <div class="sewchic-cell">
            <ul class="sewchic-loop-posts">
                <?php
                    while(have_posts()){
                        the_post();
                        get_template_part('template-parts/site/archivefeed');
                    }
                ?>
            </ul>
            <?php echo get_archive_pagination_links();?>
        </div>
        <div class="sewchic-cell force-quarter-width">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
