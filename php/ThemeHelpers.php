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

} 