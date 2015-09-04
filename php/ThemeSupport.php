<?php

/**
 * Manages all theme-support-related modifications.
 */
class ThemeSupport
{

    public function __construct()
    {
        // add HTML5 support
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

        // add Featured Image support
        add_theme_support('post-thumbnails');

        // add a customizable header (with image and color)
        add_theme_support('custom-header', array('height' => 400, 'width' => 2500, 'default-text-color' => '444',));

        // support for post types
        add_theme_support('post-formats', array('image', 'gallery', 'video', 'link', 'quote'));

        add_image_size('grid-preview', 700, 400, true);
    }

} 