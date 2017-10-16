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

	<?php

}

$bonkers_footer_widgets = get_theme_mod( 'bonkers_enable_footer_widgets', true );
$sidebar_columns        = get_theme_mod( 'bonkers_footer_columns' );
if ( '' != $sidebar_columns ) {
	if ( ! is_array( $sidebar_columns ) ) {
		$sidebar_columns = json_decode( $sidebar_columns, true );
	}
	$no_sidebar = $sidebar_columns['columnsCount'];
} else {
	$sidebar_columns = array(
		'columnsCount' => 4,
		'columns'      => array(
			1 => array(
				'index' => 1,
				'span'  => 3,
			),
			2 => array(
				'index' => 2,
				'span'  => 3,
			),
			3 => array(
				'index' => 3,
				'span'  => 3,
			),
			4 => array(
				'index' => 4,
				'span'  => 3,
			),
		),
	);
	$no_sidebar      = 4;
}

	?>

	<div class="clearfix"></div>
	<div class="bonkers-footer-wrap">
		<?php
		/*
        *Only show the Footer sections that have widgets
        */
		if ( $bonkers_footer_widgets ) {
		?>

		<footer id="footer" class="site-footer">
			<div class="container">
				<div class="row">

					<?php
					for ( $i = 1; $i <= $no_sidebar; $i++ ) {
						$footer_section = 'footer-widgets-' . $i;
						echo '<div class="' . Bonkers_Helper::get_bootstrap_class( $sidebar_columns['columns'][ $i ]['span'] ) . '">';
						dynamic_sidebar( $footer_section );
						echo '</div>';
					}// End foreach().
					?>
				</div><!-- .row -->
			</div><!-- .container -->
		</footer><!-- #footer -->
		<?php
		}// End if().
		?>


		<div class="sub-footer">
			<?php echo '<div class="container">'; ?>
				<div class="row">

					<div class="col-md-7 col-sm-6">

						<p><?php esc_html_e( '&copy; Copyright', 'bonkers' ); ?> <?php echo esc_html( date( 'Y' ) ); ?> <a rel="nofollow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></p>
						<p class="theme-copyright">
							<a href="https://colorlib.com/bonkers/"><?php esc_html_e( 'Theme : Bonkers', 'bonkers' ); ?></a>
						</p>
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
