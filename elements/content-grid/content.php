<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * TODO Categories: only print if any set
 * TODO Localize
 */

global $theme;
?>

<div>
    <div class="uk-panel uk-panel-box">

        <?php if ($image = $theme->helpers->getFirstPostImage(get_the_ID())) : ?>
            <div class="uk-text-center uk-panel-teaser">
                <div class="uk-overlay uk-overlay-hover">
                    <?= wp_get_attachment_image($image->ID, 'grid-preview', false, array('class' => 'uk-overlay-scale')); ?>
                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade"></div>
                </div>
            </div>
        <?php endif; ?>

        <?php the_title('<h2 class="uk-panel-title"><a href="' . esc_url(get_permalink()) . '" class="uk-link-reset" rel="bookmark">', '</a></h2>'); ?>
        <p class="uk-article-meta">
            <?php printf(
                '<span class="nst-author uk-link-reset"><a href="%1$s" rel="author"><i class="uk-icon-user"></i> %2$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                get_the_author()
            ); ?>
            <?php printf(
                '<span class="nst-entry-time uk-margin-small-left"><i class="uk-icon-clock-o"></i> <time datetime="%1$s">%2$s</time></span>',
                esc_attr(get_the_date('c')),
                esc_html(get_the_date())
            ); ?>
            <span class="nst-category-list uk-margin-small-left uk-link-reset">
                <i class="uk-icon-ticket"></i> <?php echo get_the_category_list(', '); ?>
            </span>
            <?php if (!post_password_required() && (comments_open() || get_comments_number())) : ?>
                <span class="nst-comments uk-margin-small-left uk-link-reset">
                    <?php comments_popup_link('<i class="uk-icon-comment"></i> ' . __('Leave a comment', 'uikit-starter'), '<i class="uk-icon-comment"></i> 1', '<i class="uk-icon-comment"></i> %'); ?>
                </span>
            <?php endif; ?>
            <?php edit_post_link('<i class="uk-icon-edit"></i> Edit', '<span class="nst-edit-link uk-margin-small-left uk-link-reset">', '</span>'); ?>
        </p>

        <?php if ($excerpt = get_the_excerpt()) : ?>
            <div class="nst-entry-summary">
                <?= $excerpt; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
