/**
 * Popular Tasks
 * -------------
 *
 * gulp compile-less
 * gulp copy-font
 * gulp minify
 * gulp watch
 */
var gulp   = require('gulp'),
    concat = require('gulp-concat'),
    less   = require('gulp-less'),
    uglify = require('gulp-uglify');


gulp.task('default', ['compile-less', 'copy-font', 'minify']);


/**
 * Compile all less-files.
 */
gulp.task('compile-less', function() {
    return gulp.src('less/main.less')
        .pipe(less({compress: true}))
        .pipe(gulp.dest('css'));
});

/**
 * Copies the UIkit fonts to the theme folder
 */
gulp.task('copy-font', function() {
    return gulp.src('bower_components/uikit/fonts/**')
        .pipe(gulp.dest('fonts'));
});

/**
 * Minifies all JS-files to an 'all.min.js'
 */
gulp.task('minify', function() {
    return gulp.src([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/uikit/js/uikit.js',
            'bower_components/uikit/js/components/cover.js',
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
 * Watch the less-directory for changes and compile-less if needed.
 */
gulp.task('watch', function() {
    gulp.watch('less/**.less', ['compile-less']);
    gulp.watch(['js/**', '!js/all.min.js'], ['minify']);
});