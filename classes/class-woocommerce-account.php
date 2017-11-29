<?php 
//account page integration

class woocommerce_account{

    public function __construct(){
        add_action('woocommerce_before_account_navigation', array($this, 'before_account_nav'));
        add_action('woocommerce_after_account_navigation', array($this, 'after_account_nav'));
    }

    public function before_account_nav(){ ?>
        <button class="wcsc-toggle" type="button" data-target="#wcsc_myaccount_wrap" data-toggle="collapse" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>    
        <div id="wcsc_myaccount_wrap" class="collapse wcsc-collapse">
    <?php }

    public function after_account_nav(){ ?>
        </div><!-- #wcsc_myaccount_wrap -->
    <?php }

}



?>
