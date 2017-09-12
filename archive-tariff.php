<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

get_header(); ?>
<div class="isp-new-section">
<h1>Для квартир </h1>
</div>
<?php echo get_intercon_price( [user=>"квартира",service_isp=>"интернет"], "Интернет" );?>
<?php echo get_intercon_price( [user=>"квартира",service_isp=>"смотрешка"], "Смотрешка" );?>
<?php echo get_intercon_price( [user=>"квартира",service_isp=>"IPTV"], "IPTV" );?>

<div class="isp-new-section">
<h1>Для ЖК Дельфин </h1>
</div>
<?php echo get_intercon_price( [user=>"delfin",service_isp=>"интернет"], "Интернет" );?>
<?php echo get_intercon_price( [user=>"delfin",service_isp=>"смотрешка"], "Смотрешка" );?>
<?php echo get_intercon_price( [user=>"delfin",service_isp=>"IPTV"], "IPTV" );?>

<div class="isp-new-section">
<h1>Для частных домов </h1>
</div>
<?php echo get_intercon_price( [user=>"дом",service_isp=>"интернет"], "Интернет" );?>
<?php echo get_intercon_price( [user=>"дом",service_isp=>"смотрешка"], "Смотрешка" );?>
<?php echo get_intercon_price( [user=>"дом",service_isp=>"IPTV"], "IPTV" );?>



<?php get_footer(); ?>
