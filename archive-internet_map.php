<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 */

get_header(); ?>

<div class="full-screan">		
    <div class="isp-fon-container">
    <div class="isp-new-section">
        <?php  echo get_intercon_map(); ?>
        <!-- <?php the_yandex_map('intercon_map') ?> -->
	</div>
	</div>
</div>

<?php get_footer(); ?>
