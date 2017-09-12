<?php
/**
 *
 *
 *
 *
 *
 *
 *
 */


$isp_banner_gallery = array(
		'name'          => esc_html__( 'Баннеры', 'intercon' ),
		'id'            => 'banner_galery',
		'description'   => '',
        'before_section'=> '<div class="isp-fon-container">'. 
                            '<div class="isp-new-section">',
        'after_section' => '</div></div>',
        'before_title'  => '<div class="int-section-title  logo-font ">',
        'title'         => '<h1>Интернет провайдер в Воронеже</h1>',
        'after_title'   => '</div>',
		'before_gallery'=> '<div class="mdl-grid">',
		'after_gallery' => '</div>',
		'before_group'  => '',
		'after_group'   => '',
		'before_banner' => '<div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--8-col-phone mdl-card mdl-card--isp-service-card_ mdl-card--border ">',
		'after_banner'  => '</div>',
		'banner'		=> '<a href="%s">'.
							'<div class="mdl-card__media">'.
							'<img class="img-opacity" src="%s" width="574" height="170" border="0" alt="%s">'. 
							'</div>' . 
							'<div class="mdl-card__media--mask mdl-card__media--mask--align">' .
							'<h2 class="mdl-card__media--mask--format">"%s"</h2>' .
							'</div>' .
							'<div class=" mdl-card__supporting-text">' . 
							'<h4>"%s"</h4>' . 
							'<h5>"%s"</h5>' . 
							'<h5>"%s"</h5>' . 
							'<h3>"%s"</h3>' . 
							'</div>' . 
							'</a>'

	);
    


/**
 *
 *
 *
 *
 *
 *
 *
 */

function the_banners() {
    global $isp_banner_gallery;
    
    printf( $isp_banner_gallery[ 'before_title' ] );
    printf( $isp_banner_gallery[ 'title' ] );
    printf( $isp_banner_gallery[ 'after_title' ] );

    $args = array( 'post_type' => 'banner', 'orderby' => 'menu_order', 'order' => 'ASC' );
    // $query = new WP_Query($args);
    $myposts = get_posts( $args );

        printf( $isp_banner_gallery[ 'before_gallery' ] );
    foreach( $myposts as $post ){ setup_postdata($post);
	// if ( $query->have_posts()){
        // выводим заголовок блока банеров
        // while ( $query->have_posts() ) {
            printf( $isp_banner_gallery[ 'before_banner' ] );
            // $query->the_post();
            // printf('<pre>'); print_r(  $post  ); printf('</pre>');
            $value = get_field( "entry", $post->ID );
            // printf('<pre>'); print_r(  $value  ); printf('</pre>');
            $img = get_field( "picture", $post->ID );
            $link = get_field( "link", $post->ID );
            print_r($link);
            have_rows('parameters',$post->ID);
            the_row();
            $s1 = get_sub_field('parameter');
            the_row();
            $s2 = get_sub_field('parameter');
            the_row();
            $s3 = get_sub_field('parameter');
            the_row();
            $s4 = get_sub_field('parameter');

            // printf( '%s \n %s \n %s \n %s \n %s \n %s \n %s \ %s \n ', $value[0]->post_name, '', '',$post->post_title, $s1, $s2, $s3, $s4 );
            printf( $isp_banner_gallery[ 'banner' ], $link['url'], $img['url'] , $img['alt'],$post->post_title, $s1, $s2, $s3, $s4 );
            printf( $isp_banner_gallery[ 'after_banner' ] );
        // }

    }
    wp_reset_postdata();
        printf( $isp_banner_gallery[ 'after_gallery' ] );

}

function get_banners() {
    global $isp_banner_gallery;

    $s = $isp_banner_gallery[ 'before_section' ] . $isp_banner_gallery[ 'before_title' ] . $isp_banner_gallery[ 'title' ] . $isp_banner_gallery[ 'after_title' ];


    $args = array( 'post_type' => 'banner', 'orderby' => 'menu_order', 'order' => 'ASC' );
    $myposts = get_posts( $args );

    $s .= $isp_banner_gallery[ 'before_gallery' ] ;
    foreach( $myposts as $post ){ setup_postdata($post);
            $s .= $isp_banner_gallery[ 'before_banner' ] ;
            $value = get_field( "entry", $post->ID );
            $img = get_field( "picture", $post->ID );
            $link = get_field( "link", $post->ID );    
            have_rows('parameters',$post->ID);
            the_row();
            $s1 = get_sub_field('parameter');
            the_row();
            $s2 = get_sub_field('parameter');
            the_row();
            $s3 = get_sub_field('parameter');
            the_row();
            $s4 = get_sub_field('parameter');

            $s .= sprintf( $isp_banner_gallery[ 'banner' ],get_permalink( $link[0] ), $img['url'] , $img['alt'],$post->post_title, $s1, $s2, $s3, $s4 );
            $s .= $isp_banner_gallery[ 'after_banner' ] ;
    }
    wp_reset_postdata();
    $s .= $isp_banner_gallery[ 'after_gallery' ] . $isp_banner_gallery[ 'after_section' ];
    return $s;

}
/**
 *
 * Определяем Шорт код [banners-intercon]
 *
 */
function banners_intercon( $atts ){
	return get_banners(); 
}
 
add_shortcode( 'banners-intercon', 'banners_intercon' );


  
/**
 *
 * Определяем Шорт код [info-intercon]
 *
 */
function info_intercon( $atts ){
	return get_intercon_info(); 
}
 
add_shortcode( 'info-intercon', 'info_intercon' );    

function get_intercon_info() {
    

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<div class=" mdl-grid mdl-grid--no-spacing ">'.
                    '<div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--8-col-phone  ">'.
    
                        '<h2>' .get_field('intercon_h2'). '</h2>'.
                        '<div>'.
                            get_field('info_main').
                            '<a id=ref1 href="#infoblock2">Читать далее>>></a>' .
                        '</div>'.
                        '<div id=infoblock2 class="novisible">'.
                            get_field('info_second').
                            '<a id=ref2 href="#infoblock1"><<<Скрыть</a>' .
                        '</div>'.

    
                   '</div>'.
                '</div>'.
            '</div>'.
        '</div>'. 

		'<script type="text/javascript">'.
			'(function() {'.
                'var secondBlock = document.querySelector("#infoblock2");'.
                'var refa = document.querySelector("#ref1");'.
                'var refb = document.querySelector("#ref2");'. 
                'refa.addEventListener("click", function(){'.
                    'event.preventDefault();'.
                   'secondBlock.classList.remove("novisible"); '.
                   'console.log("Клик по ссылке ");'.
                '});'.
                'refb.addEventListener("click", function(){'.
                    'event.preventDefault();'.
                   'secondBlock.classList.add("novisible"); '.
                   'console.log("Клик по ссылке ");'.
                '});'.
           '}());'.
		'</script>';


    return $s;

}  

/**
 *
 * Определяем Шорт код [map-intercon]
 *
 */
function map_intercon( $atts ){
	return get_intercon_map(); 
}
 
add_shortcode( 'map-intercon', 'map_intercon' );    

function get_intercon_map() {
    

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>Интернет в Воронеже и области</h2>'.
                    '<div class=" mdl-grid ">';

    $args = array('posts_per_page' => 20, 'post_type' => 'internet_map' );
    $myposts = get_posts( $args );
    
     foreach( $myposts as $post ){ setup_postdata($post);

            $s.= '<div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-tablet mdl-cell--2-col-phone ">';
            $s.= '<a href="' . get_permalink( get_field( "entry", $post->ID )[0] ). '">' . 
                    '<div class="isp-min-map">'.
                        '<div>'. 
                            ' <img class="" src="' . get_field( "avatar", $post->ID )[url] . '" alt=""> '.
                        '</div>'. 
                        '<div class = "isp-map__fone">'. 
                            $post->post_title . 
                        '</div>'. 
                    '</div>'. 
                '</a>' .
                '</div>'; 

    }
    wp_reset_postdata();

    $s .=               '</div>'.
            '</div>'.
        '</div>'; 

    return $s;

}  

/**
 *
 * Определяем Шорт код [action-intercon]
 *
 */

function action_intercon( $atts, $content = ''  ){
	return get_intercon_action($atts, $content); 
}
 
add_shortcode( 'action-intercon', 'action_intercon' );    

function get_intercon_action($atts, $content) {

    $args = array('posts_per_page' => 4, 'post_type' => 'internet_action' );
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );
    $cnt = count($myposts);
    if ( $cnt == 0 ){
        return "";
    } 
      
    $post = $myposts[0];
    setup_postdata($post);
    $image = get_field( "avatar_1", $post->ID );

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                 '<div class=" mdl-grid mdl-grid--no-spacing">'.
                    '<div class="mdl-cell mdl-cell--7-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                        '<a href="' .get_permalink( $post->ID ). '">' . 
                            '<div class= "action-1" >'.
                                '<div class = "action-1_fon ">';
                                if( !empty($image) ){
                                    $s .=  ' <img class = "action_img" src="' . $image['url'] . '" alt="' .  $image['alt'] .'"> ';
                                };
                                $s .= '</div>'. 
                                '<div class = "action-1_title_fon "></div>'.
                                '<div class = "action-1_title ">'. 
                                    $post->post_title . 
                                '</div>'.
                            '</div>'.

                        '</a>'.
                    '</div>';
    if ( $cnt == 1){
        $s .=   '</div>'.
            '</div>'.
        '</div>';
        return $s;
    };

    $post = $myposts[1];
    setup_postdata($post);
    if ( $cnt == 2){
        $image = get_field( "avatar_1", $post->ID );
        $action_2__2 = " action-2--2";
        $action_img = "action_img";
    }else{
        $action_2__2 = "";
        $action_img = "action_img--width";
        $image = get_field( "avatar_2", $post->ID );
        if (empty($image) ) {
            $image = get_field( "avatar_1", $post->ID );
        }
    };

    $s .=           '<div class="mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                        '<div class=" mdl-grid mdl-grid--no-spacing">'.
                            '<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                                '<a href="' . get_permalink( $post->ID). '">' . 
                                    '<div class="action-2' . $action_2__2 .'">'.
                                        '<div class = "action-2_fon">'; 
                                        if( !empty($image) ){
                                            $s .=  ' <img class = ' . $action_img . ' src="' . $image['url'] . '" alt="' .  $image['alt'] .'"> ';
                                        };
                                        $s .= '</div>'.                       
                                        '<div class = "action-2_title_fon "></div>'. 
                                        '<div class = "action-2_title">'. 
                                            $post->post_title . 
                                        '</div>'.
                                    '</div>'.
                                '</a>'.
                            '</div>'.  
                        '</div>';
    if ( $cnt == 2){
        $s .=       '</div>'.
                '</div>'.
            '</div>'.
        '</div>';
        return $s;
    };

    $post = $myposts[2];
    setup_postdata($post);

    if ( $cnt == 3){
        $image = get_field( "avatar_2", $post->ID );
        if (empty($image)) {
            $image = get_field( "avatar_1", $post->ID );
        }        
        $action_2__2 = " action-2--3";
        $s .=       
                    
                        '<div class=" mdl-grid mdl-grid--no-spacing">'.
                            '<div class="mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                                '<a href="' . get_permalink( $post->ID). '">' . 
                                    '<div class="action-2' . $action_2__2 .'">'.
                                        '<div class = "action-2_fon">'; 
                                        if( !empty($image) ){
                                            $s .=  ' <img class = "action_img--width" src="' . $image['url'] . '" alt="' .  $image['alt'] .'"> ';
                                        };
                                        $s .= '</div>'.                       
                                        '<div class = "action-2_title_fon "></div>'. 
                                        '<div class = "action-2_title">'. 
                                            $post->post_title . 
                                        '</div>'.
                                    '</div>'.
                                '</a>'.
                            '</div>'.  
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</div>'.
        '</div>';
        return $s;
 
 
    }else{
        $image = get_field( "avatar_3", $post->ID );
        if (empty($image)) {
            $image = get_field( "avatar_2", $post->ID );
            if (empty($image)) {
                $image = get_field( "avatar_1", $post->ID );            
            } 
        }  
    };
    $s .=               '<div class=" mdl-grid mdl-grid--no-spacing">'.
                            '<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                                '<a href="' . get_permalink( $post->ID). '">' . 
                                    '<div class="action-3">'.
                                        '<div class="action-3_fon">'; 
                                        if( !empty($image) ){
                                            $s .=  ' <img class = "action_img" src="' . $image['url'] . '" alt="' .  $image['alt'] .'"> ';
                                        };
                                        $s .= '</div>'.                      
                                        '<div class = "action-3_title_fon "></div>'. 
                                        '<div class = "action-3_title">'. 
                                            $post->post_title . 
                                        '</div>'.
                                    '</div>'.
                                '</a>'.
                            '</div>';  

    $post = $myposts[3];
    setup_postdata($post);
    $image = get_field( "avatar_3", $post->ID );
    if (!empty($image)) {
        $image = get_field( "avatar_2", $post->ID );
        if (!empty($image)) {
            $image = get_field( "avatar_1", $post->ID );            
        } 
    };  
    $s .=                  '<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-cell--8-col-phone">'.
                                '<a href="' . get_permalink( $post->ID). '">' . 
                                    '<div class="action-3">'.
                                        '<div class="action-3_fon">';
                                        if( !empty($image) ){
                                            $s .=  ' <img class = "action_img" src="' . $image['url'] . '" alt="' .  $image['alt'] .'"> ';
                                        };
                                        $s .= '</div>'.                      
                                        '<div class = "action-3_title_fon "></div>'. 
                                        '<div class = "action-3_title">'. 
                                            $post->post_title . 
                                        '</div>'.
                                    '</div>'.
                                '</a>'.
                            '</div>'. 
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

}  

/**
 *
 * Определяем Шорт код [price user= ""]Заголовок[/price]
 *
 */
function price_intercon( $atts, $content = '' ){
	return get_intercon_price( $atts, $content ); 
}
 
add_shortcode( 'price-intercon', 'price_intercon' );    

function get_intercon_price( $atts, $content ) {
    
    $args = array('posts_per_page' => 6, 'post_type' => 'tariff' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );  
    $n = count($myposts);
    if ($n == 4){
        $dcl = 3;
        $pcl = 2;
    }else{
        $dcl = 4;
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                 '<div class=" mdl-grid ">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="mdl-cell mdl-cell--'. $dcl .'-col mdl-cell--'. $pcl .'-col-tablet mdl-cell--8-col-phone">'.
                            '<div class="card card--price ">' .    
                                '<a href="' . get_permalink($post->ID) . '">'. 
                                    '<div class="card__title">'.
                                        $post->post_title .
                                    '</div>' .
                                    '<div class="card__text">' ;
                                     if ( is_object_in_term($post->ID, 'service_isp', 'service') ) {
                                        $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
                                     }else{
                                         $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>';
                                     }

                                     $s .=   '<p>'. get_field( "info", $post->ID) .'</p>' .
                                    '</div>'. 
                                    '<div class="card__hover">' .
                                        '<p>Узнать больше </p>' .
                                    '</div>' .

                                '</a>' .
                            '</div>' .
                        '</div>' ;


                    };
 
    $s.=        '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

}  


/**
 *
 * Определяем Шорт код [packet user= ""]Заголовок[/price]
 *
 */
function packet_intercon( $atts, $content = '' ){
	return get_intercon_packet( $atts, $content ); 
}
 
add_shortcode( 'packet-intercon', 'packet_intercon' );    

function get_intercon_packet( $atts, $content ) {
    
    $args = array('posts_per_page' => 6, 'post_type' => 'packet' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );  
    $n = count($myposts);
    if ($n == 4){
        $dcl = 3;
        $pcl = 2;
    }else{
        $dcl = 4;
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                 '<div class=" mdl-grid ">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="mdl-cell mdl-cell--'. $dcl .'-col mdl-cell--'. $pcl .'-col-tablet mdl-cell--8-col-phone">'.
                            '<div class="card card--price ">' .    
                                '<a href="' . get_permalink($post->ID) . '">'. 
                                    '<div class="card__title">'.
                                        $post->post_title .
                                    '</div>' .
                                    '<div class="card__text">' .
                                        '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>' ;
                                        $psts = get_field( "composition", $post->ID);
                                        foreach($psts as $pst){
                                              
                                        $s .= '<p>'. get_field( "info", $pst->ID) .'</p>' ;
                                        };

                                    $s .= '</div>'. 
                                    '<div class="card__hover">' .
                                        '<p>Узнать больше </p>' .
                                    '</div>' .

                                '</a>' .
                            '</div>' .
                        '</div>' ;


                    };
 
    $s.=        '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

} 

/**
 *
 * Определяем Шорт код [news-intercon]
 *
 */
function news_intercon( $atts ){
	return get_intercon_news(); 
}
 
add_shortcode( 'news-intercon', 'news_intercon' );    

function get_intercon_news() {

    $args = array('posts_per_page' => 3, 'post_type' => 'intercon_news' );
    $myposts = get_posts( $args );  

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>Новости</h2>'.
                 '<div class=" mdl-grid mdl-grid--no-spacing">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="mdl-cell mdl-cell--4-col mdl-cell--2-col-tablet mdl-cell--8-col-phone">'.
                            '<div class= "news" >'.
                            '<a href="' .get_permalink( $post->ID). '">' . 
                                '<h4>' . $post->post_title . '</h4>'.
                            '</a>'.
                                '<p>' .apply_filters( 'the_content', get_the_content( ) ). '</p>'.
                             '</div>'.
                        '</div>';
// apply_filters( 'the_content', get_the_content( ) )
// get_the_content( $post->ID)
                    };
 
    $s.=        '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

}  



/**
 *
 * Очищаем все классы у <main id=''>
 *
 *
 *
 *
 *
 */

function intercon_the_class($classes) {
	$class[] = ' ';

	return $class;
}

add_filter('body_class', 'intercon_the_class');