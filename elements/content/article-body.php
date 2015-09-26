<?php

$iconClass = 'tm-icon' . (get_post_format() ? ' tm-icon-' . get_post_format() : '');

?>

<div class="uk-container uk-container-center">

    <?php
    if (is_single()) {
        the_title('<h1 class="uk-article-title tm-article-title tm-article-title-' . get_post_format() . '">', '</h1>');
    } else {
        the_title('<h1 class="uk-article-title tm-article-title tm-article-title-' . get_post_format() . '"><a href="' . esc_url(get_permalink()) . '" class="uk-link-reset" rel="bookmark">', '</a></h1>');
    }
    ?>
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
                <?php comments_popup_link('<i class="uk-icon-comment"></i> ' . __('Leave a comment'), '<i class="uk-icon-comment"></i> 1', '<i class="uk-icon-comment"></i> %'); ?>
            </span>
        <?php endif; ?>
        <?php edit_post_link('<i class="uk-icon-edit"></i> Edit', '<span class="nst-edit-link uk-margin-small-left uk-link-reset">', '</span>'); ?>

        <br>
        <span class="uk-link-reset">
            <i class="uk-icon-ticket"></i> <?php echo get_the_category_list(', '); ?>
        </span>
        <span class="uk-margin-small-left uk-link-reset">
            <a href="<?= get_post_format_link(get_post_format()) ?>">
                <i class="<?= $iconClass ?>"></i> <?php echo get_post_format_string(get_post_format()); ?>
            </a>
        </span>

        <?php if (is_single()) : ?>
            <br/ >
            <?php the_tags('<span class="nst-tag-list uk-link-reset"><i class="uk-icon-tag"></i> ', ', ', '</span>'); ?>
        <?php endif; ?>
    </p>

    <?php if (is_search()) : ?>
        <?php the_excerpt(); ?>
    <?php else : ?>
        <?php
        the_content('Continue reading <span class="meta-nav">&rarr;</span>');
        //            wp_link_pages(array(
        //                'before'      => '<div class="page-links"><span class="page-links-title">Pages</span>',
        //                'after'       => '</div>',
        //                'link_before' => '<span>',
        //                'link_after'  => '</span>',
        //            ));
        ?>
    <?php endif; ?>

</div>
