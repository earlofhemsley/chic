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

    //add_theme_support('custom-background', array(
    //    'default-image' => get_template_directory_uri().'/img/defaultbg.png',
    //    'default-color' => "#fbfae7",
    //    'default-repeat' => 'repeat',
    //    'default-size' => 'auto',
    //    'default-position-y' => 'top',
    //    'default-position-x' => 'left',
    //));

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
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.min.css');
    wp_enqueue_style('h5bp', get_template_directory_uri().'/css/h5bp.css');
    wp_enqueue_style('core', get_stylesheet_uri(), array('bootstrap','bootstrap-theme','h5bp'));

    wp_enqueue_script('jquery', '', array(), false, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/vendor/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-3.5.0.min.js', array('jquery'), false, true);
    wp_enqueue_script('plugins',get_template_directory_uri().'/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js', array('jquery'), false, true);

}
add_action('wp_enqueue_scripts', 'sewchic_register_scripts');
endif;

if(!function_exists('sewchic_custom_logo')):
function sewchic_custom_logo(){
    if(function_exists('the_custom_logo') && has_custom_logo()) the_custom_logo();
    else echo '<img src="'.get_template_directory_uri().'/img/templogo.png" alt="Sew Chic Pattern Company" class="custom-logo">';
}
endif;

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

if(!function_exists('sewchic_register_menus')):
function sewchic_register_menus(){
    register_nav_menus( array(
        'primary' => 'Primary site navigation, located in site header'
    ));
}
add_action('init','sewchic_register_menus');
endif;
?>
