<?php
/**
 * A single number with a caption. New in 1.1.0.
 *
 * @package Bonkers
 */

defined( 'ABSPATH' ) || exit;

class Bonkers_Stat extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'stat-widget',
			esc_attr__( 'Bonkers - Number', 'bonkers' ),
			array(
				'description'                 => esc_attr__( 'A figure worth stating, with a caption.', 'bonkers' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$value   = isset( $instance['value'] ) ? $instance['value'] : '';
		$caption = isset( $instance['caption'] ) ? $instance['caption'] : '';
		?>
		<div class="bonkers-stat col-md-3 col-sm-6">
			<span class="bonkers-stat__value"><?php echo esc_html( $value ); ?></span>
			<span class="bonkers-stat__caption"><?php echo esc_html( $caption ); ?></span>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$value   = isset( $instance['value'] ) ? $instance['value'] : '';
		$caption = isset( $instance['caption'] ) ? $instance['caption'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'value' ) ); ?>"><?php esc_html_e( 'Figure', 'bonkers' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'value' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'value' ) ); ?>" value="<?php echo esc_attr( $value ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'caption' ) ); ?>"><?php esc_html_e( 'Caption', 'bonkers' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'caption' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'caption' ) ); ?>" value="<?php echo esc_attr( $caption ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return array(
			'value'   => sanitize_text_field( $new_instance['value'] ),
			'caption' => sanitize_text_field( $new_instance['caption'] ),
		);
	}
}
