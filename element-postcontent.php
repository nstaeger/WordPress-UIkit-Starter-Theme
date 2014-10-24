<?php
/**
 * element post content
 * should be rendered directly after the dynamic content
 * handles displaying of the sidebar (or no sidebar)
 * must be opend via the element precontent
 *
 * @author nstaeger
 * @since 2014-10-24
 */
?>

                </section>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
                <div class="uk-width-medium-1-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>