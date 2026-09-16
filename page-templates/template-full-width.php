<?php
/**
 * Template Name: Full width
 *
 * A page with no sidebar, so the content column runs the whole width and wide
 * and full-width blocks have somewhere to expand. bonkers_content_css_class()
 * has always had a branch for this template; this is the file it was waiting
 * for.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bonkers
 */

get_header(); ?>

	<div id="content" class="<?php echo esc_attr( bonkers_content_css_class() ); ?> bonkers-full-width">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
					endif;
				?>

			<?php endwhile; ?>

			<div class="clearfix"></div>
	</div><!-- /content -->

<?php get_footer(); ?>
