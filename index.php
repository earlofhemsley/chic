<?php
get_header();
?>
<div class="sewchic-home-body-wrapper">
    <div class="standard-wrap sewchic-home-body">
        <div class="row">
            <div class="col-sm-3">
                <div style="background:white;height: 100px; width:200px;margin:auto;">Small post</div>
            </div>
            <div class="col-sm-5">
                <div style="background:white;height: 500px; width: 100%;">Bigger post</div>
            </div>
            <div class="col-sm-4 text-center">
                <img id="sewchic-home-tower-img" src="<?php echo get_theme_mod('front_page_tower_img'); ?>" />
            </div>
        </div> 
    </div> 
</div>
<div class="sewchic-home-body-padding"></div>
<div class="sewchic-home-footer-wrapper">
    <div class="standard-wrap">
        <div class="text-center" id="sewchic-home-search">
            <?php get_search_form(); ?>
        </div>
        
        <?php if(!empty(get_theme_mod('sewchic_secondary_tagline'))): ?>
        <h2 id="sewchic-secondary-tagline" class="text-center sewchic-all-caps">
            <?php echo get_theme_mod('sewchic_secondary_tagline'); ?>
        </h2>
        <?php endif; ?>

    </div>
</div>

<?php
get_footer();
?>
