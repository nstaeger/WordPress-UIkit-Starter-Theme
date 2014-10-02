<?php
/**
 * element for navigation and offcanvas navigation
 * 
 * @author nstaeger
 * @since 2014-08-31
 */
?><nav id="navbar" class="uk-navbar uk-margin-large-top">
    <div class="uk-container uk-container-center">
        <?php
            wp_nav_menu(array(
                'menu' => 'main',
                'theme_location' => 'main',
                'menu_class' => 'uk-navbar-nav uk-hidden-small',
                'depth' => 2,
                'walker' => new WordpressUikitMenuWalker('navbar')
            ));
        ?>
        <a href="#offcanvas-menu" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
    </div>
</nav>
<div id="offcanvas-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <?php
            wp_nav_menu(array(
                'menu' => 'main',
                'theme_location' => 'main',
                'menu_class' => 'uk-nav uk-nav-offcanvas',
                'depth' => 2,
                'walker' => new WordpressUikitMenuWalker('offcanvas')
            ));
        ?>
    </div>
</div>