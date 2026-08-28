<?php
/**
 * Opções do tema em Aparência > Personalizar.
 *
 * @package Lume
 */

/**
 * Valores padrão. Usados também como fallback nos templates.
 */
function lume_defaults() {
	return array(
		'hero_eyebrow'    => __( 'Arquitetura & interiores — São Paulo', 'lume' ),
		'hero_title'      => __( 'Espaços que <em>respiram</em> luz.', 'lume' ),
		'hero_text'       => __( 'Projetamos casas, lojas e interiores com materiais honestos, luz natural e tempo pra pensar em cada detalhe.', 'lume' ),
		'hero_image'      => '',
		'about_text'      => __( 'Acreditamos que um bom projeto começa ouvindo. Cada espaço nasce da rotina de quem vai viver nele, da orientação do sol e do que o terreno já tem a dizer.', 'lume' ),
		'contact_email'   => 'contato@lume.arq.br',
		'contact_phone'   => '+55 11 3000-0000',
		'contact_address' => __( 'Rua Harmonia, 123 — Vila Madalena, São Paulo', 'lume' ),
		'instagram'       => '',
	);
}

/**
 * Lê uma opção do Customizer com fallback para o padrão.
 */
function lume_option( $key ) {
	$defaults = lume_defaults();
	return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

function lume_customize_register( WP_Customize_Manager $wp_customize ) {
	$defaults = lume_defaults();

	$wp_customize->add_panel(
		'lume_home',
		array(
			'title'    => __( 'Página inicial', 'lume' ),
			'priority' => 30,
		)
	);

	$sections = array(
		'lume_hero'    => __( 'Destaque (hero)', 'lume' ),
		'lume_about'   => __( 'Estúdio', 'lume' ),
		'lume_contact' => __( 'Contato', 'lume' ),
	);

	foreach ( $sections as $id => $title ) {
		$wp_customize->add_section( $id, array( 'title' => $title, 'panel' => 'lume_home' ) );
	}

	$fields = array(
		'hero_eyebrow'    => array( 'lume_hero', __( 'Chamada', 'lume' ), 'text', 'sanitize_text_field' ),
		'hero_title'      => array( 'lume_hero', __( 'Título (aceita <em>)', 'lume' ), 'text', 'lume_sanitize_inline_html' ),
		'hero_text'       => array( 'lume_hero', __( 'Texto', 'lume' ), 'textarea', 'sanitize_textarea_field' ),
		'about_text'      => array( 'lume_about', __( 'Manifesto', 'lume' ), 'textarea', 'sanitize_textarea_field' ),
		'contact_email'   => array( 'lume_contact', __( 'E-mail', 'lume' ), 'email', 'sanitize_email' ),
		'contact_phone'   => array( 'lume_contact', __( 'Telefone', 'lume' ), 'text', 'sanitize_text_field' ),
		'contact_address' => array( 'lume_contact', __( 'Endereço', 'lume' ), 'text', 'sanitize_text_field' ),
		'instagram'       => array( 'lume_contact', __( 'URL do Instagram', 'lume' ), 'url', 'esc_url_raw' ),
	);

	foreach ( $fields as $key => list( $section, $label, $type, $sanitize ) ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => $section,
				'type'    => $type,
			)
		);
	}

	$wp_customize->add_setting(
		'hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'hero_image',
			array(
				'label'     => __( 'Imagem do destaque', 'lume' ),
				'section'   => 'lume_hero',
				'mime_type' => 'image',
			)
		)
	);
}
add_action( 'customize_register', 'lume_customize_register' );

/**
 * Permite só <em> e <br> no título do hero.
 */
function lume_sanitize_inline_html( $value ) {
	return wp_kses(
		$value,
		array(
			'em' => array(),
			'br' => array(),
		)
	);
}
