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
		array( 'Casa Jabuticaba', 'Residencial', 'Cotia, SP', '2025' ),
		array( 'Loja Alvenaria', 'Comercial', 'Pinheiros, SP', '2024' ),
		array( 'Apartamento Copan', 'Interiores', 'Centro, SP', '2024' ),
		array( 'Refúgio Serra Fina', 'Residencial', 'Passa Quatro, MG', '2023' ),
	);
}

/**
 * URL de um arquivo dentro de assets/images.
 */
function lume_image_url( $file ) {
	return LUME_URI . '/assets/images/' . ltrim( $file, '/' );
}

/**
 * Ilustração usada quando o projeto não tem imagem destacada.
 * A escolha depende só do número (ID ou posição), então o card e a
 * capa do mesmo projeto mostram sempre a mesma imagem.
 */
function lume_illustration( $key, $class = '' ) {
	$files = array( 'arco', 'fachada', 'interior', 'serra' );
	$file  = $files[ absint( $key ) % count( $files ) ];

	return sprintf(
		'<img src="%s" alt="" class="%s" width="1200" height="1200" loading="lazy" decoding="async">',
		esc_url( lume_image_url( "projetos/{$file}.svg" ) ),
		esc_attr( $class )
	);
}

/**
 * Imagem destacada do projeto ou a ilustração de fallback.
 */
function lume_project_image( $post_id, $size = 'lume-card' ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail( $post_id, $size );
	}
	return lume_illustration( $post_id );
}

/**
 * Nome da view transition que liga o card à capa do projeto.
 */
function lume_transition_name( $post_id ) {
	return 'lume-projeto-' . absint( $post_id );
}
