<?php
/**
 * The template Для вывода запроса Поддержки
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 */

get_header();
?>
<div class="full-screan">  

 <div class="isp-new-section"  >
     <h1 class="center">Поддержка</h1>

    <?php
    $categories = get_categories([
        'orderby' => 'name',
        'order' => 'ASC',
        'taxonomy'     => 'type-support',
        ]);
        $s = '<div class="flex-list-block">';
    foreach ($categories as $category) {
        $s .= '<a href="'. get_category_link( $category->term_id ). '" class="flex-list-block--element">';
        if ($category->description == '') {
            // $s .= '<div class="flex-list-block--element flex-list-block--element__name ">'.
                 $s .=   $category->name ;
        } else {
            $s .=  $category->description;
        }
        $s .= '</a>';
    }
        $s .= '</div>';
        echo $s;
        ?> 
  </div>

</div>
<?php get_footer(); ?>
