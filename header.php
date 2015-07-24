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
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header id="header">
            <div id="logo">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/themes/national-sawdust/img/logo.svg" alt=""></a>
            </div>
            <div id="search-bar">
                <?php get_search_form(); ?>
            </div>
            <ul id="nav">
                <li><a href="<?php bloginfo( 'url' ); ?>/mission">About</a></li>
                <?php wp_list_pages('include=47,49&title_li='); ?>
            </ul>
        </header>








