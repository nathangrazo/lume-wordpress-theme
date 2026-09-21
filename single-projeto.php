<?php
/**
 * Página de um projeto.
 *
 * @package Lume
 */

get_header();

while ( have_posts() ) :
	the_post();
	$lume_terms = get_the_terms( get_the_ID(), 'tipologia' );
	?>
	<main id="conteudo" class="site-main project">
		<?php
		get_template_part(
			'template-parts/content/page-header',
			null,
			array(
				'eyebrow' => $lume_terms && ! is_wp_error( $lume_terms ) ? $lume_terms[0]->name : __( 'Projeto', 'lume' ),
				'title'   => get_the_title(),
				'intro'   => has_excerpt() ? get_the_excerpt() : '',
			)
		);
		?>

		<dl class="project__sheet container">
			<?php foreach ( lume_project_fields() as $lume_key => $lume_label ) : ?>
				<?php $lume_value = get_post_meta( get_the_ID(), $lume_key, true ); ?>
				<?php if ( $lume_value ) : ?>
					<div>
						<dt><?php echo esc_html( $lume_label ); ?></dt>
						<dd><?php echo esc_html( $lume_value ); ?></dd>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</dl>

		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="cover cover--full"><?php the_post_thumbnail( 'lume-wide' ); ?></figure>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<p class="container project__back">
			<a class="link-arrow" href="<?php echo esc_url( get_post_type_archive_link( 'projeto' ) ); ?>">&larr; <?php esc_html_e( 'Todos os projetos', 'lume' ); ?></a>
		</p>
	</main>
	<?php
endwhile;

get_footer();
