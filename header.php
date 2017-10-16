<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="<?php echo get_template_directory_uri().'/assets/site.webmanifest'; ?>">
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri().'/assets/icon.png'; ?>">

        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <header>
            <div class="standard-wrap container">
                <div class="sewchic-header-widget-container">
                    <?php 
                        sewchic_custom_logo(true);
                    ?>
                    <h3 id="sewchic-tagline"><?php bloginfo('description'); ?></h3>
                    <div class="sewchic-header-widget-element">
                    <?php
                        if(is_active_sidebar('header-social')){
                            dynamic_sidebar('header-social');
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="sewchic-header-pink"></div>
            <div class="sewchic-nav-body">
                <div class="standard-wrap">
                    <nav class="navbar sewchic-navbar-default">
                        <div class="container-fluid">
                        <button type="button" class="navbar-toggle sewchic-navbar-toggle collapsed" data-toggle="collapse" data-target="#sewchic-primary-menu" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'nav navbar-nav',
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id' => 'sewchic-primary-menu'
                                ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
