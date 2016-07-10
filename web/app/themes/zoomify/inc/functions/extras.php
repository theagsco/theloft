<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package zoomify
 */

/**
 * Check whether the Zoomify Customizer settings ar enabled
 * @return boolean
 * @since  1.1.2
 */
function zoomify_is_customizer_enabled() {
	return apply_filters( 'zoomify_customizer_enabled', true );
}

/*-----------------------------------------------------------------------------------*/
/*  Register Ubuntu Google font
/*-----------------------------------------------------------------------------------*/

function zoomify_font_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Ubuntu, translate this to 'off'. Do not translate
    * into your own language.
    */
    $Ubuntu = _x( 'on', 'Ubuntu font: on or off', 'zoomify' );
 
    if ( 'off' !== $Ubuntu ) {
        $font_families = array();
 
        if ( 'off' !== $Ubuntu ) {
            $font_families[] = 'Ubuntu:300,400,700';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function zoomify_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zoomify_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

  if ( is_page_template( 'page-templates/page-archive.php' ) )
		$classes[] = 'template-archive';

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'template-fullwidth';

	return $classes;
}

/**
 * Schema type
 * @return string schema itemprop type
 */
function zoomify_html_tag_schema() {
	$schema 	= 'http://schema.org/';
	$type 		= 'WebPage';

	// Is single post
	if ( is_singular( 'post' ) ) {
		$type 	= 'Article';
	}

	// Is author page
	elseif ( is_author() ) {
		$type 	= 'ProfilePage';
	}

	// Is search results page
	elseif ( is_search() ) {
		$type 	= 'SearchResultsPage';
	}

	echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}

/*-----------------------------------------------------------------------------------*/
/* Change default excerpt length
/*-----------------------------------------------------------------------------------*/

function zoomify_custom_excerpt_length( $length ) {
  // Theme panel length setting
  $length = get_theme_mod( 'zoomify_blog_excerpt_length', apply_filters( 'zoomify_default_blog_exceprt_length', '40' ) );
  // Return length and add filter for quicker child theme editign
  return apply_filters( 'zoomify_default_blog_exceprt_length', $length );
}

function zoomify_excerpt_more($more) {
  global $post;
  return '...';
}

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since 1.0
*/

if ( ! function_exists( 'zoomify_post_readmore_link' ) ) {

	function zoomify_post_readmore_link() {

		$text = get_theme_mod( 'zoomify_blog_entry_readmore_text' );
		$text = $text ? $text : apply_filters( 'zoomify_blog_entry_readmore_text', __( 'Read More', 'zoomify' ) );
		$output = '';

		// Display read more link if entries are enabled and it's not a password protected post
		if ( get_theme_mod( 'zoomify_blog_exceprt', '1' ) == '1' && ! get_post_format() && ! is_sticky() && !post_password_required() ) {

			// The readmore link output
			$output .='<p>';
				$output .='<a href="'. esc_url( get_permalink( get_the_ID() ) ) .'" class="btn" title="'. esc_attr($text) .'">'. esc_html($text) .'</a>';
			$output .='</p>';

		} else {
			return; // nada
		}

		echo $output;

	} // End function

} // End if


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function zoomify_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'zoomify_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'zoomify_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so zoomify_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so zoomify_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in zoomify_categorized_blog.
 */
function zoomify_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'zoomify_categories' );
}
add_action( 'edit_category', 'zoomify_category_transient_flusher' );
add_action( 'save_post',     'zoomify_category_transient_flusher' );


if ( ! function_exists( 'zoomify_comment' ) ) :
/**
 * Comments template zoomify_comment
 */
function zoomify_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 65 ); ?>
			</div>

      <div class="comment-content">
				<div class="comment-author">
					<?php printf( __( ' %s ', 'zoomify' ), sprintf( ' %s ', get_comment_author_link() ) ); ?>
				</div><!-- end .comment-author -->

				<div class="comment-text">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'zoomify' ); ?></p>
					<?php endif; ?>

					<ul class="comment-meta">
						<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date */
						printf( __( '%1$s', 'zoomify' ),
						get_comment_date());
					?></a></li>
						<?php if ( comments_open () ) : ?>
						<li class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply<span> to this comment</span>', 'zoomify' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></li>
						<?php endif; ?>

						<?php edit_comment_link( __( 'Edit', 'zoomify' ));?>
					</ul><!-- end .comment-meta -->
				</div><!-- end .comment-text -->

			</div><!-- end .comment-content -->

		</article><!-- end .comment -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( '<span>Pingback:</span>', 'zoomify' ); ?> <?php comment_author_link(); ?></p>
		<p class="pingback-edit"><?php edit_comment_link( __('Edit', 'zoomify'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'zoomify_content_nav' ) ) :

/**
 * Display navigation to next/previous pages when applicable
 */
function zoomify_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="clearfix">
				<div class="nav-previous"><?php next_posts_link( __( '<span>&laquo; Older Posts</span>', 'zoomify'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span>Newer Posts &raquo;</span>', 'zoomify' ) ); ?></div>
			</nav><!-- end #nav-below -->
	<?php endif;
}

endif; // zoomify_content_nav


/**
 * Page Header Settings
 */
if ( !function_exists( 'zoomify_page_header' ) ) {
  function zoomify_page_header($postid) {
	global $post;

  $header_image = get_header_image();
  if ( has_post_thumbnail() ) {
    $post_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), true );
    $post_image = $post_image_array[0];
  }

  $check_header = get_theme_mod( 'zoomify_blog_header', apply_filters( 'zoomify_default_blog_header', 0 ) );
  $page_title = get_theme_mod( 'zoomify_blog_title' );
  $page_caption = get_theme_mod( 'zoomify_blog_caption' );
  $page_color_text = get_theme_mod( 'zoomify_header_text_color' );
  if (!empty($page_color_text)) { $page_color_text = ' style="color: '. esc_attr($page_color_text) .';"'; }

    if ( $check_header == true ) {

      if( ! is_single() && is_home() ) { ?>

      <section id="tr-intro">
        <?php if(!empty($header_image)) { echo '<div id="tr-intro-background" style="background: url(' . esc_url($header_image) . ') center center no-repeat; background-attachment: scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>'; } ?>
    		<div id="tr-intro-tagline">
        <?php if( !empty($page_title) ) { ?>
            <h2<?php echo $page_color_text; ?>><?php echo esc_html($page_title); ?></h2>
          <?php } ?>
          <?php if( !empty($page_caption) ) { ?>
            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo esc_html($page_caption); ?></p>
          <?php } ?>
    		</div>
    	</section>

      <?php
      }
    }

    if(is_single() && !empty($post_image)) { ?>

    <section id="tr-intro">
      <?php if(!empty($post_image)) { echo '<div id="tr-intro-background" style="background: url(' . esc_url($post_image) . ') center center no-repeat; background-attachment: scroll; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>'; } ?>
  	</section>

    <?php
    }

  }
} ?>