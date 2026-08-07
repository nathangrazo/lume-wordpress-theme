<?php
/**
 * Template principal (fallback).
 *
 * @package Lume
 */

get_header();
?>

<main id="conteudo" class="site-main container">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nada por aqui ainda.', 'lume' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();
