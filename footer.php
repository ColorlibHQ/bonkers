<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bonkers
 */

?>
	<?php if ( ! is_page_template( 'page-templates/template-front-page.php' ) ) { ?>

			</div><!-- /#row -->

		</div><!-- /#container -->

	</main><!-- #main -->

	<?php } ?>

		

		<?php
		$footer_sections = array(
			'first-footer-widgets' => false,
			'second-footer-widgets' => false,
			'third-footer-widgets' => false,
			'fourth-footer-widgets' => false,
		);
		$footer_count = 0;
		$footer_section_class = '';

		foreach ( $footer_sections as $footer_section => $active ) {
			if ( is_active_sidebar( $footer_section ) ) {
				$footer_sections[ $footer_section ] = true;
				$footer_count++;
			}// End if().
		}// End foreach().

		switch ( $footer_count ) {
			case 1:
				$footer_section_class = 'bonkers-footer-1-column';
				break;
			case 2:
				$footer_section_class = 'bonkers-footer-2-column';
				break;
			case 3:
				$footer_section_class = 'bonkers-footer-3-column';
				break;
			case 4:
				$footer_section_class = 'bonkers-footer-4-column';
				break;
			default:
				$footer_section_class = 'bonkers-footer-3-column';
				break;
		}

		?>
	<div class="clearfix"></div>
	<div class="bonkers-footer-wrap">
		<?php
		/*
        *Only show the Footer sections that have widgets
        */
		if ( $footer_count > 0 ) {
		?>

		<footer id="footer" class="site-footer <?php echo esc_attr( $footer_section_class ); ?>">
			<div class="container">
				<div class="row">

					<?php
					foreach ( $footer_sections as $footer_section => $active ) {
						if ( $active ) {
							echo '<div class="footer-column">';

							if ( is_active_sidebar( $footer_section ) ) { if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( $footer_section ) ) : else :

								endif; }// End if().

							echo '</div>';
						}// End if().
					}// End foreach().
					?>
				</div><!-- .row -->
			</div><!-- .container -->
		</footer><!-- #footer -->
		<?php
		}// End if().
		?>




		<div class="sub-footer">
			<?php
				echo '<div class="container">';
			?>
				<div class="row">

					<div class="col-md-7 col-sm-6">

						<p><?php esc_html_e( '&copy; Copyright', 'bonkers' ); ?> <?php echo esc_html( date( 'Y' ) ); ?> <a rel="nofollow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></p>

						<?php
						if ( has_nav_menu( 'footer-menu' ) ) {
							wp_nav_menu(
								array(
									'theme_location'  => 'footer-menu',
									'container'       => 'div',
									'container_id'    => 'footer-menu',
									'container_class' => 'menu',
									'menu_id'         => 'menu-footer-items',
									'menu_class'      => 'menu-items',
									'depth'           => 1,
									'fallback_cb'     => '',
								)
							);
						}
						?>
					</div>
					<div class="col-md-5 col-sm-6">
						<?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
					</div>

				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .sub-footer -->
	</div><!-- .footer-wrap -->

</div><!-- /bonkers-site-wrap -->


<?php wp_footer(); ?>

</body>
</html>
