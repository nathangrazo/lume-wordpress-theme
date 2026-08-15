<?php
/**
 * Rodapé do site.
 *
 * @package Lume
 */
?>

<footer class="site-footer">
	<div class="container">
		<div class="site-footer__top">
			<p class="site-footer__statement">
				<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
			</p>

			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav aria-label="<?php esc_attr_e( 'Menu do rodapé', 'lume' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'menu_class'     => 'site-footer__menu',
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>

		<div class="site-footer__bottom">
			<span>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
			<a href="#top" class="site-footer__top-link"><?php esc_html_e( 'Voltar ao topo', 'lume' ); ?> &uarr;</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
