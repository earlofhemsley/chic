<?php get_header(); ?>
<div class="wrap standard-wrap container-fluid">
    <div class="row">
        <div class="col-md-9">
        <?php 
            while(have_posts()){
                the_post();
                
                get_template_part('template-parts/single/content', get_post_format(get_the_ID()));
            }
        ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
