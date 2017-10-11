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
                        sewchic_custom_logo();
                    ?>
                    <div class="sewchic-header-widget-element">
                    <?php
                        if(is_active_sidebar('header-social')){
                            dynamic_sidebar('header-social');
                            //TODO: adapt the ssm to have tiny icons, and add youtube pinterest etsy craftsy
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="sewchic-header-pink"></div>
            <nav></nav>
        </header>










    <?php wp_footer(); ?>

    </body>
</html>
