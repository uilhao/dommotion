<?php
/**
 * Displays the site header.
 *
 * @package Dommotion
 * @subpackage Dommotion
 * @since 1.0.0
 */

$wrapper_classes  = '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>


<div class="banner position-relative overflow-hidden text-center bg-light">
	<div class="col-md-6 p-lg-6 mx-auto">
		<h1 class="display-5 font-weight-normal"><?php echo get_bloginfo('description'); ?></h1>
		<p class="lead font-weight-normal">Para medidas que ultrapassam limites</p>
		<a class="btn btn-dark" href="/sobre-a-maps/">Saiba mais</a>
	</div>
</div>

