<?php
/**
 *  Страница  вывода Тарифов
 *
 *
 * @package INTERCON
 */

get_header(); ?>
<div class="isp-fon-container">
<div class="isp-new-section">
<h1>Для квартир </h1>
<?php echo get_intercon_price( ['user'=>"квартира",'service_isp'=>"интернет"], "Интернет" );?>
<!-- <?php echo get_intercon_price( ['user'=>"квартира",'service_isp'=>"смотрешка"], "Смотрешка" );?> -->
<!-- <?php echo get_intercon_price( ['user'=>"квартира",'service_isp'=>"IPTV"], "IPTV" );?> -->
</div>
</div>
<div class="isp-fon-container">
<div class="isp-new-section">
<h1>Для ЖК Дельфин </h1>
<?php echo get_intercon_price( ['user'=>"delfin",'service_isp'=>"интернет"], "Интернет" );?>
<!-- <?php echo get_intercon_price( ['user'=>"delfin",'service_isp'=>"смотрешка"], "Смотрешка" );?> -->
<!-- <?php echo get_intercon_price( ['user'=>"delfin",'service_isp'=>"IPTV"], "IPTV" );?> -->
</div>
</div>
<div class="isp-fon-container">
<div class="isp-new-section">
<h1>Для частных домов </h1>
<?php echo get_intercon_price( ['user'=>"дом",'service_isp'=>"интернет"], "Интернет" );?>
<!-- <?php echo get_intercon_price( ['user'=>"дом",'service_isp'=>"смотрешка"], "Смотрешка" );?> -->
<!-- <?php echo get_intercon_price( ['user'=>"дом",'service_isp'=>"IPTV"], "IPTV" );?> -->
</div>
</div>
<div class="isp-fon-container">
<div class="isp-new-section">
<h1>Новое телевидение </h1>
<?php echo get_intercon_price( ['user'=>"дом",'service_isp'=>"смотрешка"], "Смотрешка" );?>
</div>
</div>
<?php get_footer(); ?>
