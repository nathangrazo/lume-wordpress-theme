<?php
/**
 * Post do blog.
 *
 * @package Lume
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="conteudo" class="site-main">
		<article <?php post_class(); ?>>
			<?php
			get_template_part(
				'template-parts/content/page-header',
				null,
				array(
					'eyebrow' => get_the_date(),
					'title'   => get_the_title(),
				)
			);
			?>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="cover container"><?php the_post_thumbnail( 'lume-wide' ); ?></figure>
			<?php endif; ?>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

		<nav class="post-nav container" aria-label="<?php esc_attr_e( 'Navegação entre posts', 'lume' ); ?>">
			<?php previous_post_link( '<span class="post-nav__prev">%link</span>', '&larr; %title' ); ?>
			<?php next_post_link( '<span class="post-nav__next">%link</span>', '%title &rarr;' ); ?>
		</nav>

		<?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="entry-content">
				<?php comments_template(); ?>
			</div>
		<?php endif; ?>
	</main>
	<?php
endwhile;

get_footer();
