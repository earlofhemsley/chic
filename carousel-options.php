<?php
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
    $settings = array(
        array(
            'title' => 'Accessibility',
            'label_for' => 'sc-carousel-accessibility',
            'option_name' => 'sc-carousel-accessibility',
            'default_value' => 1,
            'description' => 'Enables tabbing and arrow key navigation',
            'type' => 'checkbox',
        ),
    
    );

    foreach($settings as  $settingArray){
        add_settings_field($settingArray['option_name'], $settingArray['title'], 'sewchic_input_callback', 'sewchic-carousel','carousel_settings_section', $settingArray);
        register_setting('sewchic-carousel', $settingArray['option_name']);
    }




    add_settings_field('carousel-adaptive-height', 'Adaptive Height', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-adaptive-height',
        'option_name' => 'sc-carousel-adaptive-height',
        'default_value' => 0,
        'description' => 'Enables adaptive height for single slide horizontal carousels',
        'type' => 'checkbox'
    ));
    add_settings_field('carousel-autoplay', 'Autoplay', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-autoplay',
        'option_name' => 'sc-carousel-autoplay',
        'default_value' => 0,
        'description' => 'Enables autoplay',
        'type' => 'checkbox'
    ));
    add_settings_field('carousel-autoplay-speed', 'Autoplay Speed', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-autoplay-speed',
        'option_name' => 'sc-carousel-autoplay-speed',
        'default_value' => 3000,
        'description' => 'Autoplay speed in milliseconds (only relevant if autoplay is enabled).',
        'type' => 'text'
    ));
    add_settings_field('carousel-arrows', 'Arrows', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-arrows',
        'option_name' => 'sc-carousel-arrows',
        'default_value' => 1,
        'description' => 'Show prev/next arrows',
        'type' => 'checkbox'
    ));
    add_settings_field('carousel-prevArrow', '"Prev" Arrow', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-prevArrow',
        'option_name' => 'sc-carousel-prevArrow',
        'default_value' => '<button type=\'button\' class=\'slick-prev\'>Previous</button>',
        'description' => 'Customize the "Previous" arrow HTML (also will accept jQuery selector, if you know one)',
        'type' => 'text'
    ));
    add_settings_field('carousel-nextArrow', '"Next" Arrow', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-nextArrow',
        'option_name' => 'sc-carousel-nextArrow',
        'default_value' => '<button type=\'button\' class=\'slick-next\'>Next</button>',
        'description' => 'Customize the "Next" arrow HTML (also will accept jQuery selector, if you know one)',
        'type' => 'text'
    ));
    add_settings_field('carousel-center-mode', 'Center Mode', 'sewchic_input_callback', 'sewchic-carousel', 'carousel_settings_section', array(
        'label_for' => 'carousel-center-mode',
        'option_name' => 'sc-carousel-center-mode',
        'default_value' => 0,
        'description' => 'Enables center view with partial prev/next slides. Use with odd-numbered slidesToShow counts',
        'type' => 'checkbox'
    ));

    register_setting('sewchic-carousel', 'sc-carousel-adaptive-height');
    register_setting('sewchic-carousel', 'sc-carousel-autoplay');
    register_setting('sewchic-carousel', 'sc-carousel-autoplay-speed');
    register_setting('sewchic-carousel', 'sc-carousel-arrows');
    register_setting('sewchic-carousel', 'sc-carousel-prevArrow');
    register_setting('sewchic-carousel', 'sc-carousel-nextArrow');
    register_setting('sewchic-carousel', 'sc-carousel-center-mode');
}
add_action('admin_init', 'sewchic_init_carousel_options');

function sewchic_carousel_section_callback(){
    echo "<p>Select your options for the home page carousel. These options will affect how your carousel behaves. To adjust the content of the carousel, refer to the Menus page</p>";
    echo "<p style='font-weight:bold;'>DON'T MESS WITH THESE UNLESS YOU KNOW WHAT YOU'RE DOING</p>";
}

function sewchic_input_callback($args){
    extract($args);
    $option = get_option($option_name);
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
        <input type=$type name="$option_name" style="$style" id="$option_name" value="$value" $checked /><br /><span class="description">$description</span>
EOT;

}

function sewchic_place_notice_in_menus_menu(){
    echo "<h2>Additional configuration options exist for the Carousel Menu, because it's special. Go <a href='#'>here</a> to set them</h2>";
}
add_action('after_menu_locations_table','sewchic_place_notice_in_menus_menu');


?>
