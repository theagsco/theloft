<?php
/**
 * zoomify Theme Customizer display functions
 *
 * @package zoomify
 */

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'zoomify_add_customizer_css' ) ) {
	function zoomify_add_customizer_css() {
		$accent_color 					= zoomify_sanitize_hex_color( get_theme_mod( 'zoomify_accent_color', apply_filters( 'zoomify_default_accent_color', '#363636' ) ) );
		$link_hover_color 			= zoomify_sanitize_hex_color( get_theme_mod( 'zoomify_link_hover_color', apply_filters( 'zoomify_default_link_hover_color', '#b6b6b6' ) ) );

		$header_bg_color        = zoomify_sanitize_hex_color( get_theme_mod( 'zoomify_header_background_color', apply_filters( 'zoomify_default_header_background_color', '#363636' ) ) );
		$text_color 					  = zoomify_sanitize_hex_color( get_theme_mod( 'zoomify_text_color', apply_filters( 'zoomify_default_text_color', '#363636' ) ) );
		$heading_color 					= zoomify_sanitize_hex_color( get_theme_mod( 'zoomify_heading_color', apply_filters( 'zoomify_default_heading_color', '#161616' ) ) );

		$brighten_factor 				= apply_filters( 'zoomify_brighten_factor', 25 );
		$darken_factor 					= apply_filters( 'zoomify_darken_factor', -25 );

    // $header_check 					= get_theme_mod( 'zoomify_blog_header', apply_filters( 'zoomify_default_blog_header', 0 ) );

		$output = '

		body {
			background-color: ' . $header_bg_color . ';
			color: ' . $text_color . ';
		}

    h1, h2, h3, h4, h5, h6,
    h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
			color: ' . $heading_color . ';
		}

    a:hover,
    .entry-footer a:hover,
    .main-navigation ul li a:hover,
    .nav-next a:hover,
    .nav-previous a:hover,
    .previous-image a:hover,
    .next-image a:hover {
      color: ' . $link_hover_color . ';
    }

    a  {
			color: ' . $accent_color . ';
		}

		';

		wp_add_inline_style( 'zoomify-style', $output );
	}
}