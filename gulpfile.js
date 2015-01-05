//var path = require('path');
var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var gulputil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var concat = require('gulp-concat');
var autoprefixer = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var browserify = require('gulp-browserify');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var phpunit = require('gulp-phpunit');
var livereload = require('gulp-livereload');
var lr = require('tiny-lr');
server = lr();
//var gulpcompass = require('gulp-compass');

gulp.task('sass', function() {
	return gulp.src('public/packages/vendor/foundation/scss/app.scss')
	.pipe(sass({style: 'expanded'}))
	.pipe(minifycss())
	.pipe(gulp.dest('public/stylesheets'));
});







/*
var srcScssDir = 'public/packages/vendor/foundation/scss';
var targetSassDir = 'public/test/sass';
var targetCSSDir = 'public/test/css';
*/

//var coffeeDir = 'app/assets/coffee';
//var srcJSDir = 'app/assets/js';
//var targetJSDir = 'public/js';

/*
gulp.task('compass', function() {
	gulp.src(srcScssDir + '/app.scss')
	.pipe(gulpcompass({
		css: targetCSSDir,
		sass: targetSassDir,
		
	}))
	.pipe(gulp.dest('public/test/temp'));
});

gulp.task('default', ['compass']);
*/

/*
gulp.task('css', function() {
	return gulp.src(srcSassDir + '/app.scss')
		.pipe(sass({ style: 'compressed'}).on('error', gulputil.log))
		.pipe(gulp.dest(targetCSSdir))
		.pipe(notify('CSS compiled prefixed and compressed'));
});
*/



/*
gulp.task('js', function() {
	return gulp.src(srcJSDir + '/main.js')
	.pipe(browserify())
	.pipe(uglify())
	.pipe(rename('/bundle.js'))
	.pipe(gulp.dest(targetJSDir));
});
*/

/*
gulp.task('phpunit', function() {
	//var options = {debug: true};
	gulp.src('phpunit.xml')
	.pipe(phpunit('./vendor/bin/phpunit'));
});
*/

gulp.task('watch', function() {
	gulp.watch(srcSassDir + '/**/*.scss', ['compass']);
	gulp.watch(srcJSDir + '/**/*.js', ['js']);
	gulp.watch('app/**/*.php', ['phpunit']);
});

