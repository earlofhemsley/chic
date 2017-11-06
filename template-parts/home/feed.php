<?php
    foreach(array(1 => 'first',2 => 'second',3 => 'third') as $num => $ordinal):
        $catObj = get_term(intval(get_theme_mod("sewchic_home_category_$num")));
        //var_dump($catObj);
        $query = new WP_Query(array(
            'post_type' => array('post', 'product'),
            'posts_per_page' => 3,
            'tax_query' => array(
                array(
                    'taxonomy' => $catObj->taxonomy,
                    'field' => 'term_id',
                    'terms' => $catObj->term_id
                ),
            ),
            'sewchic_is_home' => true
        ));
        //var_dump($query);
        if($query->have_posts()) $query->the_post();
?>
    <div class="sewchic-post-container row">
        <h2><a href="<?php echo get_term_link($catObj); ?>"><?php echo $catObj->name;  ?></a></h2>
        <div class="col-sm-8">
            <div class="sewchic-post sewchic-post-large" style="background-image: url('<?php echo sewchic_get_feed_image_url(); ?>');">
                <div class="sewchic-post-title"><?php the_title(); ?></div>
            </div>
        </div>
        <div class="col-sm-4">
            <?php if($query->have_posts()) $query->the_post();?>
            <div class="sewchic-post sewchic-post-small" style="background-image: url('<?php echo sewchic_get_feed_image_url(); ?>');">
                <div class="sewchic-post-title"><?php the_title(); ?></div>
            </div>
            <?php if($query->have_posts()) $query->the_post();?>
            <div class="sewchic-post sewchic-post-small" style="background-image: url('<?php echo sewchic_get_feed_image_url(); ?>');">
                <div class="sewchic-post-title"><?php the_title(); ?></div>
            </div>
        </div>
    </div> 
<?php
        wp_reset_query();
    endforeach;
?>
