<?php
/**
 * Template Name: デジタルコンテンツ
 * Template Post Type: post
 */

get_header(); ?>


	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$fullwidth = 'fullwidth';
	} else {
		$fullwidth = '';
	} ?>

	<div id="primary" class="content-area col-md-9 fullwidth">
		<main id="main" class="content-wrap digitalcontents" role="main">
			
			
<!--デジタルコンテンツ-->
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
<p><?php echo post_custom('detaile'); ?></p>
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
</div><!--ser-singleflex--><!--カテゴリーページと共通ここまで-->

<!--バナー3つ-->
<?php $imgid = get_field('banner-di-h2-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?><!--フィールド名banner-di-h2-1が入っている場合に以下表示-->
<ul id="graphic">
<li class="one-gra">
<div class="gra-in">
<div class="text-gra">
<?php echo post_custom('banner-di-h2-1'); ?>
</div><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-di-img-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-di-img-1", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
	
<?php $imgid = get_field('banner-di-h2-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="one-gra">
<div class="gra-in">
<div class="text-gra">
<h2><?php echo post_custom('banner-di-h2-2'); ?></h2>

			
</div><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-di-img-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-di-img-2", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
<?php endif;?>
	

<?php $imgid = get_field('banner-di-h2-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="one-gra">
<div class="gra-in">
<div class="text-gra">
<h2><?php echo post_custom('banner-di-h2-3'); ?></h2>

</div><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-di-img-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-di-img-3", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
<?php endif;?>

	
</ul><!--#graphic-->
<?php endif;?><!--フィールド名banner-di-h2-1end-->			
<!--バナー3つここまで-->
			
<!--導入事例-->
<?php $imgid = get_field('case'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="case-study">
<h2>導入事例</h2>
<?php echo post_custom('case'); ?>
</div>
<?php endif;?>
<!--導入事例ここまで-->
	

			
<div class="message-area">
<div class="img-messa">
<img src="/cms/wp-content/uploads/2021/03/img1.png" alt="">
	</div>
<div class="text-messa">
<h4>ヒアリングからご提案・制作・納品まで<br><span>全て</span>承っております！！</h4>	
	</div>
</div><!--message-area-->
			
<!--リンクのカスタムフィールド-->
<ul class="link-btnset">
<?php if(get_field('link-4')): ?>
<li class="link-4"><a href="/contact/">お問い合わせへ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-5')): ?>
<li class="link-5"><a href="">資料請求へ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-6')): ?>
<li class="link-6"><a href="">納品までの流れを見る</a></li>
<?php endif; ?><!--リンクのカスタムフィールドここまで-->
			</ul>
<!--デジタルコンテンツページここまで-->


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
