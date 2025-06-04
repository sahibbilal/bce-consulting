const prj = require("./project.json");

const $ = require("gulp-load-plugins")({
  pattern: ["*"],
  scope: ["devDependencies"]
});

var gulp = require("gulp");
var watch = require('gulp-watch');
var es = require('event-stream');
var concatCss = require('gulp-concat-css');
var sassGlob = require('gulp-sass-glob');
const sass = require('gulp-sass')(require('node-sass'));

// var chalk = require('chalk');

/**
 * List the available gulp tasks
*/
gulp.task('help', $.taskListing);

/*** CSS tasks ***/
gulp.task("css", () => {
  log("-> Building client app css dev");

  return gulp.src(prj.app.css.concat(prj.vendor.css))
  .pipe($.plumber({
    errorHandler: onError
  }))
  .pipe($.sourcemaps.init({
    loadMaps: true
  }))
  .pipe($.concat('style.css'))
  .pipe($.sourcemaps.write("./"))
  .pipe(gulp.dest(prj.dist.css));
});

/*** SASS tasks ***/
gulp.task("sass", () => {
  log("-> Compiling sass");

  return gulp.src(prj.app.sass)
  .pipe($.plumber({
    errorHandler: onError
  }))
  .pipe($.sourcemaps.init({
    loadMaps: true
  }))
  .pipe(sass({ // use sass initialized at the beginning
    includePaths: prj.vendor.sass
  })
  .on("error", sass.logError))  // use sass initialized at the beginning
  .pipe($.cached("sass_compile"))
  .pipe($.autoprefixer())
  .pipe($.rename("app.css"))
  .pipe($.sourcemaps.write("./"))
  .pipe(gulp.dest(prj.dist.css));
});

gulp.task('css:prod', function () {
  var vendor = gulp.src(prj.vendor.css)
    .pipe($.plumber({
      errorHandler: onError
    }));

  var sassStream = gulp.src(prj.app.sass)
    .pipe($.plumber({
      errorHandler: onError
    }))
    .pipe($.sourcemaps.init({
      loadMaps: true
    }))
    .pipe(sass({
        includePaths: prj.vendor.sass
      })
      .on("error", sass.logError))
    .pipe($.cached("sass_compile"))
    .pipe($.autoprefixer());

  var css = gulp.src(prj.app.css)
    .pipe($.plumber({
      errorHandler: onError
    }));

  return es.merge(vendor, sassStream, css)
    .pipe($.concat('style.css'))
    .pipe($.cssnano({
      discardComments: {
        removeAll: true
      },
      discardDuplicates: true,
      discardEmpty: true,
      minifyFontValues: true,
      minifySelectors: true,
      svgo: false
    }))
    .pipe($.size({
      gzip: true,
      showFiles: true
    }))
    .pipe(gulp.dest(prj.dist.css));
});

/*** JS tasks ***/
gulp.task('js', function () {
  log("-> Building js");

  return gulp.src(prj.vendor.js.concat(prj.app.js))
  .pipe($.sourcemaps.init())
  .pipe($.concat('app.js'))
  .pipe($.sourcemaps.write('./'))
  .pipe(gulp.dest(prj.dist.js));
});

gulp.task('js:prod', function () {
  return gulp.src(prj.vendor.js.concat(prj.app.js))
    .pipe($.concat('app.js'))
    .pipe($.uglify())
    .pipe($.size({
      gzip: true,
      showFiles: true
    }))
    .pipe(gulp.dest(prj.dist.js));
});

gulp.task('default', gulp.series('css', 'sass', 'js'));
gulp.task('prod', gulp.series('css:prod', 'js:prod'));


gulp.task("watch", gulp.series("prod", function() {
  gulp.watch("assets/sass/**/*", gulp.series("css:prod"));
  gulp.watch(prj.app.js, function() {gulp.series('js:prod');});
}));

/**
 * Log a message or series of messages using chalk's blue color.
 * Can pass in a string, object or array.
 */
const log = msg => {
  // $.fancyLog($.chalk.blue(msg));
  console.log(msg);
};

const onError = err => {
  console.error(err);
  // $.fancyLog($.chalk.red(err));
};
