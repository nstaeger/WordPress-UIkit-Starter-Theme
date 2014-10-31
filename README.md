# WordPress UIkit Starter Theme

A [WordPress](http://www.wordpress.org) starter theme for developers using the frontend framework [UIkit](http://www.getuikit.com).


## NOTICE: In development

This theme is in development and at current stage not completed! You might miss some features.


## Usage

You will need [Git](http://git-scm.com/), [Node](http://nodejs.org/), [Bower](http://bower.io/) and [Gulp](http://gulpjs.com/) installed, before you start. You also need a running installation of WordPress.

- `git clone git@github.com:nstaeger/WordPress-UIkit-Starter-Theme.git` into the `wp-content/themes` folder of your WordPress-installation.
- `cd wordpress-uikit-starter-theme`
- `bower install`
- Than go to the WordPress administration-panel and activate the theme.


## Developers

Before you start developing, its recommended to run `npm install` if you have not already.

### Bower

This theme uses [Bower](http://bower.io/) to manage its dependencies like [jQuery](http://jquery.com/) and [UIkit](http://getuikit.com/).

### Gulp

You can use [Gulp](http://gulpjs.com/) to compile the less files. Here are a few tasks, that come with the theme:

- `gulp compile-less` Compiles the UIkit and theme-specific Less files into your CSS folder.
- `gulp watch` Watches the `less/`-folder for changes. If changes are made, the CSS-file will be recompiled.
