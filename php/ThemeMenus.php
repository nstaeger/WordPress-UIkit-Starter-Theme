<?php

/**
 * Manages all menu-related modifications.
 *
 * @author Nicolai Stäger
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