<?php
/**
 * Title: Testimonial
 * Slug: bonkers/testimonial
 * Categories: bonkers, testimonials, text
 * Description: A single quotation on a tinted band, credited to the person who said it.
 *
 * @package Bonkers
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:quote {"className":"is-style-bonkers-plain"} -->
	<blockquote class="wp-block-quote is-style-bonkers-plain">
		<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size"><?php echo esc_html_x( 'One or two sentences in the client\'s own words, about what changed for them. Short quotations read better than long ones.', 'Pattern quotation', 'bonkers' ); ?></p>
		<!-- /wp:paragraph -->
		<cite><?php echo esc_html_x( 'Name, Company', 'Pattern quotation credit', 'bonkers' ); ?></cite>
	</blockquote>
	<!-- /wp:quote -->
</div>
<!-- /wp:group -->
