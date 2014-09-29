<?php
/**
 * The Header template
 *
 * Displays all of the <head> section and everything up till
 *
 * @author nstaeger
 * @since 2014-08-31
 */


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
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/uikit.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/uikit.min.js"></script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header" class="uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <h1><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="uk-link-reset"><?php bloginfo( 'name' ); ?></a></h1>
            <span><?php bloginfo( 'description' ); ?></span>
        </div>
    </header>

    <nav id="navbar" class="uk-navbar uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <?php
                wp_nav_menu(array(
                    'menu' => 'main',
                    'theme_location' => 'main',
                    'menu_class' => 'uk-navbar-nav uk-hidden-small',
                    'depth' => 2,
                    'walker' => new WordpressUikitMenuWalker('navbar')
                ));
            ?>
            <a href="#offcanvas-menu" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        </div>
    </nav>