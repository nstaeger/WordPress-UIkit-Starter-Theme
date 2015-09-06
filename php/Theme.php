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

    /**
     * @var ThemeFilters
     */
    public $filters;

    /**
     * @var ThemeHelpers
     */
    public $helpers;

    /**
     * @var ThemeMenus
     */
    public $menus;

    /**
     * @var ThemeShortcodes
     */
    public $shortcodes;

    /**
     * @var ThemeSupport
     */
    public $support;

    /**
     * @var ThemeSidebars
     */
    public $sidebars;

    /**
     * @var Theme
     */
    private static $instance;


    public function __construct()
    {
        $this->filters = new ThemeFilters();
        $this->helpers = new ThemeHelpers();
        $this->menus = new ThemeMenus();
        $this->shortcodes = new ThemeShortcodes();
        $this->support = new ThemeSupport();
        $this->sidebars = new ThemeSidebars();
    }

    /**
     * @return Theme
     */
    public static function get()
    {
        if (static::$instance === null) {
            static::$instance = new Theme();
        }

        return static::$instance;
    }
} 