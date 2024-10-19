// gulp packs
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const php = require('gulp-connect-php');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();

// compile sass e add prefixes
gulp.task('scss', function () {
	return gulp.src('src/scss/main.scss')
	.pipe(sass({
		includePaths: ['node_modules']
	}).on('error', sass.logError))
	.pipe(postcss([autoprefixer(), cssnano()]))
	.pipe(gulp.dest('dist/css'))
	.pipe(browserSync.stream());
});

// js minify
gulp.task('js', function () {
	return gulp.src([
		'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
		'src/js/**/*.js'
	])
	.pipe(concat('main.js'))
	.pipe(uglify())
	.pipe(gulp.dest('dist/js'))
	.pipe(browserSync.stream());
});

// img minify (webp)
gulp.task('images', async function () {
	const webp = (await import('gulp-webp')).default;	
	return gulp.src(['src/img/**/*.*'], {
		buffer: true,
		removeBOM: false
	})
	.pipe(webp())
	.pipe(gulp.dest('dist/img'));
});

// move .html and .php to 'dist'
gulp.task('html', function () {
	return gulp.src(['src/**/*.html', 'src/**/*.php'])
	.pipe(gulp.dest('dist'));
});

// server and watch
gulp.task('serve', function () {
	browserSync.init({
		proxy: "http://localhost:8080",
	});
	
	gulp.watch('src/img/**/*', gulp.series('images'));
	gulp.watch('src/scss/**/*.scss', gulp.series('scss'));
	gulp.watch('src/js/**/*.js', gulp.series('js'));
	gulp.watch(['src/**/*.html', 'src/**/*.php'], gulp.series('html')).on('change', browserSync.reload);
});

// default task
gulp.task('default', gulp.parallel('images', 'scss', 'js', 'html', 'serve'));