<?php
/*
Plugin Name: Simple Site Audit
Description: Плагин для создания блока нулевой выдачи.
Version: 1.0.1
Author: Iurii Boiko
*/
function ssa_check_acf() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
		$message = '<div class="notice notice-error is-dismissible"><p>';
		$message .= 'Для работы плагина необходимо активировать или установить <strong>Advanced Custom Fields</strong>.';
		$message .= '</p></div>';
	}
	else {
		ssa_acf_add_local_field_groups();
		$message = '<div class="notice notice-success is-dismissible"><p>';
		$message .= 'ACF активен.';
		$message .= '</p></div>';
	}
	return $message;
}
function ssa_acf_add_local_field_groups() {
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
}
add_action('acf/init', 'ssa_acf_add_local_field_groups');
register_activation_hook( __FILE__, 'fx_admin_notice_example_activation_hook' );
function fx_admin_notice_example_activation_hook() {
  set_transient( 'fx-admin-notice-example', true, 5 );
}
add_action( 'admin_notices', 'fx_admin_notice_example_notice' );
function fx_admin_notice_example_notice(){
  /* Check transient, if available display notice */
  if( get_transient( 'fx-admin-notice-example' ) ){
    
    echo ssa_check_acf();
      /* Delete transient, only display this notice once. */
    delete_transient( 'fx-admin-notice-example' );
  }
}
function ssa_shortcode_zero_unit(){
	ob_start();
	include_once("includes/zero-unit.php");
	return ob_get_clean();
}
add_shortcode( 'ssa_zero_unit', 'ssa_shortcode_zero_unit' );
function ssa_shortcode_faq(){
	ob_start();
	include_once("includes/faq.php");
	return ob_get_clean();
}
add_shortcode( 'ssa_faq', 'ssa_shortcode_faq' );
function ssa_enqueue_scripts() {
  // Register the style like this for a plugin:  
  wp_enqueue_style( 'ssa-style', plugins_url( '/assets/css/ssa.css', __FILE__ ), array(), '20120208', 'all' );  
  // wp_enqueue_style( 'ssa-style' );
  wp_enqueue_script( 'ssa-script', plugins_url( '/assets/js/ssa.js', __FILE__ ), array('jquery'), '20120208', true );  
  // wp_enqueue_script( 'ssa-script' );  
}
add_action( 'wp_enqueue_scripts', 'ssa_enqueue_scripts' );
//Setting page
add_action( 'admin_menu', 'ssa_admin_menu' );
add_action( 'admin_init', 'ssa_admin_setings' );
function ssa_admin_setings() {
	// $option_group, $option_name, $args = array
	register_setting( 'ssa_options_group', 'ssa_options', 'ssa_options_sanitize_callback' );
	// $id, $title, $callback, $page
	add_settings_section( 'ssa_options_sections', 'Блок "Часто задаваемые вопросы"', '', 'ssa-options');
	// $id, $title, $callback, $page, $section = 'default', $args = array
	add_settings_field( 'faq_arrow_color', 'Цвет стрелочки:', 'ssa_faq_arrow_color_cb', 'ssa-options', 'ssa_options_sections', array('label_for' => 'faq_arrow_color'));
	add_settings_field( 'faq_text', 'Какой-то текст:', 'ssa_faq_text_cb', 'ssa-options', 'ssa_options_sections', array('label_for' => 'faq_text'));
}
function ssa_faq_arrow_color_cb() {
	$options = get_option( 'ssa_options' );
	?>
<input type="color" name="ssa_options[faq_arrow_color]" id="faq_arrow_color" value="<?php echo esc_attr($options['faq_arrow_color']); ?>">
	<?php
}
function ssa_faq_text_cb() {
	$options = get_option( 'ssa_options' );
	?>
<input type="text" name="ssa_options[faq_text]" id="faq_text" value="<?php echo esc_attr($options['faq_text']); ?>" class="regular-text">
	<?php
}
function ssa_options_sanitize_callback( $options ) {
	$clean_options = array();
	foreach ($options as $key => $value) {
		$clean_options[$key] = strip_tags( $value );
	}
	return $clean_options;
}
function ssa_admin_menu() {
	add_options_page( 'Simple Site Audit', 'Simple Site Audit', 'manage_options', 'ssa-options', 'ssa_option_page' );
}
function ssa_option_page() {
	$options = get_option( 'ssa_options' );
	?>
<div class="wrap">
	<h2>Настройки плагина</h2>
	<p>Настройки плагина <code>Simple Site Audit</code>.</p>
	<form action="options.php" method="post">
		<?php settings_fields( 'ssa_options_group' ); ?>
		<?php do_settings_sections( 'ssa-options' ); ?>
		<?php submit_button(); ?>
	</form>
	<!-- <h3>Блок нулевой выдачи.</h3> -->
	<!-- <p>В разработке.</p> -->
</div>	
	<?php
}
add_action('wp_head', 'add_local_business');
function add_local_business() {

	$name = get_bloginfo('name');
	$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0];
	$image = $logo;
	$url = home_url();
	$email = ( !empty(get_field('lb_email', 'option')) ) ? get_field('lb_email', 'option') : get_bloginfo('admin_email');
	$telephone = ( get_field('lb_telephone', 'option') ) ? get_field('lb_telephone', 'option') : '';
	$price_range = ( get_field('lb_priceRange', 'option') ) ? get_field('lb_priceRange', 'option') : '$';
	
	$day_of_week = get_field('lb_days_open', 'option');
	function slice_days($n) {
		return substr($n, 0, 2);
	}

	$opening_hours_days = implode( ",", array_map('slice_days', $day_of_week) );
	$address_locality = ( get_field('lb_addressLocality', 'option') ) ? get_field('lb_addressLocality', 'option') : '';
	$address_region = ( get_field('lb_addressRegion', 'option') ) ? get_field('lb_addressRegion', 'option') : '';
	$street_address = ( get_field('lb_streetAddress', 'option') ) ? get_field('lb_streetAddress', 'option') : '';
	$opens = ( !empty(get_field('lb_hours_beginning', 'option')) ) ? get_field('lb_hours_beginning', 'option') : '00:00';
	$closes = ( !empty(get_field('lb_hours_end', 'option')) ) ? get_field('lb_hours_end', 'option') : '00:00';
	$opening_hours = $opening_hours_days . '&nbsp;' . $opens . '-' . $closes;
	
  // echo '<pre>';
	 //  var_dump( $closes );
	 //  var_dump( $opens );
  // echo '</pre>';

	$json_local_business = [
		"@context" => "https://schema.org",
		"@type" => "LocalBusiness",
		"name" => $name,
		"logo" => $logo,
		"image" => $image,
		"url" => $url,
		"email" => $email,
		"telephone" => $telephone,
		"priceRange" => $price_range,
		"openingHours" => $opening_hours,
		"address" => [
			"@type" => "PostalAddress",
			"streetAddress" => $street_address,
			"addressLocality" => $address_locality,
			"addressRegion" => $address_region,
			"postalCode" => ""
		],
		"openingHoursSpecification" => [
			[
				"@type" => "OpeningHoursSpecification",
				"dayOfWeek" => $day_of_week,
				"opens" => $opens,
				"closes" => $closes
			]
		],
	];
	
	echo '<script type="application/ld+json">' . json_encode($json_local_business) . '</script>';

}