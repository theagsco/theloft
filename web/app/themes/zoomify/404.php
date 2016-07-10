<?php
/**
 * The template for displaying 404 error pages.
 *
 * @package Zoomify
 */

get_header(); ?>

		<div class="tr-container">

			<article id="post-0" class="page no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'zoomify' ); ?></h1>
				</header><!--end .entry-header -->

				<div class="entry-content clearfix">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try another search term?', 'zoomify' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- end .entry-content -->
			</article><!-- end #post-0 -->

		</div><!-- end .tr-container -->

<?php get_footer(); ?>