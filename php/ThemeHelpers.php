<?php

/**
 * Provides some helpers to use within the views.
 *
 * @author Nicolai Stäger
 */
class ThemeHelpers {

    /**
     * Display an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index
     * views, or a div element when on single views.
     */
    public function postThumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) {
            the_post_thumbnail();
        }
        else {
            echo '<a href="<?php the_permalink(); ?>">';
            the_post_thumbnail();
            echo '</a>';
        }
    }

} 