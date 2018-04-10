<?php
/**
 * The template для Таксаномии
 * 
 * Исползуется для отладки и вслучае если что то  пошло не так
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */
global $wp_query;

get_header(); ?>
 <div class="full-screan">  
     <div class="isp-new-section"  >

		<?php $qr = $wp_query->query; 
			if ( have_posts() ) : 
				the_archive_title( '<h1>', '</h1>' );
					// the_archive_description( '<div class="taxonomy-description">', '</div>' );
				$s = '<div class="list-taxonomy">';
				while ( have_posts() ) : the_post(); 
					$s .= '<div class="list-taxonomy--element">'.
							'<a href="' . get_permalink() . '">'. get_the_title() . '</a></div>';
								
				endwhile; 
				$s .= '</div>';
				echo $s;


			endif; ?>

	</div>	
</div>

<?php get_footer(); ?>
