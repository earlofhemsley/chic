<?php

class woocommerce_general{

    public function __construct(){
        //reorganize woo hooks
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
        add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 3);
        
        //action hooks will be added here
        add_action('woocommerce_before_main_content', array($this, 'wrap_main_content'),2);
        
        add_action('woocommerce_before_main_content', array($this, 'before_main_content'),5);
        add_action('woocommerce_after_main_content', array($this, 'after_main_content'),15);
        add_action('woocommerce_sidebar', array($this, 'before_sidebar'), 5);
        add_action('woocommerce_sidebar', array($this, 'after_sidebar'), 15);
        
        add_action('woocommerce_sidebar', array($this, 'close_main_wrap'), 20);
        
        //filters
        add_filter('woocommerce_show_page_title', array($this, 'show_page_title'));
    }

    public function wrap_main_content(){ ?>
        <div class="wrap standard-wrap ">    
    <?php }


    public function before_main_content(){
        if(!(is_shop() || is_product_category() || is_product_tag())): ?>
            <div class="sewchic-table">
                <div class="sewchic-row">
                    <div class="sewchic-cell">
        <?php endif;
    }

    public function after_main_content(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())): ?>
                </div><!-- .sewchic-cell -->
        <?php endif;
    }


    public function before_sidebar(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())): ?> 
                <div class="sewchic-cell force-one-fifth sewchic-right-rail">
        <?php endif;
    }

    public function after_sidebar(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())): ?>
                    </div><!-- .sewchic-cell.sewchic-right-rail -->
                </div><!-- .sewchic-row -->
            </div><!-- .sewchic-table -->
        <?php endif;
    }

    public function close_main_wrap(){ ?> 
        </div><!--.wrap.standard-wrap -->
    <?php }
    
    public function show_page_title($show){ 
        if(is_shop() || is_product_category() || is_product_tag()) return false;
        return true;
    }

    //displays the header links ... dependent upon woocommerce installation
    public static function wcsc_header_links(){ 
        $wc = $GLOBALS['woocommerce'];
        $accountPageId = get_option('woocommerce_myaccount_page_id');
        $cartPageId = get_option('woocommerce_cart_page_id');
        if($accountPageId === false || $cartPageId === false) return;
        $accountText = (is_user_logged_in()) ? __('My Account', 'sewchic') : __('Log in','sewchic');
        $cartText = __('Cart', 'sewchic');
        $cartText .= ($wc->cart->get_cart_contents_count() > 0) ? ' ('.$wc->cart->get_cart_contents_count().')' : '';
?>
        <div class="sewchic-account-links">
            <a  href="<?php echo get_permalink($accountPageId);?>" title="<?php echo $accountText; ?>"><?php echo $accountText; ?></a>
            <span>|</span>
            <a  href="<?php echo get_permalink($cartPageId);?>"><?php echo $cartText; ?></a>
            <?php if(is_user_logged_in()): ?>
            <span>|</span>
            <a href="<?php echo wp_logout_url( get_permalink($accountPageId)); ?>"><?php _e('Log out', 'sewchic'); ?></a>
            <?php endif;?>
        </div>
    <?php }

}

