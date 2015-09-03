<?php
/**
 * 404 template
 */

get_header(); ?>

    <section class="uk-height-1-1 uk-vertical-align uk-text-center">
        <div class="uk-vertical-align-middle">
            <h1>404</h1>
            <p><?= __('Sorry, but we could not find, what you were looking for.', 'uikit-starter') ?></p>
            <p>
                <a href="<?php echo esc_url(home_url()); ?>"><i class="uk-icon-reply"></i> <?= __('go back to website', 'uikit-starter') ?>'</a>
            </p>
        </div>
    </section>

<?php

get_footer();