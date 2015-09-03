<?php

/**
 * Manages all shortcode-related modifications.
 */
class ThemeShortcodes
{

    public function __construct()
    {
        // Adding a custom gallery-shortcode rendering
        remove_shortcode('gallery', 'gallery_shortcode');
        add_shortcode('gallery', array($this, 'galleryShortcode'));
    }


    /**
     * Output the gallery shortcode the UIkit way
     */
    public function galleryShortcode($attr)
    {
        $gallery = new UIkitGallery();

        return $gallery->render($attr);
    }

} 