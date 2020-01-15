<?php
/*
Plugin Name: Simple Site Audit
Description: Плагин для простого аудита сайта.
Version: 1.0.1
Author: Iurii Boiko
*/
function ssa_check_acf() {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
		$message = '<div class="notice notice-error is-dismissible"><p>';
		$message .= 'Для работы плагина необходимо установить и активировать <strong>Advanced Custom Fields</strong>.';
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
	include("includes/meta-fields/zero-unit-meta.php");
	include("includes/meta-fields/faq-meta.php");
	include("includes/meta-fields/local-business-meta.php");
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
	include("includes/zero-unit.php");
	return ob_get_clean();
}
add_shortcode( 'ssa_zero_unit', 'ssa_shortcode_zero_unit' );
function ssa_shortcode_faq(){
	ob_start();
	include("includes/faq.php");
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
	//ssa_options_sanitize_callback
	
	register_setting( 'ssa_options_group', 'ssa_options', '' ); //$option_group, $option_name, $args = array
	add_settings_section( 'ssa_options_sections', 'Блок "Часто задаваемые вопросы"', '', 'ssa-options');
	add_settings_section( 'lb_options_sections', 'LocalBusiness', '', 'ssa-options'); // $id, $title, $callback, $page
	
	//$id, $title, $callback, $page, $section = 'default', $args = array
	add_settings_field( 'faq_arrow_color', 'Цвет стрелочки:', 'ssa_faq_arrow_color_cb', 'ssa-options', 'ssa_options_sections', array('label_for' => 'faq_arrow_color'));
	// add_settings_field( 'faq_text', 'Какой-то текст:', 'ssa_faq_text_cb', 'ssa-options', 'ssa_options_sections', array('label_for' => 'faq_text'));
	//settings field for "lb_options_sections" section
	add_settings_field( 'lb_image', 'Image url:', 'lb_image_cb', 'ssa-options', 'lb_options_sections');
	add_settings_field( 'lb_telephone', 'Телефон:', 'lb_telephone_cb', 'ssa-options', 'lb_options_sections', array('label_for' => 'lb_telephone'));
	add_settings_field( 'lb_price_range', 'Ценовой диапазон:', 'lb_price_range_cb', 'ssa-options', 'lb_options_sections', array('label_for' => 'lb_price_range'));
	add_settings_field( 'lb_days_open', 'Рабочие дни:', 'lb_days_open_cb', 'ssa-options', 'lb_options_sections');
	add_settings_field( 'lb_time_open', 'TimesOpen:', 'lb_time_open_cb', 'ssa-options', 'lb_options_sections', array('label_for' => 'lb_time_open'));
	add_settings_field( 'lb_time_close', 'TimesClose:', 'lb_time_close_cb', 'ssa-options', 'lb_options_sections', array('label_for' => 'lb_time_close'));
	
	add_settings_field( 'lb_street_address', 'streetAddress:', 'lb_street_address_cb', 'ssa-options', 'lb_options_sections' );
	add_settings_field( 'lb_address_locality', 'addressLocality:', 'lb_address_locality_cb', 'ssa-options', 'lb_options_sections' );
	add_settings_field( 'lb_address_region', 'addressRegion:', 'lb_address_region_cb', 'ssa-options', 'lb_options_sections' );
}

function lb_image_cb() {
	$options = get_option( 'ssa_options' );
?>
	<input type="text" name="ssa_options[lb_image]" id="lb_image" value="<?php echo esc_attr($options['lb_image']); ?>" class="regular-text">
	<p><em>Заполните это поле, если в <a href="https://search.google.com/structured-data/testing-tool">Structured Data Testing Tool</a> выдает ошибку <span style="color: #ff5722;">Необходимо указать значение для поля image</span></em>.</p>
<?php
}
function lb_address_bool_cb() {
	$options = get_option( 'ssa_options' );
?>
	<select name="ssa_options[lb_address_bool]" id="lb_address_bool">
		<option value="1" <?php selected('1', $options['lb_address_bool']); ?>>Да</option>
		<option value="0" <?php selected('0', $options['lb_address_bool']); ?>>Нет</option>
	</select>
	<span><em>Использовать ли общий адрес?</em></span>
<?php
}
function lb_address_region_cb() {
	$options = get_option( 'ssa_options' );
?>
	<input type="text" name="ssa_options[lb_address_region]" id="lb_address_region" value="<?php echo esc_attr($options['lb_address_region']); ?>" class="regular-text">
<?php
}
function lb_address_locality_cb() {
	$options = get_option( 'ssa_options' );
?>
	<input type="text" name="ssa_options[lb_address_locality]" id="lb_address_locality" value="<?php echo esc_attr($options['lb_address_locality']); ?>" class="regular-text">
<?php
}
function lb_street_address_cb() {
	$options = get_option( 'ssa_options' );
?>
	<input type="text" name="ssa_options[lb_street_address]" id="lb_street_address" value="<?php echo esc_attr($options['lb_street_address']); ?>" class="regular-text">
<?php
}
function lb_days_open_cb() {
	$options = get_option( 'ssa_options' );
	$days = array(
						'monday'    => 'Понедельник',		
						'tuesday'   => 'Вторник',		
						'wednesday' => 'Среда',		
						'thursday'  => 'Черверг',		
						'friday'    => 'Пятница',		
						'saturday'  => 'Суббота',		
						'sunday'    => 'Воскресенье'
					);
	printf('<ul class="%1$s">', 'lb_days_open');
	foreach($days as $k => $v) {
		$checked = checked( in_array($v, (array)$options['lb_days_open']), true, false );
		printf(
			'<li><label><input type="checkbox" name="%1$s[%2$s][%3$s]" id="%3$s" value="%4$s" %5$s>%4$s</label></li>',
			'ssa_options',
			'lb_days_open',
			$k,
			$v,
			$checked
		);
	}
	printf('</ul>');
}
function create_time_select($name) {
	$options = get_option( 'ssa_options' );
	echo	'<select name="ssa_options[' . $name . ']" id="' . $name . '">';
			for($i = 0; $i < 24; $i++){
				$a = ($i < 10) ? '0' . $i . ':00' : $i . ':00';
				$selected = (esc_attr($options[$name]) == $a) ? 'selected="selected"' : '';
		    echo '<option value="' . $a . '"' . $selected . '>' . $a . '</option>';
			}
		echo '</select>';
}
function lb_time_open_cb() {
	$options = get_option( 'ssa_options' );
	create_time_select('lb_time_open');
}
function lb_time_close_cb() {
	$options = get_option( 'ssa_options' );
	create_time_select('lb_time_close');
}
function lb_telephone_cb() {
	$options = get_option( 'ssa_options' );
	?>
<input type="text" name="ssa_options[lb_telephone]" id="lb_telephone" value="<?php echo esc_attr($options['lb_telephone']); ?>">
	<?php
}
function lb_price_range_cb() {
	$options = get_option( 'ssa_options' );
	?>
<input type="text" name="ssa_options[lb_price_range]" id="lb_price_range" value="<?php echo esc_attr($options['lb_price_range']); ?>">
	<?php
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
	<!-- <p>Настройки плагина <b>Simple Site Audit</b>.</p> -->
	<form action="options.php" method="post">
		<?php settings_fields( 'ssa_options_group' ); ?>
		<?php do_settings_sections( 'ssa-options' ); ?>
		<?php display_lb_ld_json(); ?>
		<?php submit_button(); ?>
	</form>
	<!-- <h3>Блок нулевой выдачи.</h3> -->
	<!-- <p>В разработке.</p> -->
</div>	
	<?php
}
function display_lb_ld_json() {
	$options = get_option('ssa_options');
	$name = get_bloginfo('name');
	$logo = (wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]) ? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] : $options['lb_image'];
	$image = $logo;
	$url = home_url();
	$email = ( !empty(get_field('lb_email', 'option')) ) ? get_field('lb_email', 'option') : get_bloginfo('admin_email');
	$telephone = $options['lb_telephone'];
	$price_range = !empty($options['lb_price_range']) ? $options['lb_price_range'] : "$" ;
	$days_of_week = array_map(function($key, $value) {
	  return $key;
	}, array_keys((array)$options['lb_days_open']), (array)$options['lb_days_open']);
	function slice_days($n) {
		return ucfirst( substr($n, 0, 2) );
	}
	$opening_days = implode( ",", array_map('slice_days', $days_of_week) );
	$open = $options['lb_time_open'];
	$close = $options['lb_time_close'];
	$opening_hours = $opening_days . '&nbsp;' . $open . '-' . $close;
	$street_address = ( get_field('lb_address_bool') && !empty( get_field('lb_street_address') ) ) ? get_field('lb_street_address') : $options['lb_street_address'];
	$address_locality = ( get_field('lb_address_bool') && !empty( get_field('lb_address_locality') ) ) ? get_field('lb_address_locality') : $options['lb_address_locality'];
	$address_region = ( get_field('lb_address_bool') && !empty( get_field('lb_address_region') ) ) ? get_field('lb_address_region') : $options['lb_address_region'];
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
				"dayOfWeek" => $days_of_week,
				"opens" => $open,
				"closes" => $close
			]
		],
	];
	echo '<script type="application/ld+json">' . json_encode($json_local_business) . '</script>';
}
add_action('wp_head', 'display_lb_ld_json');
