<?php

/**
 * Renders a gallery based on different settings the UIkit way.
 *
 * @author Nicolai Stäger
 */
class UIkitGallery
{

    /**
     * @var array Default settings for a gallery
     */
    private $defaults = array(
        'type' => 'slideshow',
        'showdotnav' => true,
        'order' => 'ASC',
        'orderny' => 'menu_order ID'
    );

    /**
     * @var Attributes for the gallery
     */
    private $settings;

    /**
     * @var The current post
     */
    private $post;

    /**
     * @var The images
     */
    private $attachments;


    /**
     * Renders a gallery based on the attributes.
     * Prepares content before passing rendering to specific function.
     *
     * @param $attributes
     * @return mixed
     */
    public function render($attributes)
    {

        $this->post = get_post();
        $this->settings = array_merge($this->defaults, $attributes);

        // If the IDs of the images were passed
        if (!empty($this->settings['ids'])) {
            $this->attachments = get_posts(array(
                    'include' => $this->settings['ids'],
                    'post_status' => 'inherit',
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => $this->settings['order'],
                    'orderby' => $this->settings['orderby'])
            );
        } // otherwise get the images attached to the post
        else {
            $this->attachments = get_posts(array(
                    'post_parent' => $this->post ? $this->post->ID : 0,
                    'post_status' => 'inherit',
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => $this->settings['order'],
                    'orderby' => $this->settings['orderby'])
            );
        }

        // If no images were found...
        if (empty($this->attachments)) {
            return;
        }

        // Render the gallery
        if ($this->settings['type'] == 'slideshow') {
            return $this->renderSlideshow();
        }
    }


    /**
     * Renders the gallery like a slideshow
     */
    private function renderSlideshow()
    {
        $output = array();

        $output[] = '<div class="uk-slidenav-position" data-uk-slideshow>';
        $output[] = '<ul class="uk-slideshow">';

        foreach ($this->attachments as $attachment) {
            $image = $this->getImageByAttachment($attachment);
            $output[] = '<li style="height: 333px;">';
            $output[] = '<img src=' . $image[0] . ' width="' . $image[1] . '" height="' . $image[2] . '" />';
            $output[] = '</li>';
        }

        $output[] = '</ul>';
        $output[] = '<a href="" class="uk-slidenav uk-slidenav-previous"  data-uk-slideshow-item="previous"></a>';
        $output[] = '<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>';

        if ($this->settings['showdotnav']) {
            $output[] = '<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-text-center">';

            foreach ($this->attachments as $key => $attachment) {
                $output[] = '<li data-uk-slideshow-item="' . $key . '"><a href=""></a></li>';
            }
            $output[] = '</ul>';
        }

        $output[] = '</div>';

        return implode(" ", $output);
    }


    /**
     * Gets the image out of an attachment
     *
     * @param $attachment
     * @return array|bool
     */
    private function getImageByAttachment($attachment)
    {
        return $this->getImageByAttachmentID($attachment->ID);
    }


    /**
     * Gets the image from an id
     * @param $id
     * @return array|bool
     */
    private function getImageByAttachmentID($id)
    {
        return wp_get_attachment_image_src($id, 'large');
    }

} 