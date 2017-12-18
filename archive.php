<?php get_header(); ?>
<div class="wrap standard-wrap">
    <ul class="sewchic-loop-posts">
        <?php 
            while(have_posts()){
                the_post();
                get_template_part('template-parts/site/archivefeed');
            }
        ?>
    </ul>
    <div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
