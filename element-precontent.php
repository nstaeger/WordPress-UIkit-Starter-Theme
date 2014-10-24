<?php
/**
 * element pre content
 * should be rendered directly before the dynamic content
 * handles displaying of the sidebar (or no sidebar)
 * must be closed via the element postcontent
 *
 * @author nstaeger
 * @since 2014-10-24
 */
?>

<section id="main" class="uk-margin-large-top">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
                <div class="uk-width-medium-3-4">
            <?php else : ?>
                <div class="uk-width-1-1">
            <?php endif; ?>
                <section id="content">