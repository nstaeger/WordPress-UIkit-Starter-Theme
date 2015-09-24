<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * TODO Categories: only print if any set
 * TODO Localize
 */

$theme = Theme::get();

$postLink = esc_url(get_permalink());
$iconClass = 'tm-icon' . (get_post_format() ? ' tm-icon-' . get_post_format() : '');
?>

<div>
    <div class="uk-panel uk-panel-box">

        <?php if ($imageID = $theme->helpers->getFirstPostImage(get_the_ID())) : ?>
            <div class="uk-text-center uk-panel-teaser">
                <div class="uk-overlay uk-overlay-hover">
                    <?= wp_get_attachment_image($imageID, 'grid-preview', false, array('class' => 'uk-overlay-scale')); ?>
                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade <?= $iconClass ?>"></div>
                    <a href="<?= $postLink ?>" class="uk-position-cover"></a>
                </div>
            </div>
            <?php else: ?>
            <div class="uk-text-center uk-panel-teaser">
                <div class="uk-overlay uk-overlay-hover">
                    <img src="<?= get_template_directory_uri() ?>/img/placeholder.jpg" class="uk-overlay-scale" />
                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade <?= $iconClass ?>"></div>
                    <a href="<?= $postLink ?>" class="uk-position-cover"></a>
                </div>
            </div>
        <?php endif; ?>

        <?php the_title('<h2 class="uk-panel-title tm-article-title tm-article-title-' . get_post_format() . '"><a href="' . $postLink . '" class="uk-link-reset" rel="bookmark">', '</a></h2>'); ?>

        <p class="uk-article-meta">
            <?php printf(
                '<span class="uk-link-reset"><a href="%1$s" rel="author"><i class="uk-icon-user"></i> %2$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                get_the_author()
            ); ?>
            <?php printf(
                '<span class="uk-margin-small-left"><i class="uk-icon-clock-o"></i> <time datetime="%1$s">%2$s</time></span>',
                esc_attr(get_the_date('c')),
                esc_html(get_the_date())
            ); ?>
            <?php if (!post_password_required() && (comments_open() || get_comments_number())) : ?>
                <span class="uk-margin-small-left uk-link-reset">
                    <?php comments_popup_link('<i class="uk-icon-comment"></i> ' . __('Leave a comment', 'uikit-starter'), '<i class="uk-icon-comment"></i> 1', '<i class="uk-icon-comment"></i> %'); ?>
                </span>
            <?php endif; ?>
            <?php edit_post_link('<i class="uk-icon-edit"></i> Edit', '<span class="nst-edit-link uk-margin-small-left uk-link-reset">', '</span>'); ?>
        </p>

        <?php if ($excerpt = get_the_excerpt()) : ?>
            <div class="uk-margin">
                <?= $excerpt; ?>
            </div>
        <?php endif; ?>

        <p>
            <a href="<?= $postLink ?>" class="uk-button uk-button-link"><?= __('Read more') ?></a>
        </p>
    </div>
</div>
