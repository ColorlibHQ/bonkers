<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_services_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :

    $bonkers_image_css_class = 'bonkers-image-left';
    $bonkers_image_layout = bonkers_get_option( 'bonkers_addons_image_layout', 'left' );
    if ( 'right' == $bonkers_image_layout ) {
        $bonkers_image_css_class = 'bonkers-image-right';
    }
?>
<div id="bonkers-image-section" class="bonkers-image-section <?php echo esc_attr( $bonkers_image_css_class ); ?>" <?php if( false == $bonkers_enable_section ): echo 'style="display: none;"'; endif; ?>>

    <?php
    $bonkers_image_image = get_option( 'bonkers_addons_image_image', esc_url( get_template_directory_uri() ) . '/images/computer-2562560_1920.jpg' );
    $bonkers_image_title = get_option( 'bonkers_addons_image_title', esc_html__( 'Start Growing your Business', 'bonkers' ) );
    $bonkers_image_link_title = get_option( 'bonkers_addons_image_link_title', esc_html__( 'Learn More', 'bonkers' ) );
    ?>

    <div class="bonkers-image-section-image" <?php if( $bonkers_image_image ): echo 'style="background-image: url(' . esc_url( $bonkers_image_image ) . ')"'; endif ?>>
        
    </div><div class="bonkers-image-section-text">
        <h3 class="bonkers-image-section-title"><?php echo esc_html( $bonkers_image_title ); ?></h3>
        <div class="bonkers-image-section-content">
            <?php 
            $bonkers_image_text = get_option( 'bonkers_addons_image_text' );
            echo wp_kses_post( $bonkers_image_text );
            ?>
            <?php if ( ! empty( $bonkers_image_link_title ) || is_customize_preview() ) { ?>
            <div class="clearfix"></div>
            <a href="<?php echo esc_url( get_option( 'bonkers_addons_image_link_url', '#' ) ); ?>" class="ql_border_btn"><?php echo esc_html( $bonkers_image_link_title ); ?></a>
            <?php } ?>
        </div>
    </div>
    
</div><!-- bonkers-image-section -->
<?php endif; ?>