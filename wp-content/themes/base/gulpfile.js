var gulp = require('gulp');
var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
var sass = require('gulp-sass');
var refresh = require('gulp-refresh');
var babel = require('gulp-babel');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

/**
 * Task for compiling SCSS files
 * */
gulp.task('styles', function() {
    var stylesheets = gulp.src('assets/scss/*.scss')
        .pipe(plumber({errorHandler: notify.onError("Compile SCSS error: <%= error.message %>")}))
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('dist/css'))
        .pipe(refresh());

    return stylesheets;
});

/**
 * Task for compiling JS files
 * */
gulp.task('scripts', function() {
    return gulp.src('assets/js/scripts.js')
        .pipe(plumber({errorHandler: notify.onError("Compile JS error: <%= error.message %>")}))
        .pipe(babel({presets: ['es2015']}))
        .pipe(uglify())
        .pipe(rename('scripts.min.js'))
        .pipe(gulp.dest('dist/js'));
});


/**
 * Task for compiling images
 * */
gulp.task('minify-images', function() {
    return gulp.src('assets/images/**/*')
        .pipe(imageMinifier({
            pngquant: true,
            optipng: true,
            zopflipng: false,
            jpegRecompress: false,
            jpegoptim: true,
            mozjpeg: true,
            gifsicle: true,
            svgo: true,
            concurrent: 8
        }))
        .pipe(gulp.dest('dist/images'));
});

/**
 * Default task
 * */
gulp.task('default', ['styles', 'scripts', 'minify-images']);

/**
 * Watch task
 * */
gulp.task('watch', ['styles', 'scripts'], function () {
    refresh.listen();
    gulp.watch("assets/scss/**/*.scss", ['styles']);
    gulp.watch("assets/js/**/*.js", ['scripts']);
    gulp.watch("assets/images/**/**.*", ['minify-images']);
});