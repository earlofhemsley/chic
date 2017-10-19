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
    <div class="tight-wrap wrap">
        <div class="text-center" id="sewchic-home-search">
            <?php get_search_form(); ?>
        </div>
        
        <?php if(!empty(get_theme_mod('sewchic_secondary_tagline'))): ?>
        <h2 id="sewchic-secondary-tagline" class="text-center">
            <?php echo get_theme_mod('sewchic_secondary_tagline'); ?>
        </h2>
        <?php endif; ?>
        <div class="row">
            <?php
                $wpMenuLocations = get_nav_menu_locations();
                foreach(array('left', 'center', 'right') as $location){
                    $navName = "";
                    if(array_key_exists("home-footer-$location", $wpMenuLocations))
                        $navName = ($navMenuObject = wp_get_nav_menu_object($wpMenuLocations["home-footer-$location"])) ? $navMenuObject->name : "";

                    echo '<div class="col-sm-4">';
                        echo "<h2 class='sewchic-home-menu-title'>$navName</h2>";
                        wp_nav_menu(array(
                            'theme_location' => "home-footer-$location",
                            'menu_class' => 'sewchic-menu',
                            'container' => 'div',
                            'container_class' => 'sewchic-menu-container',
                            'container_id' => "sewchic-menu-footer-$location",
                            'fallback_cb' => function($menu){ echo "<p>Menu {$menu["theme_location"]} not defined</p>"; },
                        ));
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <div class="sewchic-copyright">&copy;2017 <a href="http://landonhemsley.com" target="_blank">LandonHemsley.com</a></div>
</div>

<?php
get_footer();
?>
