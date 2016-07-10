<?php
/**
 * Class to create a custom layout control
 */
if ( ! class_exists( 'Zoomify_Layout_Picker_Control' ) ) {
  class Zoomify_Layout_Picker_Control extends WP_Customize_Control {

  	/**
  	* Render the content on the theme customizer page
  	*/
  	public function render_content() {
  		?>
  		<div style="overflow: hidden; zoom: 1;">
  			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

  			<label style="width: 48%; float: left; margin-right: 3.8%; text-align: center;">
  				<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/customizer/controls/img/small_center.png'); ?>" alt="<?php _e( 'Small Content', 'zoomify' ); ?>" style="display: block; width: 100%;" />
  				<input type="radio" value="small" style="margin: 5px 0 0 0;" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'small' ); ?> />
  				<br/>
  			</label>
  			<label style="width: 48%; float: right; text-align: center;">
  				<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/customizer/controls/img/big_center.png'); ?>" alt="<?php _e( 'Big Content', 'zoomify' ); ?>" style="display: block; width: 100%;" />
  				<input type="radio" value="big" style="margin: 5px 0 0 0;" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'big' ); ?> />
  				<br/>
  			</label>
  		</div>
  		<?php
  	}
  }
}