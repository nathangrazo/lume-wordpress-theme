<?php
/**
 * Lista de posts (blog) e fallback geral.
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
			'eyebrow' => __( 'Diário', 'lume' ),
			'title'   => is_home() ? single_post_title( '', false ) : wp_strip_all_tags( get_the_archive_title() ),
		)
	);
	?>

	<div class="container post-list">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'post-list__item reveal' ); ?>>
					<a href="<?php the_permalink(); ?>">
						<time class="post-list__type" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<h2 class="post-list__title"><?php the_title(); ?></h2>
						<span class="post-list__arrow" aria-hidden="true">&rarr;</span>
					</a>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Nada por aqui ainda.', 'lume' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
