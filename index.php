<?php
/**
 * The main template file
 */

get_header();
get_template_part('elements/base/header');
get_template_part('elements/base/navigation');

get_template_part('elements/base/precontent');

if (have_posts()) {
    ?>

    <div class="uk-grid uk-grid-collapse uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3" data-uk-grid-margin data-uk-grid-match="{target: '> div > .uk-panel', row: true}">

        <?php
        while (have_posts()) {
            the_post();
            get_template_part('elements/content-grid/content'/*, get_post_format()*/);
        }
        ?>

    </div>

    <?php
    // Previous/next page navigation.
    echo $theme->helpers->getPostsPagination();
} else {
    echo '<p>' . __('Nothing found here. Sorry!', 'uikit-starter') . '</p>';
}

get_template_part('elements/base/postcontent');

get_template_part('elements/base/footer');
get_footer();