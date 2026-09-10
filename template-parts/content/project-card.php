<?php
/**
 * Card de projeto.
 *
 * Recebe em $args: title, url, type, place, year, tone e image (HTML).
 *
 * @package Lume
 */

$lume_card = wp_parse_args(
	$args,
	array(
		'title' => '',
		'url'   => '',
		'type'  => '',
		'place' => '',
		'year'  => '',
		'tone'  => 'tone-1',
		'image' => '',
	)
);
$lume_tag  = $lume_card['url'] ? 'a' : 'div';
?>

<article class="project-card reveal">
	<<?php echo esc_html( $lume_tag ); ?> class="project-card__link" <?php echo $lume_card['url'] ? 'href="' . esc_url( $lume_card['url'] ) . '"' : ''; ?>>
		<div class="project-card__media <?php echo esc_attr( $lume_card['tone'] ); ?>">
			<?php echo $lume_card['image']; // phpcs:ignore WordPress.Security.EscapeOutput -- vem de wp_get_attachment_image. ?>
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
