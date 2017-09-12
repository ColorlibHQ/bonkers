<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_team_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-team-section" class="bonkers-team-section">
    <?php $bonkers_team_title = get_option( 'bonkers_addons_team_title', esc_html__( 'The Team', 'bonkers' ) ); ?>
    <h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_team_title ); ?></h2>

    <div class="bonkers-team-wrap">

         <?php 
        if ( is_active_sidebar( 'team-section' ) ){

                dynamic_sidebar( 'team-section' );

        }else{
        ?>

        <div class="bonkers-team-member">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/member1.jpg" alt="" class="bonkers-team-image">
            <div class="bonker-team-content">
                <h4 class="bonkers-team-name"><?php esc_html_e( 'John Doe', 'bonkers' ); ?></h4>
                <span class="bonkers-team-position"><?php esc_html_e( 'CEO', 'bonkers' ); ?></span>
                <ul class="bonkers-team-social">
                    <li><a href="#"><i class="fa-instagram fa"></i></a></li>
                    <li><a href="#"><i class="fa-twitter fa"></i></a></li>
                    <li><a href="#"><i class="fa-facebook fa"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="bonkers-team-member">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/member2.jpg" alt="" class="bonkers-team-image">
            <div class="bonker-team-content">
                <h4 class="bonkers-team-name"><?php esc_html_e( 'John Doe', 'bonkers' ); ?></h4>
                <span class="bonkers-team-position"><?php esc_html_e( 'CEO', 'bonkers' ); ?></span>
                <ul class="bonkers-team-social">
                    <li><a href="#"><i class="fa-instagram fa"></i></a></li>
                    <li><a href="#"><i class="fa-twitter fa"></i></a></li>
                    <li><a href="#"><i class="fa-facebook fa"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="bonkers-team-member">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/member1.jpg" alt="" class="bonkers-team-image">
            <div class="bonker-team-content">
                <h4 class="bonkers-team-name"><?php esc_html_e( 'John Doe', 'bonkers' ); ?></h4>
                <span class="bonkers-team-position"><?php esc_html_e( 'CEO', 'bonkers' ); ?></span>
                <ul class="bonkers-team-social">
                    <li><a href="#"><i class="fa-instagram fa"></i></a></li>
                    <li><a href="#"><i class="fa-twitter fa"></i></a></li>
                    <li><a href="#"><i class="fa-facebook fa"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="bonkers-team-member">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/member2.jpg" alt="" class="bonkers-team-image">
            <div class="bonker-team-content">
                <h4 class="bonkers-team-name"><?php esc_html_e( 'John Doe', 'bonkers' ); ?></h4>
                <span class="bonkers-team-position"><?php esc_html_e( 'CEO', 'bonkers' ); ?></span>
                <ul class="bonkers-team-social">
                    <li><a href="#"><i class="fa-instagram fa"></i></a></li>
                    <li><a href="#"><i class="fa-twitter fa"></i></a></li>
                    <li><a href="#"><i class="fa-facebook fa"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="bonkers-team-member">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/member1.jpg" alt="" class="bonkers-team-image">
            <div class="bonker-team-content">
                <h4 class="bonkers-team-name"><?php esc_html_e( 'John Doe', 'bonkers' ); ?></h4>
                <span class="bonkers-team-position"><?php esc_html_e( 'CEO', 'bonkers' ); ?></span>
                <ul class="bonkers-team-social">
                    <li><a href="#"><i class="fa-instagram fa"></i></a></li>
                    <li><a href="#"><i class="fa-twitter fa"></i></a></li>
                    <li><a href="#"><i class="fa-facebook fa"></i></a></li>
                </ul>
            </div>
        </div>
        <?php } ?>

    </div>
    
</div><!-- bonkers-team-section -->
<?php endif;