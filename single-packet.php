<?php
/**
 * The template для вывода пакета услуг
 *
 * @package MDLWP
 */

get_header(); ?>
<div class="full-screan">	
    <div class="isp-fon-container">
        <div class="isp-new-section">

		<?php if ( have_posts() ) :  the_post(); ?>
            <h2>Пакет  <?php echo the_title(); ?> </h2>
            <p>Цена  <?php echo  get_field( "price"); ?></p>
            <?php $posts = get_field( "composition");  ?>
            <p>Состав пакета: </p>
                <ul>
                <?php $s = 0; ?>
                <?php foreach( $posts as $p):  ?>

                    <?php /*setup_postdata($post); print_r($post); */?>
                    <li>
                        <a href="<?php echo get_permalink( $p->ID );?>"> <?php echo get_the_title($p->ID);  $pr = get_field("price", $p->ID); echo " цена: ".$pr; ?></a>

                    </li>
                    <?php $s += $pr; ?>
                <?php endforeach; ?>
                </ul>

                <p> Экономия:  <?php   echo " ".($s-get_field( "price"));  ?> </p>
                <?php /* wp_reset_postdata(); */?>

       	<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?> 
           

	    </div><!-- #primary -->
	</div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer(); ?>
