// gulp packs
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
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

// server and watch
gulp.task('serve', function () {
	browserSync.init({
		server: {
			baseDir: 'dist'
		}
	});
	
	gulp.watch('src/scss/**/*.scss', gulp.series('scss'));
	gulp.watch('src/js/**/*.js', gulp.series('js'));
	gulp.watch('src/img/**/*', gulp.series('images'));
	gulp.watch('src/**/*.html', gulp.series('html')).on('change', browserSync.reload);
});

// html to dist
gulp.task('html', function () {
	return gulp.src('src/**/*.html')
	.pipe(gulp.dest('dist'));
});

// default task
gulp.task('default', gulp.parallel('html', 'scss', 'js', 'images', 'serve'));