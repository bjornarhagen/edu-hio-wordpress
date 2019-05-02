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

			$price = get_field('room-price');
			if($price) {
				echo '<p class="room-price">NOK ' . $price . ',-</p>';
			}

			
		?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
		
		$facilities = get_field('room-facilities');
		if($facilities) {
			echo '<ul class="roomFacilities">';

			foreach($facilities as $value) {
				$icon = str_replace(' ', '-', strtolower($value));
				echo '<li><span id="facilityChecked">' . get_icon($icon) . '</span>'. $value . '</li>';
			}

			echo '</ul>';
		}

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
		?>
	</div><!-- .entry-content -->
	<section class="room-btns">
		<?php 
		$classes = get_body_class();
		
		if (!in_array('single-room',$classes)) {
			echo '<a href="'.esc_url( get_permalink() ).'" class="button">Les mer</a>';
		}

		?>
		
		<a href="#" class="button button-secondary">Book nå</a>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
