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
    <div class="sewchic-home-post-container row">
        <h2><a href="<?php echo get_term_link($catObj); ?>"><?php echo $catObj->name;  ?></a></h2>
        <div class="col-sm-8">
            <a href="<?php the_permalink(); ?>" class="sewchic-home-post sewchic-home-post-large" style="background-image: url('<?php echo common_get_feed_image_url(); ?>');">
                <div class="sewchic-home-post-title"><?php the_title(); ?></div>
            </a>
        </div>
        <div class="col-sm-4">
            <?php if($query->have_posts()) $query->the_post();?>
            <a href="<?php the_permalink(); ?>" class="sewchic-home-post sewchic-home-post-small" style="background-image: url('<?php echo common_get_feed_image_url(); ?>');">
                <div class="sewchic-home-post-title"><?php the_title(); ?></div>
            </a>
            <?php if($query->have_posts()) $query->the_post();?>
            <a href="<?php the_permalink(); ?>" class="sewchic-home-post sewchic-home-post-small" style="background-image: url('<?php echo common_get_feed_image_url(); ?>');">
                <div class="sewchic-home-post-title"><?php the_title(); ?></div>
            </a>
        </div>
    </div> 
<?php
        wp_reset_query();
    endforeach;
?>
