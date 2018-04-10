<?php
/**
 *  Виджеты для темы
 */



// Creating the widget 
class price_nav_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
        'price_nav_widget',
        'Меню навигации по прайсам',
        array(
        'description'   => 'Правое Меню навигации по прайсам',
                
        )
            );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );
        $text = apply_filters('widget_text', $instance['text']);

        // before and after widget arguments are defined by themes
 

        $user = 'undef';
        if (array_key_exists('user', $_GET)) {
            $user = filtr_key($_GET['user'], ['Дом','Квартира','Офис','дом','квартира','офис','delfin','dom','kvartira','office']);
        }
        


        echo $before_widget;
        if (! empty( $user )  and ($user != 'undef')) {
            echo '<h6>Интернет</h6>';

			echo  '<div class="shift-block">' . aaa(['user'=>$user,'service_isp'=>'интернет'], $user) . '</div>';
			
		}else
			$user ='';
        // echo '<h6>IP TV</h6>';
        // echo  '<div class="shift-block">' .aaa(['user'=>$user,'service_isp'=>'IP TV'], $user) . '</div>';
        echo '<h6>Смотрешка</h6>';
        echo  '<div class="shift-block">' .aaa(['user'=>$user,'service_isp'=>'base'], $user) . '</div>';
        // echo  '<div class="shift-block">' .aaa(['user'=>$user,'service_isp'=>'смотрешка'], $user) . '</div>';
        echo '<div class="shift-block color">Доп пакеты</div>';
        echo  '<div class="shift-block">' .aaa(['user'=>$user,'service_isp'=>'option'], $user) . '</div>';
        echo $after_widget;
    }
    // Widget Backend
    public function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => '',
            'text'      => ''
            
        ) );

        $title = esc_attr($instance['title']);
        $text = $instance['text'];

        // Widget admin form




        $tableId = $this->get_field_id("title");
        $tableName = $this->get_field_name("title");
        echo '<p>';
        echo '<label for="' . $tableId . '">Заголовок</label>';
        echo '<input class="widefat" id="' . $tableId . '" type="text" name="' . $tableName . '" value="' . $title . '">';
        echo '</p>';
        
        $textId = $this->get_field_id("text");
        $textName = $this->get_field_name("text");
        echo '<p>';
        echo '<label for="' . $textId . '">Text</label><br>';
        echo '<textarea class="widefat" id="' . $textId . '" rows="16" cols="20" name="' . $textName . '">' . $text . '</textarea>';
        echo '</p>';
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = wp_kses_post($new_instance['text']);
        return $instance;
    }
}


/**
 * Регистрируем виджет price_nav_widget
 */
function price_nav_widget_load()
{
    register_widget( 'price_nav_widget' );
}
add_action( 'widgets_init', 'price_nav_widget_load' );


/**
 *
 *
 *
 */
function aaa($atts, $user)
{
    $args = shortcode_atts( array( 'user'=>'' , 'service_isp'=>'' ), $atts );

    if (!$atts) {
        return '';
    }

    $args += ['posts_per_page' => 10, 'post_type' => 'tariff', 'orderby' => 'user meta_value_num', 'meta_key' => 'price','order' => 'ASC' ] ;

    $myposts = get_posts( $args );
    if (!count($myposts)) {
        return '';
    }
    $res = [];
    $s = '<ul>';
    foreach ($myposts as $post) {
        setup_postdata($post);
        $res[$post->post_title] = get_permalink($post->ID);
        $s .= '<li>'.'<a href="' . add_query_arg('user', $user, get_permalink($post->ID)) . '">' .$post->post_title . '</a>' . '</li>';
    }
    $s .= '</ul>';
    wp_reset_postdata();
    // echo $s;
    return $s;
}