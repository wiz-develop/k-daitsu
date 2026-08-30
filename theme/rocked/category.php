<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocked
 */

get_header();
$category = get_the_category();
$cat_id = $category[0]->cat_ID;
$cat_slug = $category[0]->slug;

// なにわふぉんと 親・子カテゴリーを取得
$naniwa_cat = get_category_by_slug("naniwa");
$naniwa_cat_id = $naniwa_cat->cat_ID;
$naniwa_cat_child = get_term_children( $naniwa_cat_id, 'category' );
?>

	<div class="single_catetitle">
		
	</div>
	<div id="primary" class="content-area col-md-9 <?php echo esc_attr(rocked_blog_layout()); ?>">
		<main id="main" class="content-wrap" role="main">
			<?php if(is_category('naniwa-work')): ?>
				<h1>制作物紹介</h1>
			<?php endif; ?>
		<?php if ( in_category($naniwa_cat_id) || in_array($cat_id, $naniwa_cat_child) )  : // なにわふぉんと カテゴリーページ ?>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<div class="posts-layout naniwa-work-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-naniwa' ); ?>
				<?php endwhile; ?>
				</div>

				<?php wp_pagenavi(); ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>

			<div class="naniwa-link-btn text-center" style="padding-top: 4rem;">
				<a href="/naniwa-font/">
					<button>
						<p>なにわふぉんとページへ</p>
					</button>
				</a>
			</div>

		<?php else : ?>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<div class="posts-layout">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content1', get_post_format() );
					?>

				<?php endwhile; ?>
				</div>

				<?php wp_pagenavi(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	if ( get_theme_mod('blog_layout','classic') == 'classic' ) :
	get_sidebar();
	endif;
?>
<?php get_footer(); ?>
