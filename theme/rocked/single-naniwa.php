<?php
/**
 * The template for displaying all single posts.
 *
 * @package Rocked
 */

get_header();

$buy_fonts_link = CFS()->get('buy_fonts_link');

$category = get_the_category();
$cat_slug = $category[0]->slug;
?>

	<div class="single_catetitle">
	</div>
	<?php if (get_theme_mod('fullwidth_single')) { //Check if the post needs to be full width
		$fullwidth = 'fullwidth';
	} else {
		$fullwidth = '';
	} ?>

	<div id="primary" class="content-area col-md-9 <?php echo $fullwidth; ?>">
		<main id="main" class="content-wrap" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single-naniwa' ); ?>
			
			<?php if ($buy_fonts_link): ?>
			<div class="content_work__item__footer naniwa-link-btn text-center" style="margin-bottom: 3rem;">
				<a href="<?php echo $buy_fonts_link; ?>" target="_blank">
					<button>
						<p class="mb-0">購入はこちら</p>
					</button>
				</a>
				<p class="mb-0 fs-4" style="font-size: 1.5rem; margin-top: 1.25rem;">※ ご当地フォントページに移動します。</p>
			</div>
			<?php endif; ?>
			<div class="news_nextlink">
                  <span class="news_prev"><?php previous_post_link('%link', '< 前のページへ', true , ''); ?></span>
                  <span class="news_top"><a href="/category/<?php echo $cat_slug ;?>/">記事一覧へ</a></span>
                  <span class="news_next"><?php next_post_link('%link', '次のページへ >', true , ''); ?></span>
               </div>

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( get_theme_mod('fullwidth_single', 0) != 1 ) : ?>
	<?php get_sidebar('naniwa'); ?>
<?php endif; ?>
<?php get_footer(); ?>
