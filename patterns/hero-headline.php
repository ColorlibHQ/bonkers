<?php
/**
 * Title: Hero headline
 * Slug: bonkers/hero-headline
 * Categories: bonkers, banner, call-to-action
 * Description: A full-width banner with a headline, a line of copy and two buttons.
 *
 * @package Bonkers
 */

?>
<!-- wp:cover {"overlayColor":"dark","dimRatio":100,"minHeight":520,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:520px"><span aria-hidden="true" class="wp-block-cover__background has-dark-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:heading {"textAlign":"center","level":1,"textColor":"base","fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color has-xx-large-font-size"><?php echo esc_html_x( 'Work worth showing', 'Pattern headline', 'bonkers' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"large"} -->
	<p class="has-text-align-center has-base-color has-text-color has-large-font-size"><?php echo esc_html_x( 'A short line about what you do and who you do it for. Two sentences at most.', 'Pattern copy', 'bonkers' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'See the work', 'Pattern button', 'bonkers' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-bonkers-outline"} -->
		<div class="wp-block-button is-style-bonkers-outline"><a class="wp-block-button__link wp-element-button"><?php echo esc_html_x( 'Get in touch', 'Pattern button', 'bonkers' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->
