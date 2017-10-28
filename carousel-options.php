<?php
$GLOBALS['sewchic_carousel_settings'] = array(
    array(
        'title' => 'Accessibility',
        'label_for' => 'sc-carousel-accessibility',
        'option_name' => 'accessibility',
        'default_value' => 1,
        'description' => 'Enables tabbing and arrow key navigation',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Adaptive Height',
        'label_for' => 'carousel-adaptive-height',
        'option_name' => 'adaptiveHeight',
        'default_value' => 0,
        'description' => 'Enables adaptive height for single slide horizontal carousels',
        'type' => 'checkbox'
    ),
    array(
        'title' => 'Autoplay',
        'label_for' => 'carousel-autoplay',
        'option_name' => 'autoplay',
        'default_value' => 0,
        'description' => 'Enables autoplay',
        'type' => 'checkbox'
    ),
    array(
        'title' => 'Autoplay speed',
        'label_for' => 'carousel-autoplay-speed',
        'option_name' => 'autoplaySpeed',
        'default_value' => 3000,
        'description' => 'Autoplay speed in milliseconds (only relevant if autoplay is enabled).',
        'type' => 'integer'
    ),
    array(
        'title' => 'Arrows',
        'label_for' => 'carousel-arrows',
        'option_name' => 'arrows',
        'default_value' => 1,
        'description' => 'Show prev/next arrows',
        'type' => 'checkbox'
    ),
    array(
        'title' => 'Previous Arrow',
        'label_for' => 'carousel-prevArrow',
        'option_name' => 'prevArrow',
        'default_value' => '<button type=\'button\' class=\'slick-prev\'>Previous</button>',
        'description' => 'Customize the "Previous" arrow HTML (also will accept jQuery selector, if you know one)',
        'type' => 'text'
    ),
    array(
        'title' => 'Next Arrow',
        'label_for' => 'carousel-nextArrow',
        'option_name' => 'nextArrow',
        'default_value' => '<button type=\'button\' class=\'slick-next\'>Next</button>',
        'description' => 'Customize the "Next" arrow HTML (also will accept jQuery selector, if you know one)',
        'type' => 'text'
    ),
    array(
        'title' => 'Center Mode',
        'label_for' => 'carousel-center-mode',
        'option_name' => 'centerMode',
        'default_value' => 0,
        'description' => 'Enables center view with partial prev/next slides. Use with odd-numbered slidesToShow counts',
        'type' => 'checkbox'
    ),
    array(
        'title' => 'Center Padding',
        'label_for' => 'carousel-center-padding',
        'option_name' => 'centerPadding',
        'default_value' => '50px',
        'description' => 'Side padding when in center mode (px or %)',
        'type' => 'text',
    ),
    array(
        'title' => 'CSS Ease',
        'label_for' => 'carousel-css-ease',
        'option_name' => 'cssEase',
        'default_value' => 'ease',
        'description' => 'CSS3 animation easing (see <a href="https://www.w3schools.com/cssref/css3_pr_animation-timing-function.asp" target="_blank">W3Schools</a>)',
        'type' => 'text',
    ),
    array(
        'title' => 'Dots',
        'label_for' => 'carousel-dots',
        'option_name' => 'dots',
        'default_value' => 0,
        'description' => 'Show dot indicators',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Dots Class',
        'label_for' => 'carousel-dots-class',
        'option_name' => 'dotsClass',
        'default_value' => 'slick-dots',
        'description' => 'Class for slide indicator dots container',
        'type' => 'text',
    ),
    array(
        'title' => 'Draggable',
        'label_for' => 'carousel-draggable',
        'option_name' => 'draggable',
        'default_value' => 1,
        'description' => 'Enable mouse dragging',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Fade',
        'label_for' => 'carousel-fade',
        'option_name' => 'fade',
        'default_value' => 0,
        'description' => 'Enable fade on transition',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Focus On Select',
        'label_for' => 'carousel-focus-on-select',
        'option_name' => 'focusOnSelect',
        'default_value' => 0,
        'description' => 'Enable focus on selected element (click)',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Easing',
        'label_for' => 'carousel-easing',
        'option_name' => 'easing',
        'default_value' => 'linear',
        'description' => 'Add easing for jQuery animate. Use with easing libraries or default easing methods',
        'type' => 'text',
    ),
    array(
        'title' => 'Edge Friction',
        'label_for' => 'carousel-edge-friction',
        'option_name' => 'edgeFriction',
        'default_value' => 0.15,
        'description' => 'Resistance when swiping edges of non-infinite carousels',
        'type' => 'decimal',
    ),
    array(
        'title' => 'Infinite Loop',
        'label_for' => 'carousel-infinite',
        'option_name' => 'infinite',
        'default_value' => 1,
        'description' => 'Infinite loop sliding',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Lazy Loading',
        'label_for' => 'carousel-lazyload',
        'option_name' => 'lazyLoad',
        'default_value' => 'ondemand',
        'description' => 'Set lazy loading technice. Accepts "ondemand" or "progressive"',
        'type' => 'text',
    ),
    //array(
    //    'title' => 'Mobile First',
    //    'label_for' => 'carousel-mobile-first',
    //    'option_name' => 'mobileFirst',
    //    'default_value' => 0,
    //    'description' => 'Responsive settins use mobile first calculation',
    //    'type' => 'checkbox',
    //),
    array(
        'title' => 'Pause on Focus',
        'label_for' => 'carousel-pause-focus',
        'option_name' => 'pauseOnFocus',
        'default_value' => 1,
        'description' => 'Pause autoplay on focus event (autoplay must be turned on to be effective)',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Pause on Hover',
        'label_for' => 'carousel-pause-hover',
        'option_name' => 'pauseOnHover',
        'default_value' => 1,
        'description' => 'Pause autoplay on hover event (autoplay must be turned on to be effective)',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Pause on Dots Hover',
        'label_for' => 'carousel-pause-dots-hover',
        'option_name' => 'pauseOnDotsHover',
        'default_value' => 0,
        'description' => 'Pause autoplay when a dot is hovered (autoplay must be turned on)',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Number of Rows',
        'label_for' => 'carouseel-rows',
        'option_name' => 'rows',
        'default_value' => '1',
        'description' => 'Setting this to more than one initializes grid mode. Use Slides Per Row to set how many slides should be in each row.',
        'type' => 'integer',
    ),
    //slide??
    array(
        'title' => 'Slides Per Row',
        'label_for' => 'carousel-slides-per-row',
        'option_name' => 'slidesPerRow',
        'default_value' => '1',
        'description' => 'With grid mode intialized via the rows option, this sets how many slides are in each grid row',
        'type' => 'integer',
    ),
    array(
        'title' => 'SlidesToShow',
        'label_for' => 'carousel-slides-to-show',
        'option_name' => 'slidesToShow',
        'default_value' => '1',
        'description' => 'Number of slides to show',
        'type' => 'integer',
    ),
    /*
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
    array(
        'title' => '',
        'label_for' => '',
        'option_name' => '',
        'default_value' => '',
        'description' => '',
        'type' => '',
    ),
     */

);


function sewchic_carousel_options(){
    add_theme_page('Carousel Options', 'Carousel Options', 'edit_theme_options', 'sewchic-carousel', 'sewchic_carousel_admin_content');

}
add_action('admin_menu','sewchic_carousel_options');

function sewchic_carousel_admin_content(){
    if(!current_user_can('edit_theme_options')){
        wp_die(__('You do not have permission to access this page', 'sewchic'));
    }

    echo "<h1>Sewchic Theme Homepage Carousel Options</h1>";
    echo '<form action="options.php" method="POST">';
    settings_fields('sewchic-carousel');
    do_settings_sections('sewchic-carousel');
    //do_settings_fields('sewchic-carousel', 'carousel_settings_section');
    submit_button();
    echo '</form>';
}

function sewchic_init_carousel_options(){
    add_settings_section('carousel_settings_section', '', 'sewchic_carousel_section_callback','sewchic-carousel');
    global $sewchic_carousel_settings;

    foreach($sewchic_carousel_settings as $settingArray){
        add_settings_field('sc-carousel-'.$settingArray['option_name'], $settingArray['title'], 'sewchic_input_callback', 'sewchic-carousel','carousel_settings_section', $settingArray);
        register_setting('sewchic-carousel', 'sc-carousel-'.$settingArray['option_name']);
    }

}
add_action('admin_init', 'sewchic_init_carousel_options');

function sewchic_carousel_section_callback(){
    echo "<p>Select your options for the home page carousel. These options will affect how your carousel behaves. To adjust the content of the carousel, refer to the Menus page</p>";
    echo "<p style='font-weight:bold;'>DON'T MESS WITH THESE UNLESS YOU KNOW WHAT YOU'RE DOING</p>";
}

function sewchic_input_callback($args){
    extract($args);
    $option = get_option('sc-carousel-'.$option_name);
    //var_dump($option);
    $option = ($option === false || (empty($option) && $type != 'checkbox')) ? $default_value : $option;

    $setDefaults = true;
    switch($type){
        case "checkbox":
            $value = '1';
            $checked = checked(1, $option, false);
            $style = '';
            $setDefaults = false;
            break;
        case "decimal":
            $type = 'number" step=".01';
            break;
        case "integer":
            $type = 'number';
            break;
        default: 
            break;
    }
    if($setDefaults){ //text (or similar)
        $value = $option;
        $checked = '';
        $style = "max-width:300px; width:100%;";
    }
    
    echo <<< EOT
        <input type="$type" name="sc-carousel-$option_name" style="$style" id="$label_for" value="$value" $checked /><br /><span class="description">$description</span>
EOT;

}

function sewchic_place_notice_in_menus_menu(){
    echo "<h2>Additional configuration options exist for the Carousel Menu, because it's special. Go <a href='#'>here</a> to set them</h2>";
}
add_action('after_menu_locations_table','sewchic_place_notice_in_menus_menu');

function sewchic_menu_image_size_filter($sizes){
    return array(
        'menu-sewchic' => array(100,500,false)
    );

}
add_filter('menu_image_default_sizes', 'sewchic_menu_image_size_filter');


?>
