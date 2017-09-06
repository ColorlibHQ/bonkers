<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_team_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-clients-section" class="bonkers-clients-section">
    <?php $bonkers_clients_title = get_option( 'bonkers_addons_clients_title', esc_html__( 'The Clients', 'bonkers' ) ); ?>
    <h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_clients_title ); ?></h2>

    <div class="bonkers-clients-wrap">

         <?php 
        if ( is_active_sidebar( 'clients-section' ) ){

                dynamic_sidebar( 'clients-section' );

        }else{
        ?>

        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>
        <div class="bonkers-clients-logo">
            <a href="#" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/wordpress_logo.png" alt="" class="bonkers-clients-image">
            </a>
        </div>

        <?php } ?>

    </div>
    
</div><!-- bonkers-clients-section -->
<?php endif;