/**
 * Popular Tasks
 * -------------
 *
 * gulp compile-less
 * gulp copy-font
 * gulp copy-js
 * gulp watch
 */
var gulp = require('gulp'),
    less = require('gulp-less');


gulp.task('default', ['compile-less', 'copy-font', 'copy-js'], function() {

});


/**
 * Compile all less-files.
 */
gulp.task('compile-less', function() {
    gulp.src('less/uikit.less')
        .pipe(less({compress: true}))
        .pipe(gulp.dest('css'));
});

/**
 * Copies the UIkit fonts to the theme folder
 */
gulp.task('copy-font', function() {
    gulp.src('bower_components/uikit/fonts/**')
        .pipe(gulp.dest('fonts'));
});

/**
 * Copies the JS-files from bower to the theme folder
 */
gulp.task('copy-js', function() {
    gulp.src([
        'bower_components/uikit/js/uikit.min.js',
        'bower_components/jquery/dist/jquery.min.js'
        ])
        .pipe(gulp.dest('js'));
});



/**
 * Watch the less-directory for changes and compile-less if needed.
 */
gulp.task('watch', function() {
    gulp.watch('less/**.less', ['compile-less']);
});