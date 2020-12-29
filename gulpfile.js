var gulp        = require('gulp');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var sass        = require('gulp-sass');
var uglify = require( 'gulp-uglify' );
var concat      = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
  //watch files
  var files = [
  './**/*.scss',
  './*.php',
  './**/*.php',
  'js/*.js'
  ];

  //initialize browsersync
  browserSync.init(files, {
  //browsersync with a php server
  proxy: "daysales.local",
  notify: true
  });
});
 
// Sass task, will run when any SCSS files change & BrowserSync
// will auto-update browsers
gulp.task('sass', function () {
  return gulp.src([
      'sass/main.scss',
      'sass/wp-core.scss',
      'sass/*.scss'
    ])
    .pipe(sourcemaps.init())
    .pipe(
			plumber({
				errorHandler: function(err) {
					console.log(err);
					this.emit('end');
				}
			})
		)
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(concat('style.css'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./css'))
    .pipe(reload({stream:true}));
});


// gulp.task('scripts',function(){
//     return gulp.src(
//         'js/*.js'
//     )
//     .pipe(uglify())
//     .pipe(concat('all.js'))
//     .pipe(gulp.dest('dist/js'));
// });
 
// Default task to be run with `gulp`c
gulp.task('default', ['sass', 'browser-sync'], function () {
  gulp.watch("sass/**/*.scss", ['sass'])
});


