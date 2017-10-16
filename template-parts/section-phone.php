<?php
$bonkers_enable_section = get_option( 'bonkers_addons_phone_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
	?>
	<div id="bonkers-phone-section" class="bonkers-phone-section" <<?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>

		<?php
		if ( is_active_sidebar( 'phone-section-left' ) ) {

			echo '<div class="bonkers-phone-services bonkers-phone-left">';

			dynamic_sidebar( 'phone-section-left' );

			echo '</div>';
		}

		$bonkers_phone_image = get_option( 'bonkers_addons_phone_image' );
		if ( is_numeric( $bonkers_phone_image ) ) {
			$bonkers_phone_image = wp_get_attachment_url( $bonkers_phone_image );
		}
		?>

		<div class="bonkers-phone-image">
			<div class="bonkers-phone-screenshot" <?php echo $bonkers_phone_image ? 'style="background-image: url(' . esc_url( $bonkers_phone_image ) . ')"' : ''; ?>></div>
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/phone_bck.png" alt="">
		</div>

		<?php
		if ( is_active_sidebar( 'phone-section-right' ) ) {

			echo '<div class="bonkers-phone-services bonkers-phone-right">';

			dynamic_sidebar( 'phone-section-right' );

			echo '</div>';

		}
		?>

	</div><!-- bonkers-phone-section -->
<?php
endif;
