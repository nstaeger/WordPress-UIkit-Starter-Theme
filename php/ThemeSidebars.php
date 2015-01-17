<?php

/**
 * Manages all sidebar-related modifications.
 *
 * @author Nicolai Stäger
 */
class ThemeSidebars
{

    public function __construct()
    {
        // register main sidebar
        register_sidebar(array(
            'name' => 'Sidebar',
            'id' => 'sidebar-main',
            'description' => 'Main Sidebar on the left side.',
            'before_widget' => '<div id="%1$s" class="%2$s nst-widget uk-panel">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        // register footer sidebar
        register_sidebar(array(
            'name' => 'Footer Sidebar',
            'id' => 'sidebar-footer',
            'description' => 'Horizontal Sidebar in the footer',
            'before_widget' => '<div id="%1$s" class="%2$s nst-widget uk-panel">',
            'after_widget' => '</div>',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        // Add filter for the footer-sidebar
        // Only apply this filter, if not the admin-panel is requested
        if (!is_admin()) {
            add_filter('dynamic_sidebar_params', $this->dynamic_sidebar_params_footer);
        }
    }


    /**
     * Filters the params for the sidebars
     *
     * @param array $params
     *              The params of the widget
     * @return array
     *              The params of the widget
     */
    private function dynamic_sidebar_params_footer($params)
    {
        // only affect the params of the sidebar-footer
        if ($params[0]['id'] == 'sidebar-footer') {
            // Add a uk-width-medium-1-x class, where x is the number of the widgets within the sidebar
            $class = 'uk-width-medium-1-' . $this->get_widgets_count('sidebar-footer');
            $params[0]['before_widget'] = preg_replace('(class=")', 'class="' . $class . ' ', $params[0]['before_widget']);
        }
        return $params;
    }

    /**
     * Return the number of widgets within a sidebar
     */
    private function get_widgets_count($sidebar_id)
    {
        $sidebars_widgets = wp_get_sidebars_widgets();
        return (int) count((array) $sidebars_widgets[$sidebar_id]);
    }

} 