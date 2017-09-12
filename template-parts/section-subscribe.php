<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_subscribe_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-subscribe-section" class="bonkers-subscribe-section">
        
    <div class="bonkers-subscribe-content">
        <?php $bonkers_subscribe_title = get_option( 'bonkers_addons_subscribe_title', esc_html__( 'Subscribe', 'bonkers' ) ); ?>
        <h3 class="bonkers-subscribe-title"><?php echo esc_html( $bonkers_subscribe_title ); ?></h3>
        <div class="bonkers-subscribe-text">
            <?php 
            $bonkers_subscribe_text = get_option( 'bonkers_addons_subscribe_text' );
            echo wp_kses_post( $bonkers_subscribe_text );
            ?>
        </div>
        <div class="bonkers-subscribre-form-wrapper">
            <?php
            $bonkers_subscribe_link_title = get_option( 'bonkers_addons_subscribe_link_title', esc_html__( 'Subscribe', 'bonkers' ) );
            $bonkers_subscribe_link_placeholder = get_option( 'bonkers_addons_subscribe_link_placeholder', esc_html__( 'Enter your email...', 'bonkers' ) );
            if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'contact-form' ) ) {
                echo do_shortcode( '
                    [contact-form submit_button_text="' . esc_html( $bonkers_subscribe_link_title ) .'"]
                    [contact-field label="' . esc_attr__( 'Email', 'bonkers' ) . '" type="email" required="true" placeholder="' . esc_html( $bonkers_subscribe_link_placeholder ) .'" /]
                    [/contact-form]
                    ' );
            };
            ?>
        </div>
    </div>
    
</div><!-- bonkers-subscribe-section -->
<?php endif; ?>