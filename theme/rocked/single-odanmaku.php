<?php
/**
 * Template Name: 横断幕
 * Template Post Type: post
 */

get_header(); ?>


	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$fullwidth = 'fullwidth';
	} else {
		$fullwidth = '';
	} ?>

	<div id="primary-1" class="content-area col-md-9 fullwidth">
		<main id="main" class="content-wrap odanmaku" role="main">
			
			
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
			
<?php $imgid = get_field('detaile-sub'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="detaile-subtxt">
<p><?php echo nl2br(get_post_meta($post->ID, 'detaile-sub', true)); ?></p></div>
<?php endif;?>
			
<!--ポイント-->
<!--ポイント・カスタムフィールドSuite-->
<ul class="service-point">
 <?php
$fields = $cfs->get('loop');
foreach ($fields as $field) :
?>
	<?php
  $iffield = $field['point-image'];
  if($iffield) :?>
<li class="pointflex">
<div class="point-img">
<img src="<?php echo $field['point-image']; ?>" />
<p><?php echo $field['on-img']; ?></p></div>
  <?php endif; ?>

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
</li>
<?php endforeach; ?> 
			</ul>

<!--カスタムフィールドSuiteここまで-->
<!--ポイントここまで-->
			
<!--テキスト-->			
<?php $imgid = get_field('odanmaku-txt-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="odanmaku-txt-flex">
<div class="odanmaku-txt">
<?php echo nl2br(get_post_meta($post->ID, 'odanmaku-txt-1', true)); ?></div>
<?php endif;?>
			
<?php $imgid = get_field('odanmaku-txt-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="odanmaku-txt2">
<?php echo nl2br(get_post_meta($post->ID, 'odanmaku-txt-2', true)); ?></div>
</div>
<?php endif;?>
<!--テキストここまで-->
			
<!--活用例-->
<?php $imgid = get_field('odanmaku-katsuyou'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo nl2br(get_post_meta($post->ID, 'odanmaku-katsuyou', true)); ?></h3>
<?php endif;?>
	
	
<?php $imgid = get_field('odanmaku-img'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="katsuyou-flex">
<div class="katsuyou-img">
<img src="<?php the_field("odanmaku-img", $post->ID); ?>" alt="" class=""></div>
	
<?php $imgid = get_field('odanmaku-img-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="katsuyou-img">
<img src="<?php the_field("odanmaku-img-2", $post->ID); ?>" alt="" class=""></div>
<?php endif;?>
	
<?php $imgid = get_field('odanmaku-img-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="katsuyou-img">
<img src="<?php the_field("odanmaku-img-3", $post->ID); ?>" alt="" class=""></div>
<?php endif;?>
</div>
<?php endif;?>
			
			
<?php $imgid = get_field('odanmaku-txt-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="odanmaku-voice">
<p><?php echo nl2br(get_post_meta($post->ID, 'odanmaku-txt-3', true)); ?></p></div>
<?php endif;?>
<!--活用例ここまで-->

<!--オプション-->
<?php $imgid = get_field('format'); ?><!--フィールド名formatが入っている場合に以下表示-->
<?php if(empty($imgid)):?>
<?php else:?>
<div class="format-bg">
<h3><?php echo post_custom('format'); ?></h3>
	
<?php $imgid = get_field('option-txt'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h4><?php echo post_custom('option-txt'); ?></h4>
<?php endif;?>
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
<!--オプションここまで-->


			
<!--リンクのカスタムフィールド-->
<?php $imgid = get_field('data-title'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="data-block">
<h3><?php echo post_custom('data-title'); ?></h3>

<?php $imgid = get_field('data-txt'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('data-txt'); ?></p>
<?php endif;?>
</div>
<?php endif;?>

			
<ul class="link-btnset">
<?php if(get_field('link-contact')): ?>
<li class="link-1"><a href="<?php the_field('link-url-1'); ?>">お問い合わせへ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-document')): ?>
<li class="link-4"><a href="<?php the_field('link-url-2'); ?>">申込書・ダウンロード</a></li>
<?php endif; ?>
	
<?php if(get_field('link-flow')): ?>
<li class="link-3"><a href="<?php the_field('link-url-3'); ?>">納品までの流れを見る</a></li>
<?php endif; ?><!--リンクのカスタムフィールドここまで-->
			</ul>
<!--横断幕ページここまで-->


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
