<div class="uk-container uk-container-center">
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        echo '<hr class="uk-margin-large">';
        comments_template();
    }
    ?>
</div>
