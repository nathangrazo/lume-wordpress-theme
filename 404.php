<?php
/**
 * Página não encontrada.
 *
 * @package Lume
 */

get_header();
?>

<main id="conteudo" class="site-main not-found">
	<div class="container not-found__inner">
		<p class="not-found__code" aria-hidden="true">4<span class="not-found__arch"></span>4</p>
		<h1><?php esc_html_e( 'Essa porta não leva a lugar nenhum.', 'lume' ); ?></h1>
		<p><?php esc_html_e( 'A página pode ter mudado de endereço ou nunca ter existido.', 'lume' ); ?></p>
		<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php esc_html_e( 'Voltar ao início', 'lume' ); ?></span></a>
	</div>
</main>

<?php
get_footer();
