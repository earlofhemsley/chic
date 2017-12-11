<?php 
//common functions I typically use across themes
if($GLOBALS['textdomain'] == null) $GLOBALS['textdomain'] = 'common';

if(!function_exists('common_enqueue_scripts')):
function common_enqueue_scripts(){
    ECHO '<script type="text/javascript>window.alert("it loaded!");</script>';
    wp_enqueue_style('common-style', get_template_directory_uri().'/common/css/style.css');
}
add_action('wp_enqueue_scripts', 'common_enqueue_scripts');
endif;



//intended to be used within the loop
if(!function_exists('common_get_single_post_byline')):
function common_get_single_post_byline(){
    global $multipage, $textdomain;
    $editLink = "";
    if(current_user_can('edit_post', get_the_ID())) { 
        $editLink = sprintf('&nbsp;|&nbsp;<a href="%s" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>',  
            get_edit_post_link());
    }
    $commentLink = "<a class='scrollable' data-destination='#{$textdomain}-comments-area' href='#'>" . (get_comments_number() > 0 ? get_comments_number() . _n(' comment', ' comments', get_comments_number(), $textdomain) : 'Leave a comment') . '</a>';

    $pagesLink = '';
    if($multipage){
        $pagesLink = '&nbsp;|&nbsp;' . wp_link_pages(array(
            'before'    =>  "<span class='{$textdomain}-link-pages'>".__('Pages:', $textdomain),
            'after'     =>  "</span>",
            'echo'      =>  0
        ));
    }

    return sprintf('<div class="'.$textdomain.'-single-meta">%s <a href="%s" target="_blank">%s</a> | %s | %s%s%s</div>',
        __('by', $textdomain),
        get_author_posts_url( get_the_author_meta( 'ID' ) ),
        get_the_author(),
        get_the_date('M d, Y'),
        $commentLink,
        $editLink,
        $pagesLink
    );
}
endif;


if(!function_exists('common_is_on_page_one')):
function common_is_on_page_one(){
    global $multipage, $page;
    return (!$multipage || $page == 1);
}
endif;


if(!function_exists('common_gallery_shortcode')):
function common_gallery_shortcode($output = '', $atts, $instance){
    global $textdomain;
    
    //put the pswp element at the footer
    add_action('wp_footer', 'common_photoswipe_element');
    
    //these scripts & styles must be registered elsewhere in the theme before you even get here.
    
    wp_enqueue_script('photoswipe');
    wp_enqueue_script('photoswipe-ui-default');
    wp_enqueue_script('photoswipe-render'); 

    wp_enqueue_style('photoswipe');
    wp_enqueue_style('photoswipe-default-skin');
    $return = $output; //as a fallback

    //documentation on the gallery shortcode ==> 
    //https://developer.wordpress.org/reference/functions/gallery_shortcode/
    /* The needful:
     * get all the specified ids
     * get all the post objects
     * frame / order them according to shortcode attributes
     * remember to maintain the styling schema that has already been written
     * make it so that when clicked, full-page image gallery actually pops up with captions
     * that people can click through if they want.
     */

    $settings = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'itemtag'    => 'figure',
        'icontag'    => 'div',
        'captiontag' => 'figcaption',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $atts, 'gallery' );

    $attachments = array();
    $query_vars = array(
            'post_status' => 'inherit', 
            'post_type' => 'attachment', 
            'post_mime_type' => 'image', 
            'order' => $settings['order'], 
            'orderby' => $settings['orderby'],  
    );

    if ( ! empty( $settings['include'] ) ) {
        $query_vars['include'] = $settings['include'];
    } elseif ( ! empty( $settings['exclude'] ) ) {
        $query_vars['exclude'] = $settings['exclude'];
    }
    $sortedIds = array_map( function($p){return $p->ID;}, get_posts($query_vars));
    

    $return = '';
    $guid = uniqid();
    $return .= <<< EOT
        <div data-guid="$guid" class="gallery $textdomain-gallery gallery-columns-{$settings['columns']} gallery-size-{$settings['size']}">
EOT;
    foreach($sortedIds as $id){
        $thumbnail = wp_get_attachment_image_src($id);
        $fullSize = wp_get_attachment_image_src($id, $settings['size']);
        $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt',$id));
        $return .= <<< EOT
            <{$settings['itemtag']} class="gallery-item">
                <{$settings['icontag']} class="gallery-icon landscape">
                    <a href="#" class="photoswipe-activate" data-src="{$fullSize[0]}" data-size="{$fullSize[1]}x{$fullSize[2]}">
                        <img src="{$thumbnail[0]}" />
                    </a>
                    <{$settings['captiontag']} class="gallery-caption">
                        $excerpt
                    </{$settings['captiontag']}>
                </{$settings['icontag']}>    
            </{$settings['itemtag']}>
EOT;

    }
    $return .= "</div>";

    return $return;
}
add_filter('post_gallery', 'common_gallery_shortcode', 10, 3);
endif;

if(!function_exists('common_photoswipe_element')):
function common_photoswipe_element(){
    echo <<< EOT
        <div class="pswp" id="photoswipe" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="pswp__bg"></div>

            <div class="pswp__scroll-wrap">

                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                        <button class="pswp__button pswp__button--share" title="Share"></button>

                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                        <!-- element will get class pswp__preloader--active when preloader is running -->
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                              <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div> 
                    </div>

                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>

                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>

                </div>

            </div>

        </div>
EOT;
}
endif;


if(!function_exists('common_ifrm_oembed_filter')):
function common_ifrm_oembed_filter($cachedHtml, $url, $attr, $post_ID){
    //regex on html to see if there's an iframe
    //if there's an iframe, wrap the html in a div such that it can be presented
    //return it
    if(1 == preg_match('/^<iframe[^>]*>.*<\/iframe>/', $cachedHtml)){
        $cachedHtml = '<div class="iframe-responsive">'.$cachedHtml.'</div>';
    }
    return $cachedHtml;
}
add_filter("embed_oembed_html", 'common_ifrm_oembed_filter', 10, 4);
endif;



?>
