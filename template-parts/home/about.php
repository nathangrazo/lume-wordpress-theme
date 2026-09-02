<?php
/**
 * Manifesto do estúdio e números.
 *
 * @package Lume
 */

$lume_numbers = array(
	array( 12, __( 'anos de estúdio', 'lume' ) ),
	array( 140, __( 'projetos entregues', 'lume' ) ),
	array( 9, __( 'prêmios e menções', 'lume' ) ),
);
?>

<section id="estudio" class="about section">
	<div class="container about__grid">
		<p class="eyebrow"><?php esc_html_e( 'O estúdio', 'lume' ); ?></p>

		<p class="about__manifesto">
			<?php
			foreach ( preg_split( '/\s+/', lume_option( 'about_text' ) ) as $lume_word ) {
				printf( '<span>%s</span> ', esc_html( $lume_word ) );
			}
			?>
		</p>

		<dl class="stats">
			<?php foreach ( $lume_numbers as list( $lume_value, $lume_label ) ) : ?>
				<div class="stats__item">
					<dt class="stats__label"><?php echo esc_html( $lume_label ); ?></dt>
					<dd class="stats__value" style="--target: <?php echo (int) $lume_value; ?>">
						<span class="screen-reader-text"><?php echo (int) $lume_value; ?></span>
					</dd>
				</div>
			<?php endforeach; ?>
		</dl>
	</div>
</section>
