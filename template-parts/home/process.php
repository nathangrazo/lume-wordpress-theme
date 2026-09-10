<?php
/**
 * Etapas do processo (rolagem horizontal).
 *
 * @package Lume
 */

$lume_steps = array(
	array( __( 'Escuta', 'lume' ), __( 'Visita ao terreno, conversa sobre rotina, orçamento e o que não pode faltar.', 'lume' ) ),
	array( __( 'Estudo', 'lume' ), __( 'Implantação, insolação e as primeiras maquetes. É aqui que o projeto ganha forma.', 'lume' ) ),
	array( __( 'Projeto', 'lume' ), __( 'Executivo completo, compatibilizado com estrutura, elétrica e hidráulica.', 'lume' ) ),
	array( __( 'Obra', 'lume' ), __( 'Acompanhamento semanal até a entrega das chaves e o primeiro café na casa nova.', 'lume' ) ),
);
?>

<section class="process" aria-labelledby="processo-titulo">
	<div class="process__sticky">
		<header class="process__head container">
			<p class="eyebrow"><?php esc_html_e( 'Como trabalhamos', 'lume' ); ?></p>
			<h2 id="processo-titulo"><?php esc_html_e( 'Do primeiro café à entrega das chaves.', 'lume' ); ?></h2>
		</header>

		<ol class="process__track">
			<?php foreach ( $lume_steps as $lume_i => list( $lume_title, $lume_text ) ) : ?>
				<li class="process__step">
					<span class="process__number"><?php echo esc_html( str_pad( (string) ( $lume_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $lume_title ); ?></h3>
					<p><?php echo esc_html( $lume_text ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
