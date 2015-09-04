<?php
/**
 * element for header
 */

$header_style = '';
if ($headerImageUrl = get_header_image()) {
    $header_style = 'style="height: 180px; background-image: url(' . $headerImageUrl . ');"';
}

$text_style = '';
if ($color = get_header_textcolor()) {
    $text_style = 'style="color: #' . $color . ';"';
}

?>
<header id="header" class="uk-cover-background" <?= $header_style ?>>
    <div class="uk-container uk-container-center">
        <div class="uk-margin-large-top" <?= $text_style ?>>
            <a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr(get_bloginfo('name', 'display')); ?>" class="uk-h2 uk-link-reset">
                <?php bloginfo('name'); ?>
            </a>
        </div>
        <?php if ($description = get_bloginfo('description')) : ?>
            <span <?= $text_style ?>><?= $description ?></span>
        <?php endif; ?>
    </div>
</header>