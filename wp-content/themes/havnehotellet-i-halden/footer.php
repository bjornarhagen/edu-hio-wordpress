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
		<?php
			$logo = get_stylesheet_directory_uri() . '/images/logo-light.png';
		?>
			<a href="<?= esc_url(home_url('/')) ?>" class="custom-logo-link" rel="home" itemprop="url">
				<img src="<?= $logo ?>" class="custom-logo" alt="<?= bloginfo('name') ?> logo" itemprop="logo">
			</a>
		<?php

			wp_nav_menu( array(
				'theme_location' => 'menu-footer-primary',
				'menu_id'        => 'menu-footer-primary',
				'container'      => false
			) );
		?>

		<div class="divider-visible"></div>

		<?php
			$contact_page = get_page_by_path( 'kontakt' )->ID;

			$address = get_field('hotel_address', $contact_page);
			$lat = get_field('hotel_coordinates_lat', $contact_page);
			$lon = get_field('hotel_coordinates_lon', $contact_page);
		?>
		
		<div class="address">
			<a href="https://www.google.com/maps/place/<?= str_replace(' ', '+', $address) ?>"
				class="street-and-city"
			>
				<?= str_replace(', ', ',</br>', $address) ?>
			</a>
			<a href="https://www.google.com/maps/@<?= $lat ?>,<?= $lon ?>,17z"
				target="_blank"
				rel="noopener nofollow noreferrer"
				class="coordinates"
			>
				<div class="item">
					<span class="label">Lat</span>
					<span class="value"><?= $lat ?></span>
				</div>
				<div class="item">
					<span class="label">Lang</span>
					<span class="value"><?= $lon ?></span>
				</div>
			</a>
		</div>

		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-footer-secondary',
				'menu_id'        => 'menu-footer-secondary',
				'container'      => false
			) );
		?>

		<div class="contact-info">
			<div class="item">
				<span class="label"><?= get_icon('mail') ?></span>
				<span class="value"><?= get_field('hotel_contact_email', $contact_page) ?></span>
			</div>
			<div class="item">
				<span class="label"><?= get_icon('phone') ?></span>
				<span class="value"><?= get_field('hotel_contact_phone', $contact_page) ?></span>
			</div>
		</div>

		<div class="divider-invisible"></div>
		
		<p class="copyright">&copy; Oppgavsrett <?= date('Y') ?> — <?= bloginfo('name') ?> AS</p>
		<p class="credit">
			<span>Design &amp; kode av</span>
			<a href="https://itstud.hiof.no/~bereketa/" target="_blank" rel="noopener">Bereket</a>,
			<a href="https://itstud.hiof.no/~bjornarh/" target="_blank" rel="noopener">Bjørnar</a>
			<span>og</span>
			<a href="https://itstud.hiof.no/~linesaa/" target="_blank" rel="noopener">Line</a>
		</p>
	</footer><!-- #colophon -->
</div><!-- #page -->



<?php wp_footer(); ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</body>
</html>
