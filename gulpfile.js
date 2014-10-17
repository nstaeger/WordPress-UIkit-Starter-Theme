
var gulp = require('gulp'),
    less = require('gulp-less');

gulp.task('default', ['compile-less'],function() {

});

gulp.task('compile-less', function() {
    gulp.src('less/uikit.less')
        .pipe(less())
        .pipe(gulp.dest('css'));
});

gulp.task('watch', function() {
    gulp.watch('less/**.less', ['compile-less']);
});