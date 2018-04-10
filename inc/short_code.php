<?php
/**
 * Шорт-коды
 *
 * @package INTERCON
 */

/**
 *
 * Определяем Шорт код [wrap-intercon]Секция[/wrap-intercon]
 *
 */
function wrap_intercon($atts, $content = '')
{
    return get_intercon_wrap( $atts, $content );
}
 
add_shortcode( 'wrap-intercon', 'wrap_intercon' );

function get_intercon_wrap($atts, $content)
{
    
    $args = array('posts_per_page' => 6, 'post_type' => 'packet' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;

    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                  $content .
            '</div>'.
        '</div>';

 
    return do_shortcode($s);
}

/**
 *
 * Определяем Шорт код [#]
 *
 */
add_shortcode( '#', 'pp' );
function pp($atts, $content)
{
    return '<div class="font-size-1-2rem ">'. do_shortcode($content) . '</div>';
}


/**
 *
 * Определяем Шорт код [post-card   category=''
 *                                  type-category=''
 *                                  backgraund=''
 *                                  maxcol=n]Заголовок[/post-list]
 * Пример: [post-card  category='service' type-category='service_isp'  maxcol='6']
 */
add_shortcode( 'post-card', 'post_card' );
function post_card($atts, $content)
{
    $atts = shortcode_atts( array( 'category' => 'Дополнительный сервис', 'backgraund' =>'price-card--background','maxcol'=>'4', 'type-category'=>'category_name' ), $atts );
    if (!$atts) {
        return '';
    }
    $args =array('posts_per_page' => -1, 'post_type' => 'any' ,$atts['type-category'] =>$atts['category']);
    //'category' => $atts[category
    // $args =array('posts_per_page' => -1, 'post_type' => 'post' ,'category_name' =>$atts[category]);//'category' => $atts[category
    $myposts = get_posts( $args );
    $n = count($myposts);
    $n = min([$n, $atts['maxcol']]);

    if ($n == 0) return '';

    $s =  '<div class="isp-fon-container">'.
                '<div class="isp-new-section">'.
                $content .
                '<div class="flex-list-block">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $s .= '<a href="'. get_permalink($post->ID). '" class="flex-list-block--element flex-list-block--element-25">';
        $f = get_field( "pic", $post->ID);
        if ($f == '') {
                 $s .=   $post->post_title;
        } else {
            $s .=  $f;
        }
        $s .= '</a>';
    }
    $s .= '</div></div></div>';
    return $s;
}


/**
 *
 * Определяем Шорт код [post-list   category=''
 *                                  type-category=''
 *                                  backgraund=''
 *                                  maxcol=n]Заголовок[/post-list]
 * Пример: [post-list  category='service' type-category='service_isp'  maxcol='6']
 */
add_shortcode( 'post-list', 'post_list' );

function post_list($atts, $content)
{
    $atts = shortcode_atts( array( 'category' => 'Дополнительный сервис', 'backgraund' =>'price-card--background','maxcol'=>'4', 'type-category'=>'category_name' ), $atts );
    if (!$atts) {
        return '';
    }
    $args =array('posts_per_page' => -1, 'post_type' => 'any' ,$atts['type-category'] =>$atts['category']);
    //'category' => $atts[category
    // $args =array('posts_per_page' => -1, 'post_type' => 'post' ,'category_name' =>$atts[category]);//'category' => $atts[category
    $myposts = get_posts( $args );
    $n = count($myposts);
    $n = min([$n, $atts['maxcol']]);
    $arg = [
        'header' => $content,
        'header-before' => '<h6>',
        'header-after' => '</h6>',
        'max-grid' => $n,
        'card-modificator' => $atts['backgraund'],
        'fields' => ['post_title']
        // 'fields' => ['post_title', 'price', 'composition' , 'info']
    ];
    return list_cards( $myposts, $arg);
}
/**
 *
 * Определяем Шорт код [price   user='' service_isp='']Заголовок[/price]
 * Определяем Шорт код [price-color   user='' service_isp='']Заголовок[/price]
 *                        
 * Пример: [price-color user="дом" service_isp="интернет" ]<h2>Тарифы Интернет</h2>[/price-color]
 */

add_shortcode( 'price', 'get_price' );
add_shortcode( 'price-color', 'get_color_price' );



function get_price($att, $content, $clr = ''){
    return get_intercon__price($att, $content, '');
}
function get_color_price($att, $content, $clr = ''){
    return get_intercon__price($att, $content, 'price-card--background');
}

function get_intercon__price($att, $content, $clr = '')
{
    $atts = shortcode_atts( ['user'=>'','service_isp'=>'', 'maxcol'=>4], $att);
    $args = array('posts_per_page' => 10, 'post_type' => 'tariff' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if (is_array($atts)) {
        $args += $atts;
    };
    // $res =  aaa(['user'=>'дом','service_isp'=>'интернет']);
    $myposts = get_posts( $args );
    $n = count($myposts);
    $n = min([$n, $atts['maxcol']]);
    $arg = [
        'header' => $content,
        'post_title-before' => '<h5>',
        'post_title-after' => '</h5>', 
        'max-grid' => $n,
        'card-modificator' => $clr ,
        'fields' => ['post_title', 'price' , 'info']
    ];
    return list_cards( $myposts, $arg, $atts['user']);
}


function list_cards($myposts, $att, $user='')
{
    $def = [
        'header' => '',
        'header-before' => '<h6>',
        'header-after' => '</h6>',       
        'max-grid' => 3,
        'card-modificator' => 'price-card--background',
        'post_title-before' => '<h6>',
        'post_title-after' => '</h6>',
        'price-before' => '<mark>',
        'price-after' => '</mark>',     
        'info-before' => '',
        'info-after' => '',            
        'fields' => ['post_title']
    ];
    $arg = shortcode_atts( $def, $att);

    switch ($arg['max-grid']) {
        case 1:
        case 2:
        case 3:
            $cls = 'grid-price__item3';
            break;
        case 4:
            $cls = 'grid-price__item4';
            break;
        case 5:
            $cls = 'grid-price__item5';
//            break;
        case 6:
            $cls = 'grid-price__item6';
            break;
        default:
            $cls = 'grid-price__item4';
    }
    $clr = $arg['card-modificator'];
    $content = $arg['header-before'] . $arg['header'] . $arg['header-after'];
    
        $s = '<div class="isp-fon-container">'.
                '<div class="isp-new-section">'.
                    $content .
                     '<div class="grid-wrapper">'.
                        '<div class=" grid-price ">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        if ( $user == ''){
            $user = getUserUrl();
        }
        $s .='<div class="' . $cls . '">'.
        '<a href="' . (($user != '')?add_query_arg('user', $user, get_permalink($post->ID)):get_permalink($post->ID)) . '">'.
        '<div class="price-card ' . $clr . '">' .
        '<div class="price-card__list">';
        $i = 0;
        foreach ($arg['fields'] as $fld) {
            $i +=1;
            switch ($fld) {
                case 'post_title':
                    if ($i == 1) {
                        $s .= $arg['post_title-before'] .$post->post_title . $arg['post_title-after'].
                        '<div class="price-card__list--align"> </div>';
                    } else {
                        $s .= '<p>'. $arg['post_title-before'] .$post->post_title . $arg['post_title-after'] .' руб </p>';
                    }
                    break;
                case 'price':
                    $f = get_field( "price", $post->ID);
                    // if ($f) {
                        if (is_object_in_term($post->ID, 'service_isp', 'service')) {
                            $s .= '<p>' . $arg['price-before'] . $f . $arg['price-after'] . ' руб </p>';
                        } else {
                            $s .= '<p>' . $arg['price-before'] . $f . $arg['price-after'] . ' руб/мес  </p>';
                        }
                    // }
                    break;

                case 'composition':
                    $psts = get_field( "composition", $post->ID);
                    if ($psts) {
                        foreach ($psts as $pst) {
                            $s .= '<p>'. $arg['info-before']. get_field( "info", $pst->ID) . $arg['info-after'].'</p>' ;
                        };
                    };
                    break;
                                                    
                case 'info':
                    $s .=   '<p>'. $arg['info-before']. get_field( "info", $post->ID) . $arg['info-after'].'</p>' ;
                    break;
            }
        }

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

/**
 *
 * Определяем Шорт код [TV-LIST]
 *
 */

add_shortcode( 'TV-LIST', 'listTV' );
function listTV($atts, $content)
{
    global $listTV;
    if (isset ($listTV)){
        $dirTV =  get_bloginfo('template_url') . '/images/smotreshka/tv/';
        $s= '<div class="flex_wrap">';
        foreach($listTV as  $key => $file){
            $s .= '<div class="flex_block"><img src="' . $dirTV . $file . '" alt="' . $key . '" width="155"><br><p>' . $key . '</p></div>';
            $l = strlen($s);
        }
        $s .=  '</div>';
        return $s;
    }
        return '';
}


/**
 *
 * Определяем Шорт код [post-image]
 *
 */
add_shortcode( 'post-image', 'post_image' );

function post_image($atr){

    $pic = get_the_post_thumbnail(null,'medium');
    if ($pic)
        return $pic;
    return '';
}


/**
 *
 * Определяем Шорт код [action-intercon]
 *
 */

add_shortcode( 'action-intercon', 'action_intercon' );

function action_intercon($atts, $content = '')
{
    return get_intercon_action($atts, $content);
}
 
function get_intercon_action($atts, $content)
{
    
    $args = array('posts_per_page' => 3, 'post_type' => 'internet_action' );
    if (is_array($atts)) {
        $args += $atts;
    };
    $myposts = get_posts( $args );
    $cnt = count($myposts);
    if ($cnt == 0) {
        return '';
    }
          
        $post = $myposts[0];
        setup_postdata($post);

    //     $image = get_field( "avatar_1", $post->ID );
    // if (empty($image)) {
    //     $avatar = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900619931-768x533.png';
    //     $avatar_alt = '';
    // } else {
    //     $avatar = $image['url'];
    //     $avatar_alt = $image['alt'];
    // }
        
        // echo "<pre>";
        // print_r($post);
        // print_r($image);
        // echo "</pre>";
    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section style111">'.
                '<h2>' . $content . '</h2>'.
                '<div class="action-wrap">'.
                    '<div class=" grid-actions ">';
    // $img = get_the_post_thumbnail( $post->ID , 'medium' ); 
    // $cnt =2;
    switch ($cnt) {
        case 0:
            echo "0";
            return "";
        case 1:
            $s .= '<div class="grid-actions__item-first">'.
                '<a href="' .get_permalink( $post->ID ). '">'.
                    '<div class="actions">'.
                        get_the_post_thumbnail( $post->ID ).
                        // '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                        // '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                        '<div class="actions__title"></div>'.
                    '</div>'.
                '</a>'.
            '</div>'.
            '<div class="grid-actions__item-second  ">'.
            '<div class="actions-col">'.
                '<div class="actions-button">'.
                    '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '<div class="actions-button--sm">'.
                    '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
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
            // if (empty($image1)) {
            //     $avatar1 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900619931-768x533.png';
            //     $avatar1_alt = '';
            // } else {
            //     $avatar1 = $image['url'];
            //     $avatar1_alt = $image['alt'];
            // }
            $s .= '<div class="grid-actions__item-first">'.
                '<a href="' .get_permalink( $post->ID ). '">'.
                    '<div class="actions">'.
                        get_the_post_thumbnail( $post->ID ).
                        // '<img class="actions__pic" src="' . $avatar1 . '" alt="' .  $avatar1_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                        // '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                    '</div>'.
                '</a>'.
            '</div>'.
            '<div class="grid-actions__item-second  ">'.
            '<div class="actions-col">'.
                '<a href="' .get_permalink( $post1->ID ). '">'.
                    '<div class="actions">'.
                        get_the_post_thumbnail( $post1->ID , 'medium' ).
                        // '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                        '<div class="actions__date">'.get_the_date( 'j-n-Y', $post1 ).'</div>'.
                        // '<div class="actions__title">'. $post1->post_title .'<br><br></div>'.
                    '</div>'.
                '</a>'.
                '<div class="actions-button">'.
                    '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
                        '<p>Смотреть все Акции&nbsp;&nbsp;'.
                            '<span> <i class="material-icons">input</i></span>'.
                        '</p>'.
                    '</a>'.
                '</div>'.
                '<div class="actions-button--sm">'.
                    '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
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
            // if (empty($image1)) {
            //     $avatar1 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900619931-768x533.png';
            //     $avatar1_alt = '';
            // } else {
            //     $avatar1 = $image1['url'];
            //     $avatar1_alt = $image1['alt'];
            // }
            $post2 = $myposts[2];
            setup_postdata($post2);
            // $image2 = get_field( "avatar_1", $post2->ID );
            // if (empty($image2)) {
            //     $avatar2 = 'http://test.intercon.ru//wp-content/uploads/2017/07/intercon__fon1-1-e1499900619931-768x533.png';
            //     $avatar2_alt = '';
            // } else {
            //     $avatar2 = $image2['url'];
            //     $avatar2_alt = $image2['alt'];
            // }
            $url = get_bloginfo('wpurl');
            $s .= '<div class="grid-actions__item-first">'.
                    '<div class="actions-col">'.
                        '<a href="' .get_permalink( $post->ID ). '">'.
                            '<div class="actions">'.
                                get_the_post_thumbnail( $post->ID  ).
                                // '<img class="actions__pic" src="' . $avatar . '" alt="' .  $avatar_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post ).'</div>'.
                                // '<div class="actions__title">'. $post->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.
                        '<div class="actions-button">'.
                            '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
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
                                get_the_post_thumbnail( $post1->ID , 'medium' ).
                                // '<img class="actions__pic" src="' . $avatar1 . '" alt="' .  $avatar1_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post1 ).'</div>'.
                                // '<div class="actions__title">'. $post1->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.
                        '<a href="' .get_permalink( $post2->ID ). '">'.
                            '<div class="actions">'.
                                get_the_post_thumbnail( $post2->ID , 'medium' ).
                                // '<img class="actions__pic" src="' . $avatar2 . '" alt="' .  $avatar2_alt .'">'.
                                '<div class="actions__date">'.get_the_date( 'j-n-Y', $post2 ).'</div>'.
                                // '<div class="actions__title">'. $post2->post_title .'<br><br></div>'.
                            '</div>'.
                        '</a>'.
                        '<div class="actions-button--sm">'.
                            '<a href="' . get_bloginfo('wpurl') . '/internet_action">'.
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


/**
 *
 * Определяем Шорт код [map-intercon]
 *
 */
add_shortcode( 'map-intercon', 'map_intercon' );

function map_intercon($atts)
{
    return get_intercon_map();
}
 

function get_intercon_map()
{
    

    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                '<h2>Интернет в Воронеже и области</h2>'.
                    '<div class=" grid-maps ">';

    $args = array('posts_per_page' => 20, 'post_type' => 'internet_map', 'orderby' => 'menu_order', 'order' => 'ASC' );
    $myposts = get_posts( $args );
    
    foreach ($myposts as $post) {
        setup_postdata($post);

          $s.= '<div class="grid-maps__item ">';
          $s.= '<a href="' . get_permalink( get_field( "entry", $post->ID )[0] ). '">' .
                  '<div class="button">'.
                      // '<div>'.
                          ' <img class="button__picture" src="' . get_field( "avatar", $post->ID )['url'] . '" alt=""> '.
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

function news_intercon($atts)
{
    return get_intercon_news();
}


function get_intercon_news()
{

    $args = array('posts_per_page' => 3, 'post_type' => 'intercon_news', 'orderby' => 'date', 'order' => 'DESC' );
    $myposts = get_posts( $args );

    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                '<h2>Новости</h2>'.
                 '<div class="  grid-news">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $s .='<div class="grid-news__item r">'.
        '<p>'.get_the_date( 'j-n-Y', $post ).'</p>'.
        '<a href="' .get_permalink( $post->ID). '">' .
        '<h6>' . $post->post_title . '</h6>'.
        '</a>'.
        // '<p>' .apply_filters( 'the_content', get_the_content( ) ). '</p>'.
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
 * Определяем Шорт код [param key="параметр"]
 *
 */
add_shortcode( 'param', 'param' );

function param($atr){
        
    return get_option_isp('isp_theme_options_'.$atr['key']);
}

/**
 *
 * Определяем Шорт код [get-template-directory]
 *
 */
add_shortcode( 'get-template-directory', 'template_directory' );

function template_directory($atr){

    return get_template_directory_uri();
}