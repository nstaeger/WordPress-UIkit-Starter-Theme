<?php
/**
 * element for header
 * 
 * @author nstaeger
 * @since 2014-08-31
 */
?>
<header id="header" class="uk-cover-background" style="min-height: 190px; background-image: url(<?= header_image(); ?>);">
    <div class="uk-container uk-container-center">
        <h1 class="uk-margin-large-top" style="color: #<?= get_header_textcolor(); ?>">
            <a href="<?= esc_url(home_url('/')); ?>" title="<?= esc_attr(get_bloginfo('name', 'display')); ?>" class="uk-link-reset">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
        <span style="color: #<?= get_header_textcolor(); ?>"><?php bloginfo( 'description' ); ?></span>
    </div>
</header>