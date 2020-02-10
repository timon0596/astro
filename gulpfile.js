let gulp = require('gulp')
let sass = require('gulp-sass')
let pref = require('gulp-autoprefixer')
let lreload = require('gulp-livereload')
let concat = require('gulp-concat-css')
let watch = require('gulp-watch')


gulp.task('sass',function(){
	return gulp.src('./templates/main/css/sass/*.sass')
	.pipe(sass().on('error',sass.logError))
	.pipe(pref())
	.pipe(gulp.dest('./templates/main/css/sass'))
})
gulp.task('concat',function(){
	return gulp.src('./templates/main/css/sass/*.css')
	.pipe(concat('main.css'))
	.pipe(gulp.dest('./templates/main/css'))
	.pipe(lreload())
})
gulp.task('default',function(){
	lreload.listen()
	gulp.watch('./templates/main/css/sass/*.sass',gulp.series('sass','concat'))
})

