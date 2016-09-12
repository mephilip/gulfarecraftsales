var gulp = require('gulp'),
	browserSync  = require('browser-sync').create(),
	watchify     = require('watchify'),
	source       = require('vinyl-source-stream'),
    browserify   = require('browserify'),
    buffer       = require('vinyl-buffer'),
    uglify       = require('gulp-uglify'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	rename = require('gulp-rename'),
	streamify    = require('gulp-streamify'),
	cssmin = require('gulp-cssmin')
	autoguide = require('./autoguide');
	
var onError = function(err) {
    console.log(err.message);
    this.emit('end');
};
	
// bundling js with browserify and watchify
var b = watchify(browserify(
    [
        'src/js/bundle/main'
    ]
));

gulp.task('js', bundle);
b.on('update', bundle);

function bundle() {
    return b.bundle()
        .on('error', onError)
        .pipe(source('bundle.js'))
        .pipe(buffer())
        .pipe(streamify(uglify()))
        .pipe(gulp.dest('./assets/js'))
        .pipe(browserSync.stream());
}
	
gulp.task('sass', function () {
	gulp.src('src/scss/**.scss')
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest('assets/css'))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('assets/css'));
});

gulp.task('watch', function () {
	gulp.watch('src/scss/**/**/*.scss', ['sass']);
	gulp.watch('src/js/bundle/*.js', ['js']);
});

gulp.task('autoguide', function (done) {
	autoguide({
		src: ['src/scss','src/js'],
		vars: ['src/scss/utilities'],
		styles: ['assets/css/main.css'],
		dest: './'
	}, function (err) {
		done();
	});
})

	