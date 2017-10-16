<?php

class Bonkers {

	public $recommended_plugins = array(
		'simple-custom-post-order' => array(
			'recommended' => false,
		),
		'fancybox-for-wordpress'   => array(
			'recommended' => false,
		),
	);

	public $recommended_actions;

	public $theme_slug = 'bonkers';

	function __construct() {

		$this->recommended_actions = apply_filters( 'bonkers_required_actions', array(
			array(
				'id'          => 'bonkers-import-data',
				'title'       => esc_html__( 'Easy 1-click theme setup', 'bonkers' ),
				'description' => esc_html__( 'Clicking the button below will add settings/widgets and recommended plugins to your WordPress installation. Click advanced to customize the import process.', 'bonkers' ),
				'help'        => array( Epsilon_Import_Data::get_instance(), 'generate_import_data_container' ),
				'check'       => Bonkers_Helper::check_installed_data(),
			),
			array(
				'id'          => 'bonkers-install-bonkers-addons',
				'title'       => Bonkers_Helper::create_plugin_title( __( 'Bonkers Addons', 'bonkers' ), 'bonkers-addons' ),
				'description' => __( 'It is highly recommended that you install the Illdy Companion.', 'bonkers' ),
				'check'       => Bonkers_Helper::has_plugin( 'bonkers-addons' ),
				'type'        => 'plugin',
				'plugin_slug' => 'bonkers-addons',
			),
			array(
				'id'          => 'bonkers-install-contact-form-7',
				'title'       => Bonkers_Helper::create_plugin_title( __( 'Contact Form 7', 'bonkers' ), 'contact-form-7' ),
				'description' => __( 'It is highly recommended that you install the Contact Form 7.', 'bonkers' ),
				'check'       => Bonkers_Helper::has_plugin( 'contact-form-7' ),
				'type'        => 'plugin',
				'plugin_slug' => 'contact-form-7',
			),
		) );

		if ( is_customize_preview() ) {
			$url                                  = 'themes.php?page=%1$s-welcome&tab=%2$s';
			$this->recommended_actions[0]['help'] = '<a class="button button-primary" id="" href="' . esc_url( admin_url( sprintf( $url, 'bonkers', 'recommended-actions' ) ) ) . '">' . __( 'Easy 1-click theme setup', 'bonkers' ) . '</a>';
		}

		$this->init_epsilon();
		$this->init_typography();
		$this->init_welcome_screen();

		// Hooks
		add_action( 'customize_register', array( $this, 'init_customizer' ) );

	}

	public function init_epsilon() {

		require get_template_directory() . '/inc/libraries/epsilon-framework/class-epsilon-autoloader.php';
		new Epsilon_Framework();

	}

	public function init_typography() {

		$options = array(
			'bonkers_typography_font_family',
			'bonkers_typography_font_family_headings',
		);

		$handler            = 'bonkers_style';
		$epsilon_typography = Epsilon_Typography::get_instance( $options, $handler );

		// Remove Epsilon Google Font
		remove_action( 'wp_enqueue_scripts', array( $epsilon_typography, 'enqueue' ) );

	}

	public function init_customizer( $wp_customize ) {

		$current_theme = wp_get_theme();
		$wp_customize->add_section( new Epsilon_Section_Recommended_Actions( $wp_customize, 'epsilon_recomended_section', array(
			'title'                        => esc_html__( 'Recomended Actions', 'bonkers' ),
			'social_text'                  => esc_html( $current_theme->get( 'Author' ) ) . esc_html__( ' is social :', 'bonkers' ),
			'plugin_text'                  => esc_html__( 'Recomended Plugins :', 'bonkers' ),
			'actions'                      => $this->recommended_actions,
			'plugins'                      => $this->recommended_plugins,
			'theme_specific_option'        => $this->theme_slug . '_show_required_actions',
			'theme_specific_plugin_option' => $this->theme_slug . '_show_required_plugins',
			'facebook'                     => 'https://www.facebook.com/colorlib',
			'twitter'                      => 'https://twitter.com/colorlib',
			'wp_review'                    => true,
			'priority'                     => 0,
		) ) );

	}

	public function init_welcome_screen() {
		if ( ! is_admin() ) {
			return;
		}

		require get_template_directory() . '/inc/libraries/welcome-screen/class-epsilon-welcome-screen.php';
		Epsilon_Welcome_Screen::get_instance(
			$config = array(
				'theme-name' => 'Bonkers',
				'theme-slug' => 'bonkers',
				'actions'    => $this->recommended_actions,
				'plugins'    => $this->recommended_plugins,
				'edd'        => false,
			)
		);

	}

}

new Bonkers();
