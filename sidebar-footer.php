<?php
/**
 * template for footer sidebar
 *
 * @author nstaeger
 * @since 2014-10-24
 */

$sidebar_id = 'sidebar-footer';
?>
<?php if ( is_active_sidebar($sidebar_id) ) : ?>
    <section class="nst-sidebar-horizontal uk-margin-large-bottom">
        <div class="uk-grid" data-uk-grid-margin="">
            <?php dynamic_sidebar($sidebar_id); ?>
        </div>
    </section>
<?php endif; ?>
