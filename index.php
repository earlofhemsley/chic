<?php
get_header();
?>
<div class="sewchic-home-hero-wrapper">
    <div class="standard-wrap wrap sewchic-hero-body">
        <div class="sewchic-table">
            <div class="sewchic-row">
                <div class="sewchic-cell" id="sewchic-carousel-height-block">
                    <div class="sewchic-carousel-outer-wrapper">
                        <div class="sewchic-carousel-inner-wrapper">
                        <?php
                            $carousel = wp_nav_menu(array(
                                'theme_location' => 'carousel',
                                'container_class' => 'sewchic-carousel',
                                'echo' => false,
                                'items_wrap' => '%3$s', 
                            ));
                            $carousel = preg_replace('/<li[^>]*>/', '<div class="sewchic-carousel-item">', $carousel);
                            $carousel = preg_replace('/<\/li>/', '</div>', $carousel);
                            echo $carousel;
                        ?> 
                        </div>
                        <?php sewchic_carousel_script(); ?>
                    </div>
                </div>
                <div class="sewchic-cell text-center" id="sewchic-home-tower-container">
                    <img id="sewchic-home-tower-img" src="<?php echo get_theme_mod('front_page_tower_img'); ?>" />
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="sewchic-home-body-wrapper">
    <?php
        if(is_active_sidebar('home-body-social')){
            dynamic_sidebar('home-body-social');
        }
    ?>
    <?php if(!empty(get_theme_mod('sewchic_secondary_tagline'))): ?>
    <h2 id="sewchic-secondary-tagline" class="text-center">
        <?php echo get_theme_mod('sewchic_secondary_tagline'); ?>
    </h2>
    <?php endif; ?>
    <div class="standard-wrap wrap container-fluid">
        <div class="sewchic-home-body-content row">
            <div class="col-sm-8 col-sm-push-4">
            <?php
                foreach(array(1 => 'first',2 => 'second',3 => 'third') as $num => $ordinal):
                    $catNum = intval(get_theme_mod("sewchic_home_category_$num"));
                    $catObj = get_term($catNum);
                    $query = new WP_Query(array(
                        //'cat' => intval(get_theme_mod("sewchic_home_category_$num")),
                        'post_type' => array('post', 'product'),
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => true,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $catNum
                            ),
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $catNum
                            ),
                        ),
                    ));
                    if($query->have_posts()) $query->the_post();
            ?>
                <div class="sewchic-post-container row">
                    <h2><?php echo $catObj->name;  ?></h2>
                    <div class="col-sm-8">
                        <div class="sewchic-post sewchic-post-large">
                            <div class="sewchic-post-title"><?php the_title(); ?></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php if($query->have_posts()) $query->the_post();?>
                        <div class="sewchic-post sewchic-post-small">
                            <div class="sewchic-post-title"><?php the_title(); ?></div>
                        </div>
                        <?php if($query->have_posts()) $query->the_post();?>
                        <div class="sewchic-post sewchic-post-small">
                            <div class="sewchic-post-title"><?php the_title(); ?></div>
                        </div>
                    </div>
                </div> 
            <?php
                    wp_reset_query();
                endforeach;
            ?>
            </div>
            <div class="col-sm-4 col-sm-pull-8">
                <?php 
                    if(is_active_sidebar('home-body-left-rail')){
                        dynamic_sidebar('home-body-left-rail');
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="sewchic-home-footer-wrapper">
    <div class="standard-wrap wrap container-fluid">
        <div class="row">
            <?php
                $wpMenuLocations = get_nav_menu_locations();
                $navs = array();
                foreach(array(1,2,3,4) as $index){
                    $location = 'home-footer-'.$index;
                    if(array_key_exists($location, $wpMenuLocations)){
                        if($navMenuObject = wp_get_nav_menu_object($wpMenuLocations[$location])){
                            $navs[$location] = $navMenuObject->name;
                        } 
                    }
                }
                if(count($navs) > 0) {
                    $colClass = 'col-sm-' . (12/count($navs));
                    foreach($navs as $location => $navName){
                        echo "<div class='$colClass'>";
                            echo "<h2 class='sewchic-home-menu-title'>$navName</h2>";
                            wp_nav_menu(array(
                                'theme_location' => $location,
                                'menu_class' => 'sewchic-menu',
                                'container' => 'div',
                                'container_class' => 'sewchic-menu-container',
                                'container_id' => "sewchic-menu-$navName",
                            ));
                        echo '</div>';
                    
                    }
                }
            ?>
        </div>
    </div>
    <div class="sewchic-copyright">&copy;2017 <a href="http://landonhemsley.com" target="_blank">LandonHemsley.com</a></div>
</div>

<?php
get_footer();
?>
