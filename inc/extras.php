<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bonkers
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function bonkers_body_classes( $classes ) {

	$bonkers_theme_data = wp_get_theme();

	$classes[] = sanitize_title( $bonkers_theme_data['Name'] );
	$classes[] = 'v' . $bonkers_theme_data['Version'];

	// Add Animations Class
	$bonkers_site_animations = get_theme_mod( 'bonkers_site_animations', 'true' );
	if ( 'true' == $bonkers_site_animations ) {
		$classes[] = 'ql_animations';
	}

	//Add class if there is Sidebar
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'bonkers-with-sidebar';
	} else {
		$classes[] = 'bonkers-with-out-sidebar';
	}

	return $classes;
}

add_filter( 'body_class', 'bonkers_body_classes' );


if ( ! function_exists( 'bonkers_new_content_more' ) ) {
	function bonkers_new_content_more( $more ) {
		global $post;

		return ' <br><a href="' . esc_url( get_permalink() ) . '" class="more-link read-more">' . esc_html__( 'Read more', 'bonkers' ) . ' <i class="bonkers-icon-arrow-right"></i></a>';
	}
}// End if().
add_filter( 'the_content_more_link', 'bonkers_new_content_more' );


/**
 * Convert HEX colors to RGB
 */
function hex2rgb( $colour ) {
	$colour = str_replace( '#', '', $colour );
	if ( strlen( $colour ) == 6 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
	} elseif ( strlen( $colour ) == 3 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
	} else {
		return false;
	}
	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}


/**
 * Avoid undefined functions if Meta Box is not activated
 *
 * @return bool
 */
if ( ! function_exists( 'rwmb_meta' ) ) {
	function rwmb_meta( $key, $args = '', $post_id = null ) {
		return false;
	}
}


/**
 * Display Portfolio or Post navigation
 *
 * @return html
 */
if ( ! function_exists( 'bonkers_post_navigation' ) ) {
	function bonkers_post_navigation() {

		$post_nav_bck      = '';
		$post_nav_bck_next = '';
		$prev_post         = get_previous_post();
		if ( ! empty( $prev_post ) ) :
			$portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_post->ID ), 'bonkers_post' );
			if ( ! empty( $portfolio_image ) ) {
				$post_nav_bck = ' style="background-image: url(' . esc_url( $portfolio_image[0] ) . ');"';
			}
		endif;
		$next_post = get_next_post();
		if ( ! empty( $next_post ) ) :
			$portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'bonkers_post' );
			if ( ! empty( $portfolio_image ) ) {
				$post_nav_bck_next = ' style="background-image: url(' . esc_url( $portfolio_image[0] ) . ');"';
			}
		endif;

		if ( ! empty( $prev_post ) || ! empty( $next_post ) ) :
			?>
			<nav class="navigation post-navigation">
				<div class="nav-links">
					<?php if ( ! empty( $prev_post ) ) : ?>
						<div class="nav-previous" <?php echo $post_nav_bck; ?>>
							<?php
							$prev_text = esc_html__( 'Previous Post', 'bonkers' );
							?>
							<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev"><span><?php echo $prev_text; ?></span><?php echo esc_html( $prev_post->post_title ); ?>
							</a>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $next_post ) ) : ?>
						<div class="nav-next" <?php echo $post_nav_bck_next; ?>>
							<?php
							$next_text = esc_html__( 'Next Post', 'bonkers' );
							?>
							<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next"><span><?php echo $next_text; ?></span><?php echo esc_html( $next_post->post_title ); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</nav>
		<?php
		endif;

	}
}// End if().

/**
 * Return a darker color in HEX
 *
 * @return string
 */
function bonkers_darken_color( $rgb, $darker = 2 ) {

	$hash = ( strpos( $rgb, '#' ) !== false ) ? '#' : '';
	$rgb  = ( strlen( $rgb ) == 7 ) ? str_replace( '#', '', $rgb ) : ( ( strlen( $rgb ) == 6 ) ? $rgb : false );
	if ( strlen( $rgb ) != 6 ) {
		return $hash . '000000';
	}
	$darker = ( $darker > 1 ) ? $darker : 1;

	list( $r16, $g16, $b16 ) = str_split( $rgb, 2 );

	$r = sprintf( '%02X', floor( hexdec( $r16 ) / $darker ) );
	$g = sprintf( '%02X', floor( hexdec( $g16 ) / $darker ) );
	$b = sprintf( '%02X', floor( hexdec( $b16 ) / $darker ) );

	return $hash . $r . $g . $b;
}


/**
 * Return CSS class for #content
 *
 * @return bool
 */
if ( ! function_exists( 'bonkers_content_css_class' ) ) {
	function bonkers_content_css_class() {

		if ( is_page_template( 'template-full-width.php' ) ) {
			return 'col-md-12';
		}
		if ( is_page_template( 'template-fullscreen.php' ) ) {
			return '';
		}

		if ( is_active_sidebar( 'sidebar-1' ) ) {
			return 'col-md-8';
		} else {
			return 'col-md-12';
		}

	}
}


/**
 * Return CSS class for Main
 *
 * @return bool
 */
if ( ! function_exists( 'bonkers_main_css_class' ) ) {
	function bonkers_main_css_class() {
		//Default
		$main_css_class = 'row';

		if ( is_page_template( 'template-fullscreen.php' ) ) {
			$main_css_class = '';
		}

		return $main_css_class;

	}
}


/**
 * Return SVG markup.
 *
 * @param array $args  {
 *                     Parameters needed to display an SVG.
 *
 * @type string $icon  Required SVG icon filename.
 * @type string $title Optional SVG title.
 * @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function bonkers_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'bonkers' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'bonkers' );
	}

	// Set defaults.
	$defaults = array(
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo bonkers_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo bonkers_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}


/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 *
 * @return string $title The menu item's title with dropdown icon.
 */
function bonkers_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . '<i class="fa-angle-down fa icon"></i>';
			}
		}
	}

	return $title;
}

add_filter( 'nav_menu_item_title', 'bonkers_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Retrieve Serialized Options
 *
 */
function bonkers_get_option( $setting, $default ) {
	$options = get_option( 'bonkers_addons', array() );
	$value   = $default;
	if ( isset( $options[ $setting ] ) ) {
		$value = $options[ $setting ];
	}

	return $value;
}

function bonkers_get_coordinates() {
	$default_coordinates = array(
		'Central+Park%2C+New+York%2C+NY%2C+United+States' => array( '40.7828647', '-73.9675438' ),
	);
	$coordinates         = get_option( 'bonkers_maps_coordinates' );
	$all_coordinates     = wp_parse_args( $coordinates, $default_coordinates );
	$address             = get_option( 'bonkers_addons_contact_address', 'Central Park, New York, NY, United States' );

	$encoded_adress = urlencode( $address );

	if ( isset( $all_coordinates[ $encoded_adress ] ) ) {
		return $all_coordinates[ $encoded_adress ];
	}

	$gm_geocoding_api_url = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBDd-_yIs7FYbgDz-_74JS5Ehk6Qg61DjA&address=' . $encoded_adress;

	$response = wp_remote_get( $gm_geocoding_api_url );

	if ( is_array( $response ) ) {
		$g_response = json_decode( $response['body'], true );

		if ( 'OK' == $g_response['status'] ) {
			$coordinates[ $encoded_adress ] = array(
				$g_response['results'][0]['geometry']['location']['lat'],
				$g_response['results'][0]['geometry']['location']['lng'],
			);
			update_option( 'bonkers_maps_coordinates', $coordinates );

			return $coordinates[ $encoded_adress ];
		}

		return false;
	}

	return false;

}
