<?php
/**
 * The template для вывода карт
 *
 * @package INTERCON
 */

get_header(); ?>
<div class="full-screan">		
    <div class="isp-fon-container">
    <div class="isp-new-section">
        <?php 
        echo get_intercon_map();
        echo str_replace('"></script>','&id=mapfull"></script>',get_field('Ymap'));
         ?>
        <div class="">
            <div class="kart " id="mapfull">
            </div>
        </div>
	</div>
	</div>
</div>

<?php get_footer(); ?>
