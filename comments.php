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

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$form_args = array(

    'fields' => apply_filters('comment_form_default_fields', array(

        'author' =>
            '<div class="comment-form-author uk-form-row">'
            . '<label for="author" class="uk-form-label">'
                . __( 'Name', 'domainreference' )
                . ( $req ? ' <span class="required">*</span>' : '' )
            . '</label>'
            . '<div class="uk-form-controls">'
                . '<input id="author" class="uk-width-1-1" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'
            . '</div>'
            . '</div>',

        'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
            ( $req ? '<span class="required">*</span>' : '' ) .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>',

        'url' =>
            '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p>',

    ))
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
            <p class="no-comments"><?php echo 'Comments are closed.'; ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php // TODO eventuell hier mit einem div.uk-form wrappen, anstatt das styling zu vererben ?>
    <?php comment_form($form_args); ?>

</section>