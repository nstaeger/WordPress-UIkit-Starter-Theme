<?php

$theme = Theme::get();

$args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'video',
    'post_parent'    => get_the_ID(),
    'post_status'    => null,
    'numberposts'    => -1,
    'orderby'        => 'menu_order'
);

if ($attachments = get_posts($args)) :
    $image_id = $theme->helpers->getFirstPostImage(get_the_ID());
    $image = wp_get_attachment_image_src($image_id, 'large');
    ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-container-collapse tm-pre-content">
        <video controls preload="metadata" class="uk-responsive-width" poster="<?= $image[0] ?>">
            <?php foreach ($attachments as $attachment) : ?>
                <source src="<?= wp_get_attachment_url($attachment->ID) ?>" type="<?= get_post_mime_type($attachment->ID) ?>">
            <?php endforeach; ?>

            <?= __('Sorry, but the browser you are using, does not support HTML5 videos.') ?>
        </video>
    </div>

<?php elseif ($image_id = $theme->helpers->getFirstPostImage(get_the_ID())) : ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-pre-content">
        <?= wp_get_attachment_image($image_id, 'large') ?>
    </div>

<?php endif;
