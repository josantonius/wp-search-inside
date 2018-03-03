/**
 * Search Inside Wordpress Plugin.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   josantonius/search-inside
 * @copyright 2017 - 2018 (c) Josantonius - Search Inside
 * @license   GPL-2.0+
 * @link      https://github.com/josantonius/search-inside.git
 * @since     1.2.1
 */

var gulp         = require('gulp'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify-es').default,
    sass         = require('gulp-sass'),
    plumber      = require('gulp-plumber'),
    rename       = require('gulp-rename'),
    cleanCSS     = require('gulp-clean-css'),
    notify       = require('gulp-notify'),
    sourcemaps   = require('gulp-sourcemaps'),
    pump         = require('pump'),
    autoprefixer = require('gulp-autoprefixer');

gulp.task('js-search-inside-admin', function (cb) {
    pump([
        gulp.src([
            'public/js/source/material.min.js',
            'public/js/source/mdl-select.js',
            'public/js/source/hilitor.js',
            'public/js/source/search-inside-admin.js'
        ]),
        concat('search-inside-admin.min.js'),
        uglify(),
        gulp.dest('public/js/'),
        notify({ message: 'Admin scripts task complete' })
    ], cb);
});

gulp.task('js-search-inside-front', function (cb) {
    pump([
        gulp.src([
            'public/js/source/hilitor.js',
            'public/js/source/search-inside.js'
        ]),
        concat('search-inside.min.js'),
        uglify(),
        gulp.dest('public/js/'),
        notify({ message: 'Front scripts task complete' })
    ], cb);
});

gulp.task('css-search-inside-admin', function () {

    gulp.src('public/sass/admin/search-inside-admin.sass')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({ errLogToConsole: true, outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(sourcemaps.write({ includeContent: false }))
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade:  true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('public/css/source/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(gulp.dest('public/css/'))
        .pipe(notify({ message: 'Admin styles task complete' }));
});

gulp.task('css-search-inside-front', function () {

    gulp.src('public/sass/front/search-inside.sass')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({ errLogToConsole: true, outputStyle: 'expanded' }).on('error', sass.logError))
        .pipe(sourcemaps.write({ includeContent: false }))
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade:  true }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('public/css/source/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(gulp.dest('public/css/'))
        .pipe(notify({ message: 'Front styles task complete' }));

});

gulp.task('js', [
    'js-search-inside-admin',
    'js-search-inside-front'
]);

gulp.task('css', [
    'css-search-inside-admin',
    'css-search-inside-front'
]);

gulp.task('watch', function () {

    var sassFiles = [
            'public/sass/admin/**/*.sass',
            'public/sass/admin/search-inside-admin.sass',
            'public/sass/front/**/*.sass',
            'public/sass/front/search-inside.sass'
        ],

        jsFiles  = 'public/js/source/*';

    gulp.watch(jsFiles, ['js']);

    gulp.watch(sassFiles, ['css']);

});

gulp.task('default', ['js', 'css']);
