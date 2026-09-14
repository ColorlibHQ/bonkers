<?php
/**
 * Testimonial widget. New in 1.1.0.
 *
 * @package Bonkers
 */

defined( 'ABSPATH' ) || exit;

class Bonkers_Testimonial extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'testimonial-widget',
			esc_attr__( 'Bonkers - Testimonial', 'bonkers' ),
			array(
				'description'                 => esc_attr__( 'A quote, who said it, and their photo.', 'bonkers' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$quote  = isset( $instance['quote'] ) ? $instance['quote'] : '';
		$name   = isset( $instance['name'] ) ? $instance['name'] : '';
		$role   = isset( $instance['role'] ) ? $instance['role'] : '';
		$image  = isset( $instance['image_uri'] ) ? $instance['image_uri'] : '';
		?>
		<div class="bonkers-testimonial col-md-4 col-sm-6">
			<figure class="bonkers-testimonial__card">
				<blockquote class="bonkers-testimonial__quote"><?php echo wp_kses_post( wpautop( $quote ) ); ?></blockquote>
				<figcaption class="bonkers-testimonial__by">
					<?php if ( $image ) : ?>
						<img class="bonkers-testimonial__avatar" src="<?php echo esc_url( $image ); ?>" alt="" loading="lazy" />
					<?php endif; ?>
					<span class="bonkers-testimonial__meta">
						<?php if ( $name ) : ?>
							<span class="bonkers-testimonial__name"><?php echo esc_html( $name ); ?></span>
						<?php endif; ?>
						<?php if ( $role ) : ?>
							<span class="bonkers-testimonial__role"><?php echo esc_html( $role ); ?></span>
						<?php endif; ?>
					</span>
				</figcaption>
			</figure>
		</div>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$quote = isset( $instance['quote'] ) ? $instance['quote'] : '';
		$name  = isset( $instance['name'] ) ? $instance['name'] : '';
		$role  = isset( $instance['role'] ) ? $instance['role'] : '';
		$image = isset( $instance['image_uri'] ) ? $instance['image_uri'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'quote' ) ); ?>"><?php esc_html_e( 'Quote', 'bonkers' ); ?></label>
			<textarea class="widefat" rows="4" id="<?php echo esc_attr( $this->get_field_id( 'quote' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quote' ) ); ?>"><?php echo esc_textarea( $quote ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name', 'bonkers' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" value="<?php echo esc_attr( $name ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'role' ) ); ?>"><?php esc_html_e( 'Role or company', 'bonkers' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'role' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'role' ) ); ?>" value="<?php echo esc_attr( $role ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image_uri' ) ); ?>"><?php esc_html_e( 'Photo URL', 'bonkers' ); ?></label>
			<input class="widefat" type="url" id="<?php echo esc_attr( $this->get_field_id( 'image_uri' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image_uri' ) ); ?>" value="<?php echo esc_attr( $image ); ?>" />
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		return array(
			'quote'     => wp_kses_post( $new_instance['quote'] ),
			'name'      => sanitize_text_field( $new_instance['name'] ),
			'role'      => sanitize_text_field( $new_instance['role'] ),
			'image_uri' => esc_url_raw( $new_instance['image_uri'] ),
		);
	}
}
