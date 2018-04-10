<?php
/**
 * The template for displaying Акции
 *
 *
 * @package INTERCON
 */

get_header(); 
echo '<div class="full-screan">';

//  $args = array('posts_per_page' => 3, 'post_type' => 'intercon_news', 'orderby' => 'date', 'order' => 'DESC' );
    // $myposts = get_posts( $args );
	if ( have_posts() ){
		$s = '<div class="isp-fon-container">'.
				'<div class="isp-new-section">'.
					'<h1>Акции Интеркон</h1>'.
                '</div>'.
            '</div>';
        echo $s;
		while ( have_posts() ) : the_post(); 
        	$s = '<div class="isp-fon-container">'.
                    '<div class="isp-new-section">'.
                        '<a href="' .get_permalink( ). '">' .
                            get_the_post_thumbnail().
                        '</a>'.
                    '</div>'.
                '</div>';                       
			echo $s;

		endwhile;

	}
echo '</div>';
get_footer(); ?>
