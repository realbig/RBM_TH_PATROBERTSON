var $             = require( 'gulp-load-plugins' )();
var config        = require( '../util/loadConfig' ).javascript;
var gulp          = require( 'gulp' );
var foreach       = require( 'gulp-foreach' );
var notify        = require( 'gulp-notify' );
var fs            = require( 'fs' );
var pkg           = JSON.parse( fs.readFileSync( './package.json' ) );
var onError       = notify.onError( {
   title:    pkg.name,
   message:  '<%= error.name %> <%= error.message %>'   
} );

gulp.task( 'uglify:front', function() {

    return gulp.src( config.front.src )
        .pipe( $.plumber( { errorHandler: onError } ) )
        .pipe( $.sourcemaps.init() )
        .pipe( $.babel() )
        .pipe( $.concat( config.front.filename ) )
        .pipe( $.uglify() )
        .pipe( $.sourcemaps.write( '.' ) )
        .pipe( gulp.dest( config.dest.root ) )
        .pipe( $.plumber.stop() )
        .pipe( notify( {
            title: pkg.name,
            message: 'JS Complete'
        } ) );

} );

gulp.task( 'uglify:admin', function() {

    return gulp.src( config.admin.bowerPaths.concat( config.admin.src ) )
        .pipe( $.plumber( { errorHandler: onError } ) )
        .pipe( $.sourcemaps.init() )
        .pipe( $.babel() )
        .pipe( $.concat( config.admin.filename ) )
        .pipe( $.uglify() )
        .pipe( $.sourcemaps.write( '.' ) )
        .pipe( gulp.dest( config.dest.root ) )
        .pipe( $.plumber.stop() )
        .pipe( notify( {
            title: pkg.name,
            message: 'Admin JS Complete'
        } ) );

} );

gulp.task( 'uglify:tinymce', function() {

    return gulp.src( config.tinymce.src )
        .pipe( foreach( function( stream, file ) {
            return stream
                .pipe( $.plumber( { errorHandler: onError } ) )
                .pipe( $.babel() )
                .pipe( $.uglify() )
                .pipe( gulp.dest( config.tinymce.dest ) )
                .pipe( $.plumber.stop() )
        } ) )
        .pipe( notify( {
            title: pkg.name,
            message: 'TinyMCE JS Complete'
        } ) );

} );

gulp.task( 'uglify', ['uglify:front', 'uglify:admin', 'uglify:tinymce'], function( done ) {
} );