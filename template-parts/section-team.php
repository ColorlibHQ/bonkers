<?php
$bonkers_enable_section = get_option( 'bonkers_addons_team_enable', true );
if ( $bonkers_enable_section || is_customize_preview() ) :
?>
<div id="bonkers-team-section" class="bonkers-team-section">
	<?php $bonkers_team_title = get_option( 'bonkers_addons_team_title', esc_html__( 'The Team', 'bonkers' ) ); ?>
	<h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_team_title ); ?></h2>

	<div class="bonkers-team-wrap">

		<?php
		if ( is_active_sidebar( 'team-section' ) ) {

				dynamic_sidebar( 'team-section' );

		}
		?>

	</div>

	</div><!-- bonkers-team-section -->
<?php
endif;
