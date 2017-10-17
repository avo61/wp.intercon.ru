<?php
/*

*/

add_action( 'admin_menu', 'isp_admin_menu' );
add_action( 'admin_init', 'isp_admin_settings' );

function isp_admin_settings(){
	// $option_group, $option_name, $sanitize_callback
	register_setting( 'isp_theme_options_group', 'isp_theme_options', 'isp_theme_options_sanitize' );

	// $id, $title, $callback, $page
	add_settings_section( 'isp_theme_options_id', 'Секция Опции темы', '', 'isp-theme-options' );
	// $id, $title, $callback, $page, $section, $args
	add_settings_field( 'isp_theme_options_p1', 'Параметр 1', 'isp_theme_p1_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_p1') );
	add_settings_field( 'isp_theme_options_p2', 'Параметр 2', 'isp_theme_p2_cb', 'isp-theme-options', 'isp_theme_options_id', array('label_for' => 'isp_theme_options_p2') );
	add_settings_field( 'isp_theme_options_p3', 'Параметр 3', 'isp_theme_p3_cb', 'isp-theme-options', 'isp_theme_options_id', array('label_for' => 'isp_theme_options_p3') );
}

function isp_theme_p1_cb(){
	$options = get_option('isp_theme_options');
	?>

<input type="text" name="isp_theme_options[isp_theme_options_p1]" id="isp_theme_options_p1" value="<?php echo esc_attr($options['isp_theme_options_p1']); ?>" class="regular-text">

	<?php
}

function isp_theme_p2_cb(){
	$options = get_option('isp_theme_options');
	?>

<input type="text" name="isp_theme_options[isp_theme_options_p2]" id="isp_theme_options_p2" value="<?php echo esc_attr($options['isp_theme_options_p2']); ?>" class="regular-text">

	<?php
}

function isp_theme_p3_cb(){
	$options = get_option('isp_theme_options');
	?>

<input type="text" name="isp_theme_options[isp_theme_options_p3]" id="isp_theme_options_p3" value="<?php echo esc_attr($options['isp_theme_options_p3']); ?>" class="regular-text">

	<?php
}

function isp_theme_options_sanitize($options){
	$clean_options = array();
	foreach($options as $k => $v){
		$clean_options[$k] = strip_tags($v);
	}
	return $clean_options;
}

function isp_admin_menu(){
	// $page_title, $menu_title, $capability, $menu_slug, $function
	add_options_page( 'Опции темы (title)', 'Опции Интеркон', 'manage_options', 'isp-theme-options', 'isp_option_page' );
}

function isp_option_page(){
	$options = get_option( 'isp_theme_options' );
	?>

<div class="wrap">
	<h2>Опции темы</h2>
	<p>Настройки темы </p>
	<form action="options.php" method="post">
		<?php settings_fields( 'isp_theme_options_group' ); ?>
		<?php do_settings_sections( 'isp-theme-options' ); ?>
		<?php submit_button(); ?>
	</form>
</div>

	<?php
}