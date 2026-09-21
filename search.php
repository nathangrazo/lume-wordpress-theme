<?php
/**
 * Resultados de busca.
 *
 * @package Lume
 */

get_header();
?>

<main id="conteudo" class="site-main">
	<?php
	get_template_part(
		'template-parts/content/page-header',
		null,
		array(
			'eyebrow' => __( 'Busca', 'lume' ),
			/* translators: %s: termo buscado */
			'title'   => sprintf( __( 'Resultados para “%s”', 'lume' ), get_search_query() ),
		)
	);
	?>

	<div class="container post-list">
		<?php get_search_form(); ?>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'post-list__item' ); ?>>
					<a href="<?php the_permalink(); ?>">
						<span class="post-list__type"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
						<h2 class="post-list__title"><?php the_title(); ?></h2>
					</a>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nada encontrado. Tente outra palavra.', 'lume' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
