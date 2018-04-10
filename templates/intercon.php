<?php
/**
 *
 * Template Name: Intercon Home
 *
 *
 * @package intercon
 */

get_header();

while (have_posts()) : the_post();
    the_content();
endwhile;

get_footer();
