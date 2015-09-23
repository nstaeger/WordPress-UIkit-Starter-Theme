<?php

/**
 * Provides some helpers to use within the views.
 */
class ThemeHelpers
{

    /**
     * Gets the first image attached to the post.
     *
     * @param $post_id
     *
     * @return int|bool
     */
    public function getFirstPostImage($post_id)
    {
        if (has_post_thumbnail()) {
            return get_post_thumbnail_id();
        }

        $attachments = $this->getPostImages($post_id, 1);

        if ($attachments && is_array($attachments) && !empty($attachments)) {
            return $attachments[0]->ID;
        } else {
            return false;
        }
    }

    /**
     * Gets all images attached to the post.
     *
     * @param int $post_id
     * @param int $limit
     *
     * @return bool|int
     */
    public function getPostImages($post_id, $limit = -1)
    {
        $args = array(
            'post_type'      => 'attachment',
            'post_mime_type' => 'image/jpeg',
            'post_parent'    => $post_id,
            'numberposts'    => $limit,
            'orderby'        => 'menu_order'
        );

        return get_posts($args);
    }

    /**
     * Displays the pagination for the posts overview page (and search and archive)
     */
    public function getPostsPagination()
    {
        $pagination = paginate_links(array('type' => 'array', 'mid_size' => 3, 'prev_next' => false));

        if ($pagination == null) return;

        $returner = array();
        $returner[] = '<ul class="uk-pagination">';
        $returner[] = '<li class="uk-pagination-previous">' . get_previous_posts_link() . '</li>';

        for ($i = 0; $i < sizeof($pagination); $i++) {
            $returner[] = '<li class="uk-hidden-small">' . $pagination[$i] . '</li>';
        }

        $returner[] = '<li class="uk-pagination-next">' . get_next_posts_link() . '</li>';
        $returner[] = '</ul>';

        return implode('', $returner);
    }

    /**
     * Renders a grid around the content, if the sidebar is active.
     */
    public function wrapContentBefore()
    {
        if (is_active_sidebar('sidebar-main')) {
            echo '<div class="uk-grid" data-uk-grid-margin >';
            echo '<div class="uk-width-medium-3-4">';
        }
    }

    /**
     * Renders a grid around the content, if the sidebar is active.
     */
    public function wrapContentAfter()
    {
        if (is_active_sidebar('sidebar-main')) {
            echo '</div>';
            echo '<div class="uk-width-medium-1-4">';
            get_sidebar();
            echo '</div>';
            echo '</div>';
        }
    }

}
