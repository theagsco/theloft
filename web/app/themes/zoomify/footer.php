 <?php
/**
 * The template for displaying the footer.
 *
 * @package Zoomify
 */
?>

</main><!-- end .cd-content -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">

    <div class="tr-container">

		<?php get_sidebar( 'footer' ); ?>

		<div id="site-info">

    <?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="footer-social-nav" class="footer-social-nav" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>

			<ul class="credit">
				<li><?php echo esc_html( apply_filters( 'zoomify_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?></li>
				<li><?php _e('Proudly powered by', 'zoomify') ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'zoomify' ) ); ?>" ><?php _e('WordPress.', 'zoomify') ?></a></li>
        <?php if ( apply_filters( 'zoomify_credit_link', true ) ) { ?>
        <li><?php 
            printf( '%1$s designed by <a href="%2$s" alt="%3$s" title="%3$s" rel="designer">%4$s</a>',
              get_bloginfo( 'name', 'display' ), 
              esc_url( __( 'http://www.themerobo.com/', 'zoomify' ) ),
              _x( 'Premium WordPress Themes by ThemeRobo', 'Used before publish date.', 'zoomify' ),
              _x( 'ThemeRobo', 'Used before publish date.', 'zoomify' )
            ); ?>
        </li>
			  <?php } ?>
			</ul><!-- end .credit -->

		</div><!-- end #site-info -->

    </div><!-- end .tr-container -->

	</footer><!-- end #colophon -->

<?php wp_footer(); ?>

</body>
</html>