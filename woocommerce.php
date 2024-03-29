<?php
/**
 * The main template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Dommotion
 */

get_header();
?>
	<div class="breadcrumb">
		<?php bcn_display($return = false, $linked = true, $reverse = false, $force = false); ?>
	</div>
	
	<main id="primary" class="content-area">

		<?php
			woocommerce_content();
		?>

	</main><!-- .content-area -->

<?php
get_footer();
