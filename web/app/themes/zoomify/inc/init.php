<?php
/**
 * zoomify engine room
 *
 * @package zoomify
 */

/**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
require get_template_directory() . '/inc/functions/setup.php';

/**
 * Structure.
 * Template functions used throughout the theme.
 */
require get_template_directory() . '/inc/functions/hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/functions/extras.php';

/**
 * Customizer additions.
 */
if ( zoomify_is_customizer_enabled() ) {
	require get_template_directory() . '/inc/customizer/hooks.php';
	require get_template_directory() . '/inc/customizer/controls.php';
	require get_template_directory() . '/inc/customizer/display.php';
	require get_template_directory() . '/inc/customizer/functions.php';
	require get_template_directory() . '/inc/customizer/custom-header.php';
}

