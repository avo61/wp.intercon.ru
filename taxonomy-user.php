<?php
/**
 * Страница для таксономии User: (dom, kvartira, delfin, office)
 *
 *
 *
 * @package INTERCON
 */
global $wp_query;
$h1 = ['dom'=>'Тарифы для частного дома', 'kvartira'=>'Тарифы для квартиры', 'delfin'=>'Тарифы для ЖК Дельфин', 'office'=>'Тарифы для Юридических лиц'];
get_header();

    $qr = $wp_query->query;
    $user = $qr['user'];

    echo '<div class="isp-new-section"><div class="isp-new-section"><h1>'. $h1[$user] .'</h1></div></div>';
    echo get_price( ['user'=>$user, 'service_isp'=>"интернет"], "Интернет" );
    echo get_price( ['user'=>$user, 'service_isp'=>"смотрешка"], "Смотрешка" );
    echo get_price( ['user'=>$user, 'service_isp'=>"IP TV"], "IPTV" );

get_footer();
