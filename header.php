<?php
/**
 * The Header template
 *
 * Displays all of the <head> section and everything up till
 *
 * @author nstaeger
 * @since 2014-08-31
 */

require('php/walker/uikit-menu-walker.php');


?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/uikit.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/uikit.min.js"></script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header" class="uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="uk-link-reset"><?php bloginfo( 'name' ); ?></a></h1>
            <span><?php bloginfo( 'description' ); ?></span>
        </div>
    </header>

    <nav id="navbar" class="uk-navbar uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main',
                    'walker' => new Walker_UIKIT
                ));
            ?>
            <ul class="uk-navbar-nav uk-hidden-small">
                <li><a href="#">Overview</a></li>
                <li class="uk-active"><a href="page.html">Page</a></li>
                <li><a href="#">Article</a></li>
            </ul>
            <a href="#offcanvas-menu" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        </div>
    </nav>

    <section id="breadcrumbs" class="uk-margin-top">
        <div class="uk-container uk-container-center">
            <ul class="uk-breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Page</span></li>
            </ul>
        </div>
    </section>

    <div id="page" class="hfeed site">
       <header id="masthead" class="site-header" role="banner">
          <hgroup>
             <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
             <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
         </hgroup>

         <nav id="site-navigation" class="main-navigation" role="navigation">
             <h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
             <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
         </nav><!-- #site-navigation -->

         <?php if ( get_header_image() ) : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
      <?php endif; ?>
  </header><!-- #masthead -->

  <div id="main" class="wrapper">