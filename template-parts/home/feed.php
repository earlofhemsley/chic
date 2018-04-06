<?php
    $alignment_class = '';
    foreach(array(1 => 'first',2 => 'second',3 => 'third') as $num => $ordinal):
        $cat_id = intval(get_theme_mod("sewchic_home_category_$num"));
        if ($cat_id === -1 ){ continue; } // if do not display, then do not display
        
        $img_url_option = get_theme_mod("sewchic_home_category_{$num}_image");
        $posts_per_page = $img_url_option ? 2 : 3;
        
        $cat_obj = get_term($cat_id);
        $query = new WP_Query(array(
            'post_type' => array('post', 'product'),
            'posts_per_page' => $posts_per_page,
            'tax_query' => array(
                array(
                    'taxonomy' => $cat_obj->taxonomy,
                    'field' => 'term_id',
                    'terms' => $cat_obj->term_id
                ),
            ),
            'orderby' => 'rand',
            'sewchic_is_home' => true
        ));

        //if the category image isn't false,
        //use the image and a link to the designated category page in the template
        //else, start the loop
        
        //map necessary variables
        $link = null;
        $is_product_cat = $cat_obj->taxonomy == 'product_cat';
        $button_text = $is_product_cat ? __('Shop Now','sewchic') : __('Read the blog', 'sewchic');
        if($img_url_option){
            $img_url = $img_url_option;
        } else {
            if(!$query->have_posts()) 
                throw new Exception("Could not load posts for this category");
            $query->the_post();
            $img_url = common_get_feed_image_url();
        }


        //render template
?>
    <div class="sewchic-home-post-container <?php echo $alignment_class; ?>">
        <div class="sewchic-home-post-category">
            <a href="<?php echo get_term_link($cat_obj); ?>" class="sewchic-home-post sewchic-home-post-large" style="background-image: url('<?php echo $img_url; ?>');">
                <h1 class="sewchic-home-post-category-title"><?php echo $cat_obj->name; ?></h1>
                <div class="sewchic-home-button-text"><?php echo $button_text; ?></div>
            </a>
        </div>
        <div class="sewchic-home-post-products">
            <?php if($query->have_posts()) $query->the_post();?>
            <a href="<?php the_permalink(); ?>" class="sewchic-home-post sewchic-home-post-small" style="background-image: url('<?php echo common_get_feed_image_url(); ?>');">
            </a>
            <?php if($query->have_posts()) $query->the_post();?>
            <a href="<?php the_permalink(); ?>" class="sewchic-home-post sewchic-home-post-small" style="background-image: url('<?php echo common_get_feed_image_url(); ?>');">
            </a>
        </div>
    </div> 
<?php
    wp_reset_query();
    $alignment_class = empty($alignment_class) ? 'inverted' : '';
endforeach;
?>
