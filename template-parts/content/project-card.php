<?php
/**
 * Card de projeto.
 *
 * Recebe em $args: id, title, url, type, place, year e image (HTML).
 *
 * @package Lume
 */

$lume_card = wp_parse_args(
	$args,
	array(
		'id'    => 0,
		'title' => '',
		'url'   => '',
		'type'  => '',
		'place' => '',
		'year'  => '',
		'image' => '',
	)
);
$lume_tag  = $lume_card['url'] ? 'a' : 'div';
?>

<article class="project-card reveal">
	<<?php echo esc_html( $lume_tag ); ?> class="project-card__link" <?php echo $lume_card['url'] ? 'href="' . esc_url( $lume_card['url'] ) . '"' : ''; ?>>
		<div
			class="project-card__media"
			<?php if ( $lume_card['id'] ) : ?>
				style="view-transition-name: <?php echo esc_attr( lume_transition_name( $lume_card['id'] ) ); ?>"
			<?php endif; ?>
		>
			<?php echo $lume_card['image']; // phpcs:ignore WordPress.Security.EscapeOutput -- vem de get_the_post_thumbnail ou lume_illustration. ?>
			<?php if ( $lume_card['url'] ) : ?>
				<span class="project-card__badge" aria-hidden="true"><?php esc_html_e( 'Ver projeto', 'lume' ); ?></span>
			<?php endif; ?>
		</div>

		<div class="project-card__meta">
			<h3 class="project-card__title"><?php echo esc_html( $lume_card['title'] ); ?></h3>
			<p class="project-card__info">
				<span><?php echo esc_html( $lume_card['type'] ); ?></span>
				<span><?php echo esc_html( trim( $lume_card['place'] . ' · ' . $lume_card['year'], ' ·' ) ); ?></span>
			</p>
		</div>
	</<?php echo esc_html( $lume_tag ); ?>>
</article>
