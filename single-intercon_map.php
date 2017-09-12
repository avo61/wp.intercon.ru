<?php
/**
 * The template для вывода карт
 *
 * @package MDLWP
 */

get_header(); ?>
	
    <div class="isp-fon-container">
    <div class="isp-new-section">
        <?php  echo get_intercon_map(); ?>
        <?php the_yandex_map(intercon_map) ?>
	</div><!-- #primary -->
	</div><!-- #primary -->

<?php get_footer(); ?>
