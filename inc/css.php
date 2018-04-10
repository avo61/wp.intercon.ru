<?php
/**
 * Динамический CSS 
 *
 * <link rel='stylesheet' type='text/css' href="<?php bloginfo( 'url' ); ?>/?my-custom-content=css" />
 * @package INTERCON
 */
add_action( 'parse_request', 'my_custom_css_request' );
function my_custom_css_request( $wp ) {
    if (
        !empty( $_GET['my-custom-content'] )
        && $_GET['my-custom-content'] == 'css'
    ) {
        # get theme options
        header( 'Content-Type: text/css' );
        require dirname( __FILE__ ) . '/custom-css.php';
        exit;
    }
}