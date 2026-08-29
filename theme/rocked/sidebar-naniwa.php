<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Rocked
 */
?>

<div id="secondary" class="widget-area col-md-3" role="complementary">
	
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	<?php
		$cat_parent = get_category_by_slug("naniwa");
		$args = array(
			'parent' => $cat_parent->term_id,
		);
		$categories = get_categories( $args );
		if ($categories) :
			
	?>
	<aside id="categories-naniwa" class="widget widget_categories">
		<h3 class="widget-title">CATEGORY</h3>
		<ul>
			<?php
				foreach ($categories as $cat) :
					$cat_id = $cat->term_id;
					$cat_slug = $cat->slug;
					$cat_name = $cat->name;
			?>
				<li class="cat-item cat-item-<?php echo $cat_id; ?>">
					<a href="/category/naniwa/<?php echo $cat_slug; ?>/"><?php echo $cat_name; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</aside>
	<?php endif; ?>
</div><!-- #secondary -->
