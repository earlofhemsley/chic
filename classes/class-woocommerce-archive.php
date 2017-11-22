<?php

class woocommerce_archive{

    public function __construct(){
        add_action('woocommerce_before_shop_loop', array($this, 'before_shop_loop'), 5);
        add_action('woocommerce_after_shop_loop', array($this, 'after_shop_loop'), 100);
    
    }

    public function before_shop_loop(){ ?>
        <div class="wcsc-shop-loop">
    <?php }

    public function after_shop_loop(){ ?> 
        </div><!-- .wcsc-shop-loop -->
    <?php }


}

