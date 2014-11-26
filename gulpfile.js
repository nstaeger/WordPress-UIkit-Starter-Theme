/**
 * Popular Tasks
 * -------------
 *
 * gulp compile-less
 * gulp watch
 */
var gulp = require('gulp'),
    less = require('gulp-less');


gulp.task('default', ['compile-less', 'copy-font'], function() {

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
 * Compile all less-files.
 */
gulp.task('copy-font', function() {
    gulp.src('bower_components/uikit/fonts/**')
        .pipe(gulp.dest('fonts'));
});

/**
 * Watch the less-directory for changes and compile-less if needed.
 */
gulp.task('watch', function() {
    gulp.watch('less/**.less', ['compile-less']);
});