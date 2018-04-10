<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package INTERCON
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site mdl-layout mdl-js-layout mdl-layout--fixed-header">
<header id="masthead" class="site-header mdl-layout__header  mdl-layout__header--waterfall  mdl-layout__header--isp" role="banner">
	<?php get_template_part( 'template-parts/nav', 'main' ); ?>
	<?php get_template_part( 'template-parts/nav', 'second' );  ?> 
</header>	
<?php get_template_part( 'template-parts/nav', 'drawer' ); ?>
<main class="mdl-layout__content">
<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<p id="breadcrumbs">','</p>
');
}
?>	
