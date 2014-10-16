<?php
/**
 * The main template file
 *
 * @author nstaeger
 * @since 2014-08-31
 */

get_header();
get_template_part('element', 'header');
get_template_part('element', 'navigation');
?>

<section id="main" class="uk-margin-large-top">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-medium-3-4">
                <section id="content">
                    <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                get_template_part('content'/*, get_post_format()*/);
                            }
                        }
                        else {
                            echo '<p>Nothing found here. Sorry!</p>';
                        }
                    ?>
                </section>
            </div>
            <div class="uk-width-medium-1-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php //get_sidebar(); ?>

<?php

get_template_part('element', 'footer');
get_footer();