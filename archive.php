<?php get_header(); ?>
<div class="wrap standard-wrap">
    <?php
        $wpq = $GLOBALS['wp_query'];
        if(is_category()) $headline = 'Category: ' . $wpq->queried_object->name;
        if(is_tag()) $headline = 'Tag: ' . $wpq->queried_object->name;
        if(!empty($headline)) {
            echo "<h1>$headline</h1>";
            if(!empty($wpq->queried_object->description)) echo "<h2>{$wpq->queried_object->description}</h2>";
        }
    ?>
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
