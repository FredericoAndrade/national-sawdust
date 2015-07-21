<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/national-sawdust/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="header">
            <div id="logo">
                <a href="<?php bloginfo('url'); ?>"><h1>National Sawdust</h1></a>
            </div>
            <ul id="nav">
                <?php wp_list_pages('exclude=2&title_li='); ?>
            </ul>
        </header>








