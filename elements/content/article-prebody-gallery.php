<?php

$theme = Theme::get();
$attachments = $theme->helpers->getPostImages(get_the_ID());

if ($attachments && is_array($attachments) && !empty($attachments)) : ?>

    <div class="uk-container uk-container-center uk-margin-large-bottom uk-text-center tm-pre-content">
        <div class="uk-slidenav-position" data-uk-slideshow="{animation: 'scroll', autoplay: true, autoplayInterval: 5000, maxHeight: 630}">
            <ul class="uk-slideshow">

                <?php foreach ($attachments as $attachment) : ?>
                    <li>
                        <?= wp_get_attachment_image($attachment->ID, 'large') ?>
                    </li>
                <?php endforeach; ?>

            </ul>

            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>

            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">

                <?php foreach ($attachments as $index => $attachment) : ?>
                    <li data-uk-slideshow-item="<?= $index ?>"><a href=""></a></li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

<?php endif;
