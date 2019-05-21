<?php 

//this class utilizes hooks available in wc's single-product and content-single-product theme page
class woocommerce_single_product {
    
    public function __construct(){
        add_action('woocommerce_before_add_to_cart_form', array($this, 'before_add_to_cart_form'));
        add_action('woocommerce_after_add_to_cart_form', array($this, 'after_add_to_cart_form'));
        add_action('woocommerce_before_add_to_cart_button', array($this, 'before_add_to_cart_button'));
        add_action('woocommerce_after_add_to_cart_button', array($this, 'after_add_to_cart_button'));

        add_action('woocommerce_before_variations_form', array($this, 'before_variations_form'));
    
        add_filter('woocommerce_product_tabs', array($this, 'single_product_add_a_tab'),100);
        
        add_filter('woocommerce_product_get_rating_html', array($this, 'obliterate_normal_star_rating'),100,3);
        add_action('woocommerce_review_meta', array($this, 'star_rating'), 30);
        add_filter('woocommerce_product_review_comment_form_args',array($this, 'replace_comment_form'));

        add_filter('woocommerce_dropdown_variation_attribute_options_args',array($this, 'variation_args_filter'));
        add_filter('woocommerce_dropdown_variation_attribute_options_html', array($this, 'variation_select_html_filter'), 10, 2);
        add_filter('woocommerce_reset_variations_link', array($this, 'reset_variations_link_filter'));

        add_action('woocommerce_before_single_product_summary', array($this, 'start_wrap_single_product_summary'), 30);
        add_action('woocommerce_after_single_product_summary', array($this, 'end_wrap_single_product_summary'), 5);

    }


    public function before_add_to_cart_form(){ ?>
        <div class="wcsc-cart-add-form">
    <?php }
    
    public function after_add_to_cart_form(){ ?>
        </div><!-- .wcsc-cart-add-form -->    
    <?php }

    public function before_variations_form(){ ?> 
        <hr />
    <?php }

    public function before_add_to_cart_button(){ ?>
        <div class="quantity-wrapper">
    <?php }

    public function after_add_to_cart_button(){ ?>
        </div><!-- .quantity-wrapper -->
    <?php }

    public function single_product_add_a_tab($tabs){
        if(is_active_sidebar('single-product-widget')){
            $sidebarData = sewchic_get_widget_data_for('single-product-widget');
            $title = count($sidebarData) == 0 ? 'Extras' : $sidebarData[0]->title;
            if(count($sidebarData) > 1) $title .= ' &amp; more'; 
            $newTab = array(
                'title' => $title,
                'priority' => 50,
                'callback' => 'woocommerce_single_product::single_product_widget'
            );
            if(is_array($tabs)) $tabs['SizeChart'] = $newTab;
        }
        return $tabs;
    }

    public static function single_product_widget(){
        dynamic_sidebar('single-product-widget');
    }


    public function obliterate_normal_star_rating($html, $rating, $cout){
        return ""; //return nothing here
    }

    public function star_rating($comment){
        $rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
        //return if there is no rating
        if ($rating == 0) {
            return;
        }
        echo '<p class="sewchic-wc-star-rating">';
        for($i = 1; $i<=5; $i++){
            $class = 'sewchic-wc-star';
            if($i <= $rating) {
                $class .= ' sewchic-wc-star-full';
            } else {
                $class .= ' sewchic-wc-star-empty';
            }
            echo "<span class='$class'></span>";
        }
        echo '</p><!-- .sewchic-wc-star-rating -->';
    }

    public function replace_comment_form($comment_args){
        $commenter = wp_get_current_commenter();
        $comment_args['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label><select name="rating" id="rating" aria-required="true" required>
            <option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
            <option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
            <option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
            <option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
            <option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
            <option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
        </select></div>'; //continue using default woocommerce star-ratings

        $labelText = esc_html__( 'Your review', 'woocommerce' );

        $comment_args['comment_field'].= <<< EOT
            <div class="sewchic-comment-form-content form-group">
                <label for="sewchic-product-comment">$labelText <span class="required">*</span></label>
                <textarea id="sewchic-product-comment" class="form-control" aria-required="true" name="comment" required></textarea>
            </div> 
EOT;
        $comment_args['fields'] = array(
            'author' => '<div class="form-group">'.
                            '<label for="sewchic-product-comment-author">'.esc_html__('Name', 'woocommerce').' <span class="required">*</span></label>'.
                            '<input id="sewchic-product-comment-author" type="text" class="form-control" name="author" value="'.esc_attr($commenter['comment_author']).'" required aria-required="true" />'.
                        '</div>',
            'email'  => '<div class="form-group">'.
                            '<label for="sewchic-product-comment-email">'.esc_html__('Email', 'woocommerce').' <span class="required">*</span></label>'.
                            '<input id="sewchic-product-comment-email" class="form-control" name="email" type="email" value="'.esc_attr($commenter['comment_author_email']).'" aria-required="true" required />'.
                        '</div>',
        );

        return $comment_args;
        
    }

    //variation products argument filter
    public function variation_args_filter($args){
        if(!isset($args['class'])) $args['class'] = '';
        $args['class'] .= ' form-control bs-inline-hack';
        return $args;
    }

    public function variation_select_html_filter($html, $args){
        $html = "<div class='form-group bs-inline-hack'>$html</div><!-- .form-group -->";
        return $html;
    } 

    public function reset_variations_link_filter($tag){
        $preg = '/class=\"([^\"]*)\"/';
        if(preg_match($preg, $tag, $matches)){
            $replacement = "class='{$matches[1]} btn btn-default'";
            $tag = preg_replace($preg, $replacement, $tag);
        }
        return '&nbsp;&nbsp;'.$tag;
    }

    public function start_wrap_single_product_summary(){ ?>
        <div class="wcsc-summary-wrap">
    <?php }

    public function end_wrap_single_product_summary(){ ?>
        </div><!-- .wcsc-summary-wrap -->
    <?php }


}
