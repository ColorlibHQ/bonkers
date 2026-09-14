<?php
/**
 * Front page: newsletter sign-up.
 *
 * The form used to render only when a Mailchimp URL was set, so an unconfigured
 * site showed a heading, a paragraph and then nothing -- which reads as broken
 * rather than as unconfigured. Now the section only appears when it has
 * somewhere to send the address, and says so in the Customizer preview when it
 * does not.
 *
 * A theme must not process submissions, so the form posts straight to the
 * provider's own URL.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'subscribe_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

$bonkers_action = bonkers_option( 'subscribe_mailchimp_link', '' );

if ( '' === $bonkers_action && ! is_customize_preview() ) {
	return;
}

$bonkers_title       = bonkers_option( 'subscribe_title', esc_html__( 'Subscribe', 'bonkers' ) );
$bonkers_text        = bonkers_option( 'subscribe_text', '' );
$bonkers_button      = bonkers_option( 'subscribe_link_title', esc_html__( 'Subscribe', 'bonkers' ) );
$bonkers_placeholder = bonkers_option( 'subscribe_link_placeholder', esc_html__( 'Enter your email...', 'bonkers' ) );
$bonkers_field_id    = 'bonkers-subscribe-email';
?>
<div id="bonkers-subscribe-section" class="bonkers-subscribe-section" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>
	<div class="container">
		<div class="bonkers-subscribe-content">
			<?php if ( $bonkers_title ) : ?>
				<h3 class="bonkers-subscribe-title"><?php echo esc_html( $bonkers_title ); ?></h3>
			<?php endif; ?>

			<?php if ( $bonkers_text ) : ?>
				<div class="bonkers-subscribe-text"><?php echo wp_kses_post( wpautop( $bonkers_text ) ); ?></div>
			<?php endif; ?>

			<div class="bonkers-subscribe-form-wrapper">
				<?php if ( $bonkers_action ) : ?>
					<form action="<?php echo esc_url( $bonkers_action ); ?>" method="post" target="_blank" class="bonkers-subscribe-form">
						<label class="screen-reader-text" for="<?php echo esc_attr( $bonkers_field_id ); ?>">
							<?php echo esc_html( $bonkers_placeholder ); ?>
						</label>
						<input
							type="email"
							name="EMAIL"
							id="<?php echo esc_attr( $bonkers_field_id ); ?>"
							class="bonkers-subscribe-email"
							placeholder="<?php echo esc_attr( $bonkers_placeholder ); ?>"
							required />
						<button type="submit" class="bonkers-subscribe-submit">
							<?php echo esc_html( $bonkers_button ); ?>
						</button>
					</form>
				<?php else : ?>
					<p class="bonkers-subscribe-setup">
						<?php esc_html_e( 'Add your newsletter form URL in the Customizer and this section will appear on the site.', 'bonkers' ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div><!-- bonkers-subscribe-section -->
