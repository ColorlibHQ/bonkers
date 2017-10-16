<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bonkers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$bonkers_show_title = rwmb_meta( 'bonkers_show_title' );
	if ( 'no' != $bonkers_show_title ) {
	?>
		<header class="page-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bonkers' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

