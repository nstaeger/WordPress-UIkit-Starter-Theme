<?php
/**
 * Default template for sidebar
 *
 * @author nstaeger
 * @since 2014-10-24
 */
?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    <aside class="nst-sidebar">
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
    </aside>
<?php endif; ?>