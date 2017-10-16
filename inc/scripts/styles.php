<?php

/**
 * Enqueues front-end CSS for color scheme.
 *
 * @see wp_add_inline_style()
 */
function bonkers_custom_css() {
	/*
	Colors
	*/
	$hero_color            = get_theme_mod( 'bonkers_hero_color', '#2D80E2' );
	$headings_color        = get_theme_mod( 'bonkers_headings_color', '#222222' );
	$text_color            = get_theme_mod( 'bonkers_text_color', '#808080' );
	$link_color            = get_theme_mod( 'bonkers_link_color', '#2D80E2' );
	$footer_background     = get_theme_mod( 'bonkers_footer_background', '#222222' );
	$site_background_color = get_theme_mod( 'bonkers_site_background_color', '#FFFFFF' );
	$logo_color            = get_theme_mod( 'bonkers_logo_color', '#222222' );
	$header_bck_color      = get_theme_mod( 'bonkers_header_bck_color', '#FFFFFF' );

	$colors = array(
		'heroColor'             => $hero_color,
		'headings_color'        => $headings_color,
		'text_color'            => $text_color,
		'link_color'            => $link_color,
		'footer_background'     => $footer_background,
		'site_background_color' => $site_background_color,
		'logo_color'            => $logo_color,
		'header_bck_color'      => $header_bck_color,

	);

	$custom_css = bonkers_get_custom_css( $colors );

	wp_add_inline_style( 'bonkers_style', $custom_css );

	/*
	Typography
	*/
	$bonkers_typography_font                 = get_theme_mod( 'bonkers_typography_font_family' );
	$bonkers_typography_font_headings        = get_theme_mod( 'bonkers_typography_font_family_headings' );
	$bonkers_typography_subsets              = get_theme_mod( 'bonkers_typography_subsets', '' );
	$bonkers_typography_font_size            = '16';
	$bonkers_typography_font_family          = 'PT Sans';
	$bonkers_typography_font_family_headings = 'PT Sans';

	if ( $bonkers_typography_font ) {
		$bonkers_typography_font = json_decode( $bonkers_typography_font, true );
		if ( isset( $bonkers_typography_font['json'] ) ) {
			$parts = $bonkers_typography_font['json'];
			if ( isset( $parts['font-family'] ) ) {
				$bonkers_typography_font_family = $parts['font-family'];
			}
			if ( isset( $parts['font-size'] ) ) {
				$bonkers_typography_font_size = $parts['font-size'];
			}
		}
	}

	if ( $bonkers_typography_font_headings ) {
		$bonkers_typography_font_headings = json_decode( $bonkers_typography_font_headings, true );
		if ( isset( $bonkers_typography_font_headings['json'] ) ) {
			$parts = $bonkers_typography_font_headings['json'];
			if ( isset( $parts['font-family'] ) ) {
				$bonkers_typography_font_family_headings = $parts['font-family'];
			}
		}
	}

	$typography = array(
		'font-family'          => $bonkers_typography_font_family,
		'font-family-headings' => $bonkers_typography_font_family_headings,
		'font-size'            => $bonkers_typography_font_size,
	);

	//Add Google Fonts
	$bonkers_font_subset = '';
	if ( is_array( $bonkers_typography_subsets ) ) {
		$bonkers_font_subset = '&subset=';
		foreach ( $bonkers_typography_subsets as $subset ) {
			$bonkers_font_subset .= $subset . ',';
		}
		$bonkers_font_subset = rtrim( $bonkers_font_subset, ',' );
	}

	$bonkers_google_font = '//fonts.googleapis.com/css?family=' . $bonkers_typography_font_family . ':400,700' . $bonkers_font_subset;
	wp_enqueue_style( 'bonkers_google-font', $bonkers_google_font, array(), '1.0', 'all' );

	$bonkers_google_font_headings = '//fonts.googleapis.com/css?family=' . $bonkers_typography_font_family_headings . ':400,700' . $bonkers_font_subset;
	wp_enqueue_style( 'bonkers_google-font-headings', $bonkers_google_font_headings, array(), '1.0', 'all' );

	$custom_css = bonkers_get_custom_typography_css( $typography );

	wp_add_inline_style( 'bonkers_style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'bonkers_custom_css' );


/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors colors.
 *
 * @return string CSS.
 */
function bonkers_get_custom_css( $colors ) {

	//Default colors
	$colors = wp_parse_args( $colors, array(
		'heroColor'             => '#2D80E2',
		'headings_color'        => '#222222',
		'text_color'            => '#808080',
		'link_color'            => '#2D80E2',
		'footer_background'     => '#222222',
		'site_background_color' => '#FFFFFF',
		'logo_color'            => '#222222',
		'header_bck_color'      => '#FFFFFF',

	) );
	$hero_color_darker = bonkers_darken_color( $colors['heroColor'], 1.1 );
	$link_color_darker = bonkers_darken_color( $colors['link_color'], 1.2 );
	$hero_color_rgb    = hex2rgb( $colors['heroColor'] );

	$css = <<<CSS

	/* Text Color */
	body{
		color: {$colors['text_color']};
	}
	h1:not(.site-title), h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
	.blog-hype #content .post .entry-header .post-title a:hover{
		color: {$colors['headings_color']};
	}
	/* Link Color */
	a,
	.single .post .entry-footer .metadata ul li a {
		color: {$colors['link_color']};
	}
	a:hover{
		color: {$link_color_darker};
	}



	/*============================================
	// Featured Color
	============================================*/

	/* Background Color */
	.pagination .current,
	.pagination li.active a,
	.section-title::before,
	.ql_primary_btn,
	#jqueryslidemenu ul.nav > li > ul > li a:hover,
	#jqueryslidemenu .navbar-toggle .icon-bar,
	.bonkers-home-slider-fullscreen .slider-fullscreen-controls .prevnext-button,
	.pace .pace-progress,
	.woocommerce nav.woocommerce-pagination ul li a:focus, 
	.woocommerce nav.woocommerce-pagination ul li span.current,
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.ql_woo_cart_button:hover,
	.ql_woo_cart_close,
	.woocommerce .woocommerce-MyAccount-navigation ul .woocommerce-MyAccount-navigation-link.is-active a,
	.woocommerce_checkout_btn,
	.post-navigation .nav-next a:hover::before, .post-navigation .nav-previous a:hover::before,
	.woocommerce #main .single_add_to_cart_button,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
	.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
	.contact-form input[type="submit"],
	.portfolio-load-wrapper .portfolio-load-more,
	.bonkers-preloader .bonkers-folding-cube .bonkers-cube::before,
	#ql_load_more,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
	.no-touch .ql_secundary_btn:hover,
	.no-touch .bonkers-mini-cart .woocommerce-mini-cart__buttons .button:hover,
	.bonkers-mini-cart .woocommerce-mini-cart__buttons .button.checkout,
	.no-touch .main-navigation ul ul a:hover,
	.bonkers-services-section .bonkers-service .bonkers-service-btn:after,
	#respond .form-submit #submit-respond,
	.no-touch .search-form .search-submit:hover
	{
		background-color: {$colors['heroColor']};
	}

	/* Border Color */
	.pagination li.active a,
	.pagination li.active a:hover,
	.section-title::after,
	.pace .pace-activity,
	.ql_woocommerce_categories ul li.current, .ql_woocommerce_categories ul li:hover,
	.woocommerce_checkout_btn,
	.ql_woocommerce_categories .ql_product_search:hover .woocommerce-product-search #woocommerce-product-search-field,
	.touch .ql_woocommerce_categories .ql_product_search:hover .woocommerce-product-search #woocommerce-product-search-field
	.ql_secundary_btn,
	.bonkers-mini-cart .woocommerce-mini-cart__buttons .button,
	.search-form .search-submit
	{
		border-color: {$colors['heroColor']};
	}

	/* Color */
	.pagination li.active a:hover,
	#comments .comment-list .comment.bypostauthor .comment-body,
	#respond input,
	#respond textarea,
	.widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a,
	.style-title span,
	.ql_filter ul li.active a,
	.ql_filter ul li a:hover,
	.ql_filter .ql_filter_count .current,
	.portfolio-slider .portfolio-item .portfolio-item-title,
	.portfolio-slider .portfolio-slider-controls .prevnext-button,
	.portfolio-multiple-slider .portfolio-item .portfolio-item-title,
	.portfolio-multiple-slider .portfolio-slider-controls .prevnext-button,
	.single-portfolio-container .portfolio-item .portfolio-item-title,
	.ql_cart-btn:hover,
	.ql_cart-btn:focus,
	.ql_woocommerce_categories ul li a:hover,
	.woocommerce #main .products .product .price, .woocommerce-page .products .product .price,
	.woocommerce a.added_to_cart,
	.woocommerce div.product .woocommerce-product-rating,
	.woocommerce #main .price,
	.woocommerce #main .single_variation_wrap .price,
	.woocommerce-cart .cart .cart_item .product_text .amount,
	.ql_woo_cart_close:hover,
	#ql_woo_cart ul.cart_list li .product_text .amount,
	#ql_woo_cart .widget_shopping_cart_content .total,
	.woocommerce_checkout_btn:hover,
	.woocommerce .star-rating,
	.widget .amount,
	.post-navigation .nav-next a,
	.post-navigation .nav-previous a,
	.welcome-section .welcome-title,
	.question,
	#jqueryslidemenu ul.nav > li > ul > li.current_page_item > a, 
	#jqueryslidemenu ul.nav > li > ul > li.current_page_parent > a,
	.woocommerce p.stars a,
	.ql_cart-btn .count,
	#jqueryslidemenu ul.nav > li > a:hover,
	.ql_secundary_btn,
	.vc_toggle_title > h4,
	.bonkers-mini-cart .woocommerce-mini-cart__buttons .button,
	.bonkers-welcome-section .bonkers-welcome-intro .ql_border_btn:hover,
	.no-touch .ql_border_btn:hover,
	.no-touch .bonkers-subscribe-section .bonkers-subscribe-content .bonkers-subscribre-form-wrapper .contact-form input[type="submit"]:hover,
	.no-touch .bonkers-contact-section .bonkers-contact-content .bonkers-contact-form form input[type="submit"]:hover,
	.no-touch .bonkers-contact-section .bonkers-contact-content .bonkers-contact-form form .contact-submit input[type="submit"]:hover, 
	.no-touch .bonkers-contact-section .bonkers-contact-content .bonkers-contact-form .wpcf7-form .contact-submit input[type="submit"]:hover, 
	.no-touch .bonkers-contact-section .bonkers-contact-content .bonkers-contact-form form input[type="submit"]:hover, 
	.no-touch .bonkers-contact-section .bonkers-contact-content .bonkers-contact-form .wpcf7-form input[type="submit"]:hover,
	.search-form .search-submit,
	.bonkers-image-section .bonkers-image-section-text .bonkers-image-section-content .ql_border_btn:hover
	{
		color: {$colors['heroColor']};
	}

	/* Fill */
	.entry-header .svg-title li .bonkers-vertical-simple .st0,
	.page-header .svg-title li .bonkers-vertical-simple .st0,
	.flickity-prev-next-button .arrow,
	.bonkers-home-slider .flickity-page-dots .dot .is-selected .bonkers-vertical-simple .st0,
	.portfolio-slider .flickity-page-dots .dot.is-selected .bonkers-vertical-simple .st0,
	.portfolio-multiple-slider .flickity-page-dots .dot.is-selected .bonkers-vertical-simple .st0,
	.bonkers-home-slider .flickity-prev-next-button .arrow,
	.bonkers-home-slider .flickity-prev-next-button .arrow,
	.bonkers-home-slider .flickity-page-dots .dot.is-selected .bonkers-vertical-simple .st0
	{
		fill: {$colors['heroColor']};
	}

	/* Stroke */
	.entry-header .svg-title li .bonkers-vertical-simple .st1,
	.page-header .svg-title li .bonkers-vertical-simple .st1,
	.bonkers-vertical path,
	.ql-svg-inline .g-svg,
	#jqueryslidemenu .current_page_item a, #jqueryslidemenu .current_page_parent a,
	.bonkers-home-slider .flickity-page-dots .dot .is-selected .bonkers-vertical-simple .st1,
	.ql_filter .ql_filter_count .bonkers-count-svg path,
	.portfolio-slider .flickity-page-dots .dot.is-selected .bonkers-vertical-simple .st1,
	.portfolio-multiple-slider .flickity-page-dots .dot.is-selected .bonkers-vertical-simple .st1
	{
		stroke: {$colors['heroColor']};
	}

	/* Darker Background Color */
	.no-touch .ql_primary_btn:hover,
	.no-touch .woocommerce #main .single_add_to_cart_button:hover,
	.no-touch .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
	.no-touch .woocommerce #payment #place_order:hover, 
	.no-touch .woocommerce-page #payment #place_order:hover,
	.contact-form input[type="submit"]:hover,
	.no-touch .portfolio-load-wrapper .portfolio-load-more:hover,
	.no-touch #ql_load_more:hover,
	.no-touch .bonkers-mini-cart .woocommerce-mini-cart__buttons .button.checkout:hover,
	.no-touch #respond .form-submit #submit-respond:hover,
	.woocommerce a.button.alt:hover
	{
		background-color: {$hero_color_darker};
	}

	/* Faded Background Color */
	.portfolio-container .portfolio-item .portfolio-item-hover,
	.bonkers_team_member .bonkers_team_hover
	{
		background-color: rgba( {$hero_color_rgb['red']}, {$hero_color_rgb['green']}, {$hero_color_rgb['blue']}, 0.88 );
	}

	/* Footer Background Color */
	.bonkers-footer-wrap
	{
		background-color: {$colors['footer_background']};
	}

	/* Logo Color */
	#header .logo_container .ql_logo
	{
		color: {$colors['logo_color']};
	}

	/* Header Background Color */
	#header,
	.single-product #header,
	.bonkers-sidenav #header,
	.top-bar,
	.single-product .top-bar
	{
		background-color: {$colors['header_bck_color']};
	}


CSS;

	return $css;
}


/**
 * Returns CSS for the typography styles.
 *
 * @param array $typography typography.
 *
 * @return string CSS.
 */
function bonkers_get_custom_typography_css( $typography ) {

	//Default colors
	$typography = wp_parse_args( $typography, array(
		'font-family'          => '"PT Sans"',
		'font-family-headings' => '"PT Sans"',
		'font-size'            => '16',
	) );

	$css = <<<CSS

	/* Typography */
	body{
		font-family: {$typography['font-family']};
		font-size: {$typography['font-size']}px;
	}
	.logo_container .ql_logo,
	.post-navigation .nav-next a span, .post-navigation .nav-previous a span
	{
		font-family: {$typography['font-family']};
	}
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
	.metadata,
	.pagination a, .pagination span,
	.ql_primary_btn,
	.ql_secundary_btn,
	.ql_woocommerce_categories ul li,
	.sidebar_btn,
	.woocommerce #main .products .product .product_text, .woocommerce-page .products .product .product_text,
	.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,
	.woocommerce #main .price,
	.woocommerce div.product .woocommerce-tabs ul.tabs li,
	.woocommerce-cart .cart .cart_item .product_text .price,
	#jqueryslidemenu ul.nav > li,
	.sub-footer,
	.ql_filter ul li,
	.post-navigation .nav-next a, .post-navigation .nav-previous a,
	.read-more,
	.portfolio-load-wrapper .portfolio-load-more,
	.woocommerce .woocommerce-breadcrumb,
	#main .woocommerce-result-count,
	#ql_load_more,
	.woocommerce #main .single_add_to_cart_button,
	.contact-form input[type="submit"],
	#respond .form-submit #submit-respond,
	.woocommerce-cart .actions input[type='submit'],
	.woocommerce-cart .actions input[type='submit'],
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
	.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
	.bonkers-offer-banner .bonkers-offer-banner-countdown .bonkers-offer-banner-time,
	.bonkers-product-metadata
	{
		font-family: {$typography['font-family-headings']};
	}

CSS;

	return $css;
}
