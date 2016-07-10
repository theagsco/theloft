<?php
/**
 * Template Name: Archive Page
 * Description: An archive page template
 *
 * @package Zoomify
 */

get_header(); ?>

	<div class="tr-container">

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'archive' ); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- end .tr-container -->

<?php get_footer(); ?>