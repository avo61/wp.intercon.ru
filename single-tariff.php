<?php
/**
 * The template для вывода тарифа
 *
 * @package INTERCON
 */
global $listTV;
get_header(); ?>
<div class="full-screan">	
    <div class="isp-fon-container">
        <div class="isp-section">
        <div class="isp-section__content">

        <?php if (have_posts()) :
            the_post(); ?>

        <!-- <pre>          
            <?php
            $post_id = get_the_ID();

              $tag = wp_get_post_categories($post_id);// ($post_id);
              $tag = get_the_category_list($post_id);
              $tag = get_the_category($post_id);
              $tag = get_the_terms($post_id,'user');

              print_r( $tag );
              $tag = get_the_taxonomies($post_id);
              print_r( $tag );
                ?>
        </pre> -->
            <!-- <h2>Тариф:  <?php echo the_title(); ?> </h2> -->
            <?php
						$specification = get_field( 'specification' );
                        // echo $specification;
						if  ($specification ){
							$listTV = json_decode ($specification);
							// if ( $listTV )
								// print_r ( $listTV);
							// echo $specification;
						}
        
            $template_id = wpcf_pr_post_get_belongs( get_the_ID(), 'template' );
            if ($template_id) {
                $template_post = get_post( $template_id );
                // echo $template_post->post_title;
                echo do_shortcode($template_post->post_content);
            } else {
                the_content();
            }
            ?>
            

        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?> 
           

        </div>

        <?php get_sidebar(); ?>
    </div>
    </div>
</div>

<!-- <div class="smotreshka_hero"><img src="http://wp.office.intercon.ru/wp-content/themes/intercon-01/images/smotreshka/exit_w.png" class="exit_hero" />
        <div class="hidden_buttons"><a href='#smotreshka_form' rel='pop' class='pop'></a><a href='http://salesupster.ru/smotreshka/'  class='site'></a></div>
    </div>
    <script>

jQuery(
  function(){
    
        jQuery(".smotreshka_hero .exit_hero").click(
      function(){
                jQuery(".smotreshka_hero").hide();
        return false;
      }
    )
    
  }
);
function explode(){
    jQuery(".smotreshka_hero").prepend("<a class='smotreshka01' href='http://salesupster.ru/smotreshka/'></a>");
}
setTimeout(explode, 3000); -->

</script>

<?php get_footer(); ?>

