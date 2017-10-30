<?php
get_header();
?>
<div class="sewchic-home-body-wrapper">
    <div class="standard-wrap wrap sewchic-home-body">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-8">
                <div id="sewchic-carousel-height-block">
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

                        $settings = $GLOBALS['sewchic_carousel_settings'];
                    ?> 
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery('.sewchic-carousel').slick({
                                <?php   
                                    foreach($settings as $settingArray){
                                        if($settingArray['option_name'] === 'responsive') continue;
                                        $value = get_option("sc-carousel-{$settingArray['option_name']}-lg");
                                        if($value === false || $value == $settingArray['default_value']) continue;
                                        if(empty($value)) $value = 'false';
                                        if($value === '1') $value = 'true';
                                        if($settingArray['type'] == 'text') $value = "\"$value\"";
                                        echo "{$settingArray['option_name']} : $value,\r\n";               
                                    }
                                    if(get_option('sc-carousel-responsive-lg') === '1'){
                                        echo "responsive: [\r\n";
                                        foreach(array('md' => 1200, 'sm' => 992, 'xs' => 768) as $suffix => $size){
                                            echo "{\r\n";
                                            echo "breakpoint: $size,\r\n";
                                            echo "settings:{\r\n";
                                            foreach($settings as $settingArray){
                                                if($settingArray['option_name'] === 'responsive') continue;
                                                $value = get_option("sc-carousel-{$settingArray['option_name']}-$suffix");
                                                if($value === false ) continue;
                                                if(empty($value)) $value = 'false';
                                                if($value === '1') $value = 'true';
                                                if($settingArray['type'] == 'text') $value = "\"$value\"";
                                                echo "{$settingArray['option_name']} : $value,\r\n";               
                                            }
                                            echo "}\r\n";
                                            echo "},\r\n";
                                        }
                                        echo "]";
                                    }
                                ?>
                            });
                        });
                    </script>
                    </div>
                </div>
                </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-4 text-center">
                <img id="sewchic-home-tower-img" src="<?php echo get_theme_mod('front_page_tower_img'); ?>" />
            </div>
        </div> 
    </div> 
</div>
<div class="sewchic-home-footer-wrapper">
    <div class="standard-wrap wrap">
        <?php
            if(is_active_sidebar('header-social')){
                dynamic_sidebar('header-social');
            }
        ?>
        <?php if(!empty(get_theme_mod('sewchic_secondary_tagline'))): ?>
        <h2 id="sewchic-secondary-tagline" class="text-center">
            <?php echo get_theme_mod('sewchic_secondary_tagline'); ?>
        </h2>
        <?php endif; ?>
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
