<?php
/**
 * Fontes e folhas de estilo.
 *
 * @package Lume
 */

function lume_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..600;1,9..144,300..600&family=Instrument+Sans:wght@400..600&display=swap';
}

function lume_enqueue_assets() {
	wp_enqueue_style( 'lume-fonts', lume_fonts_url(), array(), null );

	// CSS compilado pelo webpack a partir de assets/scss (npm run build)
	$css = '/assets/dist/css/main.css';
	if ( file_exists( LUME_DIR . $css ) ) {
		wp_enqueue_style( 'lume', LUME_URI . $css, array( 'lume-fonts' ), filemtime( LUME_DIR . $css ) );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lume_enqueue_assets' );

/**
 * Preconnect para o Google Fonts.
 */
function lume_resource_hints( $urls, $relation ) {
	if ( 'preconnect' === $relation ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'lume_resource_hints', 10, 2 );

/**
 * Favicon do tema enquanto nenhum ícone foi definido em Personalizar.
 */
function lume_favicon() {
	if ( has_site_icon() ) {
		return;
	}
	printf( '<link rel="icon" type="image/svg+xml" href="%s">' . "\n", esc_url( lume_image_url( 'favicon.svg' ) ) );
}
add_action( 'wp_head', 'lume_favicon' );
