<?php
/**
 * Title: Contact details
 * Slug: bonkers/contact-details
 * Categories: bonkers, columns, contact
 * Description: Studio address, email and opening hours in three columns.
 *
 * @package Bonkers
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Come and find us', 'Pattern heading', 'bonkers' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:separator {"className":"is-style-bonkers-short"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-bonkers-short"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","className":"is-style-bonkers-cards","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide is-style-bonkers-cards" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'The studio', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'Street address', 'Pattern address line', 'bonkers' ); ?><br><?php echo esc_html_x( 'City and postcode', 'Pattern address line', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Get in touch', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'hello@example.com', 'Pattern email', 'bonkers' ); ?><br><?php echo esc_html_x( '+1 (000) 000-0000', 'Pattern telephone', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Opening hours', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'Monday to Friday, 9 to 6', 'Pattern hours', 'bonkers' ); ?><br><?php echo esc_html_x( 'Weekends by appointment', 'Pattern hours', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
