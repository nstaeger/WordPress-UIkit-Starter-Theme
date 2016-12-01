<?php

/**
 * Renders a gallery based on different settings the UIkit way.
 */
class UIkitGallery
{

    /**
     * @var array Default settings for a gallery
     */
    private $defaults = array(
        'type'       => 'grid',
        'showdotnav' => true,
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID'
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
     *
     * @return mixed
     */
    public function render($attributes)
    {

        $this->post = get_post();
        $this->settings = array_merge($this->defaults, $attributes);

        $arguments = array(
            'post_status' => 'inherit',
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => $this->settings['order'],
            'orderby' => $this->settings['orderby']
        );


        if (!empty($this->settings['ids'])) {
            $arguments['include'] = $this->settings['ids'];
        }
        else {
            $arguments['include'] = $this->post ? $this->post->ID : 0;
        }

        $this->attachments = get_posts($arguments);

        // If no images were found...
        if (empty($this->attachments)) {
            return;
        }

        // Render the gallery
        if ($this->settings['type'] == 'slideshow') {
            return $this->renderSlideshow();
        } else if ($this->settings['type'] == 'grid') {
            return $this->renderGrid();
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
     * Renders the gallery like a grid with lightbox
     */
    private function renderGrid()
    {
        $output = array();

        $output[] = '<div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3" data-uk-grid>';

        foreach ($this->attachments as $attachment) {
            $small = $this->getImageByAttachment($attachment, 'medium');
            $big = $this->getImageByAttachment($attachment);
            $output[] = '<div>';
            $output[] = '<a href="' . $big[0] . '" data-uk-lightbox="{group:\'my-group\'}">';
            $output[] = '<img src=' . $small[0] . ' width="' . $small[1] . '" height="' . $small[2] . '" />';
            $output[] = '</a>';
            $output[] = '</div>';
        }

        $output[] = '</div>';

        return implode(" ", $output);
    }


    /**
     * Gets the image out of an attachment
     *
     * @param $attachment
     *
     * @return array|bool
     */
    private function getImageByAttachment($attachment, $size = 'large')
    {
        return $this->getImageByAttachmentID($attachment->ID, $size);
    }


    /**
     * Gets the image from an id
     *
     * @param        $id
     * @param string $size
     *
     * @return array|bool
     */
    private function getImageByAttachmentID($id, $size = 'large')
    {
        return wp_get_attachment_image_src($id, $size);
    }

} 