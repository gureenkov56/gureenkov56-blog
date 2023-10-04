import gulp from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import ts from 'gulp-typescript';
import uglify from 'gulp-uglify'
import clean from 'gulp-clean';

const sass = gulpSass(dartSass);
const { src, dest, series, watch, task, parallel } = gulp;


async function js() {
    return src('src/ts/*.ts')
        .pipe(ts({
            noImplicitAny: true,
            target: 'es6',
        }))
        .pipe(uglify())
        .pipe(dest('frontend/js/'))
}

function css() {
    return src('src/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('frontend/css/'))
}

async function icons() {
    return src('src/public/images/icons/*.*')
        .pipe(dest('frontend/public/images/icons/'))
}

function startwatch() {
    watch('src/ts/*.ts', js)
    watch('src/scss/*.scss', css)
    watch('src/public/images/icons/*.*', icons)
}

async function cleanFolder() {
    return src('frontend/*')
        .pipe(clean());
}


// gulp
task('default',
    series(
        cleanFolder,
        parallel(
            css,
            js,
            icons,
        ),
        startwatch
    )
);

task('watch', startwatch)

// gulp styles
task('styles', css)

// gulp js
task('js', js)

task('icons', icons)

// gulp build
task('build', series(cleanFolder, js, css, icons))

