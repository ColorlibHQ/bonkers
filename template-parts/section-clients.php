<?php
$bonkers_enable_section = get_option( 'bonkers_addons_team_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-clients-section" class="bonkers-clients-section">
	<?php $bonkers_clients_title = get_option( 'bonkers_addons_clients_title', esc_html__( 'The Clients', 'bonkers' ) ); ?>
	<h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_clients_title ); ?></h2>

	<div class="bonkers-clients-wrap">

			<?php
			if ( is_active_sidebar( 'clients-section' ) ) {

				dynamic_sidebar( 'clients-section' );

			}
		?>

	</div>

	</div><!-- bonkers-clients-section -->
<?php
endif;
