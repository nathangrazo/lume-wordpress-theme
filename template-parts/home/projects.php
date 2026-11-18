<?php
/**
 * Projetos em destaque.
 *
 * @package Lume
 */

$lume_query = new WP_Query(
	array(
		'post_type'      => 'projeto',
		'posts_per_page' => 4,
		'no_found_rows'  => true,
	)
);
?>

<section id="projetos" class="projects section">
	<div class="container">
		<header class="section-head">
			<p class="eyebrow"><?php esc_html_e( 'Projetos selecionados', 'lume' ); ?></p>
			<h2 class="section-head__title"><?php echo wp_kses( __( 'Obras recentes, <em>de perto</em>.', 'lume' ), array( 'em' => array() ) ); ?></h2>
		</header>

		<div class="projects__grid">
			<?php
			if ( $lume_query->have_posts() ) :
				while ( $lume_query->have_posts() ) :
					$lume_query->the_post();
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
							'image' => lume_project_image( get_the_ID() ),
						)
					);
				endwhile;
				wp_reset_postdata();
			else :
				foreach ( lume_demo_projects() as $lume_i => list( $lume_title, $lume_type, $lume_place, $lume_year ) ) :
					get_template_part(
						'template-parts/content/project-card',
						null,
						array(
							'title' => $lume_title,
							'type'  => $lume_type,
							'place' => $lume_place,
							'year'  => $lume_year,
							'image' => lume_illustration( $lume_i ),
						)
					);
				endforeach;
			endif;
			?>
		</div>

		<?php if ( $lume_query->have_posts() || post_type_exists( 'projeto' ) ) : ?>
			<p class="projects__more">
				<a class="link-arrow" href="<?php echo esc_url( get_post_type_archive_link( 'projeto' ) ); ?>">
					<?php esc_html_e( 'Todos os projetos', 'lume' ); ?> <span aria-hidden="true">&rarr;</span>
				</a>
			</p>
		<?php endif; ?>
	</div>
</section>
