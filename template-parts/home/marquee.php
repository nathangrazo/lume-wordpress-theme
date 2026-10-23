<?php
/**
 * Faixas com os serviços rolando em sentidos opostos.
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

$lume_rows = array(
	array( 'marquee', $lume_services ),
	array( 'marquee marquee--outline', array_reverse( $lume_services ) ),
);
?>

<div class="marquees" aria-label="<?php esc_attr_e( 'Serviços', 'lume' ); ?>">
	<?php foreach ( $lume_rows as $lume_row_index => list( $lume_class, $lume_items ) ) : ?>
		<div class="<?php echo esc_attr( $lume_class ); ?>" <?php echo $lume_row_index ? 'aria-hidden="true"' : ''; ?>>
			<?php for ( $lume_copy = 0; $lume_copy < 2; $lume_copy++ ) : ?>
				<ul class="marquee__track" <?php echo $lume_copy ? 'aria-hidden="true"' : ''; ?>>
					<?php foreach ( $lume_items as $lume_service ) : ?>
						<li><?php echo esc_html( $lume_service ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endfor; ?>
		</div>
	<?php endforeach; ?>
</div>
