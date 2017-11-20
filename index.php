<?php
get_header();
?>
<div class="sewchic-home-body-wrapper">
    <div class="standard-wrap wrap container-fluid">
        <div class="sewchic-home-body-content row">
            <div class="col-xs-12">
                <h2>Well, this is awkward.</h2>
                <p>We're not sure how you ended up here, but you shouldn't have.</p>
                <a href="<?php echo site_url(); ?>" class="btn btn-default">Go back to the home page</a>
            </div>
        </div>
    </div>
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
</div>
<?php
get_footer();
?>
