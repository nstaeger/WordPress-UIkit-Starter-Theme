<?php

/**
 * HTML comment list class.
 *
 * TODO make shure, that this theme is supporting HTML
 *      current_theme_supports( 'html5', 'comment-list' )
 *
 * @uses Walker
 * @since 2.7.0
 */
class WordpressUikitCommentsWalker extends Walker_Comment {

    /**
     * Start the list before the elements are added.
     *
     * @see Walker_Comment::start_lvl()
     *
     * @param string $output
     *                Passed by reference. Used to append additional content.
     * @param int $depth
     *                Depth of comment.
     * @param array $args
     *                Uses 'style' argument for type of HTML list.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1;
        $output .= '<ul class="nst-comments-children">' . "\n";
    }

    /**
     * End the list of items after the elements are added.
     *
     * @see Walker_Comment::end_lvl()
     *
     * @param string $output
     *                Passed by reference. Used to append additional content.
     * @param int $depth
     *                Depth of comment.
     * @param array $args
     *                Will only append content if style argument value is 'ol' or 'ul'.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; // TODO should it not be -1???
        $output .= '</ul>' . "\n";
    }

    /**
     * Output a single comment.
     * 
     * @see wp_list_comments()
     *
     * @param object $comment
     *                Comment to display.
     * @param int $depth 
     *                Depth of comment.
     * @param array $args 
     *                An array of arguments.
     */
    protected function comment( $comment, $depth, $args ) {
        $this->html5_comment($comment, $depth, $args);
    }

    /**
     * Output a comment in the HTML5 format.
     *
     * @see wp_list_comments()
     *
     * @param object $comment
     *                Comment to display.
     * @param int $depth
     *                Depth of comment.
     * @param array $args
     *                An array of arguments.
     */
    protected function html5_comment( $comment, $depth, $args ) {
        ?>
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '' ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="uk-comment">
            <header class="uk-comment-header">
                <?php // TODO assign class to image-tag ?>
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                <?php printf('<h4 class="uk-comment-title">%s</h4>',    sprintf( '<b class="fn">%s</b>', get_comment_author_link() ) ); ?>

                <div class="uk-comment-meta uk-link-reset">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
                        <time datetime="<?php comment_time( 'c' ); ?>">
                            <?php printf( '%1$s at %2$s', get_comment_date(), get_comment_time() ); ?>
                        </time>
                    </a>
                    <span class="uk-margin-small-left"><?php edit_comment_link( __( 'Edit' ), '<i class="uk-icon-edit"></i> ' ); ?></span>
                </div><!-- .comment-metadata -->

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                <?php endif; ?>
            </header>

            <div class="uk-comment-body">
                <?php comment_text(); ?>
            </div>

            <div class="nst-reply">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </article>
        <?php
    }
}