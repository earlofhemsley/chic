<?php

$GLOBALS['sewchic_carousel_responsive'] = array(
        'title' => 'Responsive Design',
        'label_for' => 'sc-carousel-responsive',
        'option_name' => 'responsive',
        'default_value' => 0,
        'description' => 'Set this option to enable responsive design settings. Additional tabs will appear, which will give you control over how the slider is handled as the size of the window changes.',
        'type' => 'checkbox',
        'suffix' => 'rs'
);

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
        'title' => 'Slides To Show',
        'label_for' => 'carousel-slides-to-show',
        'option_name' => 'slidesToShow',
        'default_value' => '1',
        'description' => 'Number of slides to show',
        'type' => 'integer',
    ),
    array(
        'title' => 'Slides to Scroll',
        'label_for' => 'carousel-slides-to-scroll',
        'option_name' => 'slidesToScroll',
        'default_value' => '1',
        'description' => 'Number of slides to scroll on click / swipe',
        'type' => 'integer',
    ),
    array(
        'title' => 'Speed',
        'label_for' => 'carousel-transition-speed',
        'option_name' => 'speed',
        'default_value' => '300',
        'description' => 'Slide/fade animation speed',
        'type' => 'integer',
    ),
    array(
        'title' => 'Swipe',
        'label_for' => 'carousel-swipe',
        'option_name' => 'swipe',
        'default_value' => 1,
        'description' => 'Enable/Disable swiping',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Swipe to slide',
        'label_for' => 'carousel-swipe-to-slide',
        'option_name' => 'swipeToSlide',
        'default_value' => 0,
        'description' => 'Allow users to drag or swipe directly to a slide irrespective of slidesToScroll',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Touch move',
        'label_for' => 'carousel-touchmove',
        'option_name' => 'touchMove',
        'default_value' => 1,
        'description' => 'Enable/disable slide motion with touch',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Touch threshold',
        'label_for' => 'carousel-touch-threshold',
        'option_name' => 'touchThreshold',
        'default_value' => '5',
        'description' => 'To advance slides, the user must swipe a length of (1/threshold)*the width of the slider',
        'type' => 'integer',
    ),
    array(
        'title' => 'Variable Width Slides',
        'label_for' => 'carousel-variable-width',
        'option_name' => 'variableWidth',
        'default_value' => 0,
        'description' => 'Enable support for variable width slides. If your images are not all the same size, select this.',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Vertical Slide Mode',
        'label_for' => 'carousel-vertical',
        'option_name' => 'vertical',
        'default_value' => 0,
        'description' => 'Enables vertical slide mode',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Vertical Swiping',
        'label_for' => 'carousel-vertical-swiping',
        'option_name' => 'verticalSwiping',
        'default_value' => 0,
        'description' => 'Enable vertical swiping mode',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Right to Left',
        'label_for' => 'carousel-rtl',
        'option_name' => 'rtl',
        'default_value' => 0,
        'description' => 'Invert the direction of the carousel to become right-to-left',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Wait for Animate',
        'label_for' => 'carousel-wfa',
        'option_name' => 'waitForAnimate',
        'default_value' => 1,
        'description' => 'Ignores requests to advance the slide while animating',
        'type' => 'checkbox',
    ),
    array(
        'title' => 'Z-index',
        'label_for' => 'carousel-zindex',
        'option_name' => 'zindex',
        'default_value' => '1000',
        'description' => 'Set the z-index values for slides (useful for IE9 and older)',
        'type' => 'integer',
    ),
    array(
        'title' => 'Unslick',
        'label_for' => 'sc-carousel-unslick',
        'option_name' => 'unslick',
        'default_value' => 0,
        'description' => 'Disable the slider for this size of window AND SMALLER (Warning: Don\'t do this unless you understand the consequences. Original HTML will be rendered, and resizing the window larger than this size will not re-enable the slider. Once a slider is disabled, it is disabled until page reload.)',
        'type' => 'checkbox'
    ),
);


function sewchic_carousel_options(){
    add_theme_page('Carousel Options', 'Carousel Options', 'edit_theme_options', 'sewchic-carousel', 'sewchic_carousel_admin_content');
}
add_action('admin_menu','sewchic_carousel_options');

function sewchic_carousel_admin_content(){
    global $sewchic_carousel_responsive;
    if(!current_user_can('edit_theme_options')){
        wp_die(__('You do not have permission to access this page', 'sewchic'));
    }
    $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'lg';

    if(get_option('sc-carousel-responsive-lg' !== '1' && $active_tab === 'lg'))
        wp_die('Cannot access responsive settings unless responsive design is enabled');
    
    $tabs = array(
        'lg' => 'Full Screen / Large',
        'md' => 'Medium Size',
        'sm' => 'Small Size',
        'xs' => 'Extra Small / Mobile',
        'rs' => 'Responsive Design settings'
    );

    echo '<h1>Carousel Customization Options</h1>' ;
    if(get_option('sc-carousel-responsive-lg') === '1'):
    echo '<h2 class="nav-tab-wrapper">';

    $rs_opt = get_option("sc-carousel-{$sewchic_carousel_responsive['option_name']}-{$sewchic_carousel_responsive['suffix']}");

    foreach($tabs as $key => $title){
        if($rs_opt !== '1' && !in_array($key, array('lg','rs'), true)) continue;
        $class = "nav-tab";
        $class .= $active_tab == $key ? ' nav-tab-active' : '';
        echo "<a href='?page=sewchic-carousel&tab=$key' class='nav-tab $class'>$title</a>";
    }
    echo '</h2>';
    endif;

    echo '<form action="options.php" method="POST">';
    settings_fields('sewchic-carousel-page-'.$active_tab);
    do_settings_sections('sewchic-carousel-page-'.$active_tab);
    submit_button();
    echo '</form>';
}

function sewchic_init_carousel_options(){
    global $sewchic_carousel_settings, $sewchic_carousel_responsive, $sewchic_carousel_unslick;

    add_settings_section(
        'sc-carousel-section-rs',
        'Responsive design settings',
        function(){},
        'sewchic-carousel-page-rs'
    );
    add_settings_field(
        "sc-carousel-{$sewchic_carousel_responsive['option_name']}-{$sewchic_carousel_responsive['suffix']}",
        $sewchic_carousel_responsive['title'],
        'sewchic_input_callback',
        'sewchic-carousel-page-rs',
        'sc-carousel-section-rs',
        $sewchic_carousel_responsive
    );
    register_setting('sewchic-carousel-page-rs', "sc-carousel-{$sewchic_carousel_responsive['option_name']}-{$sewchic_carousel_responsive['suffix']}");

    foreach(array('xs','sm','md','lg') as $suffix){

        add_settings_section(
            "sc-carousel-section-$suffix", 
            '', 
            "sewchic_carousel_section_cb_$suffix", 
            'sewchic-carousel-page-'.$suffix
        );

        foreach($sewchic_carousel_settings as $settings){
            $settings['suffix'] = $suffix;
            add_settings_field(
                "sc-carousel-{$settings['option_name']}-$suffix",
                $settings['title'], 
                'sewchic_input_callback', 
                'sewchic-carousel-page-'.$suffix,
                "sc-carousel-section-$suffix", 
                $settings
            );
            register_setting('sewchic-carousel-page-'.$suffix,"sc-carousel-{$settings['option_name']}-$suffix");
        }
    }
}
add_action('admin_init', 'sewchic_init_carousel_options');

function sewchic_carousel_section_cb_lg(){
    if(get_option('sc-carousel-responsive-lg') === '1')
        echo ' <h3>Full-screen and large view carousel settings</h3> <p class="description">The breakpoint for large screens is 1200 pixels</p> ';
}

function sewchic_carousel_section_cb_md(){
    echo ' <h3>Medium view carousel settings</h3> <p class="description">The breakpoint for medium screens is 992 pixels</p> ';
}

function sewchic_carousel_section_cb_sm(){
    echo ' <h3>Small view carousel settings</h3> <p class="description">The breakpoint for medium screens is 762 pixels</p> '; 
}

function sewchic_carousel_section_cb_xs(){
    echo ' <h3>Small and mobile view carousel settings</h3> <p class="description">These settings apply for any screen less than 762 pixels wide.</p> ';
}

function sewchic_input_callback($args){
    extract($args);
    $option = get_option("sc-carousel-$option_name-$suffix");
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
        <input type="$type" name="sc-carousel-$option_name-$suffix" style="$style" id="$label_for" value="$value" $checked /><br /><span class="description">$description</span>
EOT;

}

function sewchic_place_notice_in_menus_menu(){
    echo "<h2>Additional configuration options exist for the Carousel Menu, because it's special. Go <a href='themes.php?page=sewchic-carousel'>here</a> to set them</h2>";
}
add_action('after_menu_locations_table','sewchic_place_notice_in_menus_menu');

function sewchic_menu_image_size_filter($sizes){
    $sizes['menu-sewchic'] = array(200,500,false);
    return $sizes;
}
add_filter('menu_image_default_sizes', 'sewchic_menu_image_size_filter');


?>
