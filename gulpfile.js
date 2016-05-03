var gulp = require('gulp');
var less = require('gulp-less');
var del = require('del');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');

gulp.task('less', function() {
    return gulp.src('./less/freelancer.less').pipe(
            less().on('error', function(err) {
                console.log(err);
            })).pipe(gulp.dest('./css/'));
});
gulp.task('clean', function(cb) {
    return del([ './css/*.min.css' ], cb);
});
gulp.task('cssmin', ['clean', 'less'], function() {
    return gulp.src('./css/*.css').pipe(cssmin().on('error', function(err) {
        console.log(err);
    })).pipe(rename({
        suffix : '.min'
    })).pipe(gulp.dest('./css/'));
});

gulp.task('default', ['cssmin']);