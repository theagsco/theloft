<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Zoomify
 */

get_header(); ?>

<div class="tr-container">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<h2 class="archive-title">
			<?php
			if ( is_category() ) :
				printf( __( 'All posts filed under &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
				printf( __( 'All posts tagged &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_author() ) :
			/* Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			 */
			 	the_post();
				printf( __( 'All posts by &ldquo;%s&rdquo;', 'zoomify' ), '<span class="vcard">' . get_the_author() . '</span>' );
				/* Since we called the_post() above, we need to
				* rewind the loop back to the beginning that way
				* we can run the loop properly, in full.
				*/
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( 'Daily archives of &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Monthly archives of &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Yearly archives of &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			else :
				_e( 'Archives', 'zoomify' );

			endif;
			?>
			</h2>
			<?php
			if ( is_category() ) {
				// show an optional category description
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>
		</header><!-- end .archive-header -->

		<?php rewind_posts(); ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'zoomify' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'zoomify' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

	<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
		<?php zoomify_content_nav( 'nav-below' ); ?>
	<?php endif; ?>

</div><!-- end .tr-container -->

<?php get_footer(); ?>