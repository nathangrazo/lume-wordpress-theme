<?php
/**
 * Cabeçalho das páginas internas.
 *
 * $args: eyebrow, title, intro.
 *
 * @package Lume
 */

$lume_head = wp_parse_args( $args, array( 'eyebrow' => '', 'title' => '', 'intro' => '' ) );
?>

<header class="page-header container">
	<?php if ( $lume_head['eyebrow'] ) : ?>
		<p class="eyebrow"><?php echo esc_html( $lume_head['eyebrow'] ); ?></p>
	<?php endif; ?>

	<h1 class="page-header__title"><?php echo lume_split_words( esc_html( $lume_head['title'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?></h1>

	<?php if ( $lume_head['intro'] ) : ?>
		<p class="page-header__intro"><?php echo esc_html( $lume_head['intro'] ); ?></p>
	<?php endif; ?>
</header>
