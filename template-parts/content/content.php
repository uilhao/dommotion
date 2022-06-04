<?php 
/** 
 * Template part for displaying posts 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ 
 * 
 * @package WordPress 
 * @subpackage Dommotion
 */ 
 
?> 
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<header class="entry-header"> 
		<?php 
		if ( is_sticky() && is_home() && ! is_paged() ) { 
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'dommotion' ) ); 
		} 
		if ( is_singular() ) : 
			the_title( '<h1 class="entry-title">', '</h1>' ); 
		else : 
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
		endif; 
		?> 
	</header><!-- .entry-header --> 
 
	<div class="entry-content"> 
		<?php 
		the_content( 
			sprintf( 
				wp_kses( 
					/* translators: %s: Post title. Only visible to screen readers. */ 
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dommotion' ), 
					array( 
						'span' => array( 
							'class' => array(), 
						), 
					) 
				), 
				get_the_title() 
			) 
		); 
 
		wp_link_pages( 
			array( 
				'before' => '<div class="page-links">' . __( 'Pages:', 'dommotion' ), 
				'after'  => '</div>', 
			) 
		); 
		?> 
	</div><!-- .entry-content --> 
 
	<footer class="entry-footer"> 
		 
	</footer><!-- .entry-footer --> 
</article><!-- #post-<?php the_ID(); ?> --> 
