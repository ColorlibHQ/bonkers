<?php
$bonkers_enable_section = get_option( 'bonkers_addons_services_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :

	$bonkers_image_css_class = 'bonkers-image-left';
	$bonkers_image_layout    = get_option( 'bonkers_addons_image_layout', 'left' );
	if ( 'right' == $bonkers_image_layout ) {
		$bonkers_image_css_class = 'bonkers-image-right';
	}
	?>
	<div id="bonkers-image-section" class="bonkers-image-section <?php echo esc_attr( $bonkers_image_css_class ); ?>" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>

		<?php
		$bonkers_image_image = get_option( 'bonkers_addons_image_image', esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_JBW2PXDOL6.jpg' );
		if ( is_numeric( $bonkers_image_image ) ) {
			$bonkers_image_image = wp_get_attachment_url( $bonkers_image_image );
		}
		$bonkers_image_title      = get_option( 'bonkers_addons_image_title', esc_html__( 'Start Growing your Business', 'bonkers' ) );
		$bonkers_image_link_title = get_option( 'bonkers_addons_image_link_title', esc_html__( 'Learn More', 'bonkers' ) );
		?>

		<div class="bonkers-image-section-image" <?php echo $bonkers_image_image ? 'style="background-image: url(' . esc_url( $bonkers_image_image ) . ')"' : ''; ?>>

		</div>
		<div class="bonkers-image-section-text">
			<h3 class="bonkers-image-section-title"><?php echo wp_kses_post( $bonkers_image_title ); ?></h3>
			<div class="bonkers-image-section-content">
				<?php
				$bonkers_image_text = get_option( 'bonkers_addons_image_text' );
				echo wp_kses_post( $bonkers_image_text );
				?>
				<?php if ( ! empty( $bonkers_image_link_title ) || is_customize_preview() ) { ?>
					<div class="clearfix"></div>
					<a href="<?php echo esc_url( get_option( 'bonkers_addons_image_link_url', '#' ) ); ?>" class="ql_border_btn"><?php echo esc_html( $bonkers_image_link_title ); ?></a>
				<?php } ?>
			</div>
		</div>

	</div><!-- bonkers-image-section -->
	<?php
endif;
