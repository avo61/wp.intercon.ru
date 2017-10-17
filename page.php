<?php
/**
 * The template для формирования всех страниц
 *
 *
 * @package INTERCON
 */

get_header(); ?>
<div class="full-screan">

	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile;  ?>

</div>
<?php get_footer(); ?>
