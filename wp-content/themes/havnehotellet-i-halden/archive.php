<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Havnehotellet_i_Halden
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

<<<<<<< HEAD
			<header class="page-header">
				<?php
				// Sjekk om siden er custom post type
				if ( is_post_type_archive() ) {
				    ?>
				    <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
				    <?php
				} else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				}
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

=======
>>>>>>> master
			<section class="archive-content-wrapper">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
			</section>
<<<<<<< HEAD
			
=======

>>>>>>> master
			<?php

			the_posts_navigation();


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
