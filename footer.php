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
		/*
		 * Work out which columns actually have widgets first. The loop below used
		 * to print a wrapper div per registered area whether or not anything was
		 * in it, so a site that had not filled the footer still rendered four
		 * empty grid columns inside an empty dark band -- which is what the
		 * comment above always claimed it avoided.
		 */
		$bonkers_active_columns = array();

		for ( $i = 1; $i <= $no_sidebar; $i++ ) {
			if ( is_active_sidebar( 'footer-widgets-' . $i ) ) {
				$bonkers_active_columns[] = $i;
			}
		}

		// When only some columns are filled, share the row between those, rather
		// than leaving the gaps where the empty ones used to be.
		$bonkers_even_span = (int) floor( 12 / max( 1, count( $bonkers_active_columns ) ) );

		if ( $bonkers_footer_widgets && $bonkers_active_columns ) {
		?>

		<footer id="footer" class="site-footer">
			<div class="container">
				<div class="row">

					<?php
					foreach ( $bonkers_active_columns as $i ) {
						$span = count( $bonkers_active_columns ) === $no_sidebar && isset( $sidebar_columns['columns'][ $i ]['span'] )
							? (int) $sidebar_columns['columns'][ $i ]['span']
							: $bonkers_even_span;

						$class = Bonkers_Helper::get_bootstrap_class( $span );

						if ( ! $class ) {
							$class = 'col-md-' . max( 1, min( 12, $span ) ) . ' col-sm-6 col-xs-12';
						}

						echo '<div class="' . esc_attr( $class ) . '">';
						dynamic_sidebar( 'footer-widgets-' . $i );
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
					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<div class="col-md-5 col-sm-6">
							<?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
						</div>
					<?php endif; ?>

				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .sub-footer -->
	</div><!-- .footer-wrap -->

</div><!-- /bonkers-site-wrap -->

<?php wp_footer(); ?>

</body>
</html>
