<?php
/**
 * The template для формирования всех страниц
 *
 *
 * @package 
 */

get_header(); ?>

    <!--<div class="isp-fon-container">-->
        <!--<div class="isp-new-section">-->
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile;  ?>

		<!--</div>-->
	<!--</div>-->
<!--<div class="isp-telefon-section ">Звоните круглосуточно +7(473) 239-10-10</div>-->
<?php get_footer(); ?>
