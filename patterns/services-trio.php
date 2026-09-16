<?php
/**
 * Title: Three services
 * Slug: bonkers/services-trio
 * Categories: bonkers, columns, services
 * Description: Three cards describing what you offer, each with a short checklist.
 *
 * @package Bonkers
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'What we do', 'Pattern heading', 'bonkers' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:separator {"className":"is-style-bonkers-short"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-bonkers-short"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","className":"is-style-bonkers-cards","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide is-style-bonkers-cards" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Photography', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'One sentence on the service and what a client gets at the end of it.', 'Pattern copy', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-bonkers-checks"} -->
			<ul class="wp-block-list is-style-bonkers-checks">
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Half or full day', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Retouched finals', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Licensed for print and web', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Art direction', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'One sentence on the service and what a client gets at the end of it.', 'Pattern copy', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-bonkers-checks"} -->
			<ul class="wp-block-list is-style-bonkers-checks">
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Moodboards and casting', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'On-set styling', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Shot lists', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html_x( 'Post production', 'Pattern heading', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"textColor":"body"} -->
			<p class="has-body-color has-text-color"><?php echo esc_html_x( 'One sentence on the service and what a client gets at the end of it.', 'Pattern copy', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"is-style-bonkers-checks"} -->
			<ul class="wp-block-list is-style-bonkers-checks">
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Colour matching', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Crops for every platform', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html_x( 'Delivery in 48 hours', 'Pattern list item', 'bonkers' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
