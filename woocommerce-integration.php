<?php
//This file is the central clearinghouse for functions that manipulate the woocommerce theme by virtue of the hooks available in the woocommerce API.

require_once( get_template_directory(). '/classes/class-woocommerce-general.php');
require_once( get_template_directory(). '/classes/class-woocommerce-single-product.php');
require_once( get_template_directory(). '/classes/class-woocommerce-archive.php');
require_once( get_template_directory(). '/classes/class-woocommerce-account.php');
require_once( get_template_directory(). '/classes/class-woocommerce-checkout.php');


new woocommerce_general();
new woocommerce_archive();
new woocommerce_single_product();
new woocommerce_account();
new woocommerce_checkout();
