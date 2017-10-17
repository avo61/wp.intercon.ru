<?php
/**
 * The template part for displaying the main navigation
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>
<div class="mdl-layout-icon"></div>
<div class="mdl-layout__header-row mdl-layout__header--isp">

  <!-- Title -->
  <span class="mdl-layout-title">         
	  <!--<?php bloginfo( 'name' ); ?>-->
		<?php the_custom_logo(); ?>
	</span>
  <!-- Add spacer, to align navigation to the right -->
  <div class="mdl-layout-spacer"></div>

	<div class="mdlwp-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">   
      <?php get_search_form(); ?>
    </div>

  
    <?php
		$args = array(
	        'theme_location' => 'primary',
	        'container'       => 'nav',
	        // 'items_wrap' => '%3$s',
	        'container_class' => 'mdl-navigation mdl-layout--large-screen-only  mdl-navigation--isp-row',
					'menu_class' => 'mdl-navigation mdl-layout--large-screen-only  mdl-navigation--isp-row'
			// 'walker' => new MDLWP_Nav_Walker()
		);

		if (has_nav_menu('primary')) {
		       wp_nav_menu($args);
		    }
	?>
                <div class=" mdl-layout-spacer"></div>
                <nav class="mdl-navigation  mdl-navigation--isp-row">
                    <a class="mdl-navigation__link mdl-navigation__link--isp-kabinet mdl-navigation__link--isp-row" href="https://myintercon.ru/login"><i class="material-icons">lock</i>Кабинет</a>

                    <a class="mdl-navigation__link  mdl-navigation__link--icon  mdl-navigation__link--isp-row mdl-navigation__link--isp-telefon" href="">
                        <div class="isp-telefon">круглосуточно</div> <i class="material-icons">phone</i><span>+7(473)</span> 239-10-10</a>
                </nav>
</div>
