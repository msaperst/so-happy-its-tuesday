var gulp = require('gulp');
var less = require('gulp-less');
var del = require('del');
var cssmin = require('gulp-cssmin');
var jsmin = require('gulp-jsmin');
var rename = require('gulp-rename');

gulp.task('less', function() {
    return gulp.src('./less/freelancer.less').pipe(
            less().on('error', function(err) {
                console.log(err);
            })).pipe(gulp.dest('./css/'));
});
gulp.task('clean-css', function(cb) {
    return del([ './css/*.min.css' ], cb);
});
gulp.task('clean-js', function(cb) {
    return del([ './js/*.min.js' ], cb);
});
gulp.task('cssmin', ['clean-css', 'less'], function() {
    return gulp.src('./css/*.css').pipe(cssmin().on('error', function(err) {
        console.log(err);
    })).pipe(rename({
        suffix : '.min'
    })).pipe(gulp.dest('./css/'));
});
gulp.task('jsmin', ['clean-js'], function() {
    return gulp.src('./js/*.js').pipe(jsmin().on('error', function(err) {
        console.log(err);
    })).pipe(rename({
        suffix : '.min'
    })).pipe(gulp.dest('./js/'));
});

gulp.task('default', ['cssmin', 'jsmin']);