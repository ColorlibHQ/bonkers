<?php
/**
 * Front page: selected work.
 *
 * New in 1.1.0. Bonkers is sold as a portfolio theme and its front page had no
 * way to show any work on it -- the grid only existed on the blog. This pulls
 * from the Portfolio post type when Bonkers Addons registers one, and from
 * ordinary posts when it does not, so it fills itself on a plain install.
 *
 * @package Bonkers
 */

$bonkers_enable_section = bonkers_option( 'work_enable', true );

if ( ! $bonkers_enable_section && ! is_customize_preview() ) {
	return;
}

$bonkers_work = bonkers_work_query();

if ( ! $bonkers_work->have_posts() ) {
	return;
}

$bonkers_title = bonkers_option( 'work_title', esc_html__( 'Selected work', 'bonkers' ) );
$bonkers_intro = bonkers_option( 'work_intro', '' );
$bonkers_more  = bonkers_option( 'work_more_title', esc_html__( 'See everything', 'bonkers' ) );
$bonkers_more_url = bonkers_option( 'work_more_url', '' );
$bonkers_cols  = (int) bonkers_option( 'work_columns', 3 );
$bonkers_class = 4 === $bonkers_cols ? 'col-md-3 col-sm-6' : ( 2 === $bonkers_cols ? 'col-md-6' : 'col-md-4 col-sm-6' );
?>
<div id="bonkers-work-section" class="bonkers-work-section" <?php echo $bonkers_enable_section ? '' : 'style="display: none;"'; ?>>
	<div class="container">
		<?php if ( $bonkers_title ) : ?>
			<h2 class="bonkers-section-title"><?php echo esc_html( $bonkers_title ); ?></h2>
		<?php endif; ?>

		<?php if ( $bonkers_intro ) : ?>
			<p class="bonkers-section-intro"><?php echo esc_html( $bonkers_intro ); ?></p>
		<?php endif; ?>

		<div class="row">
			<?php
			while ( $bonkers_work->have_posts() ) :
				$bonkers_work->the_post();
				?>
				<div class="<?php echo esc_attr( $bonkers_class ); ?>">
					<article class="bonkers-post-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="bonkers-post-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="bonkers-post-card__body">
							<?php
							$bonkers_terms = get_the_terms( get_the_ID(), post_type_exists( 'portfolio' ) && 'portfolio' === get_post_type() ? 'portfolio_category' : 'category' );
							if ( $bonkers_terms && ! is_wp_error( $bonkers_terms ) ) :
								?>
								<p class="bonkers-post-card__meta"><?php echo esc_html( $bonkers_terms[0]->name ); ?></p>
							<?php endif; ?>
							<h3 class="bonkers-post-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
						</div>
					</article>
				</div>
			<?php endwhile; ?>
		</div>

		<?php if ( $bonkers_more_url ) : ?>
			<p class="bonkers-work-more-wrap">
				<a class="bonkers-work-more" href="<?php echo esc_url( $bonkers_more_url ); ?>">
					<?php echo esc_html( $bonkers_more ); ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</div><!-- bonkers-work-section -->
<?php
wp_reset_postdata();
