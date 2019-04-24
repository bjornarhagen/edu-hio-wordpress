<?php

if (function_exists('acf_add_local_field_group')) :
	$acf_files = ['custom-header-fields.json'];

	foreach ($acf_files as $acf_file) {
		$acf_json = file_get_contents(__DIR__ . '/acf/' . $acf_file);
		$acf_json = $acf_json;
		$acf_fields = json_decode($acf_json, true);

		// Did the JSON decode finish without any errors?
		if (json_last_error() === JSON_ERROR_NONE && is_array($acf_fields)) {
			// ACF's JSON export wraps all fields inside an array
			$acf_fields = $acf_fields[0];
			acf_add_local_field_group($acf_fields);
		} else {
			throw new Exception("Couldn't import ACF fields", 500);
		}
	}
endif;
