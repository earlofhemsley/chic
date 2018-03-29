<?php get_header(); ?>
<div class="wrap standard-wrap sewchic-table">
    <div class="sewchic-row">
        <div class="sewchic-cell">
            <?php
                while(have_posts()){
                    the_post();
                    get_template_part('template-parts/single/page');
                }
            ?>
        </div>
        <div class="sewchic-cell sewchic-right-rail">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
