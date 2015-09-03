<?php
/**
 * The main template file
 */

get_header();
get_template_part('elements/base/header');
get_template_part('elements/base/navigation');

get_template_part('elements/base/precontent');

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('elements/content/content'/*, get_post_format()*/);
    }

    // Previous/next page navigation.
    echo $theme->helpers->getPostsPagination();
} else {
    echo '<p>' . __('Nothing found here. Sorry!', 'uikit-starter') . '</p>';
}

get_template_part('elements/base/postcontent');

get_template_part('elements/base/footer');
get_footer();