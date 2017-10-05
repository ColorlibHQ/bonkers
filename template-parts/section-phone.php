<?php
$bonkers_enable_section = get_option( 'bonkers_addons_phone_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-phone-section" class="bonkers-phone-section" <?php if( false == $bonkers_enable_section ): echo 'style="display: none;"'; endif; ?>>

        <?php 
        if ( is_active_sidebar( 'phone-section-left' ) ){

            echo '<div class="bonkers-phone-services bonkers-phone-left">';

                dynamic_sidebar( 'phone-section-left' );

            echo '</div>';
        }else{
            ?>
            <div class="bonkers-phone-services bonkers-phone-left">
                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->
                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->
                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->
                
            </div>
        <?php
        }

        $bonkers_phone_image = get_option( 'bonkers_addons_phone_image' );
        if ( is_numeric( $bonkers_phone_image ) ) {
            $bonkers_phone_image = wp_get_attachment_url( $bonkers_phone_image );
        }
        ?>

            <div class="bonkers-phone-image">
                <div class="bonkers-phone-screenshot" <?php if( $bonkers_phone_image ): echo 'style="background-image: url(' . esc_url( $bonkers_phone_image ) . ')"'; endif ?>></div>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/phone_bck.png" alt="">
            </div>

        <?php
        if ( is_active_sidebar( 'phone-section-right' ) ){

            echo '<div class="bonkers-phone-services bonkers-phone-right">';

                dynamic_sidebar( 'phone-section-right' );

            echo '</div>';

        }else{
        ?>
            <div class="bonkers-phone-services bonkers-phone-right">

                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->
                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->
                <div class="bonkers-phone-service">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-phone-icon">
                    <div class="bonkers-phone-service-content">
                        <h4><?php esc_html_e( 'Feature Title', 'bonkers' ); ?></h4>
                        <p><?php esc_html_e( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.', 'bonkers' ); ?></p>
                    </div>
                </div><!-- bonkers-phone-service -->

            </div>

        <?php } ?>
    
</div><!-- bonkers-phone-section -->
<?php endif;