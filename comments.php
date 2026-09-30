<?php
/**
 * Comentários.
 *
 * @package Lume
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="comentarios" class="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments__title">
			<?php
			printf(
				/* translators: %s: número de comentários */
				esc_html( _n( '%s comentário', '%s comentários', get_comments_number(), 'lume' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>

		<ol class="comments__list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'  => __( 'Deixe um comentário', 'lume' ),
			'label_submit' => __( 'Enviar', 'lume' ),
			'class_submit' => 'button',
		)
	);
	?>
</section>
