<div class="top-news_area" rel="roll">
<?php
global $post;
$tmp_post = $post;
$category_ids = array( '1' ); //カテゴリーID
$numberposts = '3'; //一覧表示したい記事数
foreach ( $category_ids as $category_id ) {
?>
<div class="content-tit_header">
  <h2><?php echo get_cat_name( $category_id ); ?></h2>
  <div class="next-link">
    <a href="/category/news/" class="ya">一覧へ<img src="/cms/wp-content/uploads/2021/02/ya.png" alt="一覧へ"></a>
  </div>
</div>
<ul class="update">
  <?php
     $postslist = get_posts( "category=$category_id&numberposts=$numberposts&order=DESC&orderby=date" );
     foreach ( $postslist as $post ) {
?>
  <li><div><span><?php the_time('Y.m.d'); ?></span><a href=<?php echo get_permalink( $post->ID ); ?>><?php echo $post->post_title; ?></a></div></li>
  <?php
     }
?>
</ul>
<?php
 }
 $post = $tmp_post;
 ?>
</div>