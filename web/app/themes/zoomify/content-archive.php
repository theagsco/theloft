<?php
/**
 * The template used for displaying page content.
 *
 * @package Zoomify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- end .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>

			<h6 class="headline-tags"><?php _e('Filter by Tags', 'zoomify') ?></h6>
			<div class="archive-tags clearfix">
				<?php wp_tag_cloud('orderby=count&number=30'); ?>
			</div><!-- end .archive-tags -->

			<h6><?php _e('The Latest 30 Posts', 'zoomify') ?></h6>
			<ul class="latest-posts-list">
				<?php wp_get_archives('type=postbypost&limit=30'); ?>
			</ul><!-- end .latest-posts-list -->

			<h6><?php _e('The Monthly Archive', 'zoomify') ?></h6>
			<ul class="monthly-archive-list">
				<?php wp_get_archives('type=monthly'); ?>
			</ul><!-- end .monthly-archive-list -->

	</div><!-- end .entry-content -->

</article><!-- end post-<?php the_ID(); ?> -->