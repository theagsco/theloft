<?php
/**
 * zoomify setup functions
 *
 * @package zoomify
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 768; /* pixels */
}

/**
 * Assign the Zoomify version to a var
 */
$zoomify_theme 					= wp_get_theme( 'zoomify' );
$zoomify_version 	      = $zoomify_theme['Version'];

if ( ! function_exists( 'zoomify_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zoomify_setup() {

  	/*
  	 * Make theme available for translation.
  	 * Translations can be filed in the /languages/ directory.
  	 */
  	load_theme_textdomain( 'zoomify', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

    // This theme styles the visual editor to resemble the theme style.
	  add_editor_style( array( 'css/editor-style.css', zoomify_font_url() ) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'zoomify' ),
			'social'		=> __( 'Social Links Menu', 'zoomify' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );
	}
endif; // zoomify_setup


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function zoomify_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Footer Widget Area 1', 'zoomify' ),
		'id' => 'footer-sidebar-1',
		'description' => __( 'Widgets will appear in the first footer column.', 'zoomify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 2', 'zoomify' ),
		'id' => 'footer-sidebar-2',
		'description' => __( 'Widgets will appear in the second footer column.', 'zoomify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 3', 'zoomify' ),
		'id' => 'footer-sidebar-3',
		'description' => __( 'Widgets will appear in the third footer column.', 'zoomify' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function zoomify_scripts() {
	global $zoomify_version;

  // Add Ubuntu font, used in the main stylesheet.
	wp_enqueue_style( 'zoomify-font', zoomify_font_url(), array(), null );

	wp_enqueue_style( 'zoomify-style', get_stylesheet_uri(), '', $zoomify_version );

  wp_enqueue_script( 'zoomify-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120205', true );

  // Loads Custom Zoomify JavaScript functionality
	wp_enqueue_script( 'zoomify-functions', get_template_directory_uri() . '/js/functions.min.js', array(), $zoomify_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}