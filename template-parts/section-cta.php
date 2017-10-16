<?php
$bonkers_enable_section = get_option( 'bonkers_addons_cta_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
	$bonkers_cta_image = get_option( 'bonkers_addons_cta_image', esc_url( get_template_directory_uri() ) . '/assets/images/StockSnap_R7GVMRJWW9.jpg' );
	if ( is_numeric( $bonkers_cta_image ) ) {
		$bonkers_cta_image = wp_get_attachment_url( $bonkers_cta_image );
	}
	$bonkers_cta_link_title = get_option( 'bonkers_addons_cta_link_title', esc_html__( 'Sign Up', 'bonkers' ) );
	$style                  = '';
	if ( ! $bonkers_enable_section ) {
		$style = 'style="display: none;"';
	} else {
		$style = 'style="background-image: url(' . esc_url( $bonkers_cta_image ) . ')"';
	}
	?>
	<div id="bonkers-cta-section" class="bonkers-cta-section" <?php echo $style; ?>>
		<h2 class="bonkers-cta-title"><?php echo wp_kses_post( get_option( 'bonkers_addons_cta_title' ) ); ?></h2>
		<a href="#" class="bonkers-cta-button ql_primary_btn"><?php echo esc_html( $bonkers_cta_link_title ); ?></a>
	</div><!-- bonkers-cta-section -->
	<?php
endif;
