const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
const gcmq = require('gulp-group-css-media-queries');
const rename = require('gulp-rename');
const filesize = require('gulp-filesize');
const preproc = require('gulp-less');
const imagemin = require('gulp-imagemin');
const bower = require('gulp-bower');
const zip = require('gulp-zip');
const ftp = require('vinyl-ftp');
const debug = require('gulp-debug');

const config = {
    src: './src',
    dst: '.',
    dstftp: '/wp-content/themes/intercon-01',
    watch: '{.,./inc,./temlate-parts,./templates,./css,./font/**,./js/**}/*.{php,css,js}',
    css: {
        watch: '/less/**/*.less',
        src: '/less/main.less',
        dst: '/css'
    },
    html: {
        src: '/*.php'
    },
    exe: '.',
    bowerDir: './bower_components'
};

// Browsersync-настройки
const syncOpts = {
    proxy: 'test.intercon.ru',
    // proxy: 'wp.office.intercon.ru',
    file: '*/**/*.php'
        //    files: dir.build + '**/*',
        // open: true,
        // notify: false,
        // ghostMode: false,
        // ui: {
        // port: 8008
        // }
};


var conn = ftp.create({
    host: 'test.intercon.ru',
    user: 'utestintercon',
    password: 'UCa-OdHl'
        //		parallel: 10,
        //		log:      gutil.log
});


// Default error handler
var onError = function(err) {
    console.log('An error occured:', err.message);
    this.emit('end');
}

gulp.task('zip', function() {
    return gulp.src([
            '*',
            '.gitattributes',
            '.gitignore',
            '*/**/*',
            '!' + config.bowerDir,
            '!node_modules',
            '!archive.zip',
        ], { base: "." })
        .pipe(zip('archive.zip'))
        .pipe(gulp.dest('.'));
});

// Install all Bower components
gulp.task('bower', function() {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});


// Jshint outputs any kind of javascript problems you might have
// Only checks javascript files inside /src directory
gulp.task('jshint', function() {
    return gulp.src('./js/src/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter(stylish))
        .pipe(jshint.reporter('fail'));
})


// Concatenates all files that it finds in the manifest
// and creates two versions: normal and minified.
// It's dependent on the jshint task to succeed.
gulp.task('scripts', ['jshint'], function() {
    return gulp.src('./js/manifest.js')
        .pipe(include())
        .pipe(rename({ basename: 'scripts' }))
        .pipe(gulp.dest('./js/dist'))
        // Normal done, time to create the minified javascript (scripts.min.js)
        // remove the following 3 lines if you don't want it
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./js/dist'))
        .pipe(notify({ message: 'scripts task complete' }))
        .pipe(livereload());
});


gulp.task('preproc', function() {
    gulp.src(config.src + config.css.src)
        .pipe(sourcemaps.init())
        .pipe(preproc())
        .pipe(autoprefixer({
            browsers: ['> 0.1%'],
            cascade: false
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(config.dst + config.css.dst));

    gulp.src(config.src + config.css.src)
        .pipe(sourcemaps.init())
        .pipe(preproc())
        .pipe(autoprefixer({
            browsers: ['> 0.1%'],
            cascade: false
        }))
        .pipe(gcmq())
        .pipe(cleanCSS({
            level: 2
        }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(config.dst + config.css.dst));
});

gulp.task('watch', ['start'], function() {
    gulp.watch(config.src + config.css.watch, ['preproc']);
    gulp.watch(config.watch, ['ftp']);
    gulp.watch(config.watch, browserSync.reload);
});



gulp.task('ftp', function() {

    return gulp.src([config.watch, '!./**/*_.*'], { base: '.', buffer: false })
        .pipe(debug({ title: 'ftp src' }))
        .pipe(conn.newer(config.dstftp)) // only upload newer files
        .pipe(debug({ title: 'ftp filtr' }))
        .pipe(conn.dest(config.dstftp));

});


gulp.task('less', function() {
    gulp.watch(config.src + config.css.watch, ['preproc']);
});



// browser-sync
gulp.task('start', () => {
    //    if (start === false) {
    // browserSync = require('browser-sync').create();
    browserSync.init(syncOpts);
    //    }
});