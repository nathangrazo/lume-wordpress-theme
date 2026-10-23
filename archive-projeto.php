<?php
/**
 * Lista de projetos (também usada pela taxonomia tipologia).
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
			'eyebrow' => is_tax() ? __( 'Tipologia', 'lume' ) : __( 'Portfólio', 'lume' ),
			'title'   => is_tax() ? single_term_title( '', false ) : __( 'Projetos', 'lume' ),
		)
	);
	?>

	<?php
	$lume_tipologias = get_terms( array( 'taxonomy' => 'tipologia', 'hide_empty' => true ) );
	if ( $lume_tipologias && ! is_wp_error( $lume_tipologias ) ) :
		?>
		<ul class="filters container">
			<li><a class="filters__item<?php echo is_tax() ? '' : ' is-active'; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'projeto' ) ); ?>"><?php esc_html_e( 'Todos', 'lume' ); ?></a></li>
			<?php foreach ( $lume_tipologias as $lume_term ) : ?>
				<li><a class="filters__item<?php echo is_tax( 'tipologia', $lume_term->term_id ) ? ' is-active' : ''; ?>" href="<?php echo esc_url( get_term_link( $lume_term ) ); ?>"><?php echo esc_html( $lume_term->name ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<div class="container projects__grid">
		<?php
		while ( have_posts() ) :
			the_post();
			$lume_terms = get_the_terms( get_the_ID(), 'tipologia' );

			get_template_part(
				'template-parts/content/project-card',
				null,
				array(
					'id'    => get_the_ID(),
					'title' => get_the_title(),
					'url'   => get_permalink(),
					'type'  => $lume_terms && ! is_wp_error( $lume_terms ) ? $lume_terms[0]->name : '',
					'place' => get_post_meta( get_the_ID(), 'lume_local', true ),
					'year'  => get_post_meta( get_the_ID(), 'lume_ano', true ),
					'tone'  => lume_project_tone( get_the_ID() ),
					'image' => get_the_post_thumbnail( null, 'lume-card' ),
				)
			);
		endwhile;
		?>
	</div>

	<div class="container">
		<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
	</div>
</main>

<?php
get_footer();
