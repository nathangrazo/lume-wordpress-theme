<?php
/**
 * Lume functions and definitions.
 *
 * @package Lume
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LUME_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );
define( 'LUME_DIR', get_template_directory() );
define( 'LUME_URI', get_template_directory_uri() );

require_once LUME_DIR . '/inc/setup.php';
require_once LUME_DIR . '/inc/enqueue.php';
require_once LUME_DIR . '/inc/template-tags.php';
require_once LUME_DIR . '/inc/post-types.php';
require_once LUME_DIR . '/inc/customizer.php';
