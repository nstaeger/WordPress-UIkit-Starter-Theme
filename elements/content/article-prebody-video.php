<?php

$args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'video',
    'post_parent'    => get_the_ID(),
    'post_status'    => null,
    'numberposts'    => -1,
    'orderby'        => 'menu_order'
);

if ($attachments = get_posts($args)) :

    $poster_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image/jpeg',
        'post_parent'    => get_the_ID(),
        'post_status'    => null,
        'numberposts'    => -1,
        'orderby'        => 'menu_order'
    );

    ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-pre-content">
        <video controls preload="metadata" class="uk-responsive-width" <?= $poster = get_posts($poster_args) ? 'poster="' . wp_get_attachment_url($poster[0]->ID) . '"' : '' ?>>
            <?php foreach ($attachments as $attachment) : ?>
                <source src="<?= wp_get_attachment_url($attachment->ID) ?>" type="<?= get_post_mime_type($attachment->ID) ?>">
            <?php endforeach; ?>

            <?= __('Sorry, but the browser you are using, does not support HTML5 videos.') ?>
        </video>
    </div>

<?php elseif ($image_id = $this->getFirstPostImage(get_the_ID())) : ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-pre-content">
        <?= wp_get_attachment_image($image_id, 'large') ?>
    </div>

<?php endif;
