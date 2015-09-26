<?php

/**
 * Manages all filter-related modifications.
 */
class ThemeFilters
{

    public function __construct()
    {
        // Add Filter for the title
        add_filter('wp_title', array($this, 'titleFilter'), 10, 2);

        add_filter('comment_reply_link_args', array($this, 'commentReplyLinkArgsFilter'), 1);
    }

    /**
     * Create custom title element
     *
     * @param string $title Default title text for current view.
     * @param string $sep   Optional separator.
     *
     * @return string The filtered title.
     */
    public function titleFilter($title, $sep)
    {
        if (is_feed()) {
            return $title;
        }

        // Add the site name.
        $title .= get_bloginfo('name', 'display');

        // Add the site description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title = "$title $sep $site_description";
        }

        return $title;
    }

    /**
     * Filter the comment reply link args to add an icon.
     *
     * @param array $args the original args
     *
     * @return array
     */
    public function commentReplyLinkArgsFilter($args)
    {
        $args['reply_text'] = '<i class="uk-icon-reply"></i> ' . $args['reply_text'];
        $args['reply_to_text'] = '<i class="uk-icon-reply"></i> ' . $args['reply_to_text'];

        return $args;
    }

} 