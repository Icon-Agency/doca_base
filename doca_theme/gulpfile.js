'use strict';

var theme = __dirname + '/';

var gulp = require('gulp');
var runSequence = require('run-sequence');
var del = require('del');
var path = require('path');

var plugins = require('gulp-load-plugins')();
var rubySass = require('gulp-ruby-sass');

var compass = require('compass-options').dirs({'config': theme + 'config.rb'});
var mainBowerFiles = require('main-bower-files');

// Lint JavaScript.
gulp.task('lint:js', function () {
  return gulp.src(theme + '/src/js/*.js')
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('jshint-stylish'));
});

// Lint Sass.
gulp.task('lint:sass', function () {
  return gulp.src(theme + compass.sass + '/**/*.scss')
    .pipe(plugins.scssLint({'bundleExec': true, 'maxBuffer': Infinity}));
});

// Lint Sass and JavaScript.
gulp.task('lint', function (cb) {
  runSequence(['lint:js', 'lint:sass'], cb);
});

// Concat and minify JavaScript.
gulp.task('scripts', function () {
  return gulp.src([theme + '/src/sass/components/**/*.js'])
    .pipe(plugins.concat('components.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest(theme + '/js'));
});

gulp.task('bower-scripts', function () {
  return gulp.src(mainBowerFiles({
      includeDev: true,
      paths: {
        bowerDirectory: __dirname + '/bower_components',
        bowerJson: __dirname + '/bower.json'
      },
      filter: '**/*.js'
    }))
    .pipe(plugins.concat('bower-components.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest(theme + 'js'));
});

gulp.task('bower-css', function () {
  return gulp.src(mainBowerFiles({
      includeDev: true,
      paths: {
        bowerDirectory: __dirname + '/bower_components',
        bowerJson: __dirname + '/bower.json'
      },
      filter: '**/*.css'
    }))
    .pipe(plugins.concat('bower-components.css'))
    .pipe(gulp.dest(theme + 'css'));
});

gulp.task('bower', ['bower-scripts', 'bower-css']);

gulp.task('modernizr', function () {
  gulp.src(theme + './src/sass/components/**/*.{js,scss}')
    .pipe(plugins.modernizr("modernizr.min.js", {
      "options": [
        "setClasses"
      ]
    }))
    .pipe(plugins.uglify())
    .pipe(gulp.dest("js/"))
});

process.chdir(theme);
gulp.task('sass:development', function () {
  return rubySass(theme + 'src/sass/', {
    compass: true,
    bundleExec: true,
    sourcemap: true,
    style: 'expanded'
  })
    .on('error', function (err) {
      console.error('Error!', err.message);
    })
    .pipe(plugins.pixrem())
    .pipe(plugins.sourcemaps.write())
    .pipe(gulp.dest('css'));
});

gulp.task('sass:production', function () {
  return rubySass(theme + 'src/sass/', {
    compass: true,
    bundleExec: true,
    style: 'compressed'
  })
    .on('error', function (err) {
      console.error('Error!', err.message);
    })
    .pipe(plugins.pixrem())
    .pipe(gulp.dest('css'));
});

// Styles
gulp.task('watch', ['modernizr', 'sass:development', 'lint'], function () {
  gulp.watch(theme + 'src/sass/**/*.scss', ['modernizr', 'sass:development', 'lint']);
  gulp.watch(theme + 'src/sass/**/*.js', ['scripts']);
});

// Clean CSS directory.
gulp.task('clean:css', del.bind(null, [theme + 'src/**/.sass-cache', theme + compass.css + '/**/*.map'], {force: true}));

// Clean all directories.
gulp.task('clean', ['clean:css']);

// Production build of front-end.
gulp.task('build', ['clean', 'sass:production', 'scripts', 'modernizr'],
  function (cb) {
    // Run linting last, otherwise its output gets lost.
    runSequence(['lint'], cb);
  });

// The default task.
gulp.task('default', ['build']);
