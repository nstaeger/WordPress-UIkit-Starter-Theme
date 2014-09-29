<?php

require('php/walker/WordpressUikitMenuWalker.php');


/**
 * Register menus
 */
function wp_uikit_starter_register_menus() {
    register_nav_menu('main', 'Main Menu');
}
add_action('after_setup_theme', 'wp_uikit_starter_register_menus');


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
function wp_uikit_starter_wp_title( $title, $sep ) {
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