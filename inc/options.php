<?php
/*
 * Модуль работы с дополнительными опциями
 * 	Для опций определяется отдельная страница в разделе Админки: Настройки-> Опции Интеркон
 * 
 * Все опции хранятся в одном поле БД в виде массива
 *
 * get_option_isp( опция)  - Выдает дополнительную опцию
 *
 * @package INTERCON
*/


/*
* Функция выдачи параметра
*
*/ 
function get_option_isp($p){
	
	$options = get_option( 'isp_theme_options' );
	
	return $options[$p ];
	
}



add_action( 'admin_menu', 'isp_admin_menu' );
add_action( 'admin_init', 'isp_admin_settings' );

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

function isp_admin_settings(){
	// $option_group, $option_name, $sanitize_callback
	register_setting( 'isp_theme_options_group', 'isp_theme_options', 'isp_theme_options_sanitize' );

	// $id, $title, $callback, $page
	add_settings_section( 'isp_theme_options_id', 'Секция Опции темы', '', 'isp-theme-options' );
	// $id, $title, $callback, $page, $section, $args


	add_settings_field( 'isp_theme_options_address', 'Адрес', 'isp_theme_address_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_address') );
	add_settings_field( 'isp_theme_options_telefon', 'Телефон', 'isp_theme_telefon_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_telefon') );
	add_settings_field( 'isp_theme_options_mail', 'E-mail', 'isp_theme_mail_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_mail') );
	add_settings_field( 'isp_theme_options_time', 'Время работы', 'isp_theme_time_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_time') );
	add_settings_field( 'isp_theme_options_vk', 'ВКонтакте', 'isp_theme_vk_cb', 'isp-theme-options', 'isp_theme_options_id' , array('label_for' => 'isp_theme_options_vk') );
	add_settings_field( 'isp_theme_options_fb', 'Fb', 'isp_theme_fb_cb', 'isp-theme-options', 'isp_theme_options_id', array('label_for' => 'isp_theme_options_fb') );
	add_settings_field( 'isp_theme_options_yutube', 'Yutube', 'isp_theme_yutube_cb', 'isp-theme-options', 'isp_theme_options_id', array('label_for' => 'isp_theme_options_yutube') );
}

function isp_theme_address_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_address]" id="isp_theme_options_address" value="<?php echo esc_attr($options['isp_theme_options_address']); ?>" class="regular-text">
<?php
}

function isp_theme_telefon_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_telefon]" id="isp_theme_options_telefon" value="<?php echo esc_attr($options['isp_theme_options_telefon']); ?>" class="regular-text">
<?php
}

function isp_theme_mail_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_mail]" id="isp_theme_options_mail" value="<?php echo esc_attr($options['isp_theme_options_mail']); ?>" class="regular-text">
<?php
}

function isp_theme_time_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_time]" id="isp_theme_options_time" value="<?php echo esc_attr($options['isp_theme_options_time']); ?>" class="regular-text">
<?php
}

function isp_theme_vk_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_vk]" id="isp_theme_options_vk" value="<?php echo esc_attr($options['isp_theme_options_vk']); ?>" class="regular-text">
<?php
}

function isp_theme_fb_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_fb]" id="isp_theme_options_fb" value="<?php echo esc_attr($options['isp_theme_options_fb']); ?>" class="regular-text">
<?php
}

function isp_theme_yutube_cb(){
	$options = get_option('isp_theme_options');
?>
	<input type="text" name="isp_theme_options[isp_theme_options_yutube]" id="isp_theme_options_yutube" value="<?php echo esc_attr($options['isp_theme_options_yutube']); ?>" class="regular-text">
<?php
}

function isp_theme_options_sanitize($options){
	$clean_options = array();
	foreach($options as $k => $v){
		$clean_options[$k] = strip_tags($v, '<br>');
	}
	return $clean_options;
}

