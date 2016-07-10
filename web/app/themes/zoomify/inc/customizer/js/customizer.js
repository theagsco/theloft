/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'zoomify_text_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color', to );
		} );
	} );
	wp.customize( 'zoomify_heading_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-content h1 a, .site-content h2 a, .site-content h3 a, .site-content h4 a, .site-content h5 a, .site-content h6 a' ).css( 'color', to );
		} );
	} );
	wp.customize( 'zoomify_header_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-color', to );
		} );
	} );
  wp.customize( 'zoomify_header_text_color', function( value ) {
		value.bind( function( to ) {
			$( '#tr-intro h2, #tr-intro .page-caption' ).css( 'color', to );
		} );
	} );
} )( jQuery );
