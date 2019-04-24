<?php
  $header_heading = esc_html__( 'Oops! That page can&rsquo;t be found.', 'havnehotellet-i-halden' );
  $header_text = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'havnehotellet-i-halden' );
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
