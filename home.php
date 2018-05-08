<?php get_header(); ?>

<div class="sewchic-home-hero-wrapper">
    <div class="stepped-wrap wrap sewchic-hero-body">
        <div class="sewchic-home-page-hero"> 
            <?php 
                if(is_active_sidebar('home-page-hero')){ dynamic_sidebar('home-page-hero'); }
            ?>    
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
    <div class="standard-wrap wrap">
        <div class="sewchic-home-body-content">
            <div>
                <?php 
                    get_template_part('template-parts/home/feed');
                ?>
            </div>
        </div>
        <div class="sewchic-home-secondary-content">
            <?php 
                if(is_active_sidebar('home-body-lower')) { dynamic_sidebar('home-body-lower'); }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
