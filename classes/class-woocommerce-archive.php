<?php

class woocommerce_archive{

    public function __construct(){
        add_action('woocommerce_before_shop_loop', array($this, 'wrap_shop_loop_start'), 5);
        add_action('woocommerce_before_shop_loop', array($this, 'filter_widgets_start'), 35);
        
        add_action('woocommerce_after_shop_loop', array($this, 'filter_widgets_end'), 99);
        add_action('woocommerce_after_shop_loop', array($this, 'wrap_shop_loop_end'), 100);
    
    }

    public function wrap_shop_loop_start(){ ?>
        <div class='wcsc-shop-container'>
    <?php }

    public function filter_widgets_start(){
        if(is_active_sidebar('product-filter-widgets')){ ?>
            <div class="wcsc-shop-table">
                <div class="wcsc-shop-row">
                    <div class="wcsc-shop-cell filter-widgets">
                            <button type="button" class="wcsc-toggle toggle button" data-toggle="slide" data-target="#filter_widgets_bin"  aria-expanded="false">Toggle filters</button>
                            <div id="filter_widgets_bin" class="collapse wcsc-collapse">
                                <?php dynamic_sidebar('product-filter-widgets');?>
                            </div><!-- #filter_widgets_bin --> 
                    </div><!-- .filter-widgets -->
                    <div class="wcsc-shop-cell shop-content">
        <?php }
    }

    public function filter_widgets_end(){
        if(is_active_sidebar('product-filter-widgets')){ ?>
                    </div><!-- .shop-content -->
                </div><!-- .wcsc-shop-row -->
            </div><!-- .wcsc-shop-table -->
        <?php }
    }

    public function wrap_shop_loop_end(){ ?>
        </div><!-- .wcsc-shop-container -->
    <?php }


}

