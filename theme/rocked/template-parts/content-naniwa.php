<?php
/**
 * @package Rocked
 */

$category = get_the_category();
$cat_id = $category[0]->cat_ID;
$cat_slug = $category[0]->slug;
$cat_name = $category[0]->name;

$work_subtit = CFS()->get('work_subtit');
$author_name = CFS()->get('author_name');
$membership = CFS()->get('membership');
$overview = CFS()->get('overview');
$overview_img = CFS()->get('overview_img');
$work_img = CFS()->get('work_img');
?>

<?php if(in_category('naniwa-work')): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-list__img">
		<img src="<?php echo $work_img; ?>" alt="<?php the_title(); ?>">
		<p class="mb-0 text-center"><?php the_title(); ?></p>
	</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>">
		<div class="work-body">
			<div class="work-img">
				<img src="<?php echo $overview_img; ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="work-body__about">
				<div class="work-header">
					<h1 class="work-header__title"><?php the_title(); ?></h1>
					<h2 class="work-header__subtitle"><?php echo $work_subtit; ?></h2>
				</div>
				<p class="mb-0"><?php echo $overview; ?></p>
				<div class="membership">
					<p class="membership-author text-end mt-2 mb-0"><?php echo $author_name; ?></p>
					<p class="membership-name mb-0 text-end"><?php echo $membership; ?></p>
				</div>
			</div>
		</div>
	</a>
</article>
<?php endif;?>
<!-- #post-## -->