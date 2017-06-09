'use strict';

const fs = require('fs');
const gulp = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const browserify = require('browserify');
const watchify = require('watchify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnext = require('postcss-cssnext');
const cssnano = require('cssnano');
const mqpacker = require('css-mqpacker');
const shortcss = require('postcss-short');
const pump = require('pump');
const imagemin = require('gulp-imagemin');
const uglify = require('gulp-uglify');
const pngquant = require('imagemin-pngquant');
const jpegtran = require('imagemin-jpegtran');
const svgo = require('imagemin-svgo');
const gifsicle = require('imagemin-gifsicle');
const merge = require('merge-stream');
const rename = require('gulp-rename');
const gulpSequence = require('gulp-sequence');
const eslint = require('gulp-eslint');
const sassLint = require('gulp-sass-lint');
const envify = require('envify');
const clean = require('gulp-clean');
const gutil = require('gulp-util');
const watch = require('gulp-watch');
const newer = require('gulp-newer');
const notifier = require('node-notifier');
// const dotenv = require('dotenv');
const rev = require('gulp-rev');
const revReplace = require('gulp-rev-replace');
const revdel = require('gulp-rev-delete-original');

const mainSrcFolder = './public/src/';
const mainDestFolder = './public/dist_v5/';
const mainViewsDistFolder = './resources/views/';

const notify = (title, message) => {
	notifier.notify({ title, message });
};

const pagesArr = ['home', 'tinymce', 'online', 'admin'];

(function() {

	let postCssPlugins = [
		cssnext({
			browsers: ['last 10 version', '> 1%']
		})
	];

	for (let i = 0; i < pagesArr.length; i++) {
		let page = pagesArr[i];

		let b = browserify({
			entries: [`${mainSrcFolder}pages/${page}/js/main.js`],
			debug: true,
			cache: {},
			packageCache: {},
			plugin: [watchify]
		});
		b.transform(babelify, { 'compact': false });
		b.transform(envify);

		let bundle = function () {
			return b.bundle()
				.on('error', swallowError)
				.pipe(source(`${page}.js`))
				.pipe(buffer())
				.pipe(gulp.dest(`${mainDestFolder}js/`));
		};

		gulp.task(`js:dev:${page}`, bundle);
		b.on('update', bundle);
		b.on('log', function (msg) {
			gutil.log(gutil.colors.yellow(msg));
		});

		gulp.task(`css:dev:${page}`, () => {
			return gulp.src(`${mainSrcFolder}pages/${page}/sass/style.scss`)
				.pipe(sourcemaps.init())
				.pipe(sass({ outputStyle: 'compressed' }).on('error', swallowError))
				.pipe(postcss(postCssPlugins))
				.pipe(rename(`${page}.css`))
				.pipe(sourcemaps.write('.'))
				.pipe(gulp.dest(`${mainDestFolder}css`));
		});

		gulp.task(`watch:${page}`, () => {
			gulp.watch(`${mainSrcFolder}pages/${page}/**/*.scss`, [`css:dev:${page}`]);
			gulp.watch(`${mainSrcFolder}pages/${page}/**/*.scss`, (vinyle) => {
				lintSass(vinyle.path);
			});

			gulp.watch(`${mainSrcFolder}pages/${page}/**/*.js`, (vinyle) => {
				lintFile(vinyle.path);
			});
		});

		gulp.task(`${page}`, [`css:dev:${page}`, `js:dev:${page}`, `watch:${page}`]);
		// gulp.task(`${page}`, [`css:dev:${page}`, `watch:${page}`]);
	}
}());

gulp.task('global', ['watch:global']);

gulp.task('watch:global', () => {

	gulp.watch(`${mainSrcFolder}pages/global/**/*.scss`, pagesArr.map(function(page) {
		return `css:dev:${page}`;
	}));
	gulp.watch(`${mainSrcFolder}pages/global/**/*.scss`, (vinyle) => {
		lintSass(vinyle.path);
	});

	gulp.watch(`${mainSrcFolder}pages/global/js/**/*.js`, (vinyle) => {
		lintFile(vinyle.path);
	});

});

function lintFile(file) {
	return gulp.src(file)
		.pipe(eslint({
			configFile: './.eslintrc.json'
		}))
		.pipe(eslint.format());
}

gulp.task('lint', ['lintjs', 'lintscss']);

gulp.task('lintjs', () => {
	return gulp.src([`${mainSrcFolder}pages/**/*.js`, `!${mainSrcFolder}pages/global/js/lib/bootstrapmodal.js`])
		.pipe(eslint({
			configFile: './.eslintrc.json'
		}))
		.pipe(eslint.format());
});

gulp.task('lintscss', () => {
	return gulp.src(`${mainSrcFolder}pages/**/*.scss`)
		.pipe(sassLint({
			options: {
				formatter: 'stylish',
				'merge-default-rules': false
			},
			rules: {
				'no-ids': 0,
				'no-mergeable-selectors': 0,
				'trailing-semicolon': 2,
				'quotes': [
					1,
					{
						'style': 'single'
					}
				]
			}
		}))
		.pipe(sassLint.format());
});

function lintSass(file) {
	return gulp.src(file)
		.pipe(sassLint({
			options: {
				formatter: 'stylish',
				'merge-default-rules': false
			},
			rules: {
				'no-ids': 0,
				'no-mergeable-selectors': 0,
				'trailing-semicolon': 2,
				'quotes': [
					1,
					{
						'style': 'single'
					}
				]
			}
		}))
		.pipe(sassLint.format());
}

gulp.task('clean', function() {
	return gulp.src([`${mainDestFolder}`], { read: false })
		.pipe(clean({ force: true }));
});

gulp.task('css', () => {

	let postCssPlugins = [
		cssnext({
			browsers: ['last 15 version', '> 1%']
		}),
		shortcss(),
		mqpacker(),
		cssnano({
			autoprefixer: false,
			discardComments: {
				removeAll: true
			},
			discardUnused: false,
			mergeIdents: false,
			reduceIdents: false,
			zindex: false
		})
	];

	let stream = merge();
	for (let i = 0; i < pagesArr.length; i++) {
		let page = pagesArr[i];
		let task = gulp.src(`${mainSrcFolder}pages/${page}/sass/style.scss`)
			.pipe(sass({ outputStyle: 'compressed' }).on('error', swallowError))
			.pipe(postcss(postCssPlugins))
			.pipe(rename(`${page}.css`))
			.pipe(gulp.dest(`${mainDestFolder}css`));

		stream.add(task);

		if (i == pagesArr.length - 1) {
			return stream;
		}
	}
});

gulp.task('js', () => {
	let stream = merge();
	for (let i = 0; i < pagesArr.length; i++) {
		let page = pagesArr[i];
		let task = browserify(`${mainSrcFolder}pages/${page}/js/main.js`)
			.transform(babelify, { 'compact': false })
			.bundle()
			.on('error', swallowError)
			.pipe(source(`${page}.js`))
			.pipe(buffer())
			.pipe(gulp.dest(`${mainDestFolder}js/`));
		stream.add(task);
		if (i == pagesArr.length - 1) {
			return stream;
		}
	}
});

function minifyImages() {
	return gulp.src(`${mainSrcFolder}images/**/*.*`)
		.on('error', swallowError)
		.pipe(newer(`${mainDestFolder}images`))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{ removeViewBox: false }],
			use: [pngquant(), jpegtran(), svgo(), gifsicle()]
		}))
		.pipe(gulp.dest(`${mainDestFolder}images`));
}

gulp.task('imagemin', () => {
	minifyImages();
});

gulp.task('watch:imagemin', () => {
	watch(`${mainSrcFolder}images/**/*`, {events: ['add', 'change'] }, function () {
		minifyImages();
	});
});


gulp.task('rev', function () {
	fs.unlink('./rev-manifest.json', function () {

	});
	let stream = merge();

	stream.add(gulp.src(`${mainDestFolder}css/**/*.css`)
		.pipe(rev())
		.pipe(revdel())
		.pipe(gulp.dest(`${mainDestFolder}css`))
		.pipe(rev.manifest('rev-manifest.json', {
			merge: true,
			path: '.'
		}))
		.pipe(gulp.dest('.')));

	stream.add(gulp.src([`${mainDestFolder}js/**/*.js`, `!${mainDestFolder}js/animations/*.js`])
		.pipe(rev())
		.pipe(revdel())
		.pipe(gulp.dest(`${mainDestFolder}js`))
		.pipe(rev.manifest('rev-manifest.json', {
			merge: true,
			path: '.'
		}))
		.pipe(gulp.dest('.')));

	// stream.add(gulp.src(`${mainDestFolder}fonts/**/*.*`)
	// 	.pipe(rev())
	// 	.pipe(revdel())
	// 	.pipe(gulp.dest(`${mainDestFolder}fonts`))
	// 	.pipe(rev.manifest('rev-manifest.json', {
	// 		merge: true,
	// 		path: '.'
	// 	}))
	// 	.pipe(gulp.dest('.')));

	return stream;
});

gulp.task('revreplace', ['revrepphp', 'revrepcss', 'revrepjs']);

gulp.task('cache', gulpSequence('rev', 'revreplace'));

gulp.task('revrepphp', () => {
	let manifest = gulp.src('rev-manifest.json');
	return gulp.src(`${mainViewsDistFolder}**/*.php`)
		.pipe(revReplace({
			manifest,
			replaceInExtensions: ['.php']
		}))
		.pipe(gulp.dest(`${mainViewsDistFolder}`));
});

gulp.task('revrepcss', () => {
	let manifest = gulp.src('rev-manifest.json');
	return gulp.src(`${mainDestFolder}css/**/*.css`)
		.pipe(revReplace({
			manifest,
			replaceInExtensions: ['.css']
		}))
		.pipe(gulp.dest(`${mainDestFolder}css`));
});

gulp.task('revrepjs', () => {
	let manifest = gulp.src('rev-manifest.json');
	return gulp.src(`${mainDestFolder}js/**/*.js`)
		.pipe(revReplace({
			manifest,
			replaceInExtensions: ['.js']
		}))
		.pipe(gulp.dest(`${mainDestFolder}js`));
});

gulp.task('compress', function(cb) {
	pump([
		gulp.src(`${mainDestFolder}js/**/*.js`),
		uglify({ mangle: true }),
		gulp.dest(`${mainDestFolder}js/`)
	],
		cb
	);
});

gulp.task('copyFonts', () => {
	return gulp.src([`${mainSrcFolder}fonts/**/*`])
		.pipe(gulp.dest(`${mainDestFolder}fonts`));
});

gulp.task('watch:copyFonts', () => {
	gulp.watch(`${mainSrcFolder}fonts/**/*`, ['copyFonts']);
});

gulp.task('copyUncompiledFiles', () => {
	return gulp.src([`${mainSrcFolder}uncompiled/**/*`])
		.pipe(gulp.dest(`${mainDestFolder}uncompiled`));
});

gulp.task('watch:copyUncompiledFiles', () => {
	gulp.watch(`${mainSrcFolder}uncompiled/**/*`, ['copyUncompiledFiles']);
});

gulp.task('handleimages', ['imagemin', 'watch:imagemin']);

gulp.task('copyfiles', ['copyUncompiledFiles', 'watch:copyUncompiledFiles', 'copyFonts', 'watch:copyFonts']);

gulp.task('develop', gulpSequence('clean', pagesArr.concat(['copyfiles', 'handleimages', 'global'])));

function swallowError(error) {
	gutil.log(gutil.colors.red(error.toString()));
	notify('Error' , error.toString());
	this.emit('end');
}

// gulp.task('prod', gulpSequence('clean', 'copyUncompiledScripts', 'copyFonts', 'imagemin', 'lint', ['css', 'js'], 'compress', 'copyandminifyviews', 'cache'));

gulp.task('prod', gulpSequence('clean', ['css', 'js'], 'copyUncompiledFiles', 'copyFonts', 'imagemin', 'compress', 'cache'));
