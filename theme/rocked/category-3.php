<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rocked
 */
$cat = get_the_category();
$parent_id = $cat[0]->category_parent;

get_header(); ?>

	<div id="primary" class="content-area col-md-9 <?php echo esc_attr(rocked_blog_layout()); ?>">
		<main id="main" class="content-wrap" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php if(is_category('3') || $parent_id == 3) : ?>
					<h1><span>SERVICE</span><br><?php single_cat_title(); ?></h1>
				
				<?php if( is_category() && !is_paged() ) : ?>
					<p class="detail-txt">DAITSUは創業から長年に渡り、<br class="pc">印刷とそれに付随する一切の業務を持って商材をお届けし、<br class="pc">お客様の満足と信頼をいただいて来ました。<br>例えば難しい素材での高品質な仕上がりを追及したり、<br class="pc">小さなお子様でも安心できる素材を厳選したり、<br class="pc">環境にやさしい最新技術を駆使したりなど、<br class="pc">お客様の多様なご要望にいつも全力で応えて来ました。<br>それは私たちの誇りと自信。<br>今までもこれからも、変わらない誠意でご期待にお応えいたします。	
					</p>
				<?php endif; ?>
				
				<?php else: ?>
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				<?php endif; ?>
			</header><!-- .page-header -->

			<div class="posts-layout">
				<?php if(is_category('3') || $parent_id == 3) : ?>
						<ul>
					<?php
						$args = array(
							'posts_per_page' => -1,
							'category_name' => 'service',
							'order' => 'DESC',
							'orderby' => 'date',
							'post_status' => 'publish',
							'parent' => 0,
						);
						$query = get_posts($args);
						foreach ($query as $post) : setup_postdata($post);
					?>
						<?php if(get_field('check')): ?>
						<li>
						<?php
						//
							/* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content2', get_post_format() );
						?> 
						</li>
						<?php endif; ?>
					<?php endforeach; wp_reset_postdata(); ?>
					<?php wp_reset_query(); ?>
					</ul>
				<?php else: ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
							/* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_format() );
						?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

					

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	if ( get_theme_mod('blog_layout','classic') == 'classic' ) :
	get_sidebar();
	endif;
?>
<?php get_footer(); ?>
