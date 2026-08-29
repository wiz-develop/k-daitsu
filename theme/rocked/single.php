<?php
/*
The template for displaying all single posts.
 *
 * @package Rocked
*/
$category = get_the_category();
$cat_id = $category[0]->cat_ID;

// なにわフォント 親・子カテゴリーを取得
$naniwa_cat = get_category_by_slug("naniwa");
$naniwa_cat_id = $naniwa_cat->cat_ID;
$naniwa_cat_child = get_term_children( $naniwa_cat_id, 'category' );

if ( in_category('3') ) {
  include(TEMPLATEPATH . '/single-3.php');
} elseif ( in_category($naniwa_cat_id) || in_array($cat_id, $naniwa_cat_child) ) {
  include(TEMPLATEPATH . '/single-naniwa.php');
} else {
  include(TEMPLATEPATH . '/single-001.php');
}
?>