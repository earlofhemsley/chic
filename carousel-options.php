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
        'type' => 'text'
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
    $option = ($option === false) ? $default_value : $option;

    switch($type){
        case "checkbox":
            $value = '1';
            $checked = checked(1, $option, false);
            $style = '';
            break;
        default: //text
            $value = $option;
            $checked = '';
            $style = "max-width:300px; width:100%;";
            break;
    }
    
    echo <<< EOT
        <input type=$type name="sc-carousel-$option_name" style="$style" id="$label_for" value="$value" $checked /><br /><span class="description">$description</span>
EOT;

}

function sewchic_place_notice_in_menus_menu(){
    echo "<h2>Additional configuration options exist for the Carousel Menu, because it's special. Go <a href='#'>here</a> to set them</h2>";
}
add_action('after_menu_locations_table','sewchic_place_notice_in_menus_menu');


?>
