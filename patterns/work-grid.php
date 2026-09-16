<?php
/**
 * Title: Work grid
 * Slug: bonkers/work-grid
 * Categories: bonkers, gallery, portfolio
 * Description: A heading and three captioned images, for showing recent work.
 *
 * @package Bonkers
 */

$bonkers_images = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Recent work', 'Pattern heading', 'bonkers' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
	<p class="has-text-align-center has-muted-color has-text-color"><?php echo esc_html_x( 'A line about the kind of work you take on.', 'Pattern copy', 'bonkers' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-bonkers-rounded"} -->
			<figure class="wp-block-image size-large is-style-bonkers-rounded"><img src="<?php echo esc_url( $bonkers_images . 'StockSnap_1A3MXAT0M6.jpg' ); ?>" alt=""/><figcaption class="wp-element-caption"><?php echo esc_html_x( 'Project name', 'Pattern caption', 'bonkers' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-bonkers-rounded"} -->
			<figure class="wp-block-image size-large is-style-bonkers-rounded"><img src="<?php echo esc_url( $bonkers_images . 'StockSnap_JBW2PXDOL6.jpg' ); ?>" alt=""/><figcaption class="wp-element-caption"><?php echo esc_html_x( 'Project name', 'Pattern caption', 'bonkers' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-bonkers-rounded"} -->
			<figure class="wp-block-image size-large is-style-bonkers-rounded"><img src="<?php echo esc_url( $bonkers_images . 'StockSnap_R7GVMRJWW9.jpg' ); ?>" alt=""/><figcaption class="wp-element-caption"><?php echo esc_html_x( 'Project name', 'Pattern caption', 'bonkers' ); ?></figcaption></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
