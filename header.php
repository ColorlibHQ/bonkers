<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bonkers
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="bonkers-site-wrap">

		<?php
		$header_image = '';
		if ( get_header_image() ) {
			$header_image = get_header_image();
		}
		?>
		<header id="header" class="site-header" <?php echo ( $header_image ) ? 'style="background-image: url(' . esc_url( $header_image ) . ');"' : ''; ?>>

				<div class="container">
					<div class="row flex-row">          

						<div class="logo_container col-md-3 col-sm-12 col-xs-12">
							<?php
							$logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
							if ( has_custom_logo() ) {
								$logo = get_custom_logo();
							}
							?>
							<?php if ( is_front_page() ) : ?>
								<h1 class="site-title"><?php echo wp_kses_post( $logo ); ?>&nbsp;</h1>
							<?php else : ?>
								<p class="site-title"><?php echo wp_kses_post( $logo ); ?></p>
							<?php endif; ?>

							<button id="bonkers-nav-btn" type="button" class="menu-toggle" data-toggle="collapse" aria-controls="primary-menu" aria-expanded="false">
									<i class="fa fa-navicon"></i>
							</button>

						</div><!-- /logo_container -->

						<div class="col-md-9 col-sm-12 col-xs-12 nav-wrapper">

								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'bonkers' ); ?>">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_id' => 'primary-menu',
										)
									);
									?>
								</nav><!-- #site-navigation -->

						</div><!-- col-md-8 -->

					</div><!-- row-->
				</div><!-- /container -->

		</header>

	<main id="main" class="site-main ">

		<?php if ( ! is_page_template( 'page-templates/template-front-page.php' ) ) { ?>

		<div id="container" class="container">

			<div class="<?php echo esc_attr( bonkers_main_css_class() ); ?>">

		<?php } ?>
