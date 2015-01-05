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
var phpunit = require('gulp-phpunit');

var srcSassDir = 'public/packages/vendor/foundation/scss';
//var srcCSSDir = 'app/assets/css';
var targetCSSDir = 'public/css/scss';

//var coffeeDir = 'app/assets/coffee';
var srcJSDir = 'app/assets/js';
var targetJSDir = 'public/js';



gulp.task('css', function() {
	return gulp.src(srcSassDir + '/app.scss')
		.pipe(sass({ style: 'compressed'}).on('error', gulputil.log))
		.pipe(gulp.dest(targetCSSdir))
		.pipe(notify('CSS compiled prefixed and compressed'));
});



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
	gulp.watch(srcSassDir + '/**/*.scss', ['css']);
	//gulp.watch(srcJSDir + '/**/*.js', ['js']);
	gulp.watch('app/**/*.php', ['phpunit']);
});

gulp.task('default', ['css', 'watch']);
