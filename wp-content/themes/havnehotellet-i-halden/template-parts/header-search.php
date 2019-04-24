<?php
  $header_heading = sprintf(esc_html__( 'Search Results for: %s', 'havnehotellet-i-halden' ), '<span>' . get_search_query() . '</span>');
  $header_text = '';
?>

<header class="page-header">
  <div id="page-navigation-padding"></div>
  <div class="page-header-overlay"></div>
  <div class="page-header-background"></div>
  <div class="page-header-content">
    <h1 class="page-title entry-title"><?=$header_heading?></h1>
    <p class="page-description"><?=$header_text?></p>
  </div>
</header>
