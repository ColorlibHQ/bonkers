<?php
/**
 * Front page: contact.
 *
 * Two layouts. With a working Google Maps key the original design stands: a dark
 * panel floating over a full-bleed map. Without one there is nothing for that
 * panel to float over, and its white-on-dark form fields and transparent button
 * read as missing on a light section -- so the section switches to a two-column
 * layout of its own: who to contact and how on the left, the form in a card on
 * the right.
 *
 * The no-map layout deliberately does not reuse .bonkers-contact-content. The
 * compiled stylesheet styles every field inside that class four selectors deep
 * for the dark panel, and opting out of the class is cleaner than out-ranking
 * each of those rules.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'contact_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

$bonkers_contact_title = bonkers_option( 'contact_title', esc_html__( 'Contact', 'bonkers' ) );
$bonkers_contact_intro = bonkers_option( 'contact_intro', '' );
$bonkers_contact_form  = bonkers_option( 'contact_form', '' );
$bonkers_address       = bonkers_option( 'contact_address', '' );
$bonkers_email         = bonkers_option( 'contact_email', '' );
$bonkers_phone         = bonkers_option( 'contact_phone', '' );
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

		<div class="bonkers-contact-content">
			<?php if ( $bonkers_contact_title ) : ?>
				<h3 class="bonkers-contact-title"><?php echo esc_html( $bonkers_contact_title ); ?></h3>
			<?php endif; ?>
			<?php if ( $bonkers_has_form ) : ?>
				<div class="bonkers-contact-form">
					<?php echo $bonkers_form_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- form plugin output. ?>
				</div>
			<?php endif; ?>
		</div>

	<?php else : ?>

		<div class="container">
			<div class="bonkers-contact-layout <?php echo $bonkers_has_form ? 'has-form' : 'no-form'; ?>">

				<div class="bonkers-contact-info">
					<?php if ( $bonkers_contact_title ) : ?>
						<h2 class="bonkers-contact-heading"><?php echo esc_html( $bonkers_contact_title ); ?></h2>
					<?php endif; ?>

					<?php if ( $bonkers_contact_intro ) : ?>
						<p class="bonkers-contact-intro"><?php echo esc_html( $bonkers_contact_intro ); ?></p>
					<?php endif; ?>

					<?php if ( $bonkers_address || $bonkers_email || $bonkers_phone ) : ?>
						<ul class="bonkers-contact-details">
							<?php if ( $bonkers_email ) : ?>
								<li>
									<span class="bonkers-contact-icon fa fa-envelope-o" aria-hidden="true"></span>
									<span>
										<span class="bonkers-contact-label"><?php esc_html_e( 'Email', 'bonkers' ); ?></span>
										<a class="bonkers-contact-value" href="<?php echo esc_url( 'mailto:' . antispambot( $bonkers_email ) ); ?>"><?php echo esc_html( antispambot( $bonkers_email ) ); ?></a>
									</span>
								</li>
							<?php endif; ?>

							<?php if ( $bonkers_phone ) : ?>
								<li>
									<span class="bonkers-contact-icon fa fa-phone" aria-hidden="true"></span>
									<span>
										<span class="bonkers-contact-label"><?php esc_html_e( 'Phone', 'bonkers' ); ?></span>
										<a class="bonkers-contact-value" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $bonkers_phone ) ); ?>"><?php echo esc_html( $bonkers_phone ); ?></a>
									</span>
								</li>
							<?php endif; ?>

							<?php if ( $bonkers_address ) : ?>
								<li>
									<span class="bonkers-contact-icon fa fa-map-marker" aria-hidden="true"></span>
									<span>
										<span class="bonkers-contact-label"><?php esc_html_e( 'Studio', 'bonkers' ); ?></span>
										<address class="bonkers-contact-value"><?php echo esc_html( $bonkers_address ); ?></address>
										<a class="bonkers-contact-map-link"
											href="<?php echo esc_url( 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $bonkers_address ) ); ?>"
											target="_blank" rel="noopener noreferrer">
											<?php esc_html_e( 'View on Google Maps', 'bonkers' ); ?>
										</a>
									</span>
								</li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>

				<?php if ( $bonkers_has_form ) : ?>
					<div class="bonkers-contact-card">
						<?php echo $bonkers_form_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- form plugin output. ?>
					</div>
				<?php endif; ?>

			</div>
		</div>

	<?php endif; ?>
</div><!-- bonkers-contact-section -->
