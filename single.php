<?php get_header(); ?>
<div class="wrap standard-wrap sewchic-table">
    <div class="sewchic-row">
        <div class="sewchic-cell">
        <?php 
            while(have_posts()){
                the_post();
                
                get_template_part('template-parts/single/content', get_post_format(get_the_ID()));
                if(comments_open() || get_comments_number()) comments_template();
            }
        ?>
        </div>
        <div class="sewchic-cell sewchic-right-rail force-one-fifth">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
