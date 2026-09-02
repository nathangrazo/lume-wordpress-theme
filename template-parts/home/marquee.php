<?php
/**
 * Faixa com os serviços rolando.
 *
 * @package Lume
 */

$lume_services = array(
	__( 'Residencial', 'lume' ),
	__( 'Interiores', 'lume' ),
	__( 'Comercial', 'lume' ),
	__( 'Paisagismo', 'lume' ),
	__( 'Restauro', 'lume' ),
	__( 'Mobiliário', 'lume' ),
);
?>

<div class="marquee" aria-label="<?php esc_attr_e( 'Serviços', 'lume' ); ?>">
	<?php for ( $lume_copy = 0; $lume_copy < 2; $lume_copy++ ) : ?>
		<ul class="marquee__track" <?php echo $lume_copy ? 'aria-hidden="true"' : ''; ?>>
			<?php foreach ( $lume_services as $lume_service ) : ?>
				<li><?php echo esc_html( $lume_service ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endfor; ?>
</div>
