<?php

require_once( get_template_directory(). '/woocommerce-integration.php');
require_once( get_template_directory(). '/includes/carousel-options.php');
require_once( get_template_directory(). '/classes/class-fb-page-plugin.php');
require_once( get_template_directory(). '/classes/class-tgm-plugin-activation.php');


if(!function_exists('sewchic_register_required_plugins')):
function sewchic_register_required_plugins(){
    $plugins = array(
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
        ),
        array(
            'name'      => 'Menu Image',
            'slug'      => 'menu-image',
            'required'  => true,
        ),
    );

    $config = array(
        'id'           => 'sewchic',
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => 'There are plugins that require installation.',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => 'This theme requires installation of certain plugins. Get on it.',                      // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
} 
add_action( 'tgmpa_register', 'sewchic_register_required_plugins' );
endif;


if(!isset($content_width)) $content_width=1200;


//Add basic theme supports
if(!function_exists('sewchic_setup')):
function sewchic_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-formats', array('gallery','image','video'));
    add_theme_support('custom-logo', array(
        'height' => 200,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    //this theme designed to be used with woocommerce ecommerce plugin
    add_theme_support('woocommerce');
    //add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

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
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/vendor/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-3.5.0.min.js', array('jquery'), false, true);
    wp_enqueue_script('slick', get_template_directory_uri().'/js/vendor/slick.min.js', array('jquery'), false, true);
    wp_enqueue_script('plugins',get_template_directory_uri().'/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js', array('jquery'), false, true);

    //conditional script loading
    if(is_product())
        wp_enqueue_script('stars', get_template_directory_uri().'/js/single-product-stars.js', array('jquery'), false, true);

    //styles
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/css/bootstrap-theme.min.css');
    wp_enqueue_style('h5bp', get_template_directory_uri().'/css/h5bp.css');
    wp_enqueue_style('slick', get_template_directory_uri().'/css/slick.min.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri().'/css/slick-theme.min.css', array('slick'));
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
        'name' => __('Home page body social widget area', 'sewchic'),
        'id' => 'home-body-social',
        'description' => __('Appears just beneath the hero elements of the home page','sewchic'),
        'before_widget' => '',
        'after_widget' => '',
    ));
    register_sidebar(array(
        'name' => __('Home page body left rail', 'sewchic'),
        'id' => 'home-body-left-rail',
        'description' => __('Appars in the main body of the home page to the left'),
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
        'carousel' => __('Home page carousel','sewchic'),
        'home-footer-1' => __('First (from left) optional home page footer menu','sewchic'),
        'home-footer-2' => __('Second (from left) optional home page footer menu','sewchic'),
        'home-footer-3' => __('Third (from left) optional home page footer menu','sewchic'),
        'home-footer-4' => __('Fourth (from left) optional home page footer menu','sewchic'),
    ));
}
add_action('init','sewchic_register_menus');
endif;

//setup customizer options
if(!function_exists('sewchic_customizer_setup')):
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
    
    $allCats = array();
    foreach(array('product_cat', 'category') as $term){
        $allCats += get_terms(array(
            'taxonomy' => $term,
            'hide_empty' => true,
            'parent' => 0,
            'fields' => 'id=>name',
        ));
    }

    foreach(array(1 => 'first',2 => 'second',3 => 'third') as $num => $ordinal){
        $wp_customizer->add_setting("sewchic_home_category_$num", array(
            'sanitize_callback' => function($input){return $input;} //TODO: make sure this is a product / blog post category
        ));
        $wp_customizer->add_control("sewchic_home_category_$num", array(
            'section' => 'front_page_customization',
            'priority' => 10 + $num,
            'label' => "Home page catagory no. $num",
            'description' => "This is the $ordinal home page category",
            'type' => 'select',
            'choices' => $allCats,
        ));
        
    }


}
add_action('customize_register', 'sewchic_customizer_setup');
endif;

//get the image url to be associated with a post. For use on feed pages in the context of the loop
if(!function_exists('sewchic_get_feed_image_url')):
function sewchic_get_feed_image_url(){
    global $post;
    //if has defined thumbnail, return url of thumbnail
    if(has_post_thumbnail($post)) return get_the_post_thumbnail_url($post, 'medium');
    else{
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(apply_filters('the_content',$post->post_content));
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        if($images->length >= 1){
            //else if content has img tag, return url of image
            return $images->item(0)->getAttribute('src');
        }
        else{
            //else if content has youtube video, return url of youtube preview img
            $iframes = $dom->getElementsByTagName('iframe');
            foreach($iframes as $iframe){
                $src = $iframe->getAttribute('src');
                if(preg_match('/youtube\.com\/embed\/(\w+)/', $src, $matches)){
                    return "https://img.youtube.com/vi/{$matches[1]}/0.jpg";
                }
            }
            //else return custom logo
            //return get_template_directory_uri().'/assets/img/feed-default-'.get_post_format($post->ID).'.png';
            $image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'medium');
            return $image[0];
        }
    }
}
endif;

if(!function_exists('sewchic_set_home_on_custom_queries')):
function sewchic_set_home_on_custom_queries( $q )
{
    if ( true === $q->get( 'sewchic_is_home' ) ) 
        $q->is_home = true;
    else return;
    
    $stickies = get_option('sticky_posts');

    if(!$stickies) return;

    $args = array(
        'post__in' => $stickies,
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1,
        'tax_query' => $q->get('tax_query'),
        'fields' => 'ids',
    );
 
    $valid_sticky_ids = get_posts( $args );

    // Make sure we have valid ids
    if ( !$valid_sticky_ids ) {
        $q->set( 'post__not_in', $stickies );
        return;
    }

    // Remove these ids from the sticky posts array
    $invalid_ids = array_diff( $stickies, $valid_sticky_ids );

    // Check if we still have ids left in $invalid_ids
    if ( !$invalid_ids )
        return;

    // Lets remove these invalid ids from our query
    $q->set( 'post__not_in', $invalid_ids );;
}
add_action( 'pre_get_posts', 'sewchic_set_home_on_custom_queries');
endif;

?>
