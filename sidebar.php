<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
<<<<<<< HEAD
=======
 * @author nstaeger
 * @since 2014-08-31
>>>>>>> f30f5b5f3d805b6a5d0b5d1a341f138f51e6317b
 */
?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    <aside class="nst-sidebar">
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
    </aside>
<?php endif; ?>
