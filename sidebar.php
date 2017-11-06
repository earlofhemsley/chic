<?php

if(is_home() || is_front_page())
    get_template_part('template-parts/home/sidebar');
else
    get_template_part('template-parts/site/sidebar');

?>
