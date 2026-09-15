<?php
/**
 * Front page: contact.
 *
 * The map needs a Google Maps API key, which belongs to the site rather than to
 * the theme. Without one the section now shows the address as text with a link
 * to Google Maps, instead of leaving a gap where a map should be.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'contact_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

$bonkers_contact_title = bonkers_option( 'contact_title', esc_html__( 'Contact', 'bonkers' ) );
$bonkers_contact_form  = bonkers_option( 'contact_form', '' );
$bonkers_address       = bonkers_option( 'contact_address', '' );
// Read through the helper, not the raw option: since 1.1.0 the key can also come
// from the Customizer, and reading the option directly missed that.
$bonkers_has_map       = '' !== bonkers_maps_api_key() && false !== bonkers_get_coordinates();
$bonkers_form_html     = bonkers_contact_form_html( $bonkers_contact_form );
$bonkers_has_form      = '' !== $bonkers_form_html;
?>
<div id="bonkers-contact-section" class="bonkers-contact-section <?php echo $bonkers_has_map ? 'has-map' : 'no-map'; ?>" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>

	<?php if ( $bonkers_has_map ) : ?>
		<div class="bonkers-contact-map">
			<div id="bonkers-map"></div>
		</div>
	<?php endif; ?>

	<div class="bonkers-contact-content">
		<?php if ( $bonkers_contact_title ) : ?>
			<h3 class="bonkers-contact-title"><?php echo esc_html( $bonkers_contact_title ); ?></h3>
		<?php endif; ?>

		<?php if ( ! $bonkers_has_map && $bonkers_address ) : ?>
			<address class="bonkers-contact-address">
				<?php echo esc_html( $bonkers_address ); ?>
				<a class="bonkers-contact-map-link"
					href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $bonkers_address ) ); ?>"
					target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'View on Google Maps', 'bonkers' ); ?>
				</a>
			</address>
		<?php endif; ?>

		<?php if ( $bonkers_has_form ) : ?>
			<div class="bonkers-contact-form">
				<?php echo $bonkers_form_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- form plugin output. ?>
			</div>
		<?php endif; ?>
	</div>
</div><!-- bonkers-contact-section -->
