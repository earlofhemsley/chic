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
