<?php
/**
 * @package Rocked
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-content">

	<div class="one-ser">
	<div class="ser-in">
	<a href="<?php the_permalink(); ?>" class="text-ser">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		<?php $title = get_field('title'); ?>
		<?php if($title):?>
			<h3><?php echo $title; ?></h3>
		<?php endif;?>
		
	</a><!--text-ser-->

	<div class="img-ser">
	<?php $detail_img = get_field('detail-img'); ?>
	<?php if($detail_img):?>
		<img src="<?php echo $detail_img; ?>" alt="" class="">
	<?php endif;?>

	</div><!--img-ser-->
	</div><!--ser-in-->
	</div><!--one-ser-->


	</div>
</article><!-- #post-## -->