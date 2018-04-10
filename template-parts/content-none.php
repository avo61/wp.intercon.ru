<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package MDLWP
 */

?>

<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp"> 
	<section class="no-results not-found mdl-card__supporting-text">
		<header class="page-header">
			<h2 class="page-title"><?php echo 'Описание не найдено'?></h2>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mdlwp' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mdlwp' ); ?></p>

			<?php else : ?>

				<p><?php echo 'Обратитесть к администратору сайта' ?></p>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->
</div> <!-- .mdl-cell -->
