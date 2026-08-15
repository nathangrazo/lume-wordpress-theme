<?php
/**
 * Funções auxiliares usadas nos templates.
 *
 * @package Lume
 */

/**
 * Menu padrão quando nenhum menu foi atribuído em Aparência > Menus.
 */
function lume_menu_fallback() {
	$items = array(
		home_url( '/#projetos' ) => __( 'Projetos', 'lume' ),
		home_url( '/#estudio' )  => __( 'Estúdio', 'lume' ),
		home_url( '/#contato' )  => __( 'Contato', 'lume' ),
	);

	echo '<ul class="site-nav__list">';
	foreach ( $items as $url => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}
