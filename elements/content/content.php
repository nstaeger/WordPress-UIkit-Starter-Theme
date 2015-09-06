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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('uk-article')); ?>>

    <div class="uk-container uk-container-center uk-text-center tm-pre-content">
        <?php $theme->helpers->renderPostPreContent(); ?>
    </div>

    <div class="uk-container uk-container-center uk-margin-top tm-container-article">

        <?php
        if (is_single()) {
            the_title('<h1 class="uk-article-title uk-text-center tm-article-title tm-article-title-' . get_post_format() . '">', '</h1>');
        } else {
            the_title('<h1 class="uk-article-title uk-text-center tm-article-title tm-article-title-' . get_post_format() . '"><a href="' . esc_url(get_permalink()) . '" class="uk-link-reset" rel="bookmark">', '</a></h1>');
        }
        ?>
        <p class="uk-article-meta uk-text-center">
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
            //            wp_link_pages( array(
            //                'before'      => '<div class="page-links"><span class="page-links-title">Pages</span>',
            //                'after'       => '</div>',
            //                'link_before' => '<span>',
            //                'link_after'  => '</span>',
            //            ) );
            ?>
        <?php endif; ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            echo '<hr class="uk-margin-large">';
            comments_template();
        }
        ?>

    </div>

</article>
