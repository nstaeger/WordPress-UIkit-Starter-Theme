<?php
/**
 * The default template for displaying an article content.
 * Used for single.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('uk-article')); ?>>

    <?php

    get_template_part('elements/content/article-prebody', get_post_format());
    get_template_part('elements/content/article-body', get_post_format());
    get_template_part('elements/content/article-comments', get_post_format());
    get_template_part('elements/content/article-navigation', get_post_format());

    ?>

</article>
