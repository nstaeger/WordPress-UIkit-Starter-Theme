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
     * Get the Media to be displayed before the content.
     */
    public function renderPostPreContent()
    {
        $post_id = get_the_ID();
        $format = get_post_format();

        if ($format == 'gallery') {

            $attachments = $this->getPostImages($post_id);

            if ($attachments && is_array($attachments) && !empty($attachments)) {
                echo '<div class="uk-slidenav-position" data-uk-slideshow="{animation: \'swipe\', autoplay: true, autoplayInterval: 5000}">';
                echo '<ul class="uk-slideshow">';

                foreach ($attachments as $attachment) {
                    echo '<li>';
                    echo wp_get_attachment_image($attachment->ID, 'large');
                    echo '</li>';
                }

                echo '</ul>';
                echo '<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>';
                echo '<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>';
                echo '<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">';

                foreach ($attachments as $index => $attachment) {
                    echo '<li data-uk-slideshow-item="' . $index . '"><a href=""></a></li>';
                }

                echo '</ul>';
                echo '</div>';
            }

        } else if ($format == 'video') {

            $args = array(
                'post_type'      => 'attachment',
                'post_mime_type' => 'video',
                'post_parent'    => $post_id,
                'post_status'    => null,
                'numberposts'    => -1,
                'orderby'        => 'menu_order'
            );

            if ($attachments = get_posts($args)) {

                $poster_args = array(
                    'post_type'      => 'attachment',
                    'post_mime_type' => 'image/jpeg',
                    'post_parent'    => $post_id,
                    'post_status'    => null,
                    'numberposts'    => -1,
                    'orderby'        => 'menu_order'
                );

                echo '<video controls preload="metadata" class="uk-responsive-width"';

                if ($poster = get_posts($poster_args)) {
                    echo ' poster="' . wp_get_attachment_url($poster[0]->ID) . '"';
                }

                echo '>';

                foreach ($attachments as $attachment) {
                    echo '<source src="' . wp_get_attachment_url($attachment->ID) . '" type="' . get_post_mime_type($attachment->ID) . '">';
                }

                echo __('Sorry, but the browser you are using, does not support HTML5 videos.');
                echo '</video>';

            } else if ($image_id = $this->getFirstPostImage($post_id)) {
                echo wp_get_attachment_image($image_id, 'large');
            }

        } else if ($format == 'audio') {

            if ($image_id = $this->getFirstPostImage($post_id)) {
                echo wp_get_attachment_image($image_id, 'large');
            }

            $args = array(
                'post_type'      => 'attachment',
                'post_mime_type' => 'audio',
                'post_parent'    => $post_id,
                'post_status'    => null,
                'numberposts'    => -1,
                'orderby'        => 'menu_order'
            );

            if ($attachments = get_posts($args)) {
                echo '<audio controls preload="metadata" class="uk-responsive-width">';

                foreach ($attachments as $attachment) {
                    echo '<source src="' . wp_get_attachment_url($attachment->ID) . '" type="' . get_post_mime_type($attachment->ID) . '">';
                }

                echo __('Sorry, but the browser you are using, does not support HTML5 audio.');;
                echo '</audio>';
            }
        } else if ($image_id = $this->getFirstPostImage($post_id)) {
            echo wp_get_attachment_image($image_id, 'large');
        }
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
