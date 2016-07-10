<?php
/**
 * zoomify customizer hooks
 *
 * @package zoomify
 */

add_action( 'customize_preview_init', 	'zoomify_customize_preview_js' );
add_action( 'customize_register', 		'zoomify_customize_register' );
add_filter( 'body_class', 				'zoomify_layout_class' );
add_action( 'wp_enqueue_scripts', 		'zoomify_add_customizer_css', 130 );
add_action( 'after_setup_theme', 		'zoomify_custom_header_setup' );