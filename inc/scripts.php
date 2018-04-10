<?php
/**
 * Enqueue scripts and styles.
 */
function intercon_scripts() {
	$primary = get_theme_mod( 'primary_color', 'deep_orange' );
	$secondary = get_theme_mod( 'secondary_color', 'blue' );

	wp_enqueue_style( 'intercon-mdl-css',  get_template_directory_uri() .'/material-design-lite.css' );
	// wp_enqueue_style( 'intercon-mdl-css', '//storage.googleapis.com/code.getmdl.io/1.3.0/material.'.$primary.'-'.$secondary.'.min.css' );

	wp_enqueue_style( 'intercon-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'intercon-mdl-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );

	wp_enqueue_style( 'intercon-mdl-roboto', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700' );

	
	
	wp_enqueue_script( 'intercon-mdl-js', '//storage.googleapis.com/code.getmdl.io/1.3.0/material.min.js', array(), '1.1.1', true );
	
	// wp_enqueue_script( 'intercon-intercon-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1.1.9', true );
	
	// wp_enqueue_style( 'intercon-intercon-style', get_template_directory_uri() . '/css/intercon1.css' );
	wp_enqueue_style( 'intercon-intercon-font', get_template_directory_uri() . '/font/font_magistral.css' );
	wp_enqueue_style( 'intercon-style', get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'intercon-main-style', get_template_directory_uri() . '/css/main.css' );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'intercon_scripts', 100 );


/**
 * Enqueue customizer script
 */
function intercon_customizer_live_preview() {
	wp_enqueue_script( 'intercon-themecustomizer',	get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), '', true );
}
// add_action( 'customize_preview_init', 'intercon_customizer_live_preview' );


