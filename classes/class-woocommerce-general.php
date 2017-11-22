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
    }

    public function wrap_main_content(){ ?>
        <!-- <?php echo "IS SHOP: ".is_shop(). ' IS CAT: '. is_product_category(). ' IS TAG: '.is_product_tag(); ?> -->
        <div class="wrap standard-wrap container-fluid">    
    <?php }


    public function before_main_content(){
        if(!(is_shop() || is_product_category() || is_product_tag())):
?>
            <div class="row">
                <div class="col-md-9">
<?php
        endif;
    }

    public function after_main_content(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())):
?>
                </div><!-- .col-md-9 -->
<?php 
        endif;
    
    }


    public function before_sidebar(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())):
?> 
                <div class="col-md-3">
<?php 
        endif;
    
    }

    public function after_sidebar(){ 
        if(!(is_shop() || is_product_category() || is_product_tag())):
?>
                </div><!-- .col-md-3 -->
            </div><!-- .row -->
<?php 
        endif;
    
    }

    public function close_main_wrap(){ ?> 
        </div><!--.wrap standard-wrap container-fluid -->
    <?php }

}

