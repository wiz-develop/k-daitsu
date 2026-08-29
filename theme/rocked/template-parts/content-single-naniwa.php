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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">
		
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<?php if ($work_subtit) {
				echo '<p class="entry-subtitle">'.$work_subtit.'</p>';
			}
			?>

			<div class="post-meta">
				<span class="cat-links">
					<i class="fa fa-folder"></i>
					<a href="<?php echo get_category_link($cat_id); ?>" rel="category tag"><?php echo $cat_name; ?></a>
				</span>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ($overview_img) : ?>
				<div class="overview_img text-center">
					<img src="<?php echo $overview_img; ?>" alt="<?php echo strip_tags($work_subtit); ?>">
				</div>
			<?php endif; ?>
			<?php if ($author_name) {
				echo '<p class="text-center">作者：'.$author_name.'</p>';
			}
			?>
			<div class="clearfix">
				<?php the_content(); ?>
			</div>
			<?php if ($membership) {
				echo '<p class="text-right membership-name">'.$membership.'</p>';
			} ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rocked' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if (get_theme_mod('hide_meta_single') != 1 ) : ?>
		<footer class="entry-footer">
			<?php rocked_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-## -->
