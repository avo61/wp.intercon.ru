<?php
/**
 * The template for displaying Новости
 *
 *
 * @package INTERCON
 */

get_header(); 
echo '<div class="full-screan">';

 $args = array('posts_per_page' => 3, 'post_type' => 'intercon_news', 'orderby' => 'date', 'order' => 'DESC' );
    $myposts = get_posts( $args );
	if ( have_posts() ){
		$s = '<div class="isp-fon-container">'.
				'<div class="isp-new-section">'.
					'<h1>Новости Интеркон</h1>'.
					'<div class="  grid-news">';

		while ( have_posts() ) : the_post(); 
        	$s .='<div class="grid-news__item r">'.
        			'<p>'.get_the_date( 'j-n-Y' ).'</p>'.
        				'<a href="' .get_permalink( ). '">' .
        				'<h6>' . get_the_title()  . '</h6>'.
        				'</a>'.
        			'<p>' .apply_filters( 'the_content', get_the_content( ) ). '</p>'.
        		'</div>';			

		endwhile;
    	$s.=  		'</div>'.
				'</div>'.
			'</div>';
		echo $s;
	}
echo '</div>';
get_footer(); ?>
