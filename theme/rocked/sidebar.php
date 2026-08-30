<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Rocked
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-3" role="complementary">
	<aside id="recent-posts-2" class="widget widget_recent_entries">
		<h3 class="widget-title">TITLE</h3>	
	<?php
    // posts_per_pageで取得件数の指定、orderbyでソート順を新着順にしています。
	$naniwa_pattern_category_slug = 'naniwa-pattern';
	$naniwa_pattern_category = get_term_by('slug', $naniwa_pattern_category_slug, 'category');
	if ($naniwa_pattern_category) {
		$naniwa_pattern_category_id = $naniwa_pattern_category->term_id;
	} else {
		$naniwa_pattern_category_id = 0;
	}
	$naniwa_font_category_slug = 'naniwa-font';
	$naniwa_font_category = get_term_by('slug', $naniwa_font_category_slug, 'category');
	if ($naniwa_font_category) {
		$naniwa_font_category_id = $naniwa_font_category->term_id;
	} else {
		$naniwa_font_category_id = 0;
	}
	$naniwa_work_category_slug = 'naniwa-work';
	$naniwa_work_category = get_term_by('slug', $naniwa_work_category_slug, 'category');
	if ($naniwa_work_category) {
		$naniwa_work_category_id = $naniwa_work_category->term_id;
	} else {
		$naniwa_work_category_id = 0;
	}
	$args = array(
		'category__not_in' => array($naniwa_pattern_category_id,$naniwa_font_category_id,$naniwa_work_category_id),
		'orderby' => 'date',
		'posts_per_page' => '7',
	);
    $query = new WP_Query($args);
?>
<?php if( $query->have_posts() ) : ?>
<ul>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <li>
        <div class="thumbnail">
			<?php if( get_the_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
		<?php }else{ ?>
			<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo( 'wpurl' ); ?>/wp-content/uploads/2021/07/no-image.jpg"></a>
			<?php } ?>
		</div>
        <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="day"><?php the_time("Y年m月j日"); ?>UP</span></div>
   </li>
   <?php endwhile; ?>
</ul>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
	</aside>
	
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	<?php
		$cat_parent = get_category_by_slug("news");
		$args = array(
			'parent' => $cat_parent->term_id,
		);
		$categories = get_categories( $args );
		if ($categories) :
			
	?>
	<aside id="categories-2" class="widget widget_categories">
		<h3 class="widget-title">CATEGORY</h3>
		<ul>
			<?php
				foreach ($categories as $cat) :
					$cat_id = $cat->term_id;
					$cat_slug = $cat->slug;
					$cat_name = $cat->name;
			?>
				<li class="cat-item cat-item-<?php echo $cat_id; ?>">
					<a href="/category/<?php echo $cat_slug; ?>/"><?php echo $cat_name; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</aside>
	<?php endif; ?>
</div><!-- #secondary -->
