<?php
/**
 * The template for displaying all single posts.
 *
 * @package Rocked
 */

get_header(); ?>

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

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			

			<div class="news_nextlink">
                  <span class="news_prev"><?php previous_post_link('%link', '< 前のページへ', true , ''); ?></span>
                  <span class="news_top"><a href="/category/news/">記事一覧へ</a></span>
                  <span class="news_next"><?php next_post_link('%link', '次のページへ >', true , ''); ?></span>
               </div>

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( get_theme_mod('fullwidth_single', 0) != 1 ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
