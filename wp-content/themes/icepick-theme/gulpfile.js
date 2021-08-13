const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const babel = require('gulp-babel');
const minify = require("gulp-babel-minify");

const babelify = require('babelify');
const browserify = require('browserify');
//const sourcemapify = require('@jsdevtools/sourcemapify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const glob = require('glob');

const fs = require('fs');

gulp.task('sass', cb => {

	if( fs.existsSync('./assets/scss/frame.scss') )
		gulp.src('assets/scss/frame.scss')
			.pipe(sourcemaps.init())
			.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(rename('bundle.style.css'))
			.pipe(sourcemaps.write('.'))
			.pipe(gulp.dest('./dist/'));

	cb();
	});

gulp.task('scripts', cb => {	
	let files = glob.sync('./assets/js/**/*.js');

	browserify(files)
	  .transform(babelify)
	  .bundle()
	  .on('error', function(err){
			console.log('Script error', err.message);
	   })
	  .pipe(source('bundle.scripts.js'))
	  .pipe(buffer())
	  .pipe(minify())
	  .pipe(gulp.dest('./dist/'));	

	cb();
	}
);

gulp.task('admin-scripts', (cb) => {
	let files = glob.sync('./assets/admin/js/**/*.js');

	browserify(files)
	  .transform(babelify)
	  .bundle()
	  .on('error', function(err){
		  console.log(err.message);
	  })
	  .pipe(source('bundle.admin.scripts.js'))
	  .pipe(buffer())
	  .pipe(minify())
	  .pipe(gulp.dest('./dist/'));
	  
	  cb();
	});

gulp.task('admin-sass', cb => {
	gulp.src('assets/admin/scss/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename('bundle.admin.style.css'))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./dist/'));

	cb();
	});



gulp.task('watch', cb => {
	let opt = { ignoreInitial: false };
	
	gulp.watch('assets/scss/**/*.scss', opt, gulp.series('sass'));
	gulp.watch('assets/js/**/*.js', 	opt, gulp.series('scripts'));
	gulp.watch('assets/admin/js/**/*.js', 	opt, gulp.series('admin-scripts'));
	gulp.watch('assets/admin/scss/*.scss', 	opt, gulp.series('admin-sass'));

	cb();
	}
);


gulp.task('default', gulp.parallel('sass','scripts','admin-scripts','admin-sass'));
