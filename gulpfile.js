const { series, parallel, src, dest, watch } = require("gulp");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass");
const concat = require("gulp-concat");
const babel = require("gulp-babel");
// const uglify = require("gulp-uglify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
// const replace = require("gulp-replace");
const server = require("browser-sync").create();
const pipeline = require("readable-stream").pipeline;

const source = {
	scss: ["node_modules/foundation-sites/scss", "node_modules/motion-ui"],
	js: [
		"node_modules/jquery/dist/jquery.js",
		"node_modules/motion-ui/dist/motion-ui.js",
		"node_modules/what-input/dist/what-input.js",
		"node_modules/foundation-sites/dist/js/foundation.js",
		"assets/DataTables/datatables.js",
		"dist/dataTables.altEditor.free.js",
	],
};

function cssTranspile() {
	return pipeline(
		src("src/scss/app.scss"),
		sourcemaps.init(),
		sass({
			outputStyle: "expanded",
			includePaths: source.scss,
		}),

		postcss([autoprefixer(), cssnano()]),
		sourcemaps.write("."),
		dest("assets/css"),
		server.stream()
	);
}

function jsTranspile() {
	return src("src/**/*.js")
		.pipe(sourcemaps.init())
		.pipe(babel())
		.pipe(concat("all.js"))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest("dist"));
}

function buildJs() {
	return (
		src(source.js)
			.pipe(babel())
			.pipe(concat("app.js"))
			// .pipe(uglify())
			.pipe(dest("assets/js"))
	);
}

function jsBundle() {
	return (
		src(source.js)
			.pipe(concat("app.js"))
			// .pipe(uglify())
			.pipe(dest("assets/js"))
	);
}

function reload() {
	server.reload();
}

function serve(done) {
	server.init({
		server: {
			baseDir: "./",
		},
	});
	watch("scss/*.scss", cssTranspile);
	watch("*.html").on("change", reload);
}

exports.buildcss = series(cssTranspile);
exports.buildjs = series(buildJs);
exports.test = series(buildJs);
exports.default = series(cssTranspile, jsBundle, serve);
exports.sync = series(serve);
