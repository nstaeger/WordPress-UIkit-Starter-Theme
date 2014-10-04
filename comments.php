<?php
/**
 * Template for displaying comments and the comment-form
 *
 * @author nstaeger
 * @since 2014-10-04
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

?>

<section id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h2 class="nst-comments-title">Comments</h2>

        <?php if (get_comment_pages_count() > 1 && get_option( 'page_comments' )) : ?>
            <nav class="nst-comments-navigation">
                <h3 class="uk-hidden">Comment Navigation</h3>
                <ul class="uk-pagination">
                    <li class="uk-pagination-previous"><?php previous_comments_link('<i class="uk-icon-angle-double-left"></i> Older Comments'); ?></li>
                    <li class="uk-pagination-next"><?php next_comments_link('Newer Comments <i class="uk-icon-angle-double-right"></i>'); ?></li>
                </ul>
            </nav>
        <?php endif; ?>

        <ul class="uk-comment-list">
            <?php
                wp_list_comments(array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size'=> 34,
                    'walker'     => new WordpressUikitCommentsWalker()
                ));
            ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option( 'page_comments' )) : ?>
            <nav class="nst-comments-navigation">
                <h3 class="uk-hidden">Comment Navigation</h3>
                <ul class="uk-pagination">
                    <li class="uk-pagination-previous"><?php previous_comments_link('<i class="uk-icon-angle-double-left"></i> Older Comments'); ?></li>
                    <li class="uk-pagination-next"><?php next_comments_link('Newer Comments <i class="uk-icon-angle-double-right"></i>'); ?></li>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</section>