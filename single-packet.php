<?php
/**
 * The template для вывода  услуг
 *
 * @package INTERCON
 */

get_header(); ?>
<div class="full-screan">	
    <div class="isp-fon-container">
        <div class="isp-new-section">

        <?php
        if ( have_posts() ) {
            the_post(); 
            $template_id = wpcf_pr_post_get_belongs( get_the_ID(), 'template' );
			if ( $template_id ) {
				$template_post = get_post( $template_id );
				echo do_shortcode($template_post->post_content);
			}else{
				the_content();
			}
        }else 
			get_template_part( 'template-parts/content', 'none' );
        ?> 
           

	    </div>
	</div>
</div>
<?php get_footer(); ?>

