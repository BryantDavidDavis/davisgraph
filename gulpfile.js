var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var gulputil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');

var sassDir = 'app/assets/sass';
var targetCSSdir = 'public/css';

var coffeeDir = 'app/assets/coffee';
var targetJSDir = 'public/js';


gulp.task('css', function() {
	return gulp.src(sassDir + '/main.sass')
		.pipe(sass({ style: 'compressed'}).on('error', gulputil.log))
		.pipe(gulp.dest(targetCSSdir))
		.pipe(notify('CSS compiled prefixed and compressed'));
});


gulp.task('js', function() {
	return gulp.src(coffeeDir + '/**/*.coffee')
	.pipe(coffee().on('error', gulputil.log))
	.pipe(gulp.dest(targetJSDir));
});


gulp.task('watch', function() {
	gulp.watch(sassDir + '/**/*.sass', ['css']);
	gulp.watch(coffeeDir + '/**/*.coffee', ['js']);
});

gulp.task('default', ['css', 'js', 'watch']);
