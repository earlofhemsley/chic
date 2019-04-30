<?php

if(is_shop() || is_product_category() || is_product_tag() || is_archive() || is_search())
    get_template_part('template-parts/site/sidebar','shop');
else
    get_template_part('template-parts/site/sidebar', 'standard');

?>
