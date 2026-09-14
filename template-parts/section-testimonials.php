<?php
/**
 * Front page: testimonials. New in 1.1.0.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'testimonials_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

if ( ! is_active_sidebar( 'testimonials-section' ) ) {
	return;
}

$bonkers_title = bonkers_option( 'testimonials_title', esc_html__( 'What clients say', 'bonkers' ) );
?>
<div id="bonkers-testimonials-section" class="bonkers-testimonials-section">
	<div class="container">
		<?php if ( $bonkers_title ) : ?>
			<h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_title ); ?></h2>
		<?php endif; ?>
		<div class="row">
			<?php dynamic_sidebar( 'testimonials-section' ); ?>
		</div>
	</div>
</div><!-- bonkers-testimonials-section -->
