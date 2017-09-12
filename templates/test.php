<?php
/**
 *
 * Template Name: Test Page
 *
 *
 * @package 
 */
 get_header(); ?>

		
	<!--<div id="primary" class="content-area">-->
		<!--<main id="main" class="site-main mdl-grid mdlwp-900" role="main">-->
        <div class="isp-fon-container">
            <div class="isp-new-section">
			
			<!-- <?php get_banners(); ?> -->
			<?php do_action( 'mdlwp_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php do_action( 'mdlwp_before_comments' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<?php do_action( 'mdlwp_after_comments' ); ?>

			<?php endwhile; // End of the loop. ?>

			<?php do_action( 'mdlwp_after_content' ); ?>

		<!--</main> #main -->
	</div><!-- #primary -->
	</div><!-- #primary -->
	

<?php get_footer(); ?>