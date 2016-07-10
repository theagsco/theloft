<?php
/**
 * The default template for displaying content
 *
 * @package Zoomify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-details">
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a>
			</div><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'comment 0', 'zoomify' ) . '</span>', __( 'comment 1', 'zoomify' ), __( 'comments %', 'zoomify' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'zoomify' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!--end .entry-details -->
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'zoomify' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	</header><!--end .entry-header -->

	<?php if ( is_search() && ! get_post_format() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- end .entry-content -->

	<?php else : ?>

	<div class="entry-content clearfix">
    <?php
      // Display excerpt if auto excerpts are enabled in the admin
      if ( get_theme_mod( 'zoomify_blog_exceprt', true ) && ! get_post_format() && ! is_sticky() ) :

          // Check if the post tag is using the "more" tag
          if ( strpos( get_the_content(), 'more-link' ) ) :

              // Display the content up to the more tag
              the_content( '', '&hellip;' );

          // Otherwise display custom excerpt
          else :

              // Display custom excerpt
              the_excerpt();

          endif;

      // If excerpts are disabled, display full content
      else :

          the_content( '', '&hellip;' );

    endif; ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'zoomify' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<?php endif; ?>

	<footer class="entry-footer clearfix">
    <?php
    // Read more link
    zoomify_post_readmore_link(); ?>
	</footer><!-- end .entry-footer -->

</article><!-- end post -<?php the_ID(); ?> -->