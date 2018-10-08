var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var postcss = require('gulp-postcss');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var bs = require('browser-sync').create();

gulp.task('browser-sync:proxy', function () {
    bs.init({
        proxy: "localhost:8000",
        serveStatic: [{
            route: ['/typo3conf/ext/typo3trainingproject/Resources/Public'],
            dir: 'Resources/Public'
        }],
        startPath: '/index.php?id=1'
    });
});

gulp.task('sass', function () {
    /*
     * remove: false -> doesn't remove css properties that dont match autoprefixer
     * cascade: true -> doesn't inline the css
     */
    // var plugin = [
    //     autoprefixer({browsers: ['IE 10'], cascade: true})
    // ];
    return gulp.src("./Resources/Private/Assets/Scss/*.scss")
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('/'))
        .pipe(gulp.dest("./Resources/Public/CSS"))
        .pipe(bs.stream({match: '**/*.css'}));
});

gulp.task('js', function () {
    return gulp.src(["./Resources/Private/Assets/JavaScript/*.js", "./Resources/Private/Assets/JavaScript/**/*.js"])
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./Resources/Public/js/'))
        .pipe(uglify())
        .pipe(sourcemaps.write('/'))
        .pipe(gulp.dest('./Resources/Public/js/'))
        .pipe(bs.stream({}));
});

gulp.task('watch', ['browser-sync:proxy', 'sass'], function () {
    gulp.watch(["./Resources/Private/Assets/Scss/*.scss", './Resources/Private/Assets/Scss/**/*.scss'], ['sass']);
    gulp.watch(["./Resources/Private/Assets/JavaScript/*.js", "./Resources/Private/Assets/JavaScript/**/*.js"], ['js']);
    gulp.watch("./Resources/Private/**/*.html", bs.reload());
});

gulp.task('build', ['sass', 'js']);

