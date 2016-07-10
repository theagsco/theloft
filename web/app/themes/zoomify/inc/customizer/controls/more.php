<?php
/**
 * Class to create a Customizer control for displaying information
 */
class Zoomify_More_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<span class="customize-control-title"><?php _e( 'Enjoying Zoomify?', 'zoomify' ); ?></span>
			<p>
				<?php
					printf( __( 'Why not leave us a review on %sWordPress.org%s?  We\'d really appreciate it!', 'zoomify' ), '<a href="https://wordpress.org/themes/zoomify">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}