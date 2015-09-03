<?php
/**
 * The main template file
 *
 * @author nstaeger
 * @since 2014-08-31
 */

get_header();
get_template_part('elements/base', 'header');
get_template_part('elements/base', 'navigation');
?>


<?php
    get_template_part('elements/base', 'precontent');
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('elements/content'/*, get_post_format()*/);
        }

        // Previous/next page navigation.
        echo $theme->helpers->getPostsPagination();
    }
    else {
        echo '<p>Nothing found here. Sorry!</p>';
    }
    get_template_part('elements/base', 'postcontent');
?>


<?php

get_template_part('elements/base', 'footer');
get_footer();