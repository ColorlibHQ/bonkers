<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_welcome_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<?php
$bonkers_welcome_image = get_option( 'bonkers_addons_welcome_image', esc_url( get_template_directory_uri() ) . '/images/StockSnap_1A3MXAT0M6.jpg' );
$bonkers_welcome_link_title = get_option( 'bonkers_addons_welcome_link_title', esc_html__( 'View More', 'bonkers' ) );
?>


<div id="bonkers-welcome-section" class="bonkers-welcome-section" <?php if( false == $bonkers_enable_section ): echo 'style="display: none;"'; else: echo 'style="background-image: url(' . esc_url( $bonkers_welcome_image ) . ')"'; endif ?>>

    <div class="bonkers-welcome-intro">
        <h2 class="bonkers-intro-line"><?php echo wp_kses_post( get_option( 'bonkers_addons_welcome_title', wp_kses_post( __( 'Every Great Company<br> Starts With An Idea', 'bonkers' ) ) ) ); ?></h2>
        <?php if ( ! empty( $bonkers_welcome_link_title ) || is_customize_preview() ) { ?>
        <a href="<?php echo esc_url( get_option( 'bonkers_addons_welcome_link_url', '#' ) ); ?>" class="ql_border_btn"><?php echo esc_html( $bonkers_welcome_link_title ); ?></a>
        <?php } ?>
    </div><!-- welcome-intro -->
    
</div><!-- bonkers-welcome-section -->

<?php endif;