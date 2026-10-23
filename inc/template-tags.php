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

/**
 * Quebra um título em palavras para a animação de entrada.
 *
 * Mantém as tags <em> e <br> e envolve cada palavra em dois spans:
 * o externo esconde o overflow e o interno sobe com um atraso (--i).
 *
 * @param string $html Título já sanitizado.
 * @return string
 */
function lume_split_words( $html ) {
	$tokens = preg_split( '/(<\/?em>|<br\s*\/?>|\s+)/i', $html, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY );
	$out    = '';
	$i      = 0;

	foreach ( $tokens as $token ) {
		if ( preg_match( '/^(<\/?em>|<br\s*\/?>)$/i', $token ) ) {
			$out .= $token;
			continue;
		}
		if ( '' === trim( $token ) ) {
			$out .= ' ';
			continue;
		}
		$out .= sprintf(
			'<span class="word"><span style="--i:%d">%s</span></span>',
			$i++,
			esc_html( $token )
		);
	}

	return $out;
}

/**
 * Projetos de exemplo para a home quando ainda não há nenhum cadastrado.
 */
function lume_demo_projects() {
	return array(
		array( 'Casa Jabuticaba', 'Residencial', 'Cotia, SP', '2025', 'tone-1' ),
		array( 'Loja Alvenaria', 'Comercial', 'Pinheiros, SP', '2024', 'tone-2' ),
		array( 'Apartamento Copan', 'Interiores', 'Centro, SP', '2024', 'tone-3' ),
		array( 'Refúgio Serra Fina', 'Residencial', 'Passa Quatro, MG', '2023', 'tone-4' ),
	);
}

/**
 * Tom da ilustração de um projeto. Depende só do ID, então o card
 * e a página do projeto sempre usam a mesma cor.
 */
function lume_project_tone( $post_id ) {
	return 'tone-' . ( absint( $post_id ) % 4 + 1 );
}

/**
 * Nome da view transition que liga o card à capa do projeto.
 */
function lume_transition_name( $post_id ) {
	return 'lume-projeto-' . absint( $post_id );
}
