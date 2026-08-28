<?php
/**
 * Página inicial.
 *
 * @package Lume
 */

get_header();
?>

<main id="conteudo" class="home">
	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/marquee' );
	get_template_part( 'template-parts/home/about' );
	get_template_part( 'template-parts/home/projects' );
	get_template_part( 'template-parts/home/process' );
	get_template_part( 'template-parts/home/contact' );
	?>
</main>

<?php
get_footer();
