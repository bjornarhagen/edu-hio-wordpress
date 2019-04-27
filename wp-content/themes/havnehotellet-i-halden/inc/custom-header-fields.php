<?php
<<<<<<< HEAD
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ca500fdc4cea',
	'title' => 'Header',
	'fields' => array(
		array(
			'key' => 'field_5ca64fc7aaf97',
			'label' => 'Vis / skjul',
			'name' => 'header_display',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 1,
			'ui_on_text' => 'Vis',
			'ui_off_text' => 'Skjul',
		),
		array(
			'key' => 'field_5ca50114c9a13',
			'label' => 'Header - overskrift',
			'name' => 'header_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ca64fc7aaf97',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ca50120c9a14',
			'label' => 'Header - tekst',
			'name' => 'header_text',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ca64fc7aaf97',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 4,
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

=======

if (function_exists('acf_add_local_field_group')):
    $acf_files = ['custom-header-fields.json', 'custom-header-fields-frontpage-extra.json'];

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
>>>>>>> master
endif;
