<?php
/**
 * Bonkers Theme Customizer.
 *
 * @package Bonkers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bonkers_customize_register( $wp_customize ) {


	/**
	 * Control for the PRO buttons
	 */
	class bonkers_Pro_Version extends WP_Customize_Control{
		public function render_content()
		{
			$args = array(
				'a' => array(
					'href' => array(),
					'title' => array()
					),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				);
			echo wp_kses( $this->label, $args );
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	/*
    Colors
    ===================================================== */
    	/*
		Featured
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_hero_color', array( 'default' => '#2D80E2', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_hero_color', array(
			'label'        => esc_attr__( 'Featured Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Logo
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_logo_color', array( 'default' => '#222222', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_logo_color', array(
			'label'        => esc_attr__( 'Logo Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Headings
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_headings_color', array( 'default' => '#222222', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_headings_color', array(
			'label'        => esc_attr__( 'Headings Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Text
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_text_color', array( 'default' => '#808080', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_text_color', array(
			'label'        => esc_attr__( 'Text Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Link
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_link_color', array( 'default' => '#2D80E2', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_link_color', array(
			'label'        => esc_attr__( 'Link Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Footer Background
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_footer_background', array( 'default' => '#222222', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_footer_background', array(
			'label'        => esc_attr__( 'Footer Background Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );

		/*
		Header Background
		------------------------------ */
		$wp_customize->add_setting( 'bonkers_header_bck_color', array( 'default' => '#FFFFFF', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color', 'type' => 'theme_mod' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bonkers_header_bck_color', array(
			'label'        => esc_attr__( 'Header Background Color', 'bonkers' ),
			'section'    => 'colors',
		) ) );




	/*
	Typography
	------------------------------ */
	$wp_customize->add_section( 'bonkers_typography_section', array(
		'title' => esc_attr__( 'Typography', 'bonkers' ),
	) );

	if ( class_exists( 'Kirki' ) ){

		Kirki::add_field( 'bonkers_typography_font_family', array(
		    'type'     => 'select',
		    'settings' => 'bonkers_typography_font_family',
		    'label'    => esc_html__( 'Font Family', 'bonkers' ),
		    'section'  => 'bonkers_typography_section',
		    'default'  => 'PT Sans',
		    'priority' => 20,
		    'choices'  => Kirki_Fonts::get_font_choices(),
		    'output'   => array(
		        array(
		            'element'  => 'body',
		            'property' => 'font-family',
		        ),
		    ),
		) );

		Kirki::add_field( 'bonkers_typography_font_family_headings', array(
		    'type'     => 'select',
		    'settings' => 'bonkers_typography_font_family_headings',
		    'label'    => esc_html__( 'Headings Font Family', 'bonkers' ),
		    'section'  => 'bonkers_typography_section',
		    'default'  => 'PT Sans',
		    'priority' => 22,
		    'choices'  => Kirki_Fonts::get_font_choices(),
		    'output'   => array(
		        array(
		            'element'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
		            'property' => 'font-family',
		        ),
		    ),
		) );

		Kirki::add_field( 'bonkers_typography_subsets', array(
		    'type'        => 'multicheck',
		    'settings'    => 'bonkers_typography_subsets',
		    'label'       => esc_html__( 'Google-Font subsets', 'bonkers' ),
		    'description' => esc_html__( 'The subsets used from Google\'s API.', 'bonkers' ),
		    'section'     => 'bonkers_typography_section',
		    'default'     => '',
		    'priority'    => 23,
		    'choices'     => Kirki_Fonts::get_google_font_subsets(),
		    'output'      => array(
		        array(
		            'element'  => 'body',
		            'property' => 'font-subset',
		        ),
		    ),
		) );

		Kirki::add_field( 'bonkers_typography_font_size', array(
		    'type'      => 'slider',
		    'settings'  => 'bonkers_typography_font_size',
		    'label'     => esc_html__( 'Font Size', 'bonkers' ),
		    'section'   => 'bonkers_typography_section',
		    'default'   => 16,
		    'priority'  => 25,
		    'choices'   => array(
		        'min'   => 7,
		        'max'   => 48,
		        'step'  => 1,
		    ),
		    'output' => array(
		        array(
		            'element'  => 'html',
		            'property' => 'font-size',
		            'units'    => 'px',
		        ),
		    ),
		    'transport' => 'postMessage',
		    'js_vars'   => array(
		        array(
		            'element'  => 'html',
		            'function' => 'css',
		            'property' => 'font-size',
		            'units'    => 'px'
		        ),
		    ),
		) );
	}else{
		$wp_customize->add_setting( 'bonkers_typography_not_kirki', array( 'default' => '', 'sanitize_callback' => 'bonkers_sanitize_text', ) );
		$wp_customize->add_control( new bonkers_Display_Text_Control( $wp_customize, 'bonkers_typography_not_kirki', array(
			'section' => 'bonkers_typography_section', // Required, core or custom.
			'label' => sprintf( esc_html__( 'To change typography make sure you have installed the %1$s Kirki Toolkit %2$s plugin.', 'bonkers' ), '<a href="' . get_admin_url( null, 'themes.php?page=tgmpa-install-plugins' ) . '">', '</a>' ),
		) ) );
	}//if Kirki exists




}
add_action( 'customize_register', 'bonkers_customize_register' );











/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bonkers_customize_preview_js() {

	wp_register_script( 'bonkers_customizer_preview', get_template_directory_uri() . '/js/customizer-preview.js', array( 'customize-preview' ), '20151024', true );
	wp_localize_script( 'bonkers_customizer_preview', 'wp_customizer', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_url' => get_template_directory_uri(),
		'site_name' => get_bloginfo( 'name' ),
	));
	wp_enqueue_script( 'bonkers_customizer_preview' );

}
add_action( 'customize_preview_init', 'bonkers_customize_preview_js' );


/**
 * Load scripts on the Customizer not the Previewer (iframe)
 */
function bonkers_customize_js() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-sortable' );

	wp_enqueue_script( 'bonkers_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-controls', 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '20170815', true );
	wp_localize_script( 'bonkers_customizer', 'wp_customizer_admin', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_url' => get_template_directory_uri(),
		'admin_url' => get_admin_url(),
		'sortable_text' => esc_html__( 'Drag & Drop the sections to change order', 'bonkers' ),
	));

}
add_action( 'customize_controls_enqueue_scripts', 'bonkers_customize_js' );










/*
Sanitize Callbacks
*/

/**
 * Sanitize for post's categories
 */
function bonkers_sanitize_categories( $value ) {
    if ( ! array_key_exists( $value, bonkers_categories_ar() ) )
        $value = '';
    return $value;
}

/**
 * Sanitize return an non-negative Integer
 */
function bonkers_sanitize_integer( $value ) {
    return absint( $value );
}

/**
 * Sanitize return pro version text
 */
function bonkers_pro_version( $input ) {
    return $input;
}

/**
 * Sanitize Any
 */
function bonkers_sanitize_any( $input ) {
    return $input;
}

/**
 * Sanitize Text
 */
function bonkers_sanitize_text( $str ) {
	return sanitize_text_field( $str );
}

/**
 * Sanitize Textarea
 */
function bonkers_sanitize_textarea( $text ) {
	return esc_textarea( $text );
}

/**
 * Sanitize URL
 */
function bonkers_sanitize_url( $url ) {
	return esc_url( $url );
}

/**
 * Sanitize Boolean
 */
function bonkers_sanitize_bool( $string ) {
	return (bool)$string;
}

/**
 * Sanitize Text with html
 */
function bonkers_sanitize_text_html( $str ) {
	$args = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array()
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			    'span' => array(),
			);
	return wp_kses( $str, $args );
}

/**
 * Sanitize array for multicheck
 * http://stackoverflow.com/a/22007205
 */
function bonkers_sanitize_multicheck( $values ) {

    $multi_values = ( ! is_array( $values ) ) ? explode( ',', $values ) : $values;
	return ( ! empty( $multi_values ) ) ? array_map( 'sanitize_title', $multi_values ) : array();
}

/**
 * Sanitize GPS Latitude and Longitud
 * http://stackoverflow.com/a/22007205
 */
function bonkers_sanitize_lat_long( $coords ) {
	if ( preg_match( '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $coords ) ) {
	    return $coords;
	} else {
	    return 'error';
	}
}



/**
 * Create the "PRO version" buttons
 */
if ( ! function_exists( 'bonkers_pro_btns' ) ){
	function bonkers_pro_btns( $args ){

		$wp_customize = $args['wp_customize'];
		$title = $args['title'];
		$label = $args['label'];
		if ( isset( $args['priority'] ) || array_key_exists( 'priority', $args ) ) {
			$priority = $args['priority'];
		}else{
			$priority = 120;
		}
		if ( isset( $args['panel'] ) || array_key_exists( 'panel', $args ) ) {
			$panel = $args['panel'];
		}else{
			$panel = '';
		}

		$section_id = sanitize_title( $title );

		$wp_customize->add_section( $section_id , array(
			'title'       => $title,
			'priority'    => $priority,
			'panel' => $panel,
		) );
		$wp_customize->add_setting( $section_id, array(
			'sanitize_callback' => 'bonkers_pro_version'
		) );
		$wp_customize->add_control( new bonkers_Pro_Version( $wp_customize, $section_id, array(
	        'section' => $section_id,
	        'label' => $label
		   )
		) );
	}
}//end if function_exists

/**
 * Display Text Control
 * Custom Control to display text
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	class bonkers_Display_Text_Control extends WP_Customize_Control {
		/**
		* Render the control's content.
		*/
		public function render_content() {

	        $wp_kses_args = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array(),
			        'data-section' => array(),
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			    'span' => array(),
			);
	        ?>
			<p><?php echo wp_kses( $this->label, $wp_kses_args ); ?></p>
		<?php
		}
	}
}



/*
* AJAX call to retreive an image URI by its ID
*/
add_action( 'wp_ajax_nopriv_bonkers_get_image_src', 'bonkers_get_image_src' );
add_action( 'wp_ajax_bonkers_get_image_src', 'bonkers_get_image_src' );

function bonkers_get_image_src() {
	if ( isset( $_POST[ 'image_id' ] ) ) {
        $image_id = sanitize_text_field( wp_unslash( $_GET[ 'image_id' ] ) );
    }
	$image = wp_get_attachment_image_src( absint( $image_id ), 'full' );
	$image = $image[0];
	echo wp_kses_post( $image );
	die();
}
