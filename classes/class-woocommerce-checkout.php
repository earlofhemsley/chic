<?php

class woocommerce_checkout{
    
    public function __construct(){
        add_filter('woocommerce_account_downloads_columns', [$this, 'change_download_column_text']);
    }

    public function change_download_column_text($columnArray){
        $columnArray['download-file'] = __('Click to Download', 'sewchic') . ' &darr;';
        return $columnArray;
    }
}

?>
