    <footer id="footer" class="uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <div class="uk-text-center uk-text-muted">
                <div class="uk-panel">
                    <p>uikit-starter theme made by <a href="http://www.zeichenkraftwerk.de/" class="uk-link-reset" target="_blank">zeichenkraftwerk.de</a></p>
                </div>
            </div>
        </div>
    </footer>
       
    <div id="offcanvas-menu" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <?php
                wp_nav_menu(array(
                    'menu' => 'main',
                    'theme_location' => 'main',
                    'menu_class' => 'uk-nav uk-nav-offcanvas',
                    'depth' => 2,
                    'walker' => new WordpressUikitMenuWalker('offcanvas')
                ));
            ?>
        </div>
    </div>
        
</body>
</html>