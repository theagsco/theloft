<article <?php post_class(); ?>>
	<?php
	$the_query = new WP_Query(array(
		'posts_per_page' => 4
	));
	while ( $the_query->have_posts() ) :
	$the_query->the_post();
?>
		<?php the_post_thumbnail();?>
		<?php the_content();?>
<?php
	endwhile;
	wp_reset_postdata();
?>
</article>
