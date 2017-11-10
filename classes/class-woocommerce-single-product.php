<?php 

//this class utilizes hooks available in wc's single-product and content-single-product theme page
class wcsc_content_single_product {
    
    public function __construct(){
        //action hooks will be added here
        add_action('woocommerce_before_main_content', array($this, 'before_main_content'));
        add_action('woocommerce_after_main_content', array($this, 'after_main_content'));
        add_action('woocommerce_single_product_summary', array($this, 'single_product_summary'), 25);
        add_action('woocommerce_before_add_to_cart_button', array($this, 'before_add_to_cart_button'));
        add_action('woocommerce_after_add_to_cart_button', array($this, 'after_add_to_cart_button'));
    }


    public function before_main_content(){ ?>
        <div class="wrap standard-wrap">

    <?php }

    public function after_main_content(){ ?>
        </div>

    <?php }

    public function before_single_product(){}
    
    public function before_add_to_cart_button(){ ?>
        <div class="wcsc-cart-add-form">
            <div class="quantity-wrapper">
    <?php }

    public function after_add_to_cart_button(){ ?>
            </div><!-- .quantity-wrapper -->
        </div><!-- .wcsc-cart-add-form -->    
    <?php }


    public function single_product_summary(){
        global $product;
        //var_dump($product->get_type());
    }



}
new wcsc_content_single_product();
