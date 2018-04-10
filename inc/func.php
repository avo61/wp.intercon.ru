<?php
/**
 *
 * Сервисные функции
 *
 */

function filtr_key($str, $fltr)
{

    foreach ($fltr as $elm) {
        if ($str == $elm) {
            return $str;
        }
    }
    return '';
}


/**
 *
 *  Получить параметр user из УРЛ
 *
 */
function getUserUrl()
{
    $user = '';
    if (array_key_exists('user', $_GET)) {
        $user = filtr_key($_GET['user'], ['Дом','Квартира','Офис','дом','квартира','офис','delfin']);
    }
    return $user;
}

/**
 * Сформировать список заголовков записей  в виде ссылок на записи
 * 
 * 
 * 
 */
function list_title_post($before, $myposts, $after)
{

    $s = '';

    foreach ($myposts as $post) {
        setup_postdata($post);
        $s .= $before  .'<a href="' .  get_permalink($post->ID) . '">'.$post->post_title. '</a>'. $after;
    }
    wp_reset_postdata();
    return $s;
}

/**
 * Обработка AJAX запроса формы запроса подключения
 * 
 * 
 * 
 */
add_action('jx_connect_action', function($jx){
    $secret = '6LdYSDgUAAAAAAry607ubz6x2ihp0kvPTYxoURZ7';
     // блок проверки invisible reCAPTCHA
    require_once (dirname(__FILE__).'/recaptcha/autoload.php');
    // если в массиве $_POST существует ключ g-recaptcha-response, то...
    if (isset($jx->data['g-recaptcha-response'])) {
        // создать экземпляр службы recaptcha, используя секретный ключ
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        // получить результат проверки кода recaptcha
        $resp = $recaptcha->verify($jx->data['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        // результат проверки
        if ($resp->isSuccess()){
            $jx->variable('backwards', 'Заявка принята. Вам перезвонят втечении 10 минут');

            $message = date("[Y-m-d H:i:s]") .', '. $jx->data['name1'] .', '.$jx->data['name2'] .', '.$jx->data['name3'] .', '.$jx->data['telefon'] .', '.$jx->data['email'] .  "\r\n";
            $sender='www@intercon.ru';
            $recipient='avo@sinet.ru';
            mail($recipient,'Запрос на подключение',$message,'From: <'.$sender.'>');
            // mail('avo@office.intercon.ru', 'My Subject', $message);
            // $headers = 'From: <www@intercon.ru>' . "\r\n";

            // wp_mail('avo@office.intercon.ru', 'Запрос на подключение', $message, $headers);
            file_put_contents(get_template_directory().'/log/email.log', $message, FILE_APPEND | LOCK_EX);
            return;
        } else {
            $errors = $resp->getErrorCodes();
            $jx->variable('error', 'Ошибка: Код капчи не прошел проверку ' . $errors);
        // для отладки: 
            // $data['error-captcha'] = $errors;
        
            return;
        }
    }else{
        $name = $jx->data['name1'];
        
        if (strlen($name) < 1) {
            // $jx->alert('Please enter your name');
            $jx->variable('error', 'Ошибка: Проверте ваши данные');
        } else {
            // $jx->html('.tryme-output', 'Welcome, '.$name.'!');
            $jx->variable('backwards', 'Заявка принята. Вам перезвонят втечении 10 минут');
        }
    }
});