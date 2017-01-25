
'use strict';

// Include Gulp & tools we'll use
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var del = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var merge = require('merge-stream');
var path = require('path');
var fs = require('fs');
var historyApiFallback = require('connect-history-api-fallback');
var packageJson = require('./package.json');
var crypto = require('crypto');
var compass = require('gulp-compass');
var minify = require('gulp-minify');
var concat = require('gulp-concat');

var DIST = 'dist';
var scriptsPath = 'scripts/**/*.js';
var sassPath = 'sass/**/*.s*ss';
var viewsPath = 'views/**/*.html';
var vendorPath = 'vendor';
var baseDir = './';
//var baseDir = './views/admin/';

var dist = function(subpath) {
  return !subpath ? DIST : path.join(DIST, subpath);
};

// Copy all files at the root level (app)
gulp.task('copy', function() {
  return gulp.src([
    './*',
    '!./.sass-cache',
    '!css',
    '!dist',
    '!images',
    '!js',
    '!node_modules',
    '!sass',
    '!scripts',
    '!vendor',
    '!views',
    '!.gitignore',
    '!dump.rb',
    '!gulpfile.js',
    '!index.html',
    '!README.md',
    '!**/.DS_Store'
  ], {
    dot: true
  }).pipe(gulp.dest(dist()));
});

// Optimize images
gulp.task('images', function() {
  return imageOptimizeTask('images/**/*', dist('images'));
});

// Image optimization
var imageOptimizeTask = function(src, dest) {
  return gulp.src(src)
    .pipe($.imagemin({
      progressive: true,
      interlaced: true
    }))
    .pipe(gulp.dest(dest))
    .pipe($.size({title: 'images'}));
};

// Copy web fonts to dist
gulp.task('fonts', function() {
  return gulp.src(['fonts/**'])
    .pipe(gulp.dest(dist('fonts')))
    .pipe($.size({
      title: 'fonts'
    }));
});

// js ugligy for production environment
gulp.task('js-uglify', function() {
  gulp.src('js/*.j*')
    .pipe($.uglify())
    .pipe(gulp.dest('dist/js'))
});

// css minify for production environment
gulp.task('css-minyfy', function() {
  gulp.src('css/*.css')
    .pipe($.minifyCss())
    .pipe(gulp.dest('dist/css'))
});

// vendor css minify for production environment
gulp.task('vendor-css-minyfy', function() {
  gulp.src('vendor/css/*.css')
    .pipe($.minifyCss())
    .pipe(gulp.dest('dist/vendor/css'))
});

// vendor js ugligy for production environment
gulp.task('vendor-js-uglify', function() {
  gulp.src('vendor/js/*.j*')
    .pipe($.uglify())
    .pipe(gulp.dest('dist/vendor/js'))
});

// html minify for production environment
gulp.task('html-minyfy', function() {
  gulp.src(viewsPath)
    .pipe($.minifyHtml({
      quotes: true,
      empty: true,
      spare: true
    }))
    .pipe(gulp.dest('dist/views'))
});

// html minify for production environment
gulp.task('index-minyfy', function() {
  gulp.src('index.html')
    .pipe($.minifyHtml({
      quotes: true,
      empty: true,
      spare: true
    }))
    .pipe(gulp.dest('dist'))
});

// Compile sass files on change
gulp.task('compass', function() {
  gulp.src(sassPath)
    .pipe(compass({
      config_file: './config.rb',
      sass: 'sass',
      css: 'css'
    }))
    .pipe(browserSync.stream());
});

gulp.task('js-watch', ['js'], browserSync.reload);
// Compile js files on change
gulp.task('js', function () {

    return gulp.src(scriptsPath)
      .pipe(concat('main.js'))
      .pipe(gulp.dest('js/'));
});

// Clean output directory
gulp.task('clean', function() {
  return del(['.tmp', dist()]);
});

// Static Server + watching scss/html files
gulp.task('serve', ['compass', 'js'], function() {

    browserSync.init({
        server : {
            baseDir: baseDir
        }
    });

    gulp.watch(scriptsPath, ['js-watch']);
    gulp.watch(sassPath, ['compass']);
    gulp.watch(vendorPath).on('change', browserSync.reload);
    gulp.watch("*.html").on('change', browserSync.reload);
    gulp.watch(viewsPath).on('change', browserSync.reload);
});

// Dist Server
gulp.task('dist-serve', [], function() {

    browserSync.init({
        server : {
            baseDir: 'dist'
        }
    });
});

// Build production files, the deploy task
gulp.task('deploy', ['clean','copy'], function(cb) {
  runSequence(
    ['fonts', 'images'],
    ['js-uglify', 'css-minyfy', 'html-minyfy','index-minyfy','vendor-css-minyfy', 'vendor-js-uglify'],
    cb);
});

gulp.task('default', ['serve']);
