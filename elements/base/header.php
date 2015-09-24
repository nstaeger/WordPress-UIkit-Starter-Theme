<?php
/**
 * element for header
 */

$header_style = '';
if ($headerImageUrl = get_header_image()) {
    $header_style = 'style="height: 180px; background-image: url(' . $headerImageUrl . ');"';
}

?>
<header id="header" class="uk-cover-background uk-block uk-block-secondary uk-contrast" <?= $header_style ?>>
    <div class="uk-container uk-container-center">
        <div class="uk-text-center">
            <a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr(get_bloginfo('name', 'display')); ?>" class="uk-h3 uk-link-reset">
                <?php bloginfo('name'); ?>
            </a>
        </div>
        <?php if ($description = get_bloginfo('description')) : ?>
            <?= $description ?>
        <?php endif; ?>
    </div>
</header>