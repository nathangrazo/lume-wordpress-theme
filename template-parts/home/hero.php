<?php
/**
 * Hero da página inicial.
 *
 * @package Lume
 */

$lume_image = (int) lume_option( 'hero_image' );
?>

<section class="hero">
	<div class="hero__content container">
		<p class="eyebrow hero__eyebrow"><?php echo esc_html( lume_option( 'hero_eyebrow' ) ); ?></p>

		<h1 class="hero__title">
			<?php echo lume_split_words( lume_sanitize_inline_html( lume_option( 'hero_title' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput -- escapado em lume_split_words. ?>
		</h1>

		<div class="hero__art" aria-hidden="true">
			<?php if ( $lume_image ) : ?>
				<?php echo wp_get_attachment_image( $lume_image, 'lume-wide', false, array( 'class' => 'hero__image', 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?>
			<?php else : ?>
				<div class="arches">
					<span class="arch arch--1"></span>
					<span class="arch arch--2"></span>
					<span class="arch arch--3"></span>
					<span class="sun"></span>
				</div>
			<?php endif; ?>
		</div>

		<div class="hero__footer">
			<p class="hero__text"><?php echo esc_html( lume_option( 'hero_text' ) ); ?></p>
			<a class="button" href="#projetos">
				<span><?php esc_html_e( 'Ver projetos', 'lume' ); ?></span>
				<span class="button__arrow" aria-hidden="true">&darr;</span>
			</a>
		</div>
	</div>

	<a class="hero__scroll" href="#estudio">
		<span class="screen-reader-text"><?php esc_html_e( 'Rolar para baixo', 'lume' ); ?></span>
	</a>
</section>
