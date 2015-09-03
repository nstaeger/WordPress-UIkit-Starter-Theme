<?php

/**
 * Manages all menu-related modifications.
 */
class ThemeMenus
{

    public function __construct()
    {
        // register menus
        register_nav_menu('main', 'Main Menu');
        register_nav_menu('footer', 'Footer Menu');
    }

} 