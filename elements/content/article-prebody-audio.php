<?php

$theme = Theme::get();

$image_id = $theme->helpers->getFirstPostImage(get_the_ID());

$args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'audio',
    'post_parent'    => get_the_ID(),
    'post_status'    => null,
    'numberposts'    => -1,
    'orderby'        => 'menu_order'
);

if ($image_id || $attachments = get_posts($args)): ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-pre-content">
        <?php if ($image_id) : ?>
            <?= wp_get_attachment_image($image_id, 'large'); ?>
        <?php endif; ?>
        <?php if ($attachments) : ?>
            <audio controls preload="metadata" class="uk-responsive-width">
                <?php foreach ($attachments as $attachment) : ?>
                    <source src="<?= wp_get_attachment_url($attachment->ID) ?>" type="<?= get_post_mime_type($attachment->ID) ?>">
                <?php endforeach ?>
                <?= __('Sorry, but the browser you are using, does not support HTML5 audio.') ?>
            </audio>
        <?php endif; ?>
    </div>

<?php endif;