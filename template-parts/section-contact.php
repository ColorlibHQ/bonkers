<?php
$bonkers_enable_section = get_option( 'bonkers_addons_contact_enable', true );
$bonkers_contact_title  = get_option( 'bonkers_addons_contact_title', esc_html__( 'Contact', 'bonkers' ) );
$bonkers_contact_form   = get_option( 'bonkers_addons_contact_form' );
if ( $bonkers_enable_section || is_customize_preview() ) :
	?>
	<div id="bonkers-contact-section" class="bonkers-contact-section" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>

		<?php
		$bonkers_contact_key = get_option( 'bonkers_addons_contact_key' );
		if ( ! empty( $bonkers_contact_key ) ) {
			?>
			<div class="bonkers-contact-map">
				<div id="bonkers-map"></div>
			</div>
		<?php } ?>
		<?php if ( $bonkers_contact_title || $bonkers_contact_form ) { ?>
			<div class="bonkers-contact-content">
				<?php if ( $bonkers_contact_title ) { ?>
					<h3 class="bonkers-contact-title"><?php echo esc_html( $bonkers_contact_title ); ?></h3>
				<?php } ?>
				<div class="bonkers-contact-form">
					<?php
					if ( $bonkers_contact_form ) {
						echo do_shortcode( '[contact-form-7 id="' . esc_attr( $bonkers_contact_form ) . '"]' );
					}
					?>
				</div>
			</div>
		<?php } ?>
	</div><!-- bonkers-contact-section -->
<?php
endif;
