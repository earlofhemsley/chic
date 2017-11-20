<?php get_header(); ?>

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
                    get_template_part('template-parts/home/feed');
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

<div class="sewchic-home-sidebar-wrapper">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
