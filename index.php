<?php
/**
 * The main template file
 */

$theme = Theme::get();

get_header();
get_template_part('elements/base/header');
get_template_part('elements/base/navigation');

?>
    <div class="uk-container uk-container-center uk-margin-large-top tm-container-collapse">
        <?php

        $theme->helpers->wrapContentBefore();

        if (have_posts()) {
            ?>

            <div class="uk-grid uk-grid-collapse uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-4" data-uk-grid-margin data-uk-grid-match="{target: '> div > .uk-panel', row: true}">

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

        $theme->helpers->wrapContentAfter();

        ?>
    </div>
<?php
get_template_part('elements/base/footer');
get_footer();