<?php
/**
 * Title: Numbers band
 * Slug: bonkers/stats-band
 * Categories: bonkers, columns, about
 * Description: Four figures on a dark band, for years, clients or projects.
 *
 * @package Bonkers
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"dark","textColor":"base","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-dark-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"x-large"} -->
			<p class="has-text-align-center has-base-color has-text-color has-x-large-font-size"><?php echo esc_html_x( '12', 'Pattern figure', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html_x( 'Years in the trade', 'Pattern figure label', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"x-large"} -->
			<p class="has-text-align-center has-base-color has-text-color has-x-large-font-size"><?php echo esc_html_x( '240', 'Pattern figure', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html_x( 'Projects delivered', 'Pattern figure label', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"x-large"} -->
			<p class="has-text-align-center has-base-color has-text-color has-x-large-font-size"><?php echo esc_html_x( '38', 'Pattern figure', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html_x( 'Regular clients', 'Pattern figure label', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"align":"center","textColor":"base","fontSize":"x-large"} -->
			<p class="has-text-align-center has-base-color has-text-color has-x-large-font-size"><?php echo esc_html_x( '48h', 'Pattern figure', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html_x( 'Average turnaround', 'Pattern figure label', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
