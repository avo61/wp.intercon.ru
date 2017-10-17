<?php

/**
 *
 * Определяем Шорт код [banners-intercon]
 *
 */
 add_shortcode( 'banners-intercon', 'banners_intercon' );
 
function banners_intercon( $atts ){
	return get_banners(); 
}
 
// 
// 
// 
function get_banners() {
    // echo "<pre>";
    // print_r(get_post(null,ARRAY_A )['post_title']);             
    // echo "</pre>";   
        $args = array('posts_per_page' => 4, 'post_type' => 'banner', 'orderby' => 'menu_order', 'order' => 'ASC' );
        $myposts = get_posts( $args );  
    
        $s = '<div class="isp-fon-container">'. 
                '<div class="isp-new-section">'.
                    // '<div class="int-section-title  logo-font ">'.
                        '<h1>'.get_post(null,ARRAY_A )['post_title'].'</h1>'.
                    // '</div>'.
                    '<div class="wrap-banners">'. 
                     '<div class=" grid-banners">';
                        foreach( $myposts as $post ){ setup_postdata($post);  
                            // echo "<pre>";
                            $img = get_field( 'picture', $post->ID );
                            $link = get_field( 'link', $post->ID );
                            have_rows('parameters',$post->ID);
                            the_row();
                            $s1 = get_sub_field('parameter');
                            the_row();
                            $s2 = get_sub_field('parameter');
                            the_row();
                            $s3 = get_sub_field('parameter');
                            the_row();
                            $s4 = get_sub_field('parameter');
                            // print_r(get_permalink( $link[0] ));
                            // print_r($img['url']);             
                            // print_r($link);             
                            // echo "</pre>";
                            $s .='<div class="grid-banners__item">'.
                                    '<a class="banners-ref" href="'.get_permalink( $link[0] ).'">' .
                                    '<div class= "banners_" >'.
                                        '<div class="banners___pic">'.
                                            '<img class="banners___pic-img" src="'.$img['url'].'" alt="'.$img['alt'].'">' .
                                            // '<img class="banners___pic-img" src="'.get_bloginfo('template_url') .'/images/housebanner.jpg" alt="">' .
                                            '<dir class="banners___pic-head">'.$post->post_title.'</dir>'.
                                        '</div>'.
                                        '<div class=" banners___text">'.
                                            '<h5>'.$s1.'</h5>'.
                                                '<h6>'.$s2.'</h6>'.
                                                '<h6>'.$s3.'</h6>'.
                                            '<div class="banners___text-align"> </div>'.
                                            '<h5>'.$s4.'</h5>'.
                                        '</div>'.
                                    '</div>'.
                                    '</a>'.
                                '</div>';
                        };
     
        $s.=        '</div>'.
                    '</div>'.
                '</div>'.
            '</div>'; 
    
        wp_reset_postdata();
     
        return $s;
    
    }  
// 
// 




  
/**
 *
 * Определяем Шорт код [info-intercon]
 *
 */
add_shortcode( 'info-intercon', 'info_intercon' );    

function info_intercon( $atts ){
	return get_intercon_info(); 
}
 

function get_intercon_info() {
    

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.
            '<div class="info-section ">'.
                '<div class="info  ">'.
                    '<h2>' .get_field('intercon_h2'). '</h2>'.
                        '<p>'.get_field('info_main').'<a id=ref1 href="#infoblock2"> Читать далее>>></a>'. '</p>' .

                        '<div id=infoblock2 class="novisible">'.
                        get_field('info_second').
                        '<a id=ref2 href="#infoblock1"><<<Скрыть</a>' .
                        '</div>'.
                '</div>'.
                '<div class="access ">'.
                    '<div class="access__head">'.
                        '<p>Доступность сети</p>'.
                            '<p>'.date("d.m.Y").' &nbsp &nbsp'.date( "H:m").'</p>'.
                    '</div>'.
                    '<div class="access__value">'.
                        '<p>'.
                        '<!--99.95%-->'.
                        '<h3>99.95%</h3>'.
                        '</p>'.
                    '</div>'.
                    '<div class="access__button">'.
                        '<p>ИНФОРМАЦИЯ ОБ ОТКЛЮЧЕНИЯХ</p>'.
                    '</div>'.
                '</div>'.
            '</div>'.
            '</div>'.
        '</div>'.            
                      
        //         '<div class=" mdl-grid mdl-grid--no-spacing ">'.
        //             '<div class="mdl-cell mdl-cell--10-col mdl-cell--6-col-tablet mdl-cell--8-col-phone  ">'.
    
        //                 '<h2>' .get_field('intercon_h2'). '</h2>'.
        //                 '<div>'.
        //                     get_field('info_main').
        //                     '<a id=ref1 href="#infoblock2">Читать далее>>></a>' .
        //                 '</div>'.
        //                 '<div id=infoblock2 class="novisible">'.
        //                     get_field('info_second').
        //                     '<a id=ref2 href="#infoblock1"><<<Скрыть</a>' .
        //                 '</div>'.

    
        //            '</div>'.
        //         '</div>'.
        //     '</div>'.
        // '</div>'. 

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
add_shortcode( 'map-intercon', 'map_intercon' );    

function map_intercon( $atts ){
	return get_intercon_map(); 
}
 

function get_intercon_map() {
    

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>Интернет в Воронеже и области</h2>'.
                    '<div class=" grid-maps ">';

    $args = array('posts_per_page' => 20, 'post_type' => 'internet_map', 'orderby' => 'menu_order', 'order' => 'ASC' );
    $myposts = get_posts( $args );
    
     foreach( $myposts as $post ){ setup_postdata($post);

            $s.= '<div class="grid-maps__item ">';
            $s.= '<a href="' . get_permalink( get_field( "entry", $post->ID )[0] ). '">' . 
                    '<div class="button">'.
                        // '<div>'. 
                            ' <img class="button__picture" src="' . get_field( "avatar", $post->ID )[url] . '" alt=""> '.
                        // '</div>'. 
                        '<div class = "button__name">'. 
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
 * Определяем Шорт код [news-intercon]
 *
 */
add_shortcode( 'news-intercon', 'news_intercon' );    

function news_intercon( $atts ){
    return get_intercon_news(); 
    
}



function get_intercon_news() {

    $args = array('posts_per_page' => 3, 'post_type' => 'intercon_news', 'orderby' => 'date', 'order' => 'DESC' );
    $myposts = get_posts( $args );  

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>Новости</h2>'.
                 '<div class="  grid-news">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="grid-news__item r">'.
                            '<p>'.get_the_date( 'j-n-Y', $post ).'</p>'.
                            '<a href="' .get_permalink( $post->ID). '">' . 
                                '<h6>' . $post->post_title . '</h6>'.
                            '</a>'.
                                '<p>' .apply_filters( 'the_content', get_the_content( ) ). '</p>'.
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
 * Определяем Шорт код [action-intercon]
 *
 */

add_shortcode( 'action-intercon', 'action_intercon' );    

function action_intercon( $atts, $content = ''  ){
	return get_intercon_action($atts, $content); 
}
 
function get_intercon_action($atts, $content) {
    
    $args = array('posts_per_page' => 3, 'post_type' => 'internet_action' );
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );
    $cnt = count($myposts);
    if ( $cnt == 0) return '';
          
        $post = $myposts[0];
        setup_postdata($post);

        $image = get_field( "avatar_1", $post->ID );
        if( empty($image) ){
            $avatar = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900820810.png';
            $avatar_alt = '';
        }else{
            $avatar = $image['url'];
            $avatar_alt = $image['alt'];
        }
        
        echo "<pre>";
        // print_r($post);             
        // print_r($image);             
        echo "</pre>";  
    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                '<div class="action-wrap">'.
                    '<div class=" grid-actions ">';
    // $cnt =2;
    switch ($cnt) {
        case 0:
        echo "0";
            return "";
        case 1:

            $s .= '<div class="grid-actions__item-first">'.
                '<a href="' .get_permalink( $post->ID ). '">'.
                    '<div class="actions">'.
                        '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                        '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                    '</div>'.
                '</a>'.
            '</div>'.
            '<div class="grid-actions__item-second  ">'.
            '<div class="actions-col">'.
                '<div class="actions-button">'.
                    '<a href="">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '<div class="actions-button--sm">'.
                    '<a href="">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '</div>'.
            '</div>';
            break;
        case 2:
            $post1 = $myposts[1];
            setup_postdata($post1);
            $image1 = get_field( "avatar_1", $post1->ID );
            if( empty($image1) ){
                $avatar1 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900820810.png';
                $avatar1_alt = '';
            }else{
                $avatar1 = $image['url'];
                $avatar1_alt = $image['alt'];
            }
            $s .= '<div class="grid-actions__item-first">'.
                '<a href="' .get_permalink( $post->ID ). '">'.
                    '<div class="actions">'.
                        '<img class="actions__pic" src="' . $avatar1 . '" alt="' .  $avatar1_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                        '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                    '</div>'.
                '</a>'.
            '</div>'.
            '<div class="grid-actions__item-second  ">'.
            '<div class="actions-col">'.
                '<a href="' .get_permalink( $post1->ID ). '">'.
                    '<div class="actions">'.
                        '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post1 ).'</div>'.
                        '<div class="actions__title">'. $post1->post_title .'<br><br></div>'.
                    '</div>'.
                '</a>'.           
                '<div class="actions-button">'.
                    '<a href="">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '<div class="actions-button--sm">'.
                    '<a href="">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '</div>'.
            '</div>';
            break;
        case 3:
            $post1 = $myposts[1];
            setup_postdata($post1);
            $image1 = get_field( "avatar_1", $post1->ID );
            if( empty($image1) ){
                $avatar1 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900820810.png';
                $avatar1_alt = '';
            }else{
                $avatar1 = $image1['url'];
                $avatar1_alt = $image1['alt'];
            }
            $post2 = $myposts[2];
            setup_postdata($post2);
            $image2 = get_field( "avatar_1", $post2->ID );
            if( empty($image2) ){
                $avatar2 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900820810.png';
                $avatar2_alt = '';
            }else{
                $avatar2 = $image2['url'];
                $avatar2_alt = $image2['alt'];
            }        
            $s .= '<div class="grid-actions__item-first">'.
                    '<div class="actions-col">'.
                        '<a href="' .get_permalink( $post->ID ). '">'.
                            '<div class="actions">'.
                                '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                                '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.
                        '<div class="actions-button">'.
                            '<a href="">'.
                                '<p>Смотреть все Акции&nbsp;&nbsp;'.
                                    '<span> <i class="material-icons">input</i></span>'.
                                '</p>'.
                            '</a>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="grid-actions__item-second  ">'.
                    '<div class="actions-col">'.
                        '<a href="' .get_permalink( $post1->ID ). '">'.
                            '<div class="actions">'.
                                '<img class="actions__pic" src="' . $avatar1 . '" alt="' .  $avatar1_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post1 ).'</div>'.
                                '<div class="actions__title">'. $post1->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.
                        '<a href="' .get_permalink( $post2->ID ). '">'.
                            '<div class="actions">'.
                                '<img class="actions__pic" src="' . $avatar2 . '" alt="' .  $avatar2_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post2 ).'</div>'.
                                '<div class="actions__title">'. $post2->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.    
                        '<div class="actions-button--sm">'.
                            '<a href="">'.
                                '<p>Смотреть все Акции&nbsp;&nbsp;'.
                                    '<span> <i class="material-icons">input</i></span>'.
                                '</p>'.
                            '</a>'.
                        '</div>'.
                    '</div>'.
                '</div>';
            break;
        default:
            return '';
        }

    $s .=           '</div>'.
                '</div>'.
            '</div>'.
        '</div>';
    wp_reset_postdata();   
    return $s;
};



// 
// 
// 
function get_intercon_action_($atts, $content) {

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
 add_shortcode( 'price-intercon', 'price_intercon' );

function price_intercon( $atts, $content = '' ){
	return get_intercon_price( $atts, $content ); 
}
/**
 *
 * Определяем Шорт код [price-color user= ""]Заголовок[/price-color]
 *
 */
 add_shortcode( 'price-color-intercon', 'price_color_intercon' );
 
 function price_color_intercon( $atts, $content = '' ){
     return get_intercon_price( $atts, $content, 'price-card--background'); 
 }    

function get_intercon_price( $atts, $content, $clr = '' ) {
    
    $args = array('posts_per_page' => 6, 'post_type' => 'tariff' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );  
    $n = count($myposts);
    if ($n == 4){
        $cls = 'grid-price__item4';
        $pcl = 2;
    }else{
        $cls = 'grid-price__item3';
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                 '<div class="grid-wrapper">'.
                    '<div class=" grid-price ">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="' . $cls . '">'.
                            '<a href="' . get_permalink($post->ID) . '">'. 
                                '<div class="price-card ' . $clr . '">' .    
                                    '<div class="price-card__list">'.
                                        '<h5>' .$post->post_title . '</h5>'.
                                        '<div class="price-card__list--align"> </div>';
                                        if ( is_object_in_term($post->ID, 'service_isp', 'service') ) {
                                            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
                                        }else{
                                            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>';
                                        }
                                        
                                        $s .=   '<p>'. get_field( "info", $post->ID) .'</p>' .
                                    '</div>'. 
                                    '<div class="price-card__list--hover"></div>' .
                                '</div>'. 

                            '</a>' .
                        '</div>' ;

                    };
 
    $s.=            '</div>'.
                '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

}  

function get_intercon_price_( $atts, $content ) {
    
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
 add_shortcode( 'packet-intercon', 'packet_intercon' ); 

function packet_intercon( $atts, $content = '' ){
	return get_intercon_packet( $atts, $content ); 
}
    

function get_intercon_packet( $atts, $content, $clr = '' ) {
    
    $args = array('posts_per_page' => 6, 'post_type' => 'packet' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if ( is_array($atts) ){
        $args += $atts;
    };
    $myposts = get_posts( $args );  
    $n = count($myposts);
    if ($n == 4){
        $cls = 'grid-price__item4';
        $pcl = 2;
    }else{
        $cls = 'grid-price__item3';
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                '<h2>' . $content . '</h2>'.
                 '<div class="grid-wrapper">'.
                    '<div class=" grid-price ">';
                    foreach( $myposts as $post ){ setup_postdata($post);               
                        $s .='<div class="' . $cls . '">'.
                            '<a href="' . get_permalink($post->ID) . '">'. 
                                '<div class="price-card ' . $clr . '">' .    
                                    '<div class="price-card__list">'.
                                        '<h5>' .$post->post_title . '</h5>'.
                                        '<div class="price-card__list--align"> </div>';
                                        if ( is_object_in_term($post->ID, 'service_isp', 'service') ) {
                                            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
                                        }else{
                                            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>';
                                        }
                                        $psts = get_field( "composition", $post->ID);
                                        foreach($psts as $pst){
                                              
                                        $s .= '<p>'. get_field( "info", $pst->ID) .'</p>' ;
                                        };                                        

                                    $s .= '</div>'. 
                                    '<div class="price-card__list--hover"></div>' .
                                '</div>'. 

                            '</a>' .
                        '</div>' ;

                    };
 
    $s.=            '</div>'.
                '</div>'.
            '</div>'.
        '</div>'; 

    wp_reset_postdata();
 
    return $s;

}  





function get_intercon_packet_( $atts, $content ) {
    
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
 * Определяем Шорт код [wrap-intercon]Секция[/wrap-intercon]
 *
 */
 function wrap_intercon( $atts, $content = '' ){
	return get_intercon_wrap( $atts, $content ); 
}
 
add_shortcode( 'wrap-intercon', 'wrap_intercon' );    

function get_intercon_wrap( $atts, $content ) {
    
    $args = array('posts_per_page' => 6, 'post_type' => 'packet' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;

    $s = '<div class="isp-fon-container">'. 
            '<div class="isp-new-section">'.  
                  $content . 
            '</div>'.
        '</div>'; 

 
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




    
    