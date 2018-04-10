<?php

/**
 *
 * Определяем Шорт код [banners-intercon]
 *
 */
 add_shortcode( 'banners-intercon', 'banners_intercon' );
 
function banners_intercon($atts)
{
    return get_banners();
}
 
// 
// 
// 
function get_banners()
{
    // echo "<pre>";
    // print_r(get_post(null,ARRAY_A )['post_title']);
    // echo "</pre>";
        $args = array('posts_per_page' => 4, 'post_type' => 'banner', 'orderby' => 'menu_order', 'order' => 'ASC' );
        $myposts = get_posts( $args );
    
        $s = '<div class="isp-fon-container">'.
                '<div class="isp-new-section">'.
                    // '<div class="int-section-title  logo-font ">'.
                        '<h1>'.get_post(null, ARRAY_A )['post_title'].'</h1>'.
                    // '</div>'.
                    '<div class="wrap-banners">'.
                     '<div class=" grid-banners">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        // echo "<pre>";
        $img = get_field( 'picture', $post->ID );
        $link = get_field( 'link', $post->ID );
        have_rows('parameters', $post->ID);
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

function info_intercon($atts)
{
    return get_intercon_info();
}
 

function get_intercon_info()
{
    

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
                        '<p>Информация о сети</p>'.
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
 * Определяем Шорт код [news-intercon]
 *
 */
add_shortcode( 'news-intercon_', 'news_intercon_' );

function news_intercon_($atts)
{
    return get_intercon_news_();
}



function get_intercon_news_()
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
 * Определяем Шорт код [price user= ""]Заголовок[/price]
 *
 */
 add_shortcode( 'price-intercon', 'price_intercon' );

function price_intercon($atts, $content = '')
{
    return get_intercon_price( $atts, $content );
}
/**
 *
 * Определяем Шорт код [price-color user= ""]Заголовок[/price-color]
 *
 */
 add_shortcode( 'price-color-intercon', 'price_color_intercon' );
 
function price_color_intercon($atts, $content = '')
{
    return get_intercon_price( $atts, $content, 'price-card--background');
}

function get_intercon_price($atts, $content, $clr = '')
{
    
    $args = array('posts_per_page' => 6, 'post_type' => 'tariff' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if (is_array($atts)) {
        $args += $atts;
    };
    // $res =  aaa(['user'=>'дом','service_isp'=>'интернет']);
    $myposts = get_posts( $args );
    $n = count($myposts);
    if ($n == 4) {
        $cls = 'grid-price__item4';
        $pcl = 2;
    } else {
        $cls = 'grid-price__item3';
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                '<h2>' . $content . '</h2>'.
                 '<div class="grid-wrapper">'.
                    '<div class=" grid-price ">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $nn = isset($args['user']);
        $ss = isset($args['user'])? add_query_arg('user', $args['user'], get_permalink($post->ID)): get_permalink($post->ID);
        $s .='<div class="' . $cls . '">'.
        // '<a href="' . get_permalink($post->ID) . '">'.
        '<a href="' . (isset($args['user'])?add_query_arg('user', $args['user'], get_permalink($post->ID)):get_permalink($post->ID)) . '">'.
        '<div class="price-card ' . $clr . '">' .
        '<div class="price-card__list">'.
        '<h5>' .$post->post_title . '</h5>'.
        '<div class="price-card__list--align"> </div>';
        if (is_object_in_term($post->ID, 'service_isp', 'service')) {
            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
        } else {
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



/**
 *
 * Определяем Шорт код [packet user= ""]Заголовок[/price]
 *
 */
 add_shortcode( 'packet-intercon', 'packet_intercon' );

function packet_intercon($atts, $content = '')
{
    return get_intercon_packet( $atts, $content );
}
    

function get_intercon_packet($atts, $content, $clr = '')
{
    
    $args = array('posts_per_page' => 6, 'post_type' => 'packet' )  + ['orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;
    if (is_array($atts)) {
        $args += $atts;
    };
    $myposts = get_posts( $args );
    $n = count($myposts);
    if ($n == 4) {
        $cls = 'grid-price__item4';
        $pcl = 2;
    } else {
        $cls = 'grid-price__item3';
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                '<h2>' . $content . '</h2>'.
                 '<div class="grid-wrapper">'.
                    '<div class=" grid-price ">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $s .='<div class="' . $cls . '">'.
        '<a href="' . get_permalink($post->ID) . '">'.
        '<div class="price-card ' . $clr . '">' .
        '<div class="price-card__list">'.
        '<h5>' .$post->post_title . '</h5>'.
        '<div class="price-card__list--align"> </div>';
        if (is_object_in_term($post->ID, 'service_isp', 'service')) {
            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
        } else {
            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>';
        }
        $psts = get_field( "composition", $post->ID);
        foreach ($psts as $pst) {
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

/**
 *
 * Определяем Шорт код [packet]Заголовок[/price]
 *
 */
add_shortcode( 'packet', 'packet_short' );

function packet_short($atts)
{
    $myposts = get_field( "composition");
    if ($myposts) {
        return list_price_packet( $myposts, '<h5>Состав пакета</h5>');
    }
    return '';
}


function list_price_packet($myposts, $content, $clr = '')
{

    $n = count($myposts);
    if ($n == 4) {
        $cls = 'grid-price__item4';
        $pcl = 2;
    } else {
        $cls = 'grid-price__item3';
        $pcl = 2;
    }
    $s = '<div class="isp-fon-container">'.
            '<div class="isp-new-section">'.
                $content .
                 '<div class="grid-wrapper">'.
                    '<div class=" grid-price ">';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $s .='<div class="' . $cls . '">'.
        '<a href="' . get_permalink($post->ID) . '">'.
        '<div class="price-card ' . $clr . '">' .
        '<div class="price-card__list">'.
        '<h5>' .$post->post_title . '</h5>'.
        '<div class="price-card__list--align"> </div>';
        if (is_object_in_term($post->ID, 'service_isp', 'service')) {
            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб </p>';
        } else {
            $s .= '<p> <mark>' .get_field( "price", $post->ID) . '</mark> руб/мес </p>';
        }
        $psts = get_field( "composition", $post->ID);
        if ($psts) {
            foreach ($psts as $pst) {
                $s .= '<p>'. get_field( "info", $pst->ID) .'</p>' ;
            };
        } else {
            $s .=   '<p>'. get_field( "info", $post->ID) .'</p>' .
            '</div>'.
            '<div class="price-card__list--hover"></div>' .
            '</div>'.

            '</a>' .
            '</div>' ;
        }
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
 * Определяем Шорт код [systematic  type= ""]
 *
 */
add_shortcode( 'systematic', 'systematic_intercon' );

function systematic_intercon($atts)
{
    global $post;
    $atts = shortcode_atts( array( 'type' => 'default service_isp' ), $atts );
    $terms = get_the_terms( $post->ID, $atts['type'] );
    if ($terms and !is_wp_error($terms) and (count($terms) == 1)) {
        $term = array_shift( $terms );
        return $term->description;
    }
    return '';
}
/**
 *
 * Определяем Шорт код [title]
 *
 */
add_shortcode( 'title', 'title_intercon' );

function title_intercon($atts)
{

    return get_the_title();
}
/**
 *
 * Определяем Шорт код [content]
 *
 */
add_shortcode( 'content', 'content_intercon' );

function content_intercon($atts)
{

    return do_shortcode(get_the_content());
}
/**
 *
 * Определяем Шорт код [content]
 *
 */
add_shortcode( 'tariff', 'price_short' );

function price_short($atts)
{

    return get_field( 'price');
}

/**
 *
 * Определяем Шорт код [content]
 *
 */
add_shortcode( 'saving-money', 'saving_money' );

function saving_money($atts)
{
    
    $posts = get_field( "composition");
    if ($posts) {
        $s = 0 - get_field( "price");
        foreach ($posts as $p) {
            $s += get_field("price", $p->ID);
        }
        return ''. $s;
    } else {
        return '';
    }
}

/**
 *
 * Определяем Шорт код [content]
 *
 */
add_shortcode( 'info', 'info_short' );

function info_short($atts)
{

    return get_field( 'info');
}

/**
 *
 * Определяем Шорт код [connect]
 *
 */
add_shortcode( 'connect', 'connect_short' );

function connect_short($atts)
{


    $s ='<div class="connect-button">'.
        '<a href="'.home_url() . '/connect">'.
            '<p>Подключиться&nbsp;&nbsp;'.
                '<span> <i class="material-icons">person_add</i></span>'.
        '</p>'.
        '</a>'.
    '</div>';
    return $s;
}


function tv_chanel__($atts)
{
    $terms = get_the_terms( $post->ID, 'tv-paket' );
    if ($terms) {
        $term = array_shift( $terms );
        $args =array('posts_per_page' => -1, 'post_type' => 'telekanal','tv-paket' => $term->name );
        $myposts = get_posts( $args );
        if ($myposts) {
            $s ='<div class="flex_wrap">';
            foreach ($myposts as $mypost) {
                $s .= '<div class="flex_block">';
                $s .=  get_the_post_thumbnail($mypost->ID, [1000,61]);
                $s .= '<p>'. $mypost->post_title . '</p>';
                $s .= '</div>';
            }
            foreach ($myposts as $mypost) {
                $s .= '<div class="flex_block">';
                $s .=  get_the_post_thumbnail($mypost->ID, [1000,61]);
                $s .= '<p>'. $mypost->post_title . '</p>';
                $s .= '</div>';
            }
            $s .= '</div>';
            return $s;
        }
    }
    return '';
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

function intercon_the_class($classes)
{
    $class[] = ' ';

    return $class;
}

add_filter('body_class', 'intercon_the_class');



/**
 * Получить массив [[title=>"",permalink=>""]]
 *
 *
 *
 *
 */
function arr_post($args)
{
    // global $post;

    $myposts = get_posts( $args );
    if (!count($myposts)) {
        return [];
    }
    $n = 0;
    $res = [];
    foreach ($myposts as $post) {
        setup_postdata($post);
        $res[$post->post_title] = get_permalink($post->ID);
    }
    wp_reset_postdata();
    return $res;
}


/**
 * 
 *  Фильтр на основной запрос Wordpress
 * 
 */
add_filter( 'request', 'my_request' );
function my_request( $query_vars ){

	$request = urldecode($_SERVER['REQUEST_URI']);

	// if( ($request == '/user/kvartira') or ($request == '/user/dom') or ($request == '/user/delfin') ){
	// 	$query_vars['post_type'] = 'tariff';
	// }

	return $query_vars;
}



// *********************************************************************************************************
// 
//   Неиспользуемый код
// 
// 




/**
 *
 * Определяем Шорт код [tv-chanel]
 *
 */
add_shortcode( 'tv-chanel', 'tv_chanel' );

function tv_chanel($atts)
{
    global $post;
    $terms = get_the_terms( $post->ID, 'tv-paket' );
    if ($terms) {
        $term = array_shift( $terms );
        $args =array('posts_per_page' => -1, 'post_type' => 'telekanal','tv-paket' => $term->name );
        $myposts = get_posts( $args );
        if ($myposts) {
            $s ='<div class="flex_wrap">';
            foreach ($myposts as $mypost) {
                $s .= '<div class="flex_block">';
                $s .=  get_the_post_thumbnail($mypost->ID, [1000,61]);
                $s .= '<p>'. $mypost->post_title . '</p>';
                $s .= '</div>';
            }
            foreach ($myposts as $mypost) {
                $s .= '<div class="flex_block">';
                $s .=  get_the_post_thumbnail($mypost->ID, [1000,61]);
                $s .= '<p>'. $mypost->post_title . '</p>';
                $s .= '</div>';
            }
            $s .= '</div>';
            return $s;
        }
    }
    return '';
}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_topics_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

 $labels = array(
   'name' => _x( 'Topics', 'taxonomy general name' ),
   'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
   'search_items' =>  __( 'Search Topics' ),
   'all_items' => __( 'All Topics' ),
   'parent_item' => __( 'Parent Topic' ),
   'parent_item_colon' => __( 'Parent Topic:' ),
   'edit_item' => __( 'Edit Topic' ), 
   'update_item' => __( 'Update Topic' ),
   'add_new_item' => __( 'Add New Topic' ),
   'new_item_name' => __( 'New Topic Name' ),
   'menu_name' => __( 'Topics' ),
 );    

// Now register the taxonomy

 register_taxonomy('topics',array('post'), array(
   'hierarchical' => true,
   'labels' => $labels,
   'show_ui' => true,
   'show_admin_column' => true,
   'query_var' => true,
   'rewrite' => array( 'slug' => 'topic' ),
 ));

}