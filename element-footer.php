<?php
/**
 * element for footer
 * 
 * @author nstaeger
 * @since 2014-08-31
 */
?>
<footer id="footer" class="uk-margin-large-top uk-panel uk-panel-box">
    <div class="uk-container uk-container-center">
        <?php get_sidebar('footer'); ?>

    	<nav class="uk-margin-large-top uk-text-center">
	    	<?php
	            wp_nav_menu(array(
	                'theme_location' => 'footer',
	                'menu_class' => 'uk-subnav uk-subnav-line',
	                'depth' => 1,
	                'walker' => new WordpressUikitMenuWalker('inline')
	            ));
	        ?>
	    </nav>

        <div class="uk-text-center uk-text-muted">
            <div class="uk-panel">
                <p>uikit-starter theme made by <a href="http://www.nstaeger.de/" class="uk-link-reset" target="_blank">nstaeger.de</a></p>
            </div>
        </div>
    </div>
</footer>