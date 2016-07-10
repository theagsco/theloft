<?php
/**
 * zoomify hooks
 *
 * @package zoomify
 */

/**
 * General
 * @see  zoomify_setup()
 * @see  zoomify_widgets_init()
 * @see  zoomify_scripts()
 */
add_action( 'after_setup_theme',			'zoomify_setup' );
add_action( 'widgets_init',					  'zoomify_widgets_init' );
add_action( 'wp_enqueue_scripts',			'zoomify_scripts', 10 );

/**
 * Extras
 * @see  zoomify_body_classes()
 * @see  zoomify_page_menu_args()
 * @see  zoomify_custom_excerpt_length()
 * @see  zoomify_excerpt_more()
 */
add_filter( 'body_class',	'zoomify_body_classes' );
add_filter( 'wp_page_menu_args', 'zoomify_page_menu_args' );
add_filter( 'excerpt_length', 'zoomify_custom_excerpt_length' );
add_filter( 'excerpt_more', 'zoomify_excerpt_more' );