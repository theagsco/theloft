<?php
/**
 * The template for displaying standard pages with sidebar.
 *
 * @package Zoomify
 */

get_header(); ?>

	<div class="tr-container">

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- end .tr-container -->

<?php get_footer(); ?>