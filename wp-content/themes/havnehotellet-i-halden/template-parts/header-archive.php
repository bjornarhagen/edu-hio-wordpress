<?php
// Sjekk om siden er custom post type
if (is_post_type_archive()) {
	$header_heading = post_type_archive_title();
} else {
	$header_heading =  get_the_archive_title();
}

$header_text = get_the_archive_description();
?>

<header class="page-header">
	<div id="page-navigation-padding"></div>
	<div class="page-header-overlay"></div>
	<div class="page-header-background"></div>
	<div class="page-header-content">
		<h1 class="page-title entry-title"><?= $header_heading ?></h1>
		<p class="page-description"><?= $header_text ?></p>
	</div>
</header>
