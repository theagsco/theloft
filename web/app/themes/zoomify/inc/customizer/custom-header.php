<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package zoomify
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses zoomify_header_style()
 * @uses zoomify_admin_header_style()
 * @uses zoomify_admin_header_image()
 */
function zoomify_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'zoomify_custom_header_args', array(
		'default-image'          => '',
		'header-text'     		 => false,
		'width'                  => 1950,
		'height'                 => 250,
		'flex-width'             => true,
		'flex-height'            => true,
	) ) );
}
