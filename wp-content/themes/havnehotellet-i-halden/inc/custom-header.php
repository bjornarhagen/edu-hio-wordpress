<?php
if (function_exists('get_field') && !empty(get_field('header_display'))) :
  // Get header fields if the header is set to display
  $header_heading = get_field('header_heading');
  $header_text = get_field('header_text');
  $header_text_color = get_field('header_text_color');
  $header_overlay_color = get_field('header_overlay_color');
  $header_overlay_opacity = (int)get_field('header_overlay_opacity');
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
  if (empty($header_heading) && is_singular()) :
    $header_heading = get_the_title();
  endif;
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
    set_query_var('booking_form_url', get_field('booking_form_url'));

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