<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="<?php echo get_template_directory_uri().'/assets/site.webmanifest'; ?>">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        <header>
            <div class="standard-wrap wrap container">
                <div class="sewchic-header-widget-container">
                    <?php 
                        woocommerce_general::wcsc_header_links();
                        sewchic_custom_logo(true);
                    ?>
                    <h3 id="sewchic-tagline"><?php bloginfo('description'); ?></h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="sewchic-header-pink">
                <div class="standard-wrap wrap">
                    <nav class="sewchic-navbar-default">
                        <div>
                        <button type="button" class="toggle navbar-toggle" data-toggle="slide" data-target="#sewchic_primary_menu" aria-expanded="false" aria-controls="navbar">
                            Menu <span class="toggle-arrow"></span>
                        </button>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => '',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'sewchic_primary_menu'
                                ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
