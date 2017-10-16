<?php
$bonkers_enable_section = get_option( 'bonkers_addons_video_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
	?>
	<div id="bonkers-video-section" class="bonkers-video-section" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>
		<?php $bonkers_video_title = get_option( 'bonkers_addons_video_title', esc_html__( 'Your success is our most important priority', 'bonkers' ) ); ?>
		<h2 class="bonkers-video-title"><?php echo esc_html( $bonkers_video_title ); ?></h2>

		<div class="bonkers-video-content">
			<?php
			$bonkers_video_text = get_option( 'bonkers_addons_video_text' );
			echo wp_kses_post( $bonkers_video_text );
			?>
		</div>

		<div class="bonkers-video-video">
			<?php $bonkers_addons_video_url = get_option( 'bonkers_addons_video_url' ); ?><?php echo do_shortcode( '[video src="' . esc_url( $bonkers_addons_video_url ) . '"]' ); ?>
		</div>
	</div><!-- bonkers-video-section -->
<?php
endif;
