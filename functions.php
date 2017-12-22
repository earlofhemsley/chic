<?php

if(!isset($content_width)) $content_width=1200;

$GLOBALS['textdomain'] = 'sewchic';


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


//Add basic theme supports
if(!function_exists('sewchic_setup')):
function sewchic_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-formats', array('link'));
    add_theme_support('custom-logo', array(
        'height' => 200,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));

    //image sizes
    add_image_size('post-hero', 1125, 633, true);
    add_image_size('feednail', 300, 300, true);


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
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/vendor/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/vendor/modernizr-3.5.0.min.js', array('jquery'), false, true);
    wp_enqueue_script('plugins',get_template_directory_uri().'/assets/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script('main',get_template_directory_uri().'/assets/js/main.js', array('jquery'), false, true);

    wp_register_script('photoswipe-render', get_template_directory_uri() . '/common/js/ps-render.js', array('jquery'), false, true);


    //styles
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/vendor/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri().'/assets/css/vendor/bootstrap-theme.min.css');
    wp_enqueue_style('h5bp', get_template_directory_uri().'/assets/css/vendor/h5bp.css');
    wp_enqueue_style('core', get_stylesheet_uri(), array('bootstrap','bootstrap-theme','h5bp'));

    //conditional script/style loading
    if(is_home() || is_front_page()){
        wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/vendor/slick.min.js', array('jquery'), false, true);
        wp_enqueue_style('slick', get_template_directory_uri().'/assets/css/slick.min.css');
        wp_enqueue_style('slick-theme', get_template_directory_uri().'/assets/css/slick-theme.min.css', array('slick'));
    }
    if(is_product())
        wp_enqueue_script('wcsc-single', get_template_directory_uri().'/assets/js/woocommerce-single.js', array('jquery'), false, true);
    if(is_shop() || is_product_category() || is_product_tag()){
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_style('jquery-ui-css', get_template_directory_uri().'/assets/css/vendor/jquery-ui.min.css');
    }
    if(is_singular(array('post', 'page'))){
        
    }

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
    else $logo = '<img src="'.get_template_directory_uri().'/assets/img/templogo.png" alt="Sew Chic Pattern Company" class="custom-logo">';

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
        'description' => __('Appears in the main body of the home page to the left','sewchic'),
        'before_widget' => '',
        'after_widget' => '',
    ));

    foreach(array('one','two','three') as $i => $value){
        register_sidebar(array(
            'name' => __("Sidebar $value", 'sewchic'),
            'id' => 'sewchic-sidebar-'.($i+1),
            'description' => __('Appears in the right rail of post, product and page content, and at the base of post and product archive feeds','sewchic'),
            'before_widget' => '',
            'after_widget' => '',
        ));
    }

    register_sidebar(array(
        'name' => __('Product archive filter widgets', 'sewchic'),
        'id' => 'product-filter-widgets',
        'description' => __('If filled, forces appearance of a widget bin to the left of product listings on shop page and product category / tag pages','sewchic'),
        'before_widget' => '',
        'after_widget' => '',
    ));

    register_sidebar(array(
        'name' => __('Single product widget tab', 'sewchic'),
        'id' => 'single-product-widget',
        'description' => __('If filled, will add a tab to single product pages containing widget content.','sewchic'),
        'before_widget' => '',
        'after_widget' => '',
    ));

    register_sidebar(array(
        'name' => __('Post & product archive footer'),
        'id' => 'shop-sidebar-widget',
        'description' => __('Widgets in this area occupy the bottom of category and tag pages for products and posts','sewchic'),
        'before_widget' => '<div class="wcsc-shop-footer-widget">',
        'after_widget' => '</div>',
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

//programmatically get all the widget data out of a sidebar
if(!function_exists('sewchic_get_widget_data_for')):
function sewchic_get_widget_data_for($sidebar_name) {
	global $wp_registered_sidebars, $wp_registered_widgets;
	
	// Holds the final data to return
	$output = array();

	// Loop over all of the registered sidebars looking for the one with the same name as $sidebar_name
	$sidebar_id = false;
    if($wp_registered_sidebars[$sidebar_name] != null) $sidebar_id = $sidebar_name;
    else{
        foreach( $wp_registered_sidebars as $sidebar ) {
            if( $sidebar['name'] == $sidebar_name ) {
                $sidebar_id = $sidebar['id'];
                break;
            }
        }
    }
	
	if( !$sidebar_id ) {
		// There is no sidebar registered with the name provided.
		return $output;
	} 
	
	// A nested array in the format $sidebar_id => array( 'widget_id-1', 'widget_id-2' ... );
	$sidebars_widgets = wp_get_sidebars_widgets();
	$widget_ids = $sidebars_widgets[$sidebar_id];
	
	if( !$widget_ids ) {
		// Without proper widget_ids we can't continue. 
		return array();
	}
	
	// Loop over each widget_id so we can fetch the data out of the wp_options table.
	foreach( $widget_ids as $id ) {
		// The name of the option in the database is the name of the widget class.  
		$option_name = $wp_registered_widgets[$id]['callback'][0]->option_name;
		
		// Widget data is stored as an associative array. To get the right data we need to get the right key which is stored in $wp_registered_widgets
		$key = $wp_registered_widgets[$id]['params'][0]['number'];
		
		$widget_data = get_option($option_name);
		
		// Add the widget data on to the end of the output array.
		$output[] = (object) $widget_data[$key];
	}
	
	return $output;
}
endif;

//generate archive feed pagination links
function get_archive_pagination_links(){
    global $wp_query;
    //var_dump($wp_query);
    $current = isset($wp_query->query['paged']) ? $wp_query->query['paged'] : 1;
    $min = ($wp_query->max_num_page <= 5 || $current - 2 < 1) ? 1 : $current - 2;
    $max =  ($wp_query->max_num_pages <= 5 || $current + 2 >= $wp_query->max_num_pages ) ? $wp_query->max_num_pages : $current + 2;


    if($max == 1) return '';

    ob_start();

    echo '<ul class="page-numbers">'."\r\n";
    if($current > 1) echo "<li><a class='page-numbers' href='".get_previous_posts_page_link()."'>&larr;</a></li>\r\n";
    for($i = $min; $i<=$max; $i++){
        $page_num_link = get_pagenum_link($i);
        echo '<li>';
        if($i == $current){
            echo "<span area-current='page' class='page-numbers current'>$i</span>";
        }
        else{
            echo "<a class='page-numbers' href='$page_num_link'>$i</a>";
        }
        echo "</li>\r\n";
    }
    if($current < $max) echo "<li><a class='page-numbers' href='".get_next_posts_page_link()."'>&rarr;</a></li>\r\n";
    echo '</ul>'."\r\n";

    return ob_get_clean();
}

//#region single-pagination
if(!function_exists('sewchic_link_pages_link')):
function sewchic_link_pages_link($link, $i){
    if(!preg_match('/^<a[^>]*>.*<\/a>$/', $link)){
        $link = "<span class='current'>$link</span>";
    }
    return $link;

}
add_filter('wp_link_pages_link', 'sewchic_link_pages_link', 10, 2);
endif;

if(!function_exists('sewchic_link_pages_before')):
function sewchic_link_pages_before(){
    global $page, $numpages;
    $before = "<ul class='page-numbers sewchic-single-pagination'>\r\n<li>";

    if($page > 1 && $numpages > 1){
        $before .=  _wp_link_page($page - 1) . "&larr;</a></li>\r\n<li>";
    } 
    return $before;
}
endif;

if(!function_exists('sewchic_link_pages_after')):
function sewchic_link_pages_after(){
    global $page, $numpages;
    $after = '';

    if($page < $numpages){
        $after .= "</li>\r\n<li>" . _wp_link_page($page + 1). "&rarr;</a>";
    }

    $after .= "</li>\r\n</ul><!-- .sewchic-single-pagination -->";
    return $after;
}
endif;
//#endregion


//an override of a function in the common-template-functions
if(!function_exists('common_photoswipe_element')):
function common_photoswipe_element(){
    if(current_theme_supports('wc-product-gallery-lightbox')) wc_get_template('single-product/photoswipe.php');
}
endif;


require_once( get_template_directory(). '/woocommerce-integration.php');
require_once( get_template_directory(). '/includes/carousel-options.php');
require_once( get_template_directory(). '/common/common-functions.php' );
require_once( get_template_directory(). '/classes/class-fb-page-plugin.php');
require_once( get_template_directory(). '/classes/class-tgm-plugin-activation.php');


?>
