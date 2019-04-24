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
			?>
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

        // while (have_posts()):
            // the_post();

            if (function_exists('get_field') && !empty(get_field('header_display'))):
                // Get header fields if the header is set to display
                $header_heading = get_field('header_heading');
                $header_text = get_field('header_text');
                $header_text_color = get_field('header_text_color');
                $header_overlay_color = get_field('header_overlay_color');
                $header_overlay_opacity = (int) get_field('header_overlay_opacity');
                $header_image_alignment = get_field('header_image_alignment');

                // Set fallback text color
                if (empty($header_text_color)) {
                    $header_text_color = '#fff';
                }

                // Set fallback overlay color
                if (empty($header_overlay_color)) {
                    $header_overlay_color = '#000';
                }

                // convert opacity from range 0-100 to 0-1
        $header_overlay_opacity = $header_overlay_opacity / 100;

        // Get regular page title as fallback
        if (empty($header_heading) && is_singular()):
            $header_heading = get_the_title();
        endif;

        // Get fallback background image
        $header_image = get_stylesheet_directory_uri() . '/images/havnehotellet-i-halden.jpg';

        // Get this posts featured image
        if (has_post_thumbnail(get_the_ID())):
            $thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $header_image = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
                    $header_image = $header_image[0];
                endif;

                // Dynamic styling for header template part
                ?>
                <style>
                    .page-header .page-header-overlay {
                        opacity: <?=$header_overlay_opacity?>;
                        background-color: <?=$header_overlay_color?>;
                    }

                    .page-header .page-header-background {
                        background-image: url('<?=$header_image?>');
                        background-position: center <?=$header_image_alignment?>;
                    }

                    .page-header .page-header-content {
                        color: <?=$header_text_color?>;
                    }
                </style>
                <?php

                // Make the variables available to the template part
                set_query_var('header_heading', $header_heading);
                set_query_var('header_text', $header_text);

                // Get header template part
                if (is_front_page()):
                    // Get special front-page header fields
                    set_query_var('booking_info_text', get_field('booking_info_text'));
                    set_query_var('booking_info_link', get_field('booking_info_link'));

                    get_template_part('template-parts/header', 'front_page');
                else:
                    get_template_part('template-parts/header', get_post_type());
                endif;
            elseif (is_search()):
                get_template_part('template-parts/header', 'search');
            elseif (is_archive()):
                get_template_part('template-parts/header', 'archive');
            elseif (is_404()):
                get_template_part('template-parts/header', '404');
            else:
                get_template_part('template-parts/header', 'none');
            endif;
        // endwhile;
    ?>
