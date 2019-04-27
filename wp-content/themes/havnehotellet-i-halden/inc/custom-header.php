<?php
if (function_exists('get_field') && !empty(get_field('header_display'))) :
  // Get header fields if the header is set to display
  $header_heading = get_field('header_heading');
  $header_text = get_field('header_text');
  $header_text_color = get_field('header_text_color');
  $header_overlay_color = get_field('header_overlay_color');
  $header_overlay_opacity = (int)get_field('header_overlay_opacity');
  $header_image_alignment = get_field('header_image_alignment');


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses havnehotellet_i_halden_header_style()
 */
function havnehotellet_i_halden_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'havnehotellet_i_halden_custom_header_args', array(
		'default-image'          => get_stylesheet_directory_uri() . '/images/havnehotellet-i-halden.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1920,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'havnehotellet_i_halden_header_style',
	) ) );

	require(__DIR__ . '/custom-header-fields.php');
}
add_action( 'after_setup_theme', 'havnehotellet_i_halden_custom_header_setup' );
  
// Set fallback text color
  if (empty($header_text_color)) {
    $header_text_color = '#fff';
  }

  // Set fallback overlay color
  if (empty($header_overlay_color)) {
    $header_overlay_color = '#000';
  }


		/*
		* If no custom options for text are set, let's bail.
		* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			$header_text_color = false;
		}

  // convert opacity from range 0-100 to 0-1
  $header_overlay_opacity = $header_overlay_opacity / 100;


  // Get regular page title as fallback
  if (empty($header_heading) && is_singular()) :
    $header_heading = get_the_title();
  endif;

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			.page-header {
				background-image: url(<?= esc_attr( $header_image ); ?>);
			}

			<?php if ( $header_text_color !== false ) : ?>
			.page-title,
			.page-description {
				color: #<?= esc_attr( $header_text_color ); ?>;
			}
			<?php endif; ?>
		</style>
		<?php
	

  // Get fallback background image
  $header_image = get_stylesheet_directory_uri() . '/images/havnehotellet-i-halden.jpg';

  // Get this posts featured image
  if (has_post_thumbnail(get_the_ID())) :
    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
    $header_image = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
    $header_image = $header_image[0];
  endif;

  // Dynamic styling for header template part
  ?>
  <style>
    .page-header .page-header-overlay {
      opacity: <?= $header_overlay_opacity ?>;
      background-color: <?= $header_overlay_color ?>;
    }

    .page-header .page-header-background {
      background-image: url('<?= $header_image ?>');
      background-position: center <?= $header_image_alignment ?>;
    }

    .page-header .page-header-content {
      color: <?= $header_text_color ?>;
    }
  </style>
  <?php

  // Make the variables available to the template part
  set_query_var('header_heading', $header_heading);
  set_query_var('header_text', $header_text);

  // Get header template part
  if (is_front_page()) :
    // Get special front-page header fields
    set_query_var('booking_info_text', get_field('booking_info_text'));
    set_query_var('booking_info_link', get_field('booking_info_link'));

    get_template_part('template-parts/header', 'front_page');
  else :
    get_template_part('template-parts/header', get_post_type());
  endif;
elseif (is_search()) :
  get_template_part('template-parts/header', 'search');
elseif (is_archive()) :
  get_template_part('template-parts/header', 'archive');
elseif (is_404()) :
  get_template_part('template-parts/header', '404');
else :
  get_template_part('template-parts/header', 'none');

endif;




