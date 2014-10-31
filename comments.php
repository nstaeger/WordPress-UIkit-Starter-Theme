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

/**
 * Settings for the Comment-Form
 */
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? ' aria-required="true" required' : '' );

$form_args = array(
    'fields' => apply_filters('comment_form_default_fields', array(
        'author' =>
            '<div class="comment-form-author uk-form-row">'
            . '<label for="author" class="uk-form-label">'
                . __( 'Name', 'domainreference' )
                . ( $req ? ' <span class="required">*</span>' : '' )
            . '</label>'
            . '<div class="uk-form-controls">'
                . '<input id="author" class="uk-width-1-1" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />'
            . '</div>'
            . '</div>',
        'email' =>
            '<div class="comment-form-email uk-form-row">'
            . '<label for="email" class="uk-form-label">'
                . __( 'Email', 'domainreference' )
                . ( $req ? ' <span class="required">*</span>' : '' )
            . '</label>'
            . '<div class="uk-form-controls">'
                . '<input id="email" class="uk-width-1-1" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />'
            . '</div>'
            . '</div>',
        'url' =>
            '<div class="comment-form-url uk-form-row">'
            . '<label for="url" class="uk-form-label">'
                . __( 'Website', 'domainreference' )
            . '</label>'
            . '<div class="uk-form-controls">'
                . '<input id="url" class="uk-width-1-1" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" />'
            . '</div>'
            . '</div>',
    )),
    'comment_field' =>
        '<div class="comment-form-comment uk-form-row">'
        . '<label for="comment" class="uk-form-label">'
            . _x( 'Comment', 'noun' )
            . ' <span class="required">*</span>'
        . '</label>'
        . '<div class="uk-form-controls">'
            . '<textarea id="comment" class="uk-width-1-1" name="comment" cols="45" rows="8" aria-required="true" required ></textarea>'
        . '</div>'
        . '</div>',
    'comment_notes_after' =>
        '<p class="form-allowed-tags">'
            . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <pre><code>' . allowed_tags() . '</code></pre>' )
        . '</p>'
);

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
                    'avatar_size'=> 56,
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
            <p class="no-comments"><?php echo 'Comments are closed.'; ?></p>
        <?php endif; ?>

        <hr>

    <?php endif; ?>

    <?php comment_form($form_args); ?>

</section>