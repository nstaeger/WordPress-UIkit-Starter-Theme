<?php
/**
 * The Header template
 *
 * Displays all of the <head> section and everything up till
 * and the opening body-tag
 */


?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> class="uk-height-1-1">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> class="uk-height-1-1">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="uk-height-1-1">
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('-', true, 'right'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css"/>

    <script src="<?php echo get_template_directory_uri(); ?>/js/all.min.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(array('uk-height-1-1')); ?>>
