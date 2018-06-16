<?php

class woocommerce_checkout{
    
    public function __construct(){
        add_filter('woocommerce_account_downloads_columns', [$this, 'change_download_column_text']);
        add_action('woocommerce_order_details_before_order_table', [$this, 'place_reload_for_download_notice']);
    }

    public function change_download_column_text($columnArray){
        $columnArray['download-file'] = __('Click to Download', 'sewchic') . ' &darr;';
        return $columnArray;
    }

    public function place_reload_for_download_notice($order){
        error_log('place_reload_for_download_notice has fired');
        error_log("This order's status: {$order->get_status()}");
        error_log("This order is paid: ". var_export($order->is_paid(), true));
        error_log("This order needs payment: " . var_export($order->needs_payment(), true));
        error_log("This order has downloadable items: " . var_export($order->has_downloadable_item(), true));
        error_log("For this order, downloads are permitted: " . var_export($order->is_download_permitted(), true));
        error_log('place_reload_for_download_notice has ended');
        if($order->has_downloadable_item() && !$order->is_download_permitted()){
            //echo '<div class="woocommerce-info" role="alert">'.__('If you have paid but do not have access to your downloadable products, please try reloading the page. If that doesn\'t work, please visit <a href="/my-account/downloads">your account\'s downloads page</a>. If that also doesn\'t work, please contact us to obtain your product.', 'sewchic').'</div>';
        }

    }

}

?>
