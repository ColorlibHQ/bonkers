<?php
/**
 * Epsilon Import Data Class
 *
 * @package MedZone
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Import_Data
 */
class Epsilon_Import_Data {
	/**
	 * Array of plugins to register
	 *
	 * @var array
	 */
	public $plugins;

	public $import_options = array();

	/**
	 * Array of widgets index for when we will insert widgets
	 *
	 * @var array
	 */
	public $widgets = array();

	/**
	 * Epsilon_Import_Data constructor.
	 *
	 * @param array $args
	 */
	public function __construct( $args = array() ) {
		$this->plugins = array(
			'bonkers-addons' => esc_html__( 'Bonkers Addons', 'epsilon-framework' ),
			'contact-form-7' => esc_html__( 'Contact Form 7', 'epsilon-framework' ),
		);
		$this->handle_json();
	}

	/**
	 * @param array $args
	 *
	 * @return Epsilon_Import_Data
	 */
	public static function get_instance( $args = array() ) {
		static $inst;
		if ( ! $inst ) {
			$inst = new Epsilon_Import_Data( $args );
		}

		return $inst;
	}

	/**
	 * Get the JSON, Parse IT and figure out content
	 *
	 * @param string $path
	 *
	 * @return bool|array|mixed
	 */
	public function handle_json( $path = '' ) {
		if ( empty( $path ) ) {
			$path = dirname( dirname( __FILE__ ) ) . '/data/demo.json';
		}

		if ( ! file_exists( $path ) ) {
			return false;
		}

		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		$json = $wp_filesystem->get_contents( $path );
		$json = json_decode( $json, true );

		/**
		 * In case the json could not be decoded, we return a new stdClass
		 */
		if ( null === $json ) {
			return false;
		}

		$this->import_options = $json;
	}

	/**
	 * Build the HTML Container
	 */
	public function generate_import_data_container() {
		$html = '<p><a class="button button-primary epsilon-ajax-button" id="add_default_sections" href="#">' . __( 'Click me to start the set-up process!', 'epsilon-framework' ) . '</a>';
		$html .= '<a class="button epsilon-hidden-content-toggler" href="#" data-toggle="welcome-hidden-content">' . __( 'Advanced', 'epsilon-framework' ) . '</a></p>';
		$html .= '<div class="import-content-container" id="welcome-hidden-content">';

		$plugins_html = '';
		foreach ( $this->plugins as $slug => $name ) {
			if ( ! Bonkers_Helper::has_plugin( $slug ) ) {
				$plugins_html .= $this->generate_checkbox( $slug, 'plugins', $name );
			}
		}

		if ( '' != $plugins_html ) {
			$html .= '<div class="checkbox-group">';
			$html .= '<h4>' . __( 'Plugins', 'epsilon-framework' ) . '</h4>';
			$html .= $plugins_html;
			$html .= '</div>';
		}

		foreach ( $this->import_options as $section_id => $section ) {
			$html .= '<div class="checkbox-group">';
			$html .= '<h4>' . $section['title'] . '</h4>';
			foreach ( $section['options'] as $option ) {
				$html .= $this->generate_checkbox( $option['action'], 'bonkers_options', $option['title'] );
			}
			$html .= '</div>';
		}

		$html .= '</div>';

		return $html;
	}

	/**
	 * Generate HTML for a checkbox
	 *
	 * @param $id
	 * @param index
	 * @param $label
	 *
	 * @return string
	 */
	private function generate_checkbox( $id, $index, $label ) {
		$string = '<label><input checked data-slug="%1$s" type="checkbox" class="demo-checkboxes" value="%1$s" name="%2$s"/>%3$s</label>';

		return sprintf( $string, $id, $index, $label );
	}

	/**
	 * Check if we have a static page and if not add one
	 */
	public function set_frontpage() {
		$front = get_option( 'show_on_front' );
		if ( 'posts' === $front ) {
			update_option( 'show_on_front', 'page' );
			$id = wp_insert_post(
				array(
					'post_title'  => __( 'Homepage', 'epsilon-framework' ),
					'post_type'   => 'page',
					'post_status' => 'publish',
				)
			);

			update_post_meta( $id, '_wp_page_template', 'page-templates/template-front-page.php' );

			update_option( 'page_on_front', $id );
		}

		return 'ok';
	}

	/**
	 * Handle import
	 *
	 * @param string $args JSON String
	 *
	 * @return string
	 *
	 * @todo receive "argument" with methods name
	 */
	public static function import_theme_content( $args = '' ) {
		$arr      = array();
		$instance = self::get_instance();

		foreach ( $args as $action ) {
			if ( method_exists( $instance, $action ) ) {
				$instance->{$action}();
			}
		}

		update_option( 'bonkers_import_content', 1 );

		return 'ok';
	}

	/**
	 * Add widgets to a certain sidebar
	 *
	 * @param $sidebar
	 * @param $widgets
	 *
	 */
	public function add_widgets_to_sidebar( $sidebar, $widgets ) {

		if ( is_active_sidebar( $sidebar ) ) {
			return;
		}

		$sidebar_widgets = array();
		foreach ( $widgets as $widget_options ) {
			$widget_id = $widget_options['id'];
			unset( $widget_options['id'] );

			if ( ! isset( $this->widgets[ $widget_id ] ) ) {
				$this->widgets[ $widget_id ] = get_option( "widget_{$widget_id}" );
			}

			if ( empty( $this->widgets[ $widget_id ] ) || ( count( $this->widgets[ $widget_id ] ) == 1 && isset( $this->widgets[ $widget_id ]['_multiwidget'] ) ) ) {
				$this->widgets[ $widget_id ] = array(
					1 => $widget_options,
				);
			} else {
				array_push( $this->widgets[ $widget_id ], $widget_options );
			}

			$widget_index = $widget_id . '-' . end( array_keys( $this->widgets[ $widget_id ] ) );
			array_push( $sidebar_widgets, $widget_index );

		}

		foreach ( $this->widgets as $widget_id => $widgets ) {
			update_option( "widget_{$widget_id}", $widgets );
		}

		$sidebars             = get_option( 'sidebars_widgets' );
		$sidebars[ $sidebar ] = $sidebar_widgets;
		update_option( 'sidebars_widgets', $sidebars );

		$this->widgets = array();

	}

	/**
	 * Add demo content for Welcome section
	 */
	public function populate_welcome_section() {

		$options = array(
			'bonkers_addons_welcome_title'      => wp_kses_post( 'Every Great Company<br> Starts With An Idea' ),
			'bonkers_addons_welcome_link_title' => esc_html( 'View More' ),
			'bonkers_addons_welcome_link_url'   => esc_url_raw( '#' ),
			'bonkers_addons_welcome_image'      => esc_url_raw( get_template_directory_uri() . '/assets/images/StockSnap_1A3MXAT0M6.jpg' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

	/**
	 * Add demo content for Service section
	 */
	public function populate_services_section() {

		$widgets = array(
			array(
				'id'         => 'service-widget',
				'image_uri'  => esc_url( get_template_directory_uri() . '/assets/images/48.Dashboard.png' ),
				'title'      => esc_html__( 'Service Title', 'bonkers' ),
				'text'       => esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ),
				'link_title' => esc_html__( 'Learn More', 'bonkers' ),
				'link'       => '#',
			),
			array(
				'id'         => 'service-widget',
				'image_uri'  => esc_url( get_template_directory_uri() . '/assets/images/30.User.png' ),
				'title'      => esc_html__( 'Service Title', 'bonkers' ),
				'text'       => esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ),
				'link_title' => esc_html__( 'Learn More', 'bonkers' ),
				'link'       => '#',
			),
			array(
				'id'         => 'service-widget',
				'image_uri'  => esc_url( get_template_directory_uri() . '/assets/images/03.Office.png' ),
				'title'      => esc_html__( 'Service Title', 'bonkers' ),
				'text'       => esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ),
				'link_title' => esc_html__( 'Learn More', 'bonkers' ),
				'link'       => '#',
			),
		);

		$this->add_widgets_to_sidebar( 'services-section', $widgets );

	}

	/**
	 * Add demo content for Image section
	 */
	public function populate_image_section() {

		$options = array(
			'bonkers_addons_image_title'      => esc_html( 'Start Growing your Business' ),
			'bonkers_addons_image_link_title' => esc_html( 'View More' ),
			'bonkers_addons_image_link_url'   => esc_url_raw( '#' ),
			'bonkers_addons_image_image'      => esc_url_raw( get_template_directory_uri() . '/assets/images/StockSnap_JBW2PXDOL6.jpg' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

	/**
	 * Add demo content for Phone section
	 */
	public function populate_phone_section() {

		$widgets = array(
			array(
				'id'        => 'phone-feature-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/48.Dashboard.png' ),
				'title'     => esc_html__( 'Feature Title', 'bonkers' ),
				'text'      => esc_html__( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ),
			),
			array(
				'id'        => 'phone-feature-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/48.Dashboard.png' ),
				'title'     => esc_html__( 'Feature Title', 'bonkers' ),
				'text'      => esc_html__( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ),
			),
			array(
				'id'        => 'phone-feature-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/48.Dashboard.png' ),
				'title'     => esc_html__( 'Feature Title', 'bonkers' ),
				'text'      => esc_html__( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ),
			),
		);

		$this->add_widgets_to_sidebar( 'phone-section-left', $widgets );
		$this->add_widgets_to_sidebar( 'phone-section-right', $widgets );

	}

	/**
	 * Add demo content for CTA section
	 */
	public function populate_cta_section() {

		$options = array(
			'bonkers_addons_cta_title'      => esc_html( 'Start Creating Beautiful Sites Now!' ),
			'bonkers_addons_cta_link_title' => esc_html( 'Sign Up' ),
			'bonkers_addons_image_link_url' => esc_url_raw( '#' ),
			'bonkers_addons_cta_image'      => esc_url_raw( get_template_directory_uri() . '/assets/images/StockSnap_R7GVMRJWW9.jpg' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

	/**
	 * Add demo content for Video section
	 */
	public function populate_video_section() {

		$options = array(
			'bonkers_addons_video_title' => esc_html( 'Your success is our most important priority' ),
			'bonkers_addons_video_url'   => esc_url_raw( 'https://www.youtube.com/watch?v=wevJGIJXDFc' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

	/**
	 * Add demo content for Team section
	 */
	public function populate_team_section() {

		$options = array(
			'bonkers_addons_team_title' => esc_html( 'The Team' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

		$widgets = array(
			array(
				'id'            => 'team-member-widget',
				'image_uri'     => esc_url( get_template_directory_uri() . '/assets/images/member1.jpg' ),
				'title'         => esc_html__( 'John Doe', 'bonkers' ),
				'position'      => esc_html__( 'CEO', 'bonkers' ),
				'link_facebook' => esc_url_raw( '#' ),
				'link_twitter'  => esc_url_raw( '#' ),
				'link_facebook' => esc_url_raw( '#' ),
			),
			array(
				'id'            => 'team-member-widget',
				'image_uri'     => esc_url( get_template_directory_uri() . '/assets/images/member2.jpg' ),
				'title'         => esc_html__( 'John Doe', 'bonkers' ),
				'position'      => esc_html__( 'CEO', 'bonkers' ),
				'link_facebook' => esc_url_raw( '#' ),
				'link_twitter'  => esc_url_raw( '#' ),
				'link_facebook' => esc_url_raw( '#' ),
			),
			array(
				'id'            => 'team-member-widget',
				'image_uri'     => esc_url( get_template_directory_uri() . '/assets/images/member1.jpg' ),
				'title'         => esc_html__( 'John Doe', 'bonkers' ),
				'position'      => esc_html__( 'CEO', 'bonkers' ),
				'link_facebook' => esc_url_raw( '#' ),
				'link_twitter'  => esc_url_raw( '#' ),
				'link_facebook' => esc_url_raw( '#' ),
			),
			array(
				'id'            => 'team-member-widget',
				'image_uri'     => esc_url( get_template_directory_uri() . '/assets/images/member2.jpg' ),
				'title'         => esc_html__( 'John Doe', 'bonkers' ),
				'position'      => esc_html__( 'CEO', 'bonkers' ),
				'link_facebook' => esc_url_raw( '#' ),
				'link_twitter'  => esc_url_raw( '#' ),
				'link_facebook' => esc_url_raw( '#' ),
			),
			array(
				'id'            => 'team-member-widget',
				'image_uri'     => esc_url( get_template_directory_uri() . '/assets/images/member1.jpg' ),
				'title'         => esc_html__( 'John Doe', 'bonkers' ),
				'position'      => esc_html__( 'CEO', 'bonkers' ),
				'link_facebook' => esc_url_raw( '#' ),
				'link_twitter'  => esc_url_raw( '#' ),
				'link_facebook' => esc_url_raw( '#' ),
			),
		);

		$this->add_widgets_to_sidebar( 'team-section', $widgets );

	}

	/**
	 * Add demo content for Subscribe section
	 */
	public function populate_subscribe_section() {

		$options = array(
			'bonkers_addons_subscribe_title'            => esc_html( 'Subscribe' ),
			'bonkers_addons_subscribe_link_title'       => esc_html( 'Subscribe' ),
			'bonkers_addons_subscribe_link_placeholder' => esc_html( 'Enter your email...' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

	/**
	 * Add demo content for Clients section
	 */
	public function populate_clients_section() {

		$options = array(
			'bonkers_addons_team_title' => esc_html( 'THE CLIENTS' ),
		);

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

		$widgets = array(
			array(
				'id'        => 'client-logo-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/wordpress_logo.png' ),
				'link'      => esc_url_raw( '#' ),
			),
			array(
				'id'        => 'client-logo-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/wordpress_logo.png' ),
				'link'      => esc_url_raw( '#' ),
			),
			array(
				'id'        => 'client-logo-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/wordpress_logo.png' ),
				'link'      => esc_url_raw( '#' ),
			),
			array(
				'id'        => 'client-logo-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/wordpress_logo.png' ),
				'link'      => esc_url_raw( '#' ),
			),
			array(
				'id'        => 'client-logo-widget',
				'image_uri' => esc_url( get_template_directory_uri() . '/assets/images/wordpress_logo.png' ),
				'link'      => esc_url_raw( '#' ),
			),
		);

		$this->add_widgets_to_sidebar( 'clients-section', $widgets );

	}

	/**
	 * Add demo content for Contact section
	 */
	public function populate_contact_section() {

		$options = array(
			'bonkers_addons_contact_title'   => esc_html( 'Contact' ),
			'bonkers_addons_contact_address' => esc_html( 'Central Park, New York, NY, United States' ),
			'bonkers_addons_contact_zoom'    => absint( 13 ),
		);

		if ( Bonkers_Helper::has_plugin( 'contact-form-7' ) ) {

			// Search if we have a contact form
			$cf7_forms_args = array(
				'post_type'      => 'wpcf7_contact_form',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
			);

			$cf7_forms = get_posts( $cf7_forms_args );

			if ( count( $cf7_forms ) > 0 ) {

				$options['bonkers_addons_contact_form'] = $cf7_forms[0]->ID;

			} else {

				$cf7_form_args = array(
					'post_title'  => 'Demo Form',
					'post_status' => 'publish',
					'post_type'   => 'wpcf7_contact_form',
					'meta_input'  => array(
						'_form' => '<label> Your Name (required)[text* your-name] </label><label> Your Email (required)[email* your-email] </label><label> Subject[text your-subject] </label><label> Your Message[textarea your-message] </label>[submit "Send"]',
					),
				);

				$cf7_form_id = wp_insert_post( $cf7_form_args );
				if ( ! is_wp_error( $cf7_form_id ) ) {
					$options['bonkers_addons_contact_form'] = $cf7_form_id;
				}
			}
		}

		foreach ( $options as $option_name => $value ) {
			$current_value = get_option( $option_name );
			if ( ! $current_value ) {
				update_option( $option_name, $value );
			}
		}

	}

}
