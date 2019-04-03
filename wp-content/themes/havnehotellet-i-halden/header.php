<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Havnehotellet_i_Halden
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'havnehotellet-i-halden' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$havnehotellet_i_halden_description = get_bloginfo( 'description', 'display' );
			if ( $havnehotellet_i_halden_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $havnehotellet_i_halden_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="site-navigation">
			<button class="menu-toggle" aria-controls="menu-primary" aria-expanded="false"><?php esc_html_e( 'Meny', 'havnehotellet-i-halden' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-primary',
				'menu_id'        => 'menu-primary',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php
			while ( have_posts() ) :
				the_post();

				$header_heading = get_field('header_heading');
				$header_text = get_field('header_text');

				// Get regular page title as fallback
				if (empty($header_heading) && is_singular()):
					$header_heading = get_the_title();
				endif;

				echo '<h1 class="entry-title">' . $header_heading . '</h1>';
				echo '<p>' . $header_text . '</p>';
			endwhile; // End of the loop.
		?>
