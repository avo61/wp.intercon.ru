<?php
/**
 *  functions and definitions
 *
 * @package 
 */


if ( ! function_exists( 'intercon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function intercon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MDLWP, use a find and replace
	 * to change 'intercon' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'intercon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'intercon' ),
		'secondary' => esc_html__( 'Secondary Menu', 'intercon' ),
		'phone' => esc_html__( 'Phone Menu', 'intercon' ),
		'drawer' => esc_html__( 'Drawer Menu', 'intercon' ),
		'footer' => esc_html__( 'Footer Menu', 'intercon' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		// 'comment-form',
		// 'comment-list',
		// 'gallery',
		// 'caption',
	) );


	add_theme_support( 'custom-logo', array(
		'height'      => 46,
		'width'       => 175,
		'flex-height' => true,
	) );



	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'intercon_custom_background_args', array(
	// 	'default-color' => 'f5f5f5',
	// 	'default-image' => '',
	// ) ) );
}
endif; // intercon_setup
add_action( 'after_setup_theme', 'intercon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function intercon_content_width() {
	$GLOBALS['content_width'] = 1260;
}
add_action( 'after_setup_theme', 'intercon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function intercon_widgets_init() {

	register_sidebar( array(
		'name'          => 'Сайтбар в тарифе',
		'id'            => 'tarif-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class=" %2$s widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="">',
		'after_title'   => '</h3>'
	) );
}
add_action( 'widgets_init', 'intercon_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Enqueue all JS and CSS files
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Custom menu
 */
require get_template_directory() . '/inc/nav-walker.php';

/**
 * Meta Box
 */
// require get_template_directory() . '/inc/meta-box.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Widget for Footer Links
 */
// require get_template_directory() . '/inc/intercon-footer-widget.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';

add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
function add_my_class_to_nav_menu( $classes, $item ){
	/* $classes содержит
	Array(
		[1] => menu-item
		[2] => menu-item-type-post_type
		[3] => menu-item-object-page
		[4] => menu-item-284
	)
	*/
	$classes[] = 'mdl-navigation__link  ';

	return $classes;
}


/**
 * Расширения
 */
add_filter( 'jetpack_development_mode', '__return_true' );

/**
 * Google API (неиспользуется)
 */
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyD8RAiUgOpUSfVzSSFK7MWOj_dQ8aOZdZg';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/**
 * Секция настроек темы
 */
require get_template_directory() .'/inc/options.php';

/**
 * Загрузка функций и определение данных темы intercon
 */
require get_template_directory() .'/inc/intercon-func.php';

/**
 * Загрузка виджетов 
 * 
 */
require get_template_directory() .'/inc/widget.php';

/**
 * Дополнительные функции 
 * 
 */
require get_template_directory() .'/inc/func.php';

/**
 * Щорт коды 
 * 
 */
require get_template_directory() .'/inc/short_code.php';

/**
 * Хлебные крошки
 * 
 */
// require get_template_directory() .'/inc/crumbs.php';

/**
 * Динамический CSS
 * 
 */
// require get_template_directory() .'/inc/css.php';

// ****************************************************************************************************************************************************************************
// Удаляем лишний код  поддержки смайликов из header
// 
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// ****************************************************************************************************************************************************************************
	

add_filter('widget_text','do_shortcode');

function my_theme_add_editor_styles() {
	add_editor_style( 'style.css' );
}
add_action( 'current_screen', 'my_theme_add_editor_styles' );