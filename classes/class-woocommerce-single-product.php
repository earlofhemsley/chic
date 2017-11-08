<?php 

//this class utilizes hooks available in wc's single-product and content-single-product theme page
class wcsc_content_single_product {
    
    public function __construct(){
        //action hooks will be added here
        add_action('woocommerce_before_main_content', array($this, 'before_main_content'));
        add_action('woocommerce_after_main_content', array($this, 'after_main_content'));
    }


    public function before_main_content(){ ?>
        <div class="wrap standard-wrap">

    <?php }

    public function after_main_content(){ ?>
        </div>

    <?php }

    public function before_single_product(){}
    
    public function before_single_product_summary(){}



}
new wcsc_content_single_product();
