<?php
/**
 * element for navigation and offcanvas navigation
 */

$nav = wp_nav_menu(array(
    'theme_location' => 'main',
    'menu_class'     => 'uk-navbar-nav uk-hidden-small',
    'depth'          => 2,
    'walker'         => new WordpressUikitMenuWalker('navbar'),
    'echo'           => false,
    'fallback_cb'    => false
));

$nav_offcanvas = wp_nav_menu(array(
    'theme_location' => 'main',
    'menu_class'     => 'uk-nav uk-nav-offcanvas',
    'depth'          => 2,
    'walker'         => new WordpressUikitMenuWalker('navbar'),
    'echo'           => false,
    'fallback_cb'    => false
));

?>
<?php if ($nav) : ?>
    <nav id="navbar" class="uk-navbar">
        <div class="uk-container uk-container-center">
            <?= $nav ?>
            <a href="#offcanvas-menu" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
        </div>
    </nav>
    <div id="offcanvas-menu" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <?= $nav_offcanvas ?>
        </div>
    </div>
<?php endif; ?>