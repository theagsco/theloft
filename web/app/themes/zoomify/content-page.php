<?php
/**
 * The template used for displaying page content.
 *
 * @package Zoomify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- end .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><!-- end .entry-content -->

</article><!-- end post-<?php the_ID(); ?> -->