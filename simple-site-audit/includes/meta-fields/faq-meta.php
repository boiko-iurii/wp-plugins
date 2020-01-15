<?php
/*
*
* Выводит группу полей "Часто задаваемые вопросы"
*
*/

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5e04a7072ec9d',
		'title' => 'Часто задаваемые вопросы',
		'fields' => array(
			array(
				'key' => 'field_5e04a70735715',
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
				'message' => 'Выводит блок "Вопросы и ответы" спомощью шорткода <code>[ssa_faq]</code>.',
				'new_lines' => '',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5e04a7073575f',
				'label' => '',
				'name' => 'ssa_faq_switcher',
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
				'key' => 'field_5e04a9d035539',
				'label' => 'Заголовок блока',
				'name' => 'ssa_faq_header',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e04a7073575f',
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
				'key' => 'field_5e04a77d37b8b',
				'label' => '',
				'name' => 'ssa_faq_questions',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5e04a7073575f',
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
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_5e04a707357a4',
						'label' => 'Вопрос',
						'name' => 'ssa_faq_question',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '40',
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
						'key' => 'field_5e04a707357e7',
						'label' => 'Ответ',
						'name' => 'ssa_faq_answer',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '60',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 0,
						'delay' => 1,
					),
				),
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