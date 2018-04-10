<?php
/**
 * Сайтбар контейнер
 *
 * @package INTERCON
 */

if ( ! is_active_sidebar( 'tarif-sidebar' ) ) {
	return;
}
?>

<div id="sidebar" class="isp-section__sidebar" >
	<?php dynamic_sidebar( 'tarif-sidebar' ); ?>
</div>
