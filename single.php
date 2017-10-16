<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bonkers
 */

get_header(); ?>

	<div id="content" class="site-content <?php echo esc_attr( bonkers_content_css_class() ); ?>" role="content">

		<?php
		while ( have_posts() ) :
			the_post();
?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php bonkers_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
			?>

		<?php endwhile; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
