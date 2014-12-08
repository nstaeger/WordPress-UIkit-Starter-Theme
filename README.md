# WordPress UIkit Starter Theme

A [WordPress](http://www.wordpress.org) starter theme for developers using the frontend framework [UIkit](http://www.getuikit.com).

_NOTICE: This theme is still in development. You might miss some features._

- [Issues](https://github.com/nstaeger/WordPress-UIkit-Starter-Theme/issues) - Report bugs

## Theme Features

- Full responsive theme
- Two-level dropdown navigation with offcanvas-navigation for smaller devices
- Main sidebar on the right side and horizontal footer sidebar with auto-columns
- Support for featured image in posts

### Screenshot

![Screenshot](/screenshot.png)


## Getting started

- `git clone git@github.com:nstaeger/WordPress-UIkit-Starter-Theme.git` into the `wp-content/themes` folder of your WordPress-installation.
- Go to the WordPress administration-panel and activate the theme.


## Developers

You will need [Git](http://git-scm.com/), [Node](http://nodejs.org/), [Bower](http://bower.io/) and [Gulp](http://gulpjs.com/) installed, before you start. It is also recommended, to have a running installation of WordPress.

Before you start, follow these steps.

- `git clone git@github.com:nstaeger/WordPress-UIkit-Starter-Theme.git` into the `wp-content/themes` folder of your WordPress-installation.
- `cd WordPress-UIkit-starter-theme`
- `npm install`

### Bower

This theme uses [Bower](http://bower.io/) to manage its dependencies like [jQuery](http://jquery.com/) and [UIkit](http://getuikit.com/). You can get the latest versions of those by running `bower install` in the themes folder.

### Gulp

You can use [Gulp](http://gulpjs.com/) to compile the less files and other stuff. Here are a few tasks, that come with the theme:

- `gulp compile-less` Compiles the UIkit and theme-specific Less files into your CSS folder.
- `gulp copy-font` Copies the UIkit font files to the `fonts` directory.
- `gulp copy-js` Copies the JS-files from UIkit and jQuery to the theme folder
- `gulp minify-js` Minifies all JS-files to an `all.min.js`
- `gulp watch` Watches the `less/`-folder for changes. If changes are made, the CSS-file will be recompiled.
