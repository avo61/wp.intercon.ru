<?php
/**
 * The template part for displaying the main navigation
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>

<div class="mdl-layout__header-row mdl-layout__header-row2" >

  <!-- Add spacer, to align navigation to the right -->
  <div class="mdl-layout-spacer"></div>



  
    <?php
		$args = array(
	        'theme_location' => 'secondary',
	        'container'       => 'nav',
	   //     'items_wrap' => '%3$s',
	        'container_class' => 'mdl-navigation mdl-navigation--isp-row2',
					'menu_class' => 'mdl-navigation mdl-navigation--isp-row2'
			// 'walker' => new MDLWP_Nav_Walker()
		);

		if (has_nav_menu('secondary')) {
		       wp_nav_menu($args);
		    }
	?>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation mdl-navigation--isp-row2  hide-lg ">

                    <a class="mdl-navigation__link" href="">
                        <i class="material-icons">credit_card</i>
                        <div>Оплатить</div>
                    </a>
                    <a class="mdl-navigation__link isp-blink " href="<?php echo home_url(); ?>/connect">
                        <i class="material-icons">person_add</i>
                        <div>Подключиться</div>
                    </a>

                </nav>
</div>

