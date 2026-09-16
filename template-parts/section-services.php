<?php
$bonkers_enable_section = bonkers_option( 'services_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :

	?>
	<div id="bonkers-services-section" class="bonkers-services-section" <?php echo ( $bonkers_enable_section ) ? '' : 'style="display: none;"'; ?>>
		<div class="container">
			<div class="row">
				<?php
				if ( is_active_sidebar( 'services-section' ) ) {

					dynamic_sidebar( 'services-section' );

				}
				?>
			</div><!-- row-->
		</div><!-- /container -->
	</div><!-- services-section -->
<?php
endif;
