/**
 * Popular Tasks
 * -------------
 *
 * gulp compile-less
 * gulp watch
 */
var gulp = require('gulp'),
    less = require('gulp-less');


gulp.task('default', ['compile-less'], function() {

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
 * Watch the less-directory for changes and compile-less if needed.
 */
gulp.task('watch', function() {
    gulp.watch('less/**.less', ['compile-less']);
});