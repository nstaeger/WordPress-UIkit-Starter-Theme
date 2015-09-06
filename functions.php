<?php

require('php/Theme.php');

/**
 * Theme setup function
 */
if (!function_exists('wp_uikit_starter_setup')) {
    function wp_uikit_starter_setup()
    {
        Theme::get();
    }

    add_action('after_setup_theme', 'wp_uikit_starter_setup');
}
