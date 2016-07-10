<?php
/**
 * The template for displaying search results.
 *
 * @package Zoomify
 */

get_header(); ?>

<div class="tr-container">

	<?php if ( have_posts() ) : ?>
		<header class="archive-header">
			<h2 class="archive-title"><?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for &ldquo;%s&rdquo;', 'zoomify' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		</header><!--end .page-header -->

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php	get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
		<?php zoomify_content_nav( 'nav-below' ); ?>
	<?php endif; ?>

	<?php else : ?>

		<article id="post-0" class="page no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'zoomify' ); ?></h1>
			</header><!--end .entry-header -->
			<div class="entry-content">
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again!', 'zoomify' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- end .entry-content -->
		</article>

	<?php endif; ?>

</div><!-- end .tr-container -->

<?php get_footer(); ?>