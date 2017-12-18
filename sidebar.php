<?php

if(is_home() || is_front_page())
    get_template_part('template-parts/home/sidebar');
else if(is_shop() || is_product_category() || is_product_tag() || is_archive())
    get_template_part('template-parts/site/sidebar','shop');
else
    get_template_part('template-parts/site/sidebar', 'standard');

?>
