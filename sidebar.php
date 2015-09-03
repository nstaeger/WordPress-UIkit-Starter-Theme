<?php
/**
 * Default template for sidebar
 */
?>

<?php if (is_active_sidebar('sidebar-main')) : ?>
    <aside class="nst-sidebar">
        <?php dynamic_sidebar('sidebar-main'); ?>
    </aside>
<?php endif; ?>