<?php
/**
 * Cabeçalho do site.
 *
 * @package Lume
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#conteudo"><?php esc_html_e( 'Pular para o conteúdo', 'lume' ); ?></a>

<header class="site-header">
	<div class="site-header__inner container">
		<div class="site-brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-brand__name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?><span aria-hidden="true">.</span>
				</a>
			<?php endif; ?>
		</div>

		<input type="checkbox" id="menu-toggle" class="menu-toggle__input" aria-hidden="true" tabindex="-1">
		<label for="menu-toggle" class="menu-toggle" aria-controls="site-nav">
			<span class="menu-toggle__bars" aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Abrir menu', 'lume' ); ?></span>
		</label>

		<nav id="site-nav" class="site-nav" aria-label="<?php esc_attr_e( 'Menu principal', 'lume' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'site-nav__list',
					'depth'          => 1,
					'fallback_cb'    => 'lume_menu_fallback',
				)
			);
			?>
		</nav>
	</div>
</header>
