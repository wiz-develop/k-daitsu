<?php
/**
 * The template for displaying all single posts.
 *
 * @package Rocked
 */

get_header(); ?>


	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$fullwidth = 'fullwidth';
	} else {
		$fullwidth = '';
	} ?>

	<div id="primary" class="content-area col-md-9 fullwidth">
		<main id="main" class="content-wrap" role="main">
			
		
<!--サービス詳細ページ-->			
<div class="ser-singleflex">	
<div class="ser-left">
<div class="ser-left-in">
<header class="entry-header">
	
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php if (get_theme_mod('hide_meta_single') != 1 ) : ?>
			
			<?php endif; ?>
		</header><!-- .entry-header -->

<!--カスタムフィールド-->
  <!--カテゴリーページと共通-->
<?php $imgid = get_field('title'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo post_custom('title'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('detaile'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo nl2br(get_post_meta($post->ID, 'detaile', true)); ?></p>
<?php endif;?>
</div><!--ser-left-in-->
</div><!--ser-left-->

<div class="ser-right">
<?php $imgid = get_field('detail-img'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("detail-img", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--ser-right-->
</div><!--ser-singleflex-->	
<!--カテゴリーページと共通ここまで-->

			
<!--ポイント・カスタムフィールドSuite-->
<?php
    $fields = $cfs->get('loop');
    if ($fields) :
?>
<ul class="service-point">
<?php
    foreach ($fields as $field) :
        $iffield = $field['point-image'];
        if($iffield) :
?>
    <li class="pointflex">
    <div class="point-img">
    <img src="<?php echo $field['point-image']; ?>" />
    <p><?php echo $field['on-img']; ?></p></div>


    <div class="point-text">
    <?php
    $iffield = $field['point-no'];
    if($iffield) :?>
    <p class="p-no-in">POINT.<span><?php echo $field['point-no']; ?></span></p>
    <?php endif; ?>
        
    <?php
    $iffield = $field['point-t'];
    if($iffield) :?>
    <h3><?php echo $field['point-t']; ?></h3>
    <?php endif; ?>

    <div class="p-text-in">
    <?php echo $field['point-text']; ?></div></div>
    <?php endif; ?>
    </li>
    <?php endforeach; ?> 
</ul>
<?php endif; ?>

<!--カスタムフィールドSuiteここまで-->			
			

<!--仕様・形式-->
<?php $imgid = get_field('format'); ?><!--フィールド名formatが入っている場合に以下表示-->
<?php if(empty($imgid)):?>
<?php else:?>
<div class="format-bg">
<h3><?php echo post_custom('format'); ?></h3>
<ul>

<?php $imgid = get_field('format-img-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li>
<?php $value = get_post_meta($post->ID, 'format-link-1', true);?>
<?php if(empty($value)):?>
<img src="<?php the_field("format-img-1", $post->ID); ?>" alt="" class="">
<?php else:?>
<a href="<?php the_field('format-link-1'); ?>">
<img src="<?php the_field("format-img-1", $post->ID); ?>" alt="" class="">
	</a><?php endif;?>

	
<?php $imgid = get_field('format-title-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h4><?php echo post_custom('format-title-1'); ?></h4>
<?php endif;?>
	
<?php $imgid = get_field('format-text-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo nl2br(get_post_meta($post->ID, 'format-text-1', true)); ?></p>
<?php endif;?>
</li>
<?php endif;?>
	

<?php $imgid = get_field('format-img-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li>
<?php $value = get_post_meta($post->ID, 'format-link-2', true);?>
<?php if(empty($value)):?>
<img src="<?php the_field("format-img-2", $post->ID); ?>" alt="" class="">
<?php else:?>
<a href="<?php the_field('format-link-2'); ?>">
<img src="<?php the_field("format-img-2", $post->ID); ?>" alt="" class="">
	</a><?php endif;?>

	
<?php $imgid = get_field('format-title-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h4><?php echo post_custom('format-title-2'); ?></h4>
<?php endif;?>
	
<?php $imgid = get_field('format-text-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo nl2br(get_post_meta($post->ID, 'format-text-2', true)); ?></p>
<?php endif;?>
</li>
<?php endif;?>
	

<?php $imgid = get_field('format-img-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li>
<?php $value = get_post_meta($post->ID, 'format-link-3', true);?>
<?php if(empty($value)):?>
<img src="<?php the_field("format-img-3", $post->ID); ?>" alt="" class="">
<?php else:?>
<a href="<?php the_field('format-link-3'); ?>">
<img src="<?php the_field("format-img-3", $post->ID); ?>" alt="" class="">
	</a><?php endif;?>

	
<?php $imgid = get_field('format-title-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h4><?php echo post_custom('format-title-3'); ?></h4>
<?php endif;?>
	
<?php $imgid = get_field('format-text-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo nl2br(get_post_meta($post->ID, 'format-text-3', true)); ?></p>
<?php endif;?>
</li>
<?php endif;?>
</ul>
</div><!--format-bg-->
<?php endif;?><!--フィールド名format end-->
<!--仕様・形式ここまで-->

<!--制作実績スライド-->
<?php  echo do_shortcode("[myphp file='service']"); ?>
<!--制作実績スライドここまで-->
			
<!--納品までの流れ-->
<?php
$fields = $cfs->get('flow-wrap');
if ($fields) :
?>
<div class="flowblock">	
<?php foreach ($fields as $field) : ?>
			
<?php
  $iffield = $field['flow-title'];
  if($iffield) :?>

<h3><?php echo $field['flow-title']; ?></h3>
			
<?php
  $iffield = $field['flow-sub'];
  if($iffield) :?>
<h4><?php echo $field['flow-sub']; ?></h4>
<?php endif; ?>
<ul class="sample-flow">			
 <?php
$subfields = $field['flow-loop'];
if($subfields):
?>
<?php
foreach ($subfields as $subfield):
?>
			
<?php
  $iffield = $subfield['flow-desc'];
  if($iffield) :?>

<li class="flowflex">
<div class="flow-icon">
<img src="<?php echo $subfield['flow-icon']; ?>" /></div>
 

<div class="flow-text">
<?php echo $subfield['flow-desc']; ?>
</div>
</li>

<?php endif; ?>
<?php endforeach; endif; ?>
</ul>
<?php endif; ?>
<?php endforeach; ?> </div>		

<?php endif; ?>
<!--納品までの流れここまで-->
<!--私たちの強み・納品までの流れ-->

<div id="work-flow">
<?php if(get_post_meta($post->ID,'work-title',true)): ?>
<div  class="work-title">
<h3><?php echo $cfs->get('work-title'); ?></h3>
<h4><?php echo $cfs->get('work-sub'); ?></h4></div>
<?php
endif;
$fields = $cfs->get('work-flow');
if ($fields) :
?>
<ul>
<?php foreach ($fields as $field) : ?>
<li><div class="w-flow-l">			
<?php
  $iffield = $field['step-no'];
  if($iffield) :?>
 <h4>STEP.<span><?php echo $field['step-no']; ?></span></h4>
 <?php endif; ?>
			
<?php
  $iffield = $field['step-icon'];
  if($iffield) :?>
<img src="<?php echo $field['step-icon']; ?>" />
  <?php endif; ?></div>

<div class="w-flow-r">
<?php echo $field['step-desc']; ?>
	</div></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</div>
<!--私たちの強み・納品までの流れここまで-->

<!--カスタムフィールドここまで-->

<!--コンテンツ内容-->
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/content', 'single' ); ?>
<?php endwhile; // end of the loop. ?>
<!--コンテンツ内容ここまで-->
			
<div class="message-area">
<div class="img-messa">
<img src="/cms/wp-content/uploads/2021/03/img1.png" alt="">
	</div>
<div class="text-messa">
<h4>ご提案から企画・制作、印刷、納品まで<br><span>トータルで</span>承っております</h4>	
	</div>
</div><!--message-area-->

<!--リンクのカスタムフィールド-->
<ul class="link-btnset">
<?php if(get_field('link-contact')): ?>
<li class="link-1"><a href="<?php the_field('link-url-1'); ?>">お問い合わせへ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-document')): ?>
<li class="link-2"><a href="<?php the_field('link-url-2'); ?>">資料請求へ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-flow')): ?>
<li class="link-3"><a href="<?php the_field('link-url-3'); ?>">納品までの流れを見る</a></li>
<?php endif; ?>
			</ul><!--リンクのカスタムフィールドここまで-->
			

<!--コンテンツ内容元の場所-->
		

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
