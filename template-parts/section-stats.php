<?php
/**
 * Front page: numbers. New in 1.1.0.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'stats_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

if ( ! is_active_sidebar( 'stats-section' ) ) {
	return;
}
?>
<div id="bonkers-stats-section" class="bonkers-stats-section">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'stats-section' ); ?>
		</div>
	</div>
</div><!-- bonkers-stats-section -->
