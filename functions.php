<?php

    require('php/walker/WordpressUikitMenuWalker.php');


    add_action('after_setup_theme', 'register_menus');
    function register_menus() {
        register_nav_menu('main', 'Main Menu');
    }

?>