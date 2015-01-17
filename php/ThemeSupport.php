<?php

/**
 * Manages all theme-support-related modifications.
 *
 * @author Nicolai Stäger
 */
class ThemeSupport {

    public function __construct()
    {
        // add HTML5 support
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        // add Featured Image support
        add_theme_support('post-thumbnails');
    }

} 