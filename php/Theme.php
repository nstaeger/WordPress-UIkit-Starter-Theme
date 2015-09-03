<?php

require('ThemeFilters.php');
require('ThemeHelpers.php');
require('ThemeMenus.php');
require('ThemeShortcodes.php');
require('ThemeSidebars.php');
require('ThemeSupport.php');
require('UIkitGallery.php');
require('walker/WordpressUikitCommentsWalker.php');
require('walker/WordpressUikitMenuWalker.php');

/**
 * This class is responsible for setting up all theme-specific stuff.
 */
class Theme
{

    public $filters;
    public $helpers;
    public $menus;
    public $shortcodes;
    public $support;
    public $sidebars;

    public function __construct()
    {
        $this->filters = new ThemeFilters();
        $this->helpers = new ThemeHelpers();
        $this->menus = new ThemeMenus();
        $this->shortcodes = new ThemeShortcodes();
        $this->support = new ThemeSupport();
        $this->sidebars = new ThemeSidebars();
    }
} 