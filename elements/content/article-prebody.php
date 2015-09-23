<?php

$theme = Theme::get();

if ($image_id = $theme->helpers->getFirstPostImage(get_the_ID())) : ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-container-collapse tm-pre-content">
        <?= wp_get_attachment_image($image_id, 'large') ?>
    </div>

<?php endif;
