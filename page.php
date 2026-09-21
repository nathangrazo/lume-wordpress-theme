<?php
/**
 * Página padrão.
 *
 * @package Lume
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="conteudo" class="site-main">
		<?php get_template_part( 'template-parts/content/page-header', null, array( 'title' => get_the_title() ) ); ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="cover container"><?php the_post_thumbnail( 'lume-wide' ); ?></figure>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</main>
	<?php
endwhile;

get_footer();
