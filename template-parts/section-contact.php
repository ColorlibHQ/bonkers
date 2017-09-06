<?php
$bonkers_enable_section = bonkers_get_option( 'bonkers_addons_contact_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-contact-section" class="bonkers-contact-section" <?php if( false == $bonkers_enable_section ): echo 'style="display: none;"'; endif; ?>>
        
    <?php
    $bonkers_contact_key = get_option( 'bonkers_addons_contact_key' );
    if ( ! empty( $bonkers_contact_key ) ) {
    ?>
        <div class="bonkers-contact-map">
            <div id="bonkers-map"></div>
        </div>
    <?php } ?>

    <div class="bonkers-contact-content">
        <?php $bonkers_contact_title = get_option( 'bonkers_addons_contact_title', esc_html__( 'Contact', 'bonkers' ) ); ?>
        <h3 class="bonkers-contact-title"><?php echo esc_html( $bonkers_contact_title ); ?></h3>
            
            <div class="bonkers-contact-form">
                <?php 
                $bonkers_contact_form = get_option( 'bonkers_addons_contact_form' );
                if ( $bonkers_contact_form ) {
                    echo do_shortcode( '[contact-form-7 id="' . esc_attr( $bonkers_contact_form ) . '"]' );
                }
                ?>
            </div>
    </div>
    
</div><!-- bonkers-contact-section -->
<?php endif; ?>