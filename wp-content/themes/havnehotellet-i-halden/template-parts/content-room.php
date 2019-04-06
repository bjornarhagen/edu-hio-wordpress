<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Havnehotellet_i_Halden
 */

?>

<article class="archive-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php havnehotellet_i_halden_post_thumbnail(); ?>
	
	<header class="entry-header">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
			 <?php

			 $price = get_field('room-price');
			 if($price) {
			 	echo '<p class="room-price">NOK ' . $price . ',-</p>';
			 }

			 $facilities = get_field('room-facilities');
			 if($facilities) {
			 	echo '<ul class="roomFacilities">';

			 	foreach($facilities as $value) {
			 		echo '<li><span id="facilityChecked">&times;</span>'. $value . '</li>';
			 	}

			 	echo '</ul>';
			 }

			 ?>

		
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'havnehotellet-i-halden' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'havnehotellet-i-halden' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<section>
		<a href="#" class="button">Les mer</a>
		<a href="#" class="button">Book nå</a>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
