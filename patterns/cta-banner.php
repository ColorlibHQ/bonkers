<?php
/**
 * Title: Call to action banner
 * Slug: bonkers/cta-banner
 * Categories: bonkers, call-to-action, banner
 * Description: A dark band with one line of copy and a single button.
 *
 * @package Bonkers
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"ink","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-ink-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2,"textColor":"base"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color"><?php echo esc_html_x( 'Got a shoot in mind?', 'Pattern heading', 'bonkers' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html_x( 'Tell us the dates and what you need photographed. We will come back with a plan and a price.', 'Pattern copy', 'bonkers' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Book a shoot', 'Pattern button', 'bonkers' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
