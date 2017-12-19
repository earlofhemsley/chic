<?php get_header(); ?>
<div class="wrap standard-wrap container-fluid">
    <ul class="sewchic-loop-posts">
        <?php 
            while(have_posts()){
                the_post();
                get_template_part('template-parts/site/archivefeed');
            }
        ?>
    </ul>
    <?php echo get_archive_pagination_links();?>
    <div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
