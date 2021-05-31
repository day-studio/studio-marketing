
var gulp = require( 'gulp' );
var plumber = require( 'gulp-plumber' );
var sass = require( 'gulp-sass' );
var babel = require( 'gulp-babel' );
var postcss = require( 'gulp-postcss' );
var rename = require( 'gulp-rename' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var imagemin = require( 'gulp-imagemin' );
var sourcemaps = require( 'gulp-sourcemaps' );
var browserSync = require( 'browser-sync' ).create();
var del = require( 'del' );
var cleanCSS = require( 'gulp-clean-css' );
var autoprefixer = require( 'autoprefixer' );

// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var paths = cfg.paths;


gulp.task( 'sass', function() {
	return gulp
		.src( paths.sass + '/*.scss' )
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( sass( { errLogToConsole: true } ) )
		.pipe( postcss( [ autoprefixer() ] ) )
		.pipe( sourcemaps.write( undefined, { sourceRoot: null } ) )
		.pipe( gulp.dest( paths.css ) );
} );


/**
 * Optimizes images and copies images from src to dest.
 *
 * Run: gulp imagemin
 */
gulp.task( 'imagemin', () =>
	gulp
		.src( paths.imgsrc + '/**', paths.imgsrc + '/**/**' )
		.pipe(
			imagemin(
				[
					// Bundled plugins
					imagemin.gifsicle( {
						interlaced: true,
						optimizationLevel: 3,
					} ),
					imagemin.mozjpeg( {
						quality: 80,
						progressive: true,
					} ),
					imagemin.optipng(),
					imagemin.svgo(),
				],
				{
					verbose: true,
				}
			)
		)
		.pipe( gulp.dest( paths.img ) )
);

/**
 * Minifies css files.
 *
 * Run: gulp minifycss
 */
gulp.task( 'minifycss', function() {
	return gulp
		.src( [
			// paths.css + '/custom-editor-style.css',
			paths.css + '/*.css',
		] )
		.pipe(
			sourcemaps.init( {
				loadMaps: true,
			} )
		)
		.pipe(
			cleanCSS( {
				compatibility: '*',
			} )
		)
		.pipe(
			plumber( {
				errorHandler( err ) {
					console.log( err );
					this.emit( 'end' );
				},
			} )
		)
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( './' ) )
		.pipe( gulp.dest( paths.css ) );
} );


/**
 * Delete minified CSS files and their maps
 *
 * Run: gulp cleancss
 */
gulp.task( 'cleancss', function() {
	return del( paths.css + '/*.min.css*' );
} );


/**
 * Compiles .scss to .css minifies css files.
 *
 * Run: gulp styles
 */
gulp.task( 'styles', function( callback ) {
	// gulp.series( 'sass', 'minifycss' )( callback );
	gulp.series( 'sass')( callback );
} );


// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task( 'scripts', function() {
	var scripts = [
    // paths.vendors + '/jquery/jquery-3.5.1.min.js',
    // paths.vendors + '/bootstrap/js/bootstrap.bundle.min.js',
    // paths.vendors + '/barba/barba.umd.js',
    // paths.vendors + '/smooth-scrollbar/smooth-scrollbar.js',
    // paths.vendors + '/gsap/gsap.min.js',
    // paths.vendors + '/gsap/ScrollTrigger.min.js',
    // paths.vendors + '/gsap/ScrollToPlugin.min.js',
    // paths.vendors + '/gsap/SplitText.min.js',
    // paths.vendors + '/chartjs/chart.js',
    // paths.vendors + '/countup/jquery.waypoints.min.js',
    // paths.vendors + '/countup/jquery.countup.js',
		paths.dev + '/js/*.js',
	
	];
	gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel( { presets: ['@babel/preset-env'] } ) )
		.pipe( concat( 'theme.min.js' ) )
		.pipe( uglify() )
		.pipe( gulp.dest( paths.js ) );

	return gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel() )
		.pipe( concat( 'theme.js' ) )
		.pipe( gulp.dest( paths.js ) );
} );


// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task( 'vendor-scripts', function() {
	var scripts = [
		paths.vendors + '/jquery/jquery-3.5.1.min.js',
		paths.vendors + '/bootstrap/js/bootstrap.bundle.min.js',
		paths.vendors + '/barba/barba.umd.js',
		paths.vendors + '/smooth-scrollbar/smooth-scrollbar.js',
		paths.vendors + '/gsap/gsap.min.js',
		paths.vendors + '/gsap/ScrollTrigger.min.js',
		paths.vendors + '/gsap/ScrollToPlugin.min.js',
		paths.vendors + '/gsap/SplitText.min.js',
		paths.vendors + '/chartjs/chart.js',
		paths.vendors + '/countup/jquery.waypoints.min.js',
		paths.vendors + '/countup/jquery.countup.js',
		paths.vendors + '/css-vars-ponyfill/css-vars-ponyfill@2.js',
	
	];
	gulp
		.src( scripts, { allowEmpty: true } )
		.pipe( babel( { presets: ['@babel/preset-env'] } ) )
		.pipe( concat( 'vendors.min.js' ) )
		.pipe( uglify() )
		.pipe( gulp.dest( paths.js ) );

	return gulp
		.src( scripts, { allowEmpty: false } )
		.pipe( babel() )
		.pipe( concat( 'vendors.js' ) )
		.pipe( gulp.dest( paths.js ) );
} );



// Deleting any file inside the /src folder
gulp.task( 'clean-source', function() {
	return del( [ 'src/**/*' ] );
} );

/**
 * Deletes all files inside the dist folder and the folder itself.
 *
 * Run: gulp clean-dist
 */
gulp.task( 'clean-dist', function() {
	return del( paths.dist );
} );


// Run
// gulp dist
// Copies the files to the dist folder for distribution as simple theme
gulp.task(
	'dist',
	gulp.series( [ 'clean-dist' ], function() {
		return gulp
			.src(
				[
					'**/*',
					'!' + paths.node,
					'!' + paths.node + '/**',
					'!' + paths.dev,
					'!' + paths.dev + '/**',
					'!' + paths.dist,
					'!' + paths.dist + '/**',
					'!' + paths.distprod,
					'!' + paths.distprod + '/**',
					'!' + paths.sass,
					'!' + paths.sass + '/**',
					'!' + paths.composer,
					'!' + paths.composer + '/**',
					'!+(readme|README).+(txt|md)',
					'!*.+(dist|json|js|lock|xml)',
					'!CHANGELOG.md',
				],
				{ buffer: true }
			)
			.pipe( gulp.dest( paths.dist ) );
	} )
);

/**
 * Deletes all files inside the dist-product folder and the folder itself.
 *
 * Run: gulp clean-dist-product
 */
gulp.task( 'clean-dist-product', function() {
	return del( paths.distprod );
} );

// Run
// gulp dist-product
// Copies the files to the /dist-prod folder for distribution as theme with all assets
gulp.task(
	'dist-product',
	gulp.series( [ 'clean-dist-product' ], function() {
		return gulp
			.src( [
				'**/*',
				'!' + paths.node,
				'!' + paths.node + '/**',
				'!' + paths.composer,
				'!' + paths.composer + '/**',
				'!' + paths.dist,
				'!' + paths.dist + '/**',
				'!' + paths.distprod,
				'!' + paths.distprod + '/**',
			] )
			.pipe( gulp.dest( paths.distprod ) );
	} )
);

/**
 * Watches .scss, .js and image files for changes.
 * On change re-runs corresponding build task.
 * 
 * Run: gulp watch
 */
gulp.task( 'watch', function() {
	gulp.watch(
		[ paths.sass + '/**/*.scss', paths.sass + '/*.scss' ],
		gulp.series( 'styles' )
	);
	// gulp.watch(
	// 	[
	// 		paths.dev + '/js/**/*.js',
	// 		'js/**/*.js',
	// 	],
	// 	gulp.series( 'scripts' )
	// );

	// gulp.watch( paths.imgsrc + '/**', gulp.series( 'imagemin-watch' ) );
} );


gulp.task( 'browser-sync', function() {
	browserSync.init( cfg.browserSyncOptions );
} );


gulp.task(
	'imagemin-watch',
	gulp.series( 'imagemin', function() {
		browserSync.reload();
	} )
);


gulp.task( 'compile', gulp.series( 'styles', 'scripts', 'dist' ) );


gulp.task( 'default',  gulp.parallel( 'browser-sync', 'watch' ) );
// gulp.task( 'default', gulp.seri÷es( 'watch' ) );


gulp.task( 'watch-bs', gulp.parallel( 'browser-sync', 'watch' ) );
