/**
 * Popular Tasks
 * -------------
 *
 * gulp build
 * gulp clean
 * gulp compile-less
 * gulp copy-font
 * gulp minify
 * gulp watch
 */

var del = require('del'),
    gulp = require('gulp'),
    concat = require('gulp-concat'),
    less = require('gulp-less'),
    uglify = require('gulp-uglify');


gulp.task('default', ['compile', 'copy-font', 'minify']);


/**
 * Compile all less-files.
 */
gulp.task('compile', function () {
    return gulp.src('less/main.less')
        .pipe(less({compress: true}))
        .pipe(gulp.dest('css'));
});

/**
 * Copies the UIkit fonts to the theme folder
 */
gulp.task('copy-font', function () {
    return gulp.src('bower_components/uikit/fonts/**')
        .pipe(gulp.dest('fonts'));
});

/**
 * Minifies all JS-files to an 'all.min.js'
 */
gulp.task('minify', function () {
    return gulp.src([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/uikit/js/uikit.js',
        'bower_components/uikit/js/components/grid.js',
        'bower_components/uikit/js/components/lightbox.js',
        'bower_components/uikit/js/components/slideshow.js',
        'bower_components/uikit/js/components/slideshow-fx.js',
        'js/**',
        '!js/all.min.js'
    ])
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest('js'));
});

/**
 * Clean the dist folder
 */
gulp.task('clean', function (cb) {
    del(['_dist'], cb);
});

/**
 * Build the theme to the _dist-folder
 */
gulp.task('build', ['clean', 'compile', 'copy-font', 'minify'], function () {
    return gulp.src([
        '**',
        '!_build{/**,}',
        '!_dist{/**,}',
        '!bower_components{/**,}',
        '!less{/**,}',
        '!node_modules{/**,}',
        '!.gitignore',
        '!bower.json',
        '!gulpfile.js',
        '!package.json',
        '!README.md'
    ])
        .pipe(gulp.dest('_dist'));
});

/**
 * Watch the less-directory for changes and compile-less if needed.
 */
gulp.task('watch', ['compile', 'minify'], function () {
    gulp.watch('less/**/*.less', ['compile']);
    gulp.watch(['js/**', '!js/all.min.js'], ['minify']);
});