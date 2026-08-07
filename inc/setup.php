<?php
/**
 * Theme supports e menus.
 *
 * @package Lume
 */

function lume_setup() {
	load_theme_textdomain( 'lume', LUME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 48,
			'width'       => 160,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'lume-card', 900, 1125, true );
	add_image_size( 'lume-wide', 1920, 1080, true );

	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'lume' ),
			'footer'  => __( 'Menu do rodapé', 'lume' ),
		)
	);
}
add_action( 'after_setup_theme', 'lume_setup' );
