<?php
/**
 * The theme's own Customizer controls.
 *
 * These replace Epsilon_Control_Typography, Epsilon_Control_Toggle and
 * Epsilon_Control_Layouts. Each one stores the value in exactly the shape the
 * old control stored it, because inc/scripts/styles.php, footer.php and
 * inc/widget-areas/widget-areas.php already read those shapes and an install
 * upgrading from 1.0.x must not lose its settings.
 *
 * @package Bonkers
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * A checkbox that reads as a switch.
 *
 * Stored as 1/0 because the setting sanitises with absint().
 */
class Bonkers_Customize_Control_Toggle extends WP_Customize_Control {

	public $type = 'bonkers-toggle';

	public function render_content() {
		$id = '_customize-input-' . $this->id;
		?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>
		<label class="bonkers-toggle" for="<?php echo esc_attr( $id ); ?>">
			<input
				id="<?php echo esc_attr( $id ); ?>"
				type="checkbox"
				value="1"
				<?php checked( (bool) $this->value() ); ?>
				<?php $this->link(); ?> />
			<span class="bonkers-toggle__track" aria-hidden="true"></span>
		</label>
		<?php
	}
}

/**
 * Font family, and optionally size.
 *
 * The old control stored a JSON string shaped {"json":{"font-family":…}}, which
 * inc/scripts/styles.php decodes. Keeping that shape means an upgraded install
 * keeps whatever font it was already using.
 */
class Bonkers_Customize_Control_Typography extends WP_Customize_Control {

	public $type = 'bonkers-typography';

	/**
	 * @var bool Whether to offer a size as well as a family.
	 */
	public $show_size = false;

	/**
	 * The font stacks on offer.
	 *
	 * All self-hosted or system fonts -- nothing is fetched from a third party at
	 * page load, which is what the theme used to do via fonts.googleapis.com.
	 *
	 * @return array slug => label
	 */
	public static function families() {
		return array(
			'PT Sans'    => __( 'PT Sans (bundled)', 'bonkers' ),
			'system'     => __( 'System UI', 'bonkers' ),
			'serif'      => __( 'System serif', 'bonkers' ),
			'monospace'  => __( 'System monospace', 'bonkers' ),
		);
	}

	/**
	 * Decode the stored value into its parts.
	 *
	 * @return array
	 */
	protected function parts() {
		$value = $this->value();
		$parts = array();

		if ( is_string( $value ) && '' !== $value ) {
			$decoded = json_decode( $value, true );

			if ( isset( $decoded['json'] ) && is_array( $decoded['json'] ) ) {
				$parts = $decoded['json'];
			}
		}

		return wp_parse_args(
			$parts,
			array(
				'font-family' => 'PT Sans',
				'font-size'   => '16',
			)
		);
	}

	public function render_content() {
		$parts  = $this->parts();
		$family = $parts['font-family'];
		$size   = $parts['font-size'];
		?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div class="bonkers-typography"
			data-setting="<?php echo esc_attr( $this->id ); ?>"
			data-show-size="<?php echo $this->show_size ? '1' : '0'; ?>">

			<label>
				<span class="bonkers-typography__label"><?php esc_html_e( 'Font', 'bonkers' ); ?></span>
				<select class="bonkers-typography__family widefat">
					<?php foreach ( self::families() as $slug => $label ) : ?>
						<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $family, $slug ); ?>>
							<?php echo esc_html( $label ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</label>

			<?php if ( $this->show_size ) : ?>
				<label>
					<span class="bonkers-typography__label"><?php esc_html_e( 'Base size (px)', 'bonkers' ); ?></span>
					<input class="bonkers-typography__size" type="number" min="12" max="24" step="1"
						value="<?php echo esc_attr( $size ); ?>" />
				</label>
			<?php endif; ?>

			<input class="bonkers-typography__value" type="hidden"
				value="<?php echo esc_attr( is_string( $this->value() ) ? $this->value() : '' ); ?>"
				<?php $this->link(); ?> />
		</div>
		<?php
	}
}

/**
 * How many footer columns.
 *
 * Epsilon's control let you drag column spans around; in practice the only
 * thing the theme reads back is columnsCount, so this asks for that directly.
 * The value is still stored as the same JSON object, spans included, so
 * footer.php and widget-areas.php keep working unchanged.
 */
class Bonkers_Customize_Control_Layouts extends WP_Customize_Control {

	public $type = 'bonkers-layouts';

	/**
	 * Build the stored shape for a column count.
	 *
	 * @param int $count 1-4.
	 *
	 * @return string JSON
	 */
	public static function value_for( $count ) {
		$count   = max( 1, min( 4, (int) $count ) );
		$span    = (int) floor( 12 / $count );
		$columns = array();

		for ( $i = 1; $i <= $count; $i++ ) {
			$columns[ $i ] = array(
				'index' => $i,
				'span'  => $span,
			);
		}

		return (string) wp_json_encode(
			array(
				'columnsCount' => $count,
				'columns'      => $columns,
			)
		);
	}

	/**
	 * The currently stored column count.
	 *
	 * @return int
	 */
	protected function current_count() {
		$value = $this->value();

		if ( is_string( $value ) && '' !== $value ) {
			$value = json_decode( $value, true );
		}

		return isset( $value['columnsCount'] ) ? max( 1, min( 4, (int) $value['columnsCount'] ) ) : 4;
	}

	public function render_content() {
		$current = $this->current_count();
		$name    = '_customize-radio-' . $this->id;
		?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div class="bonkers-layouts" data-setting="<?php echo esc_attr( $this->id ); ?>">
			<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
				<label class="bonkers-layouts__option <?php echo $current === $i ? 'is-active' : ''; ?>">
					<input type="radio" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $i ); ?>"
						<?php checked( $current, $i ); ?> />
					<span class="bonkers-layouts__preview" aria-hidden="true">
						<?php for ( $c = 0; $c < $i; $c++ ) : ?>
							<span></span>
						<?php endfor; ?>
					</span>
					<span class="bonkers-layouts__count">
						<?php
						/* translators: %d: number of footer columns. */
						echo esc_html( sprintf( _n( '%d column', '%d columns', $i, 'bonkers' ), $i ) );
						?>
					</span>
				</label>
			<?php endfor; ?>

			<input class="bonkers-layouts__value" type="hidden"
				value="<?php echo esc_attr( is_string( $this->value() ) ? $this->value() : '' ); ?>"
				<?php $this->link(); ?> />
		</div>
		<?php
	}
}
