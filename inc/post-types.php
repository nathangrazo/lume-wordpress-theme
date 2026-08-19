<?php
/**
 * Post type "projeto", taxonomia "tipologia" e campos extras.
 *
 * @package Lume
 */

function lume_register_post_types() {
	register_post_type(
		'projeto',
		array(
			'labels'       => array(
				'name'          => __( 'Projetos', 'lume' ),
				'singular_name' => __( 'Projeto', 'lume' ),
				'add_new_item'  => __( 'Adicionar projeto', 'lume' ),
				'edit_item'     => __( 'Editar projeto', 'lume' ),
				'all_items'     => __( 'Todos os projetos', 'lume' ),
			),
			'public'       => true,
			'has_archive'  => 'projetos',
			'rewrite'      => array( 'slug' => 'projetos' ),
			'menu_icon'    => 'dashicons-building',
			'menu_position' => 5,
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		)
	);

	register_taxonomy(
		'tipologia',
		'projeto',
		array(
			'labels'            => array(
				'name'          => __( 'Tipologias', 'lume' ),
				'singular_name' => __( 'Tipologia', 'lume' ),
			),
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'tipologia' ),
		)
	);

	foreach ( lume_project_fields() as $key => $field ) {
		register_post_meta(
			'projeto',
			$key,
			array(
				'type'              => 'string',
				'single'            => true,
				'show_in_rest'      => true,
				'sanitize_callback' => 'sanitize_text_field',
				'auth_callback'     => static fn() => current_user_can( 'edit_posts' ),
			)
		);
	}
}
add_action( 'init', 'lume_register_post_types' );

/**
 * Campos exibidos na ficha técnica do projeto.
 */
function lume_project_fields() {
	return array(
		'lume_local' => __( 'Local', 'lume' ),
		'lume_ano'   => __( 'Ano', 'lume' ),
		'lume_area'  => __( 'Área', 'lume' ),
		'lume_status' => __( 'Status', 'lume' ),
	);
}

function lume_add_project_metabox() {
	add_meta_box( 'lume-ficha', __( 'Ficha técnica', 'lume' ), 'lume_render_project_metabox', 'projeto', 'side' );
}
add_action( 'add_meta_boxes', 'lume_add_project_metabox' );

function lume_render_project_metabox( $post ) {
	wp_nonce_field( 'lume_save_ficha', 'lume_ficha_nonce' );

	foreach ( lume_project_fields() as $key => $label ) {
		printf(
			'<p><label for="%1$s"><strong>%2$s</strong></label><br><input type="text" class="widefat" id="%1$s" name="%1$s" value="%3$s"></p>',
			esc_attr( $key ),
			esc_html( $label ),
			esc_attr( get_post_meta( $post->ID, $key, true ) )
		);
	}
}

function lume_save_project_meta( $post_id ) {
	if ( ! isset( $_POST['lume_ficha_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['lume_ficha_nonce'] ), 'lume_save_ficha' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array_keys( lume_project_fields() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}
}
add_action( 'save_post_projeto', 'lume_save_project_meta' );

/**
 * Atualiza as regras de URL ao ativar o tema.
 */
function lume_flush_rewrites() {
	lume_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'lume_flush_rewrites' );
