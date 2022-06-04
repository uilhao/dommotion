<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Dommotion
 */

?>
	</div><!-- #content -->

	<?php 
	if ( is_front_page() ) {
		get_template_part( 'template-parts/content/story' );
	}
	?>

	<footer class="main-footer pt-5">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md">
					<h5>Institucional</h5>
					<?php echo render_menu('footer') ?>
				</div>
				<div class="col-6 col-md">
					<h5>Formas de Pagamento</h5>
					
				</div>
				<div class="col-md-2 text-center">
					<div class="logo"></div>
					<small class="d-block mb-3 text-muted">© <?php echo date('Y');?></small>
				</div>
			</div>
			<div class="disclaimer text-muted"<p><?php echo date('Y');?> Todos os direitos reservados.</p><div>
		</div><!-- .container -->
	</footer><!-- .main-footer -->

</div><!-- .main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
