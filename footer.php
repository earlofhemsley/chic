    <div class="sewchic-footer-wrapper">
        <div class="standard-wrap wrap">
            <div class="sewchic-row sewchic-row-reverse">
                <?php
                    if(is_active_sidebar('footer-widgets')){
                        echo '<div class="sewchic-cell force-half-width" id="sewchic_footer_widget_bin">';
                        dynamic_sidebar('footer-widgets');
                        echo '</div>';
                    }        
                    $wpMenuLocations = get_nav_menu_locations();
                    $navs = array();
                    foreach(array(2,1) as $index){
                        $location = 'home-footer-'.$index;
                        if(array_key_exists($location, $wpMenuLocations)){
                            if($navMenuObject = wp_get_nav_menu_object($wpMenuLocations[$location])){
                                $navs[$location] = $navMenuObject->name;
                            } 
                        }
                    }
                    if(count($navs) > 0) {
                        //$colClass = 'col-sm-' . (12/count($navs));
                        $colClass = 'sewchic-cell';
                        foreach($navs as $location => $navName){
                            echo "<div class='$colClass'>";
                                echo "<h2 class='sewchic-footer-menu-title'>$navName</h2>";
                                wp_nav_menu(array(
                                    'theme_location' => $location,
                                    'menu_class' => 'sewchic-menu sewchic-footer-menu',
                                    'container' => 'div',
                                    'container_class' => 'sewchic-footer-menu-container',
                                    'container_id' => "sewchic-footer-menu-$navName",
                                ));
                            echo '</div>';
                        
                        }
                    }
                ?>
                </div>
            </div>
            <div class="sewchic-copyright">&copy;<?php echo date("Y");?> <a href="http://landonhemsley.com" target="_blank">LandonHemsley.com</a></div>
        </div>
    </div>
    <?php wp_footer(); ?>
    </body>
</html>
