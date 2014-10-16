<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    <aside class="nst-sidebar">
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
    </aside>
<?php endif; ?>