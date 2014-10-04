<?php
/**
 * Template file for displaying single posts.
 *
 * @author nstaeger
 * @since 2014-10-04
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

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    echo '<hr>';
                                    comments_template();
                                }
                            }
                        }
                        else {
                            echo '<p>Nothing found here. Sorry!</p>';
                        }
                    ?>
                </section>
            </div>
            <div class="uk-width-medium-1-4">
                <?php //get_sidebar(); ?>
                <aside>
                    <h2>Links</h2>
                    <ul class="uk-list">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
                    <h2>Text</h2>
                    <p>This is a simple text Widget, that only has a headline and some text.</p>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php //get_sidebar(); ?>

<?php

get_template_part('element', 'footer');
get_footer();