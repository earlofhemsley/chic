<?php

if(!isset($content_width)) $content_width=1200;

//Add basic theme supports
if(!function_exists('sewchic_setup')):
function sewchic_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', array(
        'height' => 200,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    //this theme designed to be used with woocommerce ecommerce plugin
    //TODO: prompt admin users to download and install woocommerce if not installed
    add_theme_support('woocommerce');

}
add_action('after_setup_theme', 'sewchic_setup');
endif;


//Add features to editor
if(!function_exists('sewchic_post_types_support')):
function sewchic_post_types_support(){
    add_post_type_support('page', array('excerpt', 'title','author','comments','post-formats','revisions','editor'));
    add_post_type_support('page', array('excerpt', 'title','author','comments','post-formats','revisions','editor'));
}
add_action('init', 'sewchic_post_types_support');
endif;

//Register styles, scripts
if(!function_exists('sewchic_register_scripts')):
function sewchic_register_scripts(){
    //scripts
    wp_enqueue_script('jquery', '', array(), false, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/vendor/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-3.5.0.min.js', array('jquery'), false, true);
    wp_enqueue_script('plugins',get_template_directory_uri().'/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js', array('jquery'), false, true);

    //styles
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.min.css');
    wp_enqueue_style('h5bp', get_template_directory_uri().'/css/h5bp.css');
    wp_enqueue_style('core', get_stylesheet_uri(), array('bootstrap','bootstrap-theme','h5bp'));


    //dynamic styles
    $style ='';
    //if more dynamic styles required w/o function calls, EOT

    $logo = sewchic_custom_logo(false);
    if(preg_match('/width="(\d+)"/', $logo, $matches)){
        $style .= "@media screen and (min-width: 768px){#sewchic-tagline { max-width: $matches[1]px; }}";
        wp_add_inline_style('core', $style);
    }
}
add_action('wp_enqueue_scripts', 'sewchic_register_scripts');
endif;

//Use a placeholder custom logo if none is uploaded
if(!function_exists('sewchic_custom_logo')):
function sewchic_custom_logo($echo = true){
    if(function_exists('get_custom_logo') && has_custom_logo()) $logo = get_custom_logo();
    else $logo = '<img src="'.get_template_directory_uri().'/img/templogo.png" alt="Sew Chic Pattern Company" class="custom-logo">';

    if($echo) echo $logo;
    else return $logo;
}
endif;

//Widget area setup
if(!function_exists('sewchic_widgets_setup')):
function sewchic_widgets_setup(){
    register_sidebar(array(
        'name' => __('Home page header social widget area', 'sewchic'),
        'id' => 'header-social',
        'description' => __('Appears in the top-right corner of the home page','sewchic'),
        'before_widget' => '',
        'after_widget' => '',
    ));
}
add_action('widgets_init','sewchic_widgets_setup');
endif;

//WordPress menu setup
if(!function_exists('sewchic_register_menus')):
function sewchic_register_menus(){
    register_nav_menus( array(
        'primary' => __('Primary site navigation, located in site header','sewchic'),
        'home-footer-left' => __('Home page menu on the bottom left','sewchic'),
        'home-footer-center' => __('Home page menu on the bottom in the middle','sewchic'),
        'home-footer-right' => __('Home page menu on the bottom right','sewchic'),
    ));
}
add_action('init','sewchic_register_menus');
endif;

function sewchic_customizer_setup($wp_customizer){
    $wp_customizer->remove_section('static_front_page');

    $wp_customizer->add_section('front_page_customization', array(
        'title' => __('Customize Front Page', 'sewchic'),
        'description' => __('Adjust the look and feel of your home page', 'sewchic'),
        'priority' => 120
    ));

    $wp_customizer->add_setting('front_page_tower_img', array(
        'sanitize_callback' => function($input) {return $input; },
    ));
    //TODO: Hook up javascript callback for dynamic loading
    //TODO: actually sanitize/validate what's input


    $wp_customizer->add_control(new WP_Customize_Image_Control(
        $wp_customizer, 
        'front_page_tower_img',
        array(
            'section' => 'front_page_customization',
            'settings' => 'front_page_tower_img' ,
            'label' => __('Front Page Tower Image','sewchic'),
            'description' => __('An image placed on the far right side of the center of the home page. It\'s meant to be very tall. In the largest view, it will be forced to 800px tall, so recommended height is 800px','sewchic')
        )
    ));

    $wp_customizer->add_setting('sewchic_secondary_tagline', array(
        'sanitize_callback' => function($input) { return $input; }
    ));
    //TODO: strip tags if any

    $wp_customizer->add_control('sewchic_secondary_tagline', array(
        'section' => 'title_tagline',
        'label' => __('Secondary Tagline','sewchic'),
        'description' => __('This tagline displays on the home page beneath the search form', 'sewchic'),
        'type' => 'text',
        'priority' => 100
    ));

}
add_action('customize_register', 'sewchic_customizer_setup');


?>
