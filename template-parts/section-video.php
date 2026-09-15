<?php
/**
 * Front page: video.
 *
 * Until 1.1.0 this ran the URL through [video src="..."], which is WordPress's
 * shortcode for a self-hosted file. Given a YouTube or Vimeo link -- which is
 * what the Customizer asks for and what the demo used -- it produced a <video>
 * element pointing at a web page, so the section rendered a black box.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'video_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

$bonkers_video_url   = bonkers_option( 'video_url', '' );
$bonkers_video_title = bonkers_option( 'video_title', esc_html__( 'Your success is our most important priority', 'bonkers' ) );
$bonkers_video_text  = bonkers_option( 'video_text', '' );
$bonkers_video_embed = bonkers_video_embed( $bonkers_video_url, bonkers_option( 'video_poster', '' ) );

// A section whose only purpose is the video is not worth a band of empty space.
if ( '' === $bonkers_video_embed && ! is_customize_preview() ) {
	return;
}
?>
<div id="bonkers-video-section" class="bonkers-video-section" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>
	<?php if ( $bonkers_video_title ) : ?>
		<h2 class="bonkers-video-title"><?php echo esc_html( $bonkers_video_title ); ?></h2>
	<?php endif; ?>

	<?php if ( $bonkers_video_text ) : ?>
		<div class="bonkers-video-content"><?php echo wp_kses_post( wpautop( $bonkers_video_text ) ); ?></div>
	<?php endif; ?>

	<?php if ( $bonkers_video_embed ) : ?>
		<div class="bonkers-video-video"><?php echo $bonkers_video_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- oEmbed/shortcode output. ?></div>
	<?php endif; ?>
</div><!-- bonkers-video-section -->
