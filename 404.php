<?php
/**
 * 404 template
 *
 * @author nstaeger
 * @since 2014-08-31
 */

get_header(); ?>

<section class="uk-height-1-1 uk-vertical-align uk-text-center">
    <div class="uk-vertical-align-middle">
    	<h1>404</h1>
    	<p>Sorry, but we could not find, what you were looking for.</p>
    	<p><a href="<?php echo esc_url( home_url() ); ?>"><i class="uk-icon-reply"></i> go back to website</a></p>
    </div>
</section>

<?php

get_footer();