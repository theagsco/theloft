<?php
/**
 * The main template file.
 *
 * @package Zoomify
 */

get_header(); ?>

	<div class="tr-container">

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php /* Display navigation to next/previous pages when applicable, also check if WP pagenavi plugin is activated */ ?>
	<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else: ?>
		<?php zoomify_content_nav( 'nav-below' ); ?>
	<?php endif; ?>

  </div><!-- end .tr-container -->

<?php get_footer(); ?>

