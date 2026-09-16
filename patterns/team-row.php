<?php
/**
 * Title: Team row
 * Slug: bonkers/team-row
 * Categories: bonkers, columns, about
 * Description: Portraits with a name and a role beneath each, for an about page.
 *
 * @package Bonkers
 */

$bonkers_images = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'The people', 'Pattern heading', 'bonkers' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:separator {"className":"is-style-bonkers-short"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-bonkers-short"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"align":"center","width":"180px","sizeSlug":"large","linkDestination":"none","className":"is-style-bonkers-rounded"} -->
			<figure class="wp-block-image aligncenter size-large is-style-bonkers-rounded is-resized"><img src="<?php echo esc_url( $bonkers_images . 'member1.jpg' ); ?>" alt="" style="width:180px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_x( 'First name Last name', 'Pattern name', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
			<p class="has-text-align-center has-muted-color has-text-color has-small-font-size"><?php echo esc_html_x( 'Photographer', 'Pattern role', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"align":"center","width":"180px","sizeSlug":"large","linkDestination":"none","className":"is-style-bonkers-rounded"} -->
			<figure class="wp-block-image aligncenter size-large is-style-bonkers-rounded is-resized"><img src="<?php echo esc_url( $bonkers_images . 'member2.jpg' ); ?>" alt="" style="width:180px"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html_x( 'First name Last name', 'Pattern name', 'bonkers' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"muted","fontSize":"small"} -->
			<p class="has-text-align-center has-muted-color has-text-color has-small-font-size"><?php echo esc_html_x( 'Art director', 'Pattern role', 'bonkers' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
