<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_services_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :

?>
<div id="bonkers-services-section" class="bonkers-services-section" <?php if( false == $bonkers_enable_section ): echo 'style="display: none;"'; endif; ?>>
    <div class="container">
        <div class="row">
        <?php 
        if ( is_active_sidebar( 'services-section' ) ){

            dynamic_sidebar( 'services-section' );

        }else{
            ?>
                <div class="bonkers-service col-md-4 col-sm-6">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/48.Dashboard.png" alt="" class="bonkers-service-icon">
                    <h4><?php echo esc_html__( 'Service Title', 'bonkers' ); ?></h4>
                    <p><?php echo esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ); ?></p>
                    <a href="#" class="bonkers-service-btn"><?php echo esc_html__( 'Learn More', 'bonkers' ); ?></a>
                    <div class="clearfix"></div>
                </div><!-- service -->

                <div class="bonkers-service col-md-4 col-sm-6">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/30.User.png" alt="" class="bonkers-service-icon">
                    <h4><?php echo esc_html__( 'Service Title', 'bonkers' ); ?></h4>
                    <p><?php echo esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ); ?></p>
                    <a href="#" class="bonkers-service-btn"><?php echo esc_html__( 'Learn More', 'bonkers' ); ?></a>
                    <div class="clearfix"></div>
                </div><!-- service -->

                <div class="bonkers-service col-md-4 col-sm-12">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/03.Office.png" alt="" class="bonkers-service-icon">
                    <h4><?php echo esc_html__( 'Service Title', 'bonkers' ); ?></h4>
                    <p><?php echo esc_html__( 'Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'bonkers' ); ?></p>
                    <a href="#" class="bonkers-service-btn"><?php echo esc_html__( 'Learn More', 'bonkers' ); ?></a>
                    <div class="clearfix"></div>
                </div><!-- service -->
        <?php
        } 
        ?>
        </div><!-- row-->
    </div><!-- /container -->
</div><!-- services-section -->
<?php endif;