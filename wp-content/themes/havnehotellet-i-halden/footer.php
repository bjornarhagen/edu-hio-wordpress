<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Havnehotellet_i_Halden
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			the_custom_logo();
			wp_nav_menu( array(
				'theme_location' => 'menu-footer-primary',
				'menu_id'        => 'menu-footer-primary',
			) );
			?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-footer-secondary',
				'menu_id'        => 'menu-footer-secondary',
			) );
			?>
			<?php
			$havnehotellet_i_halden_description = get_bloginfo( 'description', 'display' );
			if ( $havnehotellet_i_halden_description || is_customize_preview() ) :
				?>
				<p><?php echo $havnehotellet_i_halden_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'havnehotellet-i-halden' ), 'havnehotellet-i-halden', '<a href="https://itstud.hiof.no/~bjornarh/,%20https://itstud.hiof.no/~bereketa/,%20https://itstud.hiof.no/~linesaa/">Bjørnar H., Bereket G.A., Line Sharina A.H.</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</body>
</html>
