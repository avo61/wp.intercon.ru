<?php
/**
 * The template for displaying all single posts.
 *
 * @package INTERCON
 */

get_header();

echo '<div class="full-screan">';
// echo '<div class="isp-fon-container">';
echo '<div class="isp-new-section">';
while (have_posts()) : the_post();
    echo '<h2>' . get_the_title()  . '</h2>';
    the_content();
endwhile;
echo '</div>';
// echo '</div>';
echo '</div>';

get_footer();
