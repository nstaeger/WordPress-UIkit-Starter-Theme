<?php

require('php/UIkitGallery.php');
require('php/walker/WordpressUikitCommentsWalker.php');
require('php/walker/WordpressUikitMenuWalker.php');


/**
 * Theme setup funciton
 */
if (!function_exists('wp_uikit_starter_setup'))
{
    function wp_uikit_starter_setup()
    {
        // add HTML5 support
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        // add Featured Image support
        add_theme_support('post-thumbnails');

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

        // Add Filter for the title
        add_filter( 'wp_title', 'wp_uikit_starter_wp_title', 10, 2 );

        // Adding a custom class for gallery-shortcode rendering
        remove_shortcode('gallery', 'gallery_shortcode');
        add_shortcode('gallery', 'wp_uikit_starter_gallery_shortcode');

        // Add filter for the footer-sidebar
        // Only apply this filter, if not the admin-panel is requested
        if (!is_admin()) {
            add_filter( 'dynamic_sidebar_params', 'wp_uikit_starter_dynamic_sidebar_params_footer');
        }
    }
    add_action('after_setup_theme', 'wp_uikit_starter_setup');
}


/**
 * Return the number of widgets within a sidebar
 */
function get_widgets_count($sidebar_id)
{
    $sidebars_widgets = wp_get_sidebars_widgets();
    return (int) count((array) $sidebars_widgets[$sidebar_id]);
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


/**
 * @param array $params
 *              The params of the widget
 * @return array
 *              The params of the widget
 */
function wp_uikit_starter_dynamic_sidebar_params_footer($params)
{
    // only affect the params of the sidebar-footer
    if ($params[0]['id'] == 'sidebar-footer') {
        // Add a uk-width-medium-1-x class, where x is the number of the widgets within the sidebar
        $class = 'uk-width-medium-1-' . get_widgets_count('sidebar-footer');
        $params[0]['before_widget'] = preg_replace('(class=")', 'class="' . $class . ' ', $params[0]['before_widget']);
    }
    return $params;
}


/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 */
function wp_uikit_starter_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) : ?>

        <div>
            <?php the_post_thumbnail(); ?>
        </div>

    <?php else : ?>

        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>

    <?php endif; // End is_singular()
}


/**
 * Output the gallery shortcode the way I want
 */
function wp_uikit_starter_gallery_shortcode($attr) {
    $g = new UIkitGallery();
    return $g->render($attr);
}
