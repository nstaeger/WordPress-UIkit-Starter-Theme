<?php

require('php/walker/WordpressUikitCommentsWalker.php');
require('php/walker/WordpressUikitMenuWalker.php');


if (!function_exists('wp_uikit_starter_setup'))
{
    function wp_uikit_starter_setup()
    {
        // add HTML5 support
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        // register menus
        register_nav_menu('main', 'Main Menu');
        register_nav_menu('footer', 'Footer Menu');

        // register main sidebar
        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar-main',
            'description' => 'Main Sidebar on the left side.',
            'before_widget' => '<div id="%1$s" class="%2$s nst-widget uk-panel">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));

        // register footer sidebar
        register_sidebar(array(
            'name' => 'Footer Sidebar',
            'id' => 'sidebar-footer',
            'description' => 'Horizontal Sidebar in the footer',
            'before_widget' => '<div id="%1$s" class="%2$s nst-widget uk-panel">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    }
    add_action('after_setup_theme', 'wp_uikit_starter_setup');
}


/**
 * Create custom title element
 *
 * @param string $title
 *                Default title text for current view.
 * @param string $sep
 *                Optional separator.
 * @return string
 *                The filtered title.
 */
function wp_uikit_starter_wp_title($title, $sep) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    return $title;
}
add_filter( 'wp_title', 'wp_uikit_starter_wp_title', 10, 2 );