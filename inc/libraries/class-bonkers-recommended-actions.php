<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The theme's setup checklist, shown in the Customizer.
 *
 * Everything here is core WordPress: a WP_Customize_Section subclass for the panel, the
 * REST API for dismissals, and wp.apiFetch for the request. The list this replaces came
 * from a bundled framework whose dismissal endpoint took a class and method name out of
 * $_POST with no nonce; this one is a single route guarded by a capability check, and
 * the nonce is core's own.
 *
 * @package Bonkers
 */
class Bonkers_Recommended_Actions {

	const OPTION = 'bonkers_dismissed_actions';

	const REST_NAMESPACE = 'bonkers/v1';

	/**
	 * Bonkers_Recommended_Actions constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_section' ), 20 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * The setup steps, each with a check that says whether it is already done.
	 *
	 * @return array
	 */
	/**
	 * The setup steps.
	 *
	 * Values here are plain, unescaped strings on purpose: the customizer section
	 * renders them through a wp.template, where {{ }} escapes. Escaping in PHP too
	 * double-escapes -- an apostrophe reaches the panel as &#039;, and esc_url()'s
	 * &#038; separators survive into the href, breaking the query string.
	 */
	public static function get_actions() {
		$actions = array(
			array(
				'id'           => 'bonkers-set-static-front-page',
				'title'        => __( 'Set a static front page', 'bonkers' ),
				'description'  => __( 'The Bonkers front page is a page template. Until Settings, Reading is set to show a static page, visitors land on the blog instead.', 'bonkers' ),
				'done'         => self::has_static_front_page(),
				'button_url'   => self_admin_url( 'options-reading.php' ),
				'button_label' => __( 'Open Reading settings', 'bonkers' ),
			),
			array(
				'id'           => 'bonkers-use-front-page-template',
				'title'        => __( 'Apply the Front Page template', 'bonkers' ),
				'description'  => __( 'Edit your front page and set its template to Front Page. That is what draws the welcome, services, team and contact sections.', 'bonkers' ),
				'done'         => self::front_page_uses_template(),
				'button_url'   => self::front_page_edit_url(),
				'button_label' => __( 'Edit the front page', 'bonkers' ),
			),
			array(
				'id'           => 'bonkers-fill-sections',
				'title'        => __( 'Fill the front page sections', 'bonkers' ),
				'description'  => __( 'Each section on the front page is a widget area. Drop a widget into one and the section appears; leave it empty and it stays hidden.', 'bonkers' ),
				'done'         => self::has_front_page_widgets(),
				'button_url'   => self_admin_url( 'widgets.php' ),
				'button_label' => __( 'Open widgets', 'bonkers' ),
			),
			array(
				'id'           => 'bonkers-set-menu',
				'title'        => __( 'Build the main menu', 'bonkers' ),
				'description'  => __( 'Assign a menu to the Primary location so visitors can reach your work, your writing and your contact details.', 'bonkers' ),
				'done'         => self::has_primary_menu(),
				'button_url'   => self_admin_url( 'nav-menus.php' ),
				'button_label' => __( 'Open menus', 'bonkers' ),
			),
			array(
				'id'           => 'bonkers-add-portfolio',
				'title'        => __( 'Add some work', 'bonkers' ),
				'description'  => __( 'Bonkers is a portfolio theme, so the grid stays empty until there is something in it. Install Bonkers Addons if you want a dedicated Portfolio post type rather than using posts.', 'bonkers' ),
				'done'         => self::has_portfolio_content(),
				'button_url'   => self::portfolio_add_url(),
				'button_label' => __( 'Add an item', 'bonkers' ),
			),
			array(
				'id'           => 'bonkers-maps-key',
				'title'        => __( 'Add a Google Maps key (optional)', 'bonkers' ),
				'description'  => __( 'The contact section shows a map when you supply your own Google Maps API key. Without one it shows your address as text, which is the right default.', 'bonkers' ),
				'done'         => '' !== bonkers_maps_api_key(),
				'button_url'   => self_admin_url( 'customize.php' ),
				'button_label' => __( 'Open the Customizer', 'bonkers' ),
			),
		);

		// Steps the user has ticked away stay gone.
		$dismissed = (array) get_option( self::OPTION, array() );

		return array_values(
			array_filter(
				$actions,
				function ( $action ) use ( $dismissed ) {
					return ! in_array( $action['id'], $dismissed, true );
				}
			)
		);
	}

	/**
	 * @return bool
	 */
	private static function has_products() {
		if ( ! post_type_exists( 'product' ) ) {
			return false;
		}

		$counts = wp_count_posts( 'product' );

		return ! empty( $counts->publish );
	}

	/**
	 * @return bool
	 */
	private static function has_static_front_page() {
		return 'page' === get_option( 'show_on_front' ) && (int) get_option( 'page_on_front' ) > 0;
	}

	/**
	 * @return int Front page id, or 0.
	 */
	private static function front_page_id() {
		return 'page' === get_option( 'show_on_front' ) ? (int) get_option( 'page_on_front' ) : 0;
	}

	private static function front_page_uses_template() {
		$id = self::front_page_id();

		if ( ! $id ) {
			return false;
		}

		return 'page-templates/template-front-page.php' === get_page_template_slug( $id );
	}

	private static function front_page_edit_url() {
		$id = self::front_page_id();

		return $id ? get_edit_post_link( $id, 'raw' ) : self_admin_url( 'edit.php?post_type=page' );
	}

	private static function has_primary_menu() {
		$locations = get_nav_menu_locations();

		return ! empty( $locations['primary'] );
	}

	/**
	 * Anything to show in the grid: the plugin's Portfolio type when it is
	 * active, otherwise ordinary posts, which is what the theme falls back to.
	 */
	private static function has_portfolio_content() {
		if ( post_type_exists( 'portfolio' ) ) {
			$counts = wp_count_posts( 'portfolio' );

			if ( ! empty( $counts->publish ) ) {
				return true;
			}
		}

		$posts = wp_count_posts( 'post' );

		return ! empty( $posts->publish );
	}

	private static function portfolio_add_url() {
		return post_type_exists( 'portfolio' )
			? self_admin_url( 'post-new.php?post_type=portfolio' )
			: self_admin_url( 'post-new.php' );
	}

	/**
	 * The front page is built from widget areas, so "configured" means at least
	 * one of them has something in it.
	 */
	private static function has_front_page_widgets() {
		foreach ( array( 'services-section', 'team-section', 'clients-section', 'phone-section-left', 'phone-section-right' ) as $sidebar ) {
			if ( is_active_sidebar( $sidebar ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @param WP_Customize_Manager $wp_customize Customizer instance.
	 */
	public function register_section( $wp_customize ) {
		require_once get_template_directory() . '/inc/customizer-controls/class-bonkers-customize-section-actions.php';

		// Without this the Customizer never prints the section's Underscore template,
		// so the section renders with its title and nothing inside it.
		$wp_customize->register_section_type( 'Bonkers_Customize_Section_Actions' );

		$actions = self::get_actions();

		if ( empty( $actions ) ) {
			return;
		}

		$wp_customize->add_section(
			new Bonkers_Customize_Section_Actions(
				$wp_customize,
				'bonkers_recommended_actions',
				array(
					'title'      => esc_html__( 'Set up Bonkers', 'bonkers' ),
					'priority'   => 0,
					'capability' => 'edit_theme_options',
					'actions'    => $actions,
				)
			)
		);
	}

	/**
	 * Customizer pane assets.
	 */
	public function enqueue() {
		wp_enqueue_style(
			'bonkers-customizer-actions',
			get_template_directory_uri() . '/assets/css/customizer-actions.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_script(
			'bonkers-customizer-actions',
			get_template_directory_uri() . '/assets/js/customizer-actions.js',
			array( 'customize-controls', 'wp-api-fetch' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	/**
	 * One route, one capability check. wp-api-fetch sends the wp_rest nonce itself.
	 */
	public function register_routes() {
		register_rest_route(
			self::REST_NAMESPACE,
			'/dismiss-action',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'dismiss_action' ),
				'permission_callback' => function () {
					return current_user_can( 'edit_theme_options' );
				},
				'args'                => array(
					'id' => array(
						'required'          => true,
						'type'              => 'string',
						'sanitize_callback' => 'sanitize_key',
						'validate_callback' => array( $this, 'is_known_action' ),
					),
				),
			)
		);
	}

	/**
	 * Only ids this theme actually defines may be stored.
	 *
	 * @param string $id Action id.
	 *
	 * @return bool
	 */
	public function is_known_action( $id ) {
		return in_array( $id, self::known_ids(), true );
	}

	/**
	 * @return array
	 */
	private static function known_ids() {
		return array(
			'bonkers-set-static-front-page',
			'bonkers-install-woocommerce',
			'bonkers-add-products',
			'bonkers-set-menu',
			'bonkers-add-widgets',
		);
	}

	/**
	 * @param WP_REST_Request $request Request.
	 *
	 * @return WP_REST_Response
	 */
	public function dismiss_action( WP_REST_Request $request ) {
		$id        = $request->get_param( 'id' );
		$dismissed = (array) get_option( self::OPTION, array() );

		if ( ! in_array( $id, $dismissed, true ) ) {
			$dismissed[] = $id;
			update_option( self::OPTION, array_values( array_intersect( $dismissed, self::known_ids() ) ) );
		}

		return new WP_REST_Response( array( 'dismissed' => $id ), 200 );
	}
}
