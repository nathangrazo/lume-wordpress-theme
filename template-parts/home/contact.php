<?php
/**
 * Chamada de contato.
 *
 * @package Lume
 */

$lume_email = lume_option( 'contact_email' );
$lume_phone = lume_option( 'contact_phone' );
$lume_insta = lume_option( 'instagram' );
?>

<section id="contato" class="contact section">
	<div class="container contact__inner">
		<p class="eyebrow"><?php esc_html_e( 'Contato', 'lume' ); ?></p>

		<h2 class="contact__title">
			<?php echo wp_kses( __( 'Tem um terreno, uma reforma ou <em>só uma ideia</em>?', 'lume' ), array( 'em' => array() ) ); ?>
		</h2>

		<?php if ( $lume_email ) : ?>
			<a class="contact__email" href="mailto:<?php echo esc_attr( antispambot( $lume_email ) ); ?>">
				<?php echo esc_html( antispambot( $lume_email ) ); ?>
			</a>
		<?php endif; ?>

		<ul class="contact__details">
			<?php if ( $lume_phone ) : ?>
				<li><a href="tel:<?php echo esc_attr( preg_replace( '/[^\d+]/', '', $lume_phone ) ); ?>"><?php echo esc_html( $lume_phone ); ?></a></li>
			<?php endif; ?>
			<li><?php echo esc_html( lume_option( 'contact_address' ) ); ?></li>
			<?php if ( $lume_insta ) : ?>
				<li><a href="<?php echo esc_url( $lume_insta ); ?>" target="_blank" rel="noopener">Instagram</a></li>
			<?php endif; ?>
		</ul>

		<svg class="badge" viewBox="0 0 200 200" aria-hidden="true">
			<defs>
				<path id="badge-circle" d="M100,100 m-78,0 a78,78 0 1,1 156,0 a78,78 0 1,1 -156,0" />
			</defs>
			<text>
				<textPath href="#badge-circle"><?php esc_html_e( 'vamos conversar • vamos conversar • ', 'lume' ); ?></textPath>
			</text>
		</svg>
	</div>
</section>
