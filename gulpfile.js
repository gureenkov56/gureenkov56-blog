import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import ts from 'gulp-typescript';
import uglify from 'gulp-uglify'
import clean from 'gulp-clean';

const sass = gulpSass(dartSass);
const { src, dest, series, watch, task } = gulp;


function js() {
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
function startwatch() {
    watch('src/ts/*.ts', js)
    watch('src/scss/*.scss', css)
}

async function cleanFolder() {
    return src('frontend/*')
        .pipe(clean());
}

// gulp
task('default', startwatch);

// gulp styles
task('styles', css)

// gulp js
task('js', js)

// gulp build
task('build', series(cleanFolder, js, css))

