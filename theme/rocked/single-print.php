<?php
/**
 * Template Name: 印刷グラフィックス
 * Template Post Type: post
 */

get_header(); ?>


	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$fullwidth = 'fullwidth';
	} else {
		$fullwidth = '';
	} ?>

	<div id="primary" class="content-area col-md-9 fullwidth">
		<main id="main" class="content-wrap" role="main">
			
			
<!--印刷グラフィックス-->
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

<!--バナー4つ-->
<?php $imgid = get_field('banner-h2-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?><!--フィールド名banner-h2-1が入っている場合に以下表示-->
<ul id="graphic">
<li class="one-gra">
<div class="gra-in">
<a href="" class="text-gra">
<h2><?php echo post_custom('banner-h2-1'); ?></h2>
<?php $imgid = get_field('banner-h3-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo post_custom('banner-h3-1'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('banner-p-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('banner-p-1'); ?></p>
<?php endif;?>
</a><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-img-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-img-1", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
	

<?php $imgid = get_field('banner-h2-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="one-gra">
<div class="gra-in">
<a href="" class="text-gra">
<h2><?php echo post_custom('banner-h2-2'); ?></h2>

			
<?php $imgid = get_field('banner-h3-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo post_custom('banner-h3-2'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('banner-p-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('banner-p-2'); ?></p>
<?php endif;?>
</a><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-img-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-img-2", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
<?php endif;?>
	

<?php $imgid = get_field('banner-h2-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="one-gra">
<div class="gra-in">
<a href="" class="text-gra">
<h2><?php echo post_custom('banner-h2-3'); ?></h2>

			
<?php $imgid = get_field('banner-h3-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo post_custom('banner-h3-3'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('banner-p-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('banner-p-3'); ?></p>
<?php endif;?>
</a><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-img-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-img-3", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
<?php endif;?>
	

<?php $imgid = get_field('banner-h2-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="one-gra">
<div class="gra-in">
<a href="" class="text-gra">
<h2><?php echo post_custom('banner-h2-4'); ?></h2>

			
<?php $imgid = get_field('banner-h3-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h3><?php echo post_custom('banner-h3-4'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('banner-p-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('banner-p-4'); ?></p>
<?php endif;?>
</a><!--text-gra-->

<div class="img-gra">
<?php $imgid = get_field('banner-img-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<img src="<?php the_field("banner-img-4", $post->ID); ?>" alt="" class="">
<?php endif;?>
</div><!--img-gra-->
</div><!--gra-in-->
</li><!--one-gra-->
<?php endif;?>
</ul><!--#graphic-->
<?php endif;?><!--フィールド名banner-h2-1end-->			
<!--バナー4つここまで-->

<!--ステップ1～8-->
<?php $imgid = get_field('step-img-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?><!--フィールド名step-img-1が入ってる場合に以下表示-->
<h2 class="print-titleh2">制作の流れ</h2>
<ul class="service-point print">
<li class="pointflex">
<div class="point-imgleft">
<img src="<?php the_field("step-img-1", $post->ID); ?>" alt="" class="">
</div><!--point-imgleft-->
	
<div class="point-textright point-text">
<?php $imgid = get_field('step-title-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>01</span></p>
<h3><?php echo post_custom('step-title-1'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-1'); ?></p>
<?php endif;?>
</div><!--point-textright point-text-->
</li><!--pointflex-->
	
<?php $imgid = get_field('step-img-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgright">
<img src="<?php the_field("step-img-2", $post->ID); ?>" alt="" class="">
</div><!--point-imgright-->
	
<div class="point-textleft point-text">
<?php $imgid = get_field('step-title-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>02</span></p>
<h3><?php echo post_custom('step-title-2'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-2'); ?></p>
<?php endif;?>
</div><!--point-textleft point-text-->
</li><!--pointflex-->
<?php endif;?>
	
<?php $imgid = get_field('step-img-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgleft">
<img src="<?php the_field("step-img-3", $post->ID); ?>" alt="" class="">
</div><!--point-imgleft-->
	
<div class="point-textright point-text">
<?php $imgid = get_field('step-title-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>03</span></p>
<h3><?php echo post_custom('step-title-3'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-3'); ?></p>
<?php endif;?>
</div><!--point-textright point-text-->
</li><!--pointflex-->
<?php endif;?>
	
<?php $imgid = get_field('step-img-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgright">
<img src="<?php the_field("step-img-4", $post->ID); ?>" alt="" class="">
</div><!--point-imgright-->
	
<div class="point-textleft point-text">
<?php $imgid = get_field('step-title-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>04</span></p>
<h3><?php echo post_custom('step-title-4'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-4'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-4'); ?></p>
<?php endif;?>
</div><!--point-textleft point-text-->
</li><!--pointflex-->
<?php endif;?>	

<?php $imgid = get_field('step-img-5'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h4 class="estimates">見積りシートのイメージはこちら</h4>
<li class="pointflex">
<div class="point-imgleft">
<img src="<?php the_field("step-img-5", $post->ID); ?>" alt="" class="">
</div><!--point-imgleft-->

<div class="point-textright point-text">
<?php $imgid = get_field('step-title-5'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>05</span></p>
<h3><?php echo post_custom('step-title-5'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-5'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-5'); ?></p>
<?php endif;?>
</div><!--point-textright point-text-->
</li><!--pointflex-->
<?php endif;?>

<?php $imgid = get_field('step-img-6'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgright">
<img src="<?php the_field("step-img-6", $post->ID); ?>" alt="" class="">
</div><!--point-imgright-->
	
<div class="point-textleft point-text">
<?php $imgid = get_field('step-title-6'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>06</span></p>
<h3><?php echo post_custom('step-title-6'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-6'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-6'); ?></p>
<?php endif;?>
</div><!--point-textleft point-text-->
</li><!--pointflex-->
<?php endif;?>
	
<?php $imgid = get_field('step-img-7'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgleft">
<img src="<?php the_field("step-img-7", $post->ID); ?>" alt="" class="">
</div><!--point-imgleft-->
	
<div class="point-textright point-text">
<?php $imgid = get_field('step-title-7'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>07</span></p>
<h3><?php echo post_custom('step-title-7'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-7'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-7'); ?></p>
<?php endif;?>
</div><!--point-textright point-text-->
</li><!--pointflex-->
<?php endif;?>
	
<?php $imgid = get_field('step-img-8'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<li class="pointflex">
<div class="point-imgright">
<img src="<?php the_field("step-img-8", $post->ID); ?>" alt="" class="">
</div><!--point-imgright-->
	
<div class="point-textleft point-text">
<?php $imgid = get_field('step-title-8'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p>STEP.<span>08</span></p>
<h3><?php echo post_custom('step-title-8'); ?></h3>
<?php endif;?>
			
<?php $imgid = get_field('step-p-8'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<p><?php echo post_custom('step-p-8'); ?></p>
<?php endif;?>
</div><!--point-textleft point-text-->
</li><!--pointflex-->
<?php endif;?>
</ul><!--ステップ1～8ここまで-->
<?php endif;?><!--フィールド名step-img-1のend-->

			
<!--各種印刷-->
<?php $imgid = get_field('printing-1'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<h2>各種印刷</h2>
<div class="print-flex">
<div class="print-flex-in">
<p><?php echo post_custom('printing-1'); ?></p>
</div><!--print-flex-in-->
	
<?php $imgid = get_field('printing-2'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="print-flex-in">
<p><?php echo post_custom('printing-2'); ?></p>
</div><!--print-flex-in-->
<?php endif;?>
	
<?php $imgid = get_field('printing-3'); ?>
<?php if(empty($imgid)):?>
<?php else:?>
<div class="print-flex-in">
<p><?php echo post_custom('printing-3'); ?></p>
</div><!--print-flex-in-->
<?php endif;?>
	
</div><!--print-flex--><!--各種印刷ここまで-->
<?php endif;?><!--フィールド名printing-1のend-->

<?php $imgid = get_field('facility'); ?><!--設備-->
<?php if(empty($imgid)):?>
<?php else:?>
<h2>設備</h2>
<?php echo post_custom('facility'); ?>
<?php endif;?>
			
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
<?php if(get_field('link-1')): ?>
<li class="link-1"><a href="/contact/">お問い合わせへ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-2')): ?>
<li class="link-2"><a href="">資料請求へ</a></li>
<?php endif; ?>
	
<?php if(get_field('link-3')): ?>
<li class="link-3"><a href="">納品までの流れを見る</a></li>
<?php endif; ?><!--リンクのカスタムフィールドここまで-->
			</ul>
<!--印刷グラフィックスページここまで-->


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
