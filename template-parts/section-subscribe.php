<?php
$bonkers_enable_section = get_option( 'bonkers_addons_subscribe_enable', true );
$bonkers_mailchimp_link = get_option( 'bonkers_addons_subscribe_mailchimp_link' );

if ( $bonkers_enable_section || is_customize_preview() ) :
	?>
	<div id="bonkers-subscribe-section" class="bonkers-subscribe-section">

		<div class="bonkers-subscribe-content">
			<?php $bonkers_subscribe_title = get_option( 'bonkers_addons_subscribe_title', esc_html__( 'Subscribe', 'bonkers' ) ); ?>
			<h3 class="bonkers-subscribe-title"><?php echo esc_html( $bonkers_subscribe_title ); ?></h3>
			<div class="bonkers-subscribe-text">
				<?php
				$bonkers_subscribe_text = get_option( 'bonkers_addons_subscribe_text' );
				echo wp_kses_post( $bonkers_subscribe_text );
				?>
			</div>
			<div class="bonkers-subscribre-form-wrapper">
				<?php
				$bonkers_subscribe_link_title       = get_option( 'bonkers_addons_subscribe_link_title', esc_html__( 'Subscribe', 'bonkers' ) );
				$bonkers_subscribe_link_placeholder = get_option( 'bonkers_addons_subscribe_link_placeholder', esc_html__( 'Enter your email...', 'bonkers' ) );
				if ( $bonkers_mailchimp_link ) {
					?>
					<form action="<?php echo esc_url( $bonkers_mailchimp_link ); ?>" method="post" target="_blank" class="contact-form commentsblock">
						<div>
							<input type="email" name="EMAIL" id="g6-email" value="" class="email" placeholder="<?php echo esc_attr( $bonkers_subscribe_link_placeholder ); ?>" required="" aria-required="true">
						</div>
						<p class="contact-submit">
							<input type="submit" name="subscribe" value="<?php echo esc_attr( $bonkers_subscribe_link_title ); ?>" class="pushbutton-wide">
						</p>
					</form>
					<?php
				};
				?>

			</div>
		</div>

	</div><!-- bonkers-subscribe-section -->
<?php
endif;
