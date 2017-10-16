<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bonkers
 */

get_header(); ?>

	<div id="content" class="<?php echo esc_attr( bonkers_content_css_class() ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			if ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				if ( bonkers_is_portfolio_category( $term->taxonomy ) ) {

					echo "<div class='portfolio-container masonry' data-post-type='" . esc_attr( get_post_type() ) . "'>\n\n";
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-portfolio', 'portfolio' );

					endwhile;
					echo "</div><!-- .portfolio_container -->\n\n";

					get_template_part( 'template-parts/pagination', 'portfolio' );


				}
			} else { //is_tax()
						?>

						<div class="bonkers-post-wrapper">

							<?php ;/* Start the Loop */ ?>
				<?php
				while ( have_posts() ) :
					the_post();
?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

						</div><!-- /bonkers-post-wrapper -->

							<?php get_template_part( 'template-parts/pagination', 'archive' ); ?>

						<?php
			}// End if().
?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
