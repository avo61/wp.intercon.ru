<?php
/**
 * The template для вывода пакета услуг
 *
 * @package INTERCON
 */

get_header(); ?>
<div class="full-screan">	
    <div class="isp-fon-container">
        <div class="isp-new-section">

		<?php if ( have_posts() ) :  the_post(); ?>
            <h2>Тариф  <?php echo the_title(); ?> </h2>
            <p>Цена  <?php echo  get_field( "price"); ?></p>
            <p>Инфо  <?php echo get_field( "info");  ?></p>
  

       	<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?> 
           

	    </div><!-- #primary -->
	</div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer(); ?>
