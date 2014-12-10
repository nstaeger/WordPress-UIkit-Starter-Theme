<?php
/**
 *
 * @author Nicolai Stäger
 * @version 2014-12-09
 */

class UIkitGallery {

    /**
     * @var array Default settings for a gallery
     */
    private $defaults = array(
        'type' => 'slideshow',
        'order' => 'ASC',
        'orderny' => 'menu_order ID'
    );

    /**
     * @var Attributes for the gallery
     */
    private $attr;

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
        $this->attr = array_merge($this->defaults, $attributes);

        // If the IDs of the images were passed
        if ( !empty($this->attr['ids']) ) {
            $this->attachments = get_posts(array(
                'include' => $this->attr['ids'],
                'post_status' => 'inherit',
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'order' => $this->attr['order'],
                'orderby' => $this->attr['orderby'])
            );
        }
        // otherwise get the images attached to the post
        else {
            $this->attachments = get_posts(array(
                    'post_parent' => $this->post ? $this->post->ID : 0,
                    'post_status' => 'inherit',
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image',
                    'order' => $this->attr['order'],
                    'orderby' => $this->attr['orderby'])
            );
        }

        // If no images were found...
        if (empty($this->attachments)) {
            return;
        }

        // Render the gallery
        if ($this->attr['type'] == 'slideshow') {
            return $this->renderSlideshow();
        }
    }


    /**
     * Renders the gallery like a slideshow
     */
    private function renderSlideshow()
    {
        $output = array();

        $output[] = '<div data-uk-slideshow>';
        $output[] = '<ul class="uk-slideshow">';

        $output[] = '<li><img src="http://localhost/wordpress-uikit-starter/wp-content/uploads/2014/12/photo-1414073875831-b477096311461.jpg" /></li>';

        $output[] = '</ul>';
        $output[] = '<a href="" data-uk-slideshow-item="previous"></a>';
        $output[] = '<a href="" data-uk-slideshow-item="next"></a>';
        $output[] = '</div>';

        return implode(" ", $output);
    }

} 