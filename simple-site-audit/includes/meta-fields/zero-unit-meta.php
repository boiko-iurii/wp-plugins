<?php
/*
*
* Выводит группу полей "Комплексный аудит сайта - блок нулевой выдачи"
*
*/

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5e0321d1c6f6c',
		'title' => 'Комплексный аудит сайта',
		'fields' => array(
			array(
				'key' => 'field_5e03249e8ab70',
				'label' => '',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Выводит блок "Комплексный аудит сайта" спомощью шорткода <code>[ssa_zero_unit]</code>.',
				'new_lines' => '',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5e0339b071233',
				'label' => '',
				'name' => 'site_audit_switcher',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Включить блок на странице сайта.',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Вкл.',
				'ui_off_text' => 'Выкл.',
			),
			array(
				'key' => 'field_5e0321ffab869',
				'label' => 'Заголовок',
				'name' => 'site_audit_header',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e0339b071233',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'delay' => 1,
			),
			array(
				'key' => 'field_5e032236ab86a',
				'label' => 'Описание',
				'name' => 'site_audit_description',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e0339b071233',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '40',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'delay' => 1,
			),
			array(
				'key' => 'field_5e032267ab86b',
				'label' => 'Изображение',
				'name' => 'site_audit_img',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e0339b071233',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;