var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var gulputil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var browserify = require('gulp-browserify');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

//var sassDir = 'app/assets/sass';
var srcCSSDir = 'app/assets/css';
var targetCSSDir = 'public/css';

//var coffeeDir = 'app/assets/coffee';
var srcJSDir = 'app/assets/js';
var targetJSDir = 'public/js';

/*

gulp.task('css', function() {
	return gulp.src(sassDir + '/main.sass')
		.pipe(sass({ style: 'compressed'}).on('error', gulputil.log))
		.pipe(gulp.dest(targetCSSdir))
		.pipe(notify('CSS compiled prefixed and compressed'));
});
*/


gulp.task('js', function() {
	return gulp.src(srcJSDir + '/main.js')
	.pipe(browserify())
	.pipe(uglify())
	.pipe(rename('/bundle.js'))
	.pipe(gulp.dest(targetJSDir));
});

gulp.task('watch', function() {
	//gulp.watch(sassDir + '/**/*.sass', ['css']);
	gulp.watch(srcJSDir + '/**/*.js', ['js']);
});

gulp.task('default', ['js', 'watch']);
