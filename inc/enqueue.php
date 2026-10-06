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

	$files = array( 'base', 'layout', 'components', 'home', 'pages', 'responsive', 'animations' );
	$deps  = array( 'lume-fonts' );

	foreach ( $files as $file ) {
		$path = LUME_DIR . "/assets/css/{$file}.css";
		if ( ! file_exists( $path ) || ( 'home' === $file && ! is_front_page() ) ) {
			continue;
		}
		$handle = "lume-{$file}";
		wp_enqueue_style( $handle, LUME_URI . "/assets/css/{$file}.css", $deps, filemtime( $path ) );
		$deps = array( $handle );
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
