<?php
/**
 * zoomify Theme Customizer controls
 *
 * @package zoomify
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @since  1.0.0
 */
if ( ! function_exists( 'zoomify_customize_register' ) ) {
	function zoomify_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Change header image section title & priority
		$wp_customize->get_section( 'header_image' )->title 		= __( 'Header', 'zoomify' );
		$wp_customize->get_section( 'header_image' )->priority 		= 35;

		/**
		 * Custom controls
		 */
		require_once dirname( __FILE__ ) . '/controls/layout.php';
		require_once dirname( __FILE__ ) . '/controls/arbitrary.php';

		if ( apply_filters( 'zoomify_customizer_more', true ) ) {
			require_once dirname( __FILE__ ) . '/controls/more.php';
		}

    /**
		 * Add the Content section
	     */
		$wp_customize->add_section( 'zoomify_blog' , array(
			'title'      => __( 'Main Content', 'zoomify' ),
			'priority'   => 45,
		) );

		/**
		 * Auto Excerpts
		 */
		$wp_customize->add_setting( 'zoomify_blog_exceprt', array(
			'default'  => apply_filters( 'zoomify_default_blog_exceprt', 1 ),
      'sanitize_callback' => 'zoomify_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'zoomify_blog_exceprt', array(
			'label'	   => __( 'Auto Excerpts', 'zoomify' ),
      'type'     => 'checkbox',
			'section'  => 'zoomify_blog',
			'settings' => 'zoomify_blog_exceprt',
			'priority' => 20,
		) );

		/**
		 * Excerpt length
		 */
		$wp_customize->add_setting( 'zoomify_blog_excerpt_length', array(
			'default'  => apply_filters( 'zoomify_default_blog_exceprt_length', 40 ),
      'sanitize_callback' => 'zoomify_sanitize_text',
		) );

		$wp_customize->add_control( 'zoomify_blog_excerpt_length', array(
			'label'	   => __( 'Excerpt length', 'zoomify' ),
      'type'     => 'text',
			'section'  => 'zoomify_blog',
			'settings' => 'zoomify_blog_excerpt_length',
			'priority' => 20,
		) );

    /**
		 * Read More
		 */
		$wp_customize->add_setting( 'zoomify_blog_entry_readmore_text', array(
			'default'           => apply_filters( 'zoomify_default_blog_entry_readmore_text', __('Read More', 'zoomify') ),
      'sanitize_callback' => 'zoomify_sanitize_text',
		) );

		$wp_customize->add_control( 'zoomify_blog_entry_readmore_text', array(
			'label'	   => __( 'Read More Button Text', 'zoomify' ),
      'type'     => 'text',
			'section'  => 'zoomify_blog',
			'settings' => 'zoomify_blog_entry_readmore_text',
			'priority' => 20,
		) );

		/**
		 * Add the typography section
	     */
		$wp_customize->add_section( 'zoomify_typography' , array(
			'title'      => __( 'Typography', 'zoomify' ),
			'priority'   => 45,
		) );

		/**
		 * Link Color
		 */
		$wp_customize->add_setting( 'zoomify_accent_color', array(
			'default'           => apply_filters( 'zoomify_default_accent_color', '#363636' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_accent_color', array(
			'label'	   => __( 'Link color', 'zoomify' ),
			'section'  => 'zoomify_typography',
			'settings' => 'zoomify_accent_color',
			'priority' => 20,
		) ) );

    /**
		 * Link Hover Color
		 */
		$wp_customize->add_setting( 'zoomify_link_hover_color', array(
			'default'           => apply_filters( 'zoomify_default_link_hover_color', '#b6b6b6' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_link_hover_color', array(
			'label'	   => __( 'Link Hover color', 'zoomify' ),
			'section'  => 'zoomify_typography',
			'settings' => 'zoomify_link_hover_color',
			'priority' => 20,
		) ) );

		/**
		 * Text Color
		 */
		$wp_customize->add_setting( 'zoomify_text_color', array(
			'default'           => apply_filters( 'zoomify_default_text_color', '#363636' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_text_color', array(
			'label'		=> __( 'Text color', 'zoomify' ),
			'section'	=> 'zoomify_typography',
			'settings'	=> 'zoomify_text_color',
			'priority'	=> 30,
		) ) );

		/**
		 * Heading color
		 */
		$wp_customize->add_setting( 'zoomify_heading_color', array(
			'default'           => apply_filters( 'zoomify_default_heading_color', '#161616' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_heading_color', array(
			'label'	   => __( 'Heading color', 'zoomify' ),
			'section'  => 'zoomify_typography',
			'settings' => 'zoomify_heading_color',
			'priority' => 40,
		) ) );

    /**
		 * Display Header
		 */
		$wp_customize->add_setting( 'zoomify_blog_header', array(
			'default'  => apply_filters( 'zoomify_default_blog_header', 0 ),
      'sanitize_callback' => 'zoomify_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'zoomify_blog_header', array(
			'label'	   => __( 'Enable Header?', 'zoomify' ),
      'type'     => 'checkbox',
			'section'  => 'header_image',
			'settings' => 'zoomify_blog_header',
			'priority' => 1,
		) );

    /**
		 * Header Background
		 */
		$wp_customize->add_setting( 'zoomify_header_background_color', array(
			'default'           => apply_filters( 'zoomify_default_header_background_color', '#363636' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_header_background_color', array(
			'label'	   => __( 'Background color', 'zoomify' ),
			'section'  => 'header_image',
			'settings' => 'zoomify_header_background_color',
			'priority' => 15,
		) ) );

    /**
		 * Header Title
		 */
		$wp_customize->add_setting( 'zoomify_blog_title', array(
			'default'           => apply_filters( 'zoomify_default_blog_title', '' ),
      'sanitize_callback' => 'zoomify_sanitize_text',
		) );

		$wp_customize->add_control( 'zoomify_blog_title', array(
			'label'	   => __( 'Blog Title', 'zoomify' ),
      'type'     => 'text',
			'section'  => 'header_image',
			'settings' => 'zoomify_blog_title',
			'priority' => 20,
		) );

    /**
		 * Header Title Caption
		 */
		$wp_customize->add_setting( 'zoomify_blog_caption', array(
			'default'           => apply_filters( 'zoomify_default_blog_caption', '' ),
      'sanitize_callback' => 'zoomify_sanitize_text',
		) );

		$wp_customize->add_control( 'zoomify_blog_caption', array(
			'label'	   => __( 'Blog Caption', 'zoomify' ),
      'type'     => 'text',
			'section'  => 'header_image',
			'settings' => 'zoomify_blog_caption',
			'priority' => 20,
		) );

		/**
		 * Page Title and Caption Color
		 */
		$wp_customize->add_setting( 'zoomify_header_text_color', array(
			'default'           => apply_filters( 'zoomify_default_header_text_color', '#ffffff' ),
			'sanitize_callback' => 'zoomify_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zoomify_header_text_color', array(
			'label'	   => __( 'Blog Title and Caption Color', 'zoomify' ),
			'section'  => 'header_image',
			'settings' => 'zoomify_header_text_color',
			'priority' => 20,
		) ) );

		/**
		 * Layout
		 */
		$wp_customize->add_section( 'zoomify_layout' , array(
			'title'      	=> __( 'Layout', 'zoomify' ),
			'priority'   	=> 50,
		) );

		$wp_customize->add_setting( 'zoomify_layout', array(
			'default'    		=> 'small',
			'sanitize_callback' => 'zoomify_sanitize_layout',
		) );

		$wp_customize->add_control( new Zoomify_Layout_Picker_Control( $wp_customize, 'zoomify_layout', array(
			'label'    => __( 'General layout', 'zoomify' ),
			'section'  => 'zoomify_layout',
			'settings' => 'zoomify_layout',
			'priority' => 1,
		) ) );

		$wp_customize->add_control( new Zoomify_Arbitrary_Control( $wp_customize, 'zoomify_divider', array(
			'section'  	=> 'zoomify_layout',
			'type' 		=> 'divider',
			'priority' 	=> 2,
		) ) );

		/**
		 * More
		 */
		if ( apply_filters( 'zoomify_customizer_more', true ) ) {
			$wp_customize->add_section( 'zoomify_more' , array(
				'title'      	=> __( 'More', 'zoomify' ),
				'priority'   	=> 999,
			) );

			$wp_customize->add_setting( 'zoomify_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'zoomify_sanitize_text',
			) );

			$wp_customize->add_control( new Zoomify_More_Control( $wp_customize, 'zoomify_more', array(
				'label'    => __( 'Looking for more options?', 'zoomify' ),
				'section'  => 'zoomify_more',
				'settings' => 'zoomify_more',
				'priority' => 1,
			) ) );
		}
	}
}