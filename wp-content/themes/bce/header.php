<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no">
    <meta name="language" content="en-us">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon">
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="page-wrapper">
    <header id="header" class="fixed-top">
        <nav class="navbar navbar-expand-lg" aria-label="Main site navigation">
            <div class="container">
                <?php 
                    if(get_field('header_logo','options')){
                        $logoURL = get_field('header_logo','options')['url'];
                    }else{
                        $logoURL = get_template_directory_uri().'/assets/images/bce-logo.svg';
                    }
                ?>
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                    <img src="<?php echo $logoURL; ?>" class="svg img-fluid" width="76" height="48" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                </a>
                <button class="navbar-toggler" type="button" aria-haspopup="true" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="navbar-menu" id="divNavbar">
                    <?php wp_nav_menu(array('theme_location' => 'main-menu', 'menu_class' => 'navbar-nav' )); ?>
                </div>
                <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#searchPopup" aria-label="Open search modal"></button>
            </nav>
    </header>




