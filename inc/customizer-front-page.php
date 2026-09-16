<?php
/**
 * Customizer controls for the front page sections.
 *
 * The front page is assembled from the sections in template-parts, and every
 * one of them reads its text, images and on/off switch through bonkers_option().
 * Those values used to be set by the Bonkers Addons plugin's own admin screens;
 * with the sections folded into the theme there was nowhere to edit them at all,
 * so a fresh install could not change a single headline.
 *
 * bonkers_option() reads the theme mod first and falls back to the old
 * `bonkers_addons_*` option, so the controls below write theme mods and a site
 * that already has option values keeps them until something is changed here.
 *
 * @package Bonkers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'bonkers_sanitize_toggle' ) ) :
	/**
	 * @param mixed $value Raw value.
	 * @return int
	 */
	function bonkers_sanitize_toggle( $value ) {
		return ( $value && 'false' !== $value ) ? 1 : 0;
	}
endif;

if ( ! function_exists( 'bonkers_sanitize_image_layout' ) ) :
	/**
	 * @param string $value Raw value.
	 * @return string
	 */
	function bonkers_sanitize_image_layout( $value ) {
		return in_array( $value, array( 'left', 'right' ), true ) ? $value : 'left';
	}
endif;

if ( ! function_exists( 'bonkers_sanitize_work_columns' ) ) :
	/**
	 * @param mixed $value Raw value.
	 * @return int
	 */
	function bonkers_sanitize_work_columns( $value ) {
		$value = absint( $value );

		return in_array( $value, array( 2, 3, 4 ), true ) ? $value : 3;
	}
endif;

if ( ! function_exists( 'bonkers_front_page_fields' ) ) :
	/**
	 * Every front page section, and the fields it reads.
	 *
	 * Each default repeats what the section template falls back to, so the
	 * control shows what the visitor is actually seeing.
	 *
	 * @return array
	 */
	function bonkers_front_page_fields() {
		$images = get_template_directory_uri() . '/assets/images/';

		return array(
			'welcome'      => array(
				'title'  => esc_html__( 'Welcome', 'bonkers' ),
				'fields' => array(
					'welcome_enable'     => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'welcome_title'      => array( 'type' => 'textarea', 'label' => esc_html__( 'Headline', 'bonkers' ), 'default' => __( 'Every Great Company<br>Starts with a Dream', 'bonkers' ) ),
					'welcome_image'      => array( 'type' => 'image', 'label' => esc_html__( 'Background image', 'bonkers' ), 'default' => $images . 'StockSnap_1A3MXAT0M6.jpg' ),
					'welcome_link_title' => array( 'type' => 'text', 'label' => esc_html__( 'Button text', 'bonkers' ), 'default' => __( 'View More', 'bonkers' ) ),
					'welcome_link_url'   => array( 'type' => 'url', 'label' => esc_html__( 'Button link', 'bonkers' ), 'default' => '#' ),
				),
			),
			'services'     => array(
				'title'       => esc_html__( 'Services', 'bonkers' ),
				'description' => esc_html__( 'The cards come from the Services widget area.', 'bonkers' ),
				'fields'      => array(
					'services_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
				),
			),
			'work'         => array(
				'title'  => esc_html__( 'Work', 'bonkers' ),
				'fields' => array(
					'work_enable'     => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'work_title'      => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'Selected work', 'bonkers' ) ),
					'work_intro'      => array( 'type' => 'textarea', 'label' => esc_html__( 'Intro', 'bonkers' ), 'default' => '' ),
					'work_columns'    => array( 'type' => 'columns', 'label' => esc_html__( 'Columns', 'bonkers' ), 'default' => 3 ),
					'work_more_title' => array( 'type' => 'text', 'label' => esc_html__( 'Link text', 'bonkers' ), 'default' => __( 'See everything', 'bonkers' ) ),
					'work_more_url'   => array( 'type' => 'url', 'label' => esc_html__( 'Link URL', 'bonkers' ), 'default' => '' ),
				),
			),
			'image'        => array(
				'title'  => esc_html__( 'Image and text', 'bonkers' ),
				'fields' => array(
					'image_enable'     => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'image_title'      => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'Start Growing your Business', 'bonkers' ) ),
					'image_text'       => array( 'type' => 'textarea', 'label' => esc_html__( 'Text', 'bonkers' ), 'default' => '' ),
					'image_image'      => array( 'type' => 'image', 'label' => esc_html__( 'Image', 'bonkers' ), 'default' => $images . 'StockSnap_JBW2PXDOL6.jpg' ),
					'image_layout'     => array( 'type' => 'layout', 'label' => esc_html__( 'Image side', 'bonkers' ), 'default' => 'left' ),
					'image_link_title' => array( 'type' => 'text', 'label' => esc_html__( 'Button text', 'bonkers' ), 'default' => __( 'Learn More', 'bonkers' ) ),
					'image_link_url'   => array( 'type' => 'url', 'label' => esc_html__( 'Button link', 'bonkers' ), 'default' => '#' ),
				),
			),
			'phone'        => array(
				'title'       => esc_html__( 'Phone', 'bonkers' ),
				'description' => esc_html__( 'The features either side come from the Phone widget areas.', 'bonkers' ),
				'fields'      => array(
					'phone_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'phone_image'  => array( 'type' => 'image', 'label' => esc_html__( 'Screen image', 'bonkers' ), 'default' => '' ),
				),
			),
			'cta'          => array(
				'title'  => esc_html__( 'Call to action', 'bonkers' ),
				'fields' => array(
					'cta_enable'     => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'cta_title'      => array( 'type' => 'textarea', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => '' ),
					'cta_image'      => array( 'type' => 'image', 'label' => esc_html__( 'Background image', 'bonkers' ), 'default' => $images . 'StockSnap_R7GVMRJWW9.jpg' ),
					'cta_link_title' => array( 'type' => 'text', 'label' => esc_html__( 'Button text', 'bonkers' ), 'default' => __( 'Sign Up', 'bonkers' ) ),
				),
			),
			'video'        => array(
				'title'  => esc_html__( 'Video', 'bonkers' ),
				'fields' => array(
					'video_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'video_title'  => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'Your success is our most important goal', 'bonkers' ) ),
					'video_text'   => array( 'type' => 'textarea', 'label' => esc_html__( 'Text below the video', 'bonkers' ), 'default' => '' ),
					'video_url'    => array( 'type' => 'url', 'label' => esc_html__( 'Video URL', 'bonkers' ), 'description' => esc_html__( 'YouTube, Vimeo, or a link to a video file.', 'bonkers' ), 'default' => '' ),
					'video_poster' => array( 'type' => 'image', 'label' => esc_html__( 'Poster image', 'bonkers' ), 'default' => '' ),
				),
			),
			'stats'        => array(
				'title'       => esc_html__( 'Numbers', 'bonkers' ),
				'description' => esc_html__( 'The figures come from the Numbers widget area.', 'bonkers' ),
				'fields'      => array(
					'stats_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
				),
			),
			'team'         => array(
				'title'  => esc_html__( 'Team', 'bonkers' ),
				'fields' => array(
					'team_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'team_title'  => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'The Team', 'bonkers' ) ),
				),
			),
			'testimonials' => array(
				'title'  => esc_html__( 'Testimonials', 'bonkers' ),
				'fields' => array(
					'testimonials_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'testimonials_title'  => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'What clients say', 'bonkers' ) ),
				),
			),
			'subscribe'    => array(
				'title'  => esc_html__( 'Subscribe', 'bonkers' ),
				'fields' => array(
					'subscribe_enable'           => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'subscribe_title'            => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'Subscribe', 'bonkers' ) ),
					'subscribe_text'             => array( 'type' => 'textarea', 'label' => esc_html__( 'Text', 'bonkers' ), 'default' => '' ),
					'subscribe_mailchimp_link'   => array( 'type' => 'url', 'label' => esc_html__( 'Form action URL', 'bonkers' ), 'description' => esc_html__( 'Where the email address is sent, for example a Mailchimp form action.', 'bonkers' ), 'default' => '' ),
					'subscribe_link_title'       => array( 'type' => 'text', 'label' => esc_html__( 'Button text', 'bonkers' ), 'default' => __( 'Subscribe', 'bonkers' ) ),
					'subscribe_link_placeholder' => array( 'type' => 'text', 'label' => esc_html__( 'Field placeholder', 'bonkers' ), 'default' => __( 'Enter your email...', 'bonkers' ) ),
				),
			),
			'clients'      => array(
				'title'       => esc_html__( 'Clients', 'bonkers' ),
				'description' => esc_html__( 'The logos come from the Clients widget area.', 'bonkers' ),
				'fields'      => array(
					'clients_enable' => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'clients_title'  => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'The Clients', 'bonkers' ) ),
				),
			),
			'contact'      => array(
				'title'  => esc_html__( 'Contact', 'bonkers' ),
				'fields' => array(
					'contact_enable'  => array( 'type' => 'toggle', 'label' => esc_html__( 'Show this section', 'bonkers' ), 'default' => 1 ),
					'contact_title'   => array( 'type' => 'text', 'label' => esc_html__( 'Heading', 'bonkers' ), 'default' => __( 'Contact', 'bonkers' ) ),
					'contact_intro'   => array( 'type' => 'textarea', 'label' => esc_html__( 'Intro', 'bonkers' ), 'default' => '' ),
					'contact_address' => array( 'type' => 'textarea', 'label' => esc_html__( 'Address', 'bonkers' ), 'description' => esc_html__( 'Shown as text, and used for the map when a Maps API key is set.', 'bonkers' ), 'default' => '' ),
					'contact_email'   => array( 'type' => 'text', 'label' => esc_html__( 'Email address', 'bonkers' ), 'default' => '' ),
					'contact_phone'   => array( 'type' => 'text', 'label' => esc_html__( 'Telephone', 'bonkers' ), 'default' => '' ),
					'contact_form'    => array( 'type' => 'form', 'label' => esc_html__( 'Contact form', 'bonkers' ), 'default' => '' ),
					'contact_key'     => array( 'type' => 'text', 'label' => esc_html__( 'Google Maps API key', 'bonkers' ), 'description' => esc_html__( 'Optional. Without a key the address is shown as text and no map is loaded.', 'bonkers' ), 'default' => '' ),
				),
			),
		);
	}
endif;

if ( ! function_exists( 'bonkers_contact_form_choices' ) ) :
	/**
	 * The contact forms available to choose from.
	 *
	 * @return array id => title
	 */
	function bonkers_contact_form_choices() {
		$choices = array( '' => esc_html__( '&mdash; None &mdash;', 'bonkers' ) );

		foreach ( array( 'wpcf7_contact_form', 'kali_forms' ) as $type ) {
			if ( ! post_type_exists( $type ) ) {
				continue;
			}

			$forms = get_posts(
				array(
					'post_type'      => $type,
					'posts_per_page' => 50,
					'post_status'    => 'any',
				)
			);

			foreach ( $forms as $form ) {
				$choices[ $form->ID ] = $form->post_title;
			}
		}

		return $choices;
	}
endif;

if ( ! function_exists( 'bonkers_customize_register_front_page' ) ) :
	/**
	 * Registers the panel, its sections and their controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	function bonkers_customize_register_front_page( $wp_customize ) {
		require_once get_template_directory() . '/inc/customizer-controls/class-bonkers-customize-controls.php';

		$wp_customize->add_panel(
			'bonkers_front_page',
			array(
				'title'       => esc_html__( 'Front Page Sections', 'bonkers' ),
				'description' => esc_html__( 'The sections on the Front Page template, in the order they appear. Each section reads its content here and its items from the matching widget area.', 'bonkers' ),
				'priority'    => 30,
			)
		);

		$sanitizers = array(
			'toggle'   => 'bonkers_sanitize_toggle',
			'text'     => 'sanitize_text_field',
			'textarea' => 'wp_kses_post',
			'url'      => 'esc_url_raw',
			'image'    => 'sanitize_text_field',
			'layout'   => 'bonkers_sanitize_image_layout',
			'columns'  => 'bonkers_sanitize_work_columns',
			'form'     => 'sanitize_text_field',
		);

		$priority = 10;

		foreach ( bonkers_front_page_fields() as $slug => $section ) {
			$section_id = 'bonkers_section_' . $slug;

			$wp_customize->add_section(
				$section_id,
				array(
					'title'       => $section['title'],
					'description' => isset( $section['description'] ) ? $section['description'] : '',
					'panel'       => 'bonkers_front_page',
					'priority'    => $priority,
				)
			);

			$priority += 10;

			foreach ( $section['fields'] as $name => $field ) {
				// bonkers_option() looks for this name, then the legacy option.
				$setting_id = 'bonkers_' . $name;

				$wp_customize->add_setting(
					$setting_id,
					array(
						'type'              => 'theme_mod',
						'default'           => $field['default'],
						'transport'         => 'refresh',
						'sanitize_callback' => $sanitizers[ $field['type'] ],
					)
				);

				$args = array(
					'label'   => $field['label'],
					'section' => $section_id,
				);

				if ( isset( $field['description'] ) ) {
					$args['description'] = $field['description'];
				}

				switch ( $field['type'] ) {
					case 'toggle':
						if ( class_exists( 'Bonkers_Customize_Control_Toggle' ) ) {
							$args['type'] = 'bonkers-toggle';
							$wp_customize->add_control( new Bonkers_Customize_Control_Toggle( $wp_customize, $setting_id, $args ) );
						} else {
							$args['type'] = 'checkbox';
							$wp_customize->add_control( $setting_id, $args );
						}
						break;

					case 'image':
						$args['mime_type'] = 'image';
						$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $setting_id, $args ) );
						break;

					case 'textarea':
						$args['type'] = 'textarea';
						$wp_customize->add_control( $setting_id, $args );
						break;

					case 'url':
						$args['type'] = 'url';
						$wp_customize->add_control( $setting_id, $args );
						break;

					case 'layout':
						$args['type']    = 'select';
						$args['choices'] = array(
							'left'  => esc_html__( 'Image on the left', 'bonkers' ),
							'right' => esc_html__( 'Image on the right', 'bonkers' ),
						);
						$wp_customize->add_control( $setting_id, $args );
						break;

					case 'columns':
						$args['type']    = 'select';
						$args['choices'] = array(
							2 => esc_html__( 'Two', 'bonkers' ),
							3 => esc_html__( 'Three', 'bonkers' ),
							4 => esc_html__( 'Four', 'bonkers' ),
						);
						$wp_customize->add_control( $setting_id, $args );
						break;

					case 'form':
						$args['type']    = 'select';
						$args['choices'] = bonkers_contact_form_choices();
						$wp_customize->add_control( $setting_id, $args );
						break;

					default:
						$args['type'] = 'text';
						$wp_customize->add_control( $setting_id, $args );
				}
			}
		}
	}
endif;
add_action( 'customize_register', 'bonkers_customize_register_front_page', 20 );
