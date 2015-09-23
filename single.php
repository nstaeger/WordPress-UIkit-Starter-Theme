<?php
/**
 * Template file for displaying single posts.
 */

$theme = Theme::get();

get_header();
get_template_part('elements/base/header');
get_template_part('elements/base/navigation');

?>
    <div class="uk-margin-large-top">
        <?php

        $theme->helpers->wrapContentBefore();

        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('elements/content/article', get_post_format());
            }
        } else {
            echo '<p>' . __('Nothing found here. Sorry!', 'uikit-starter') . '</p>';
        }

        $theme->helpers->wrapContentAfter();

        ?>
    </div>
<?php

get_template_part('elements/base/footer');
get_footer();