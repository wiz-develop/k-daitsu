<?php

/*

Template Name: なにわふぉんと

*/
	get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="naniwa-page">
			<div class="page-header">
				<div class="page-header__img mx-auto">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/naniwa/logo.png" alt="なにわふぉんと">
				</div>
			</div>
			<div class="page-menu d-flex">
				<div class="page-menu__item">
					<a href="#about">
						<button class="text-center">
							<p class="mb-0">「なにわふぉんと」<br>とは</p>
							<i class="fa fa-solid fa-chevron-right fa-rotate-90"></i>
						</button>
					</a>
				</div>
				<div class="page-menu__item">
					<a href="#work">
						<button class="text-center">
							<p class="mb-0">作品紹介</p>
							<i class="fa fa-solid fa-chevron-right fa-rotate-90"></i>
						</button>
					</a>
				</div>
				<div class="page-menu__item">
					<a href="#contact">
						<button class="text-center">
							<p class="mb-0">お問い合わせ</p>
							<i class="fa fa-solid fa-chevron-right fa-rotate-90"></i>
						</button>
					</a>
				</div>
			</div>
			<div class="page-body">
				<section id="about" class="content_about">
					<div class="container">
						<div class="content-tit">
							<h2 class="text-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/naniwa/tit-gotouti.png" alt="What is Gotouchi-font? ">
								<span class="d-block">ご当地フォントってなに？</span>
							</h2>
						</div>
						<?php if(CFS()->get('gotouchi_about')): ?>
						<div class="content-about">
							<p class="mb-0"><?php echo CFS()->get('gotouchi_about'); ?></p>
						</div>
						<?php endif;?>
					</div>
				</section>
				<section class="content_structure">
					<div class="container">
						<div class="content-tit">
							<h2 class="text-center">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/naniwa/tit_work.png" alt="How does it work">
								<span class="d-block">どういう仕組み？</span>
							</h2>
						</div>
						<div class="content-about">
							<p class="mb-0"><?php echo CFS()->get('structure_about'); ?></p>
						</div>
						<div class="content_structure__flow">
							<div class="content_structure__flow__list d-flex">
								<div class="content_structure__flow__list__item">
									<h3><?php echo CFS()->get('flow_tit_1'); ?></h3>
									<div class="content_structure__flow__list__item__about">
										<div class="flow-img">
											<img src="<?php echo CFS()->get('flow_img_1'); ?>">
										</div>
										<div class="flow-detail">
											<?php echo CFS()->get('flow_about_1'); ?>
										</div>
									</div>
								</div>
								<div class="content_structure__flow__list__arrow">
									<div class="content_structure__flow__list__arrow__item">
										<p class="mb-0">データ</p>
										<div class="arrow black"></div>
									</div>
									<div class="content_structure__flow__list__arrow__item">
										<div class="arrow red"></div>
										<p class="font-red mb-0">還元</p>
									</div>
								</div>
								<div class="content_structure__flow__list__item">
									<h3><?php echo CFS()->get('flow_tit_2'); ?></h3>
									<div class="content_structure__flow__list__item__about">
										<div class="flow-img">
											<img src="<?php echo CFS()->get('flow_img_2'); ?>">
										</div>
										<div class="flow-detail">
											<?php echo CFS()->get('flow_about_2'); ?>
										</div>
									</div>
								</div>
								<div class="content_structure__flow__list__arrow">
									<div class="content_structure__flow__list__arrow__item">
										<p class="mb-0">データ</p>
										<div class="arrow black"></div>
									</div>
									<div class="content_structure__flow__list__arrow__item">
										<div class="arrow red"></div>
										<p class="font-red mb-0">利用料</p>
									</div>
								</div>
								<div class="content_structure__flow__list__item">
									<h3><?php echo CFS()->get('flow_tit_3'); ?></h3>
									<div class="content_structure__flow__list__item__about">
										<div class="flow-img">
											<img src="<?php echo CFS()->get('flow_img_3'); ?>">
										</div>
										<div class="flow-detail">
											<?php echo CFS()->get('flow_about_3'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="work" class="content_work">
					<div class="container">
						<div class="content-tit">
							<h2>作品紹介</h2>
						</div>
						<div class="content_work__item pattern">
							<div class="content_work__item__header">
								<h3>- パターン -</h3>
								<p class="mb-0">Pattern</p>
							</div>
							<div class="content_work__item__body">
								<div class="naniwa-work-list">
									<?php
										$args = array(
											'category_name' => 'naniwa-pattern',
											'orderby' => 'date',
											'posts_per_page' => '5',
										);
										$query = new WP_Query( $args );
										if ( $query->have_posts() ) :
											
											while ( $query->have_posts() ) :
												$query->the_post();
												$postid = get_the_ID();
												$work_subtit = $cfs->get('work_subtit', $postid);
												$author_name = $cfs->get('author_name', $postid);
												$membership = $cfs->get('membership', $postid);
												$overview = $cfs->get('overview', $postid);
												$overview_img = $cfs->get('overview_img', $postid);
								
									?>
									<article>
										<a href="<?php the_permalink(); ?>">
											<?php if(wp_is_mobile()) : ?>
											<div class="work-header">
												<h4 class="work-header__title"><?php the_title(); ?></h4>
												<h5 class="work-header__subtitle"><?php echo $work_subtit; ?></h5>
											</div>
											<div class="work-body">
												<div class="work-img col-12">
													<img src="<?php echo $overview_img; ?>" alt="<?php the_title(); ?>">
													<p class="text-center mt-2 mb-0"><?php echo $author_name; ?></p>
												</div>
												<div class="work-body__about col-12">
													<p class="mb-0"><?php echo $overview; ?></p>
													<div class="membership">
														<p class="mb-0 text-end"><?php echo $membership; ?></p>
													</div>
												</div>
											</div>
											<?php else : ?>
											<div class="work-body">
												<div class="work-img col-12 col-lg-5">
													<img src="<?php echo $overview_img; ?>" alt="<?php the_title(); ?>">
													<p class="text-center mt-2 mb-0"><?php echo $author_name; ?></p>
												</div>
												<div class="work-body__about col-12 col-lg-7">
													<div class="work-header">
														<h4 class="work-header__title"><?php the_title(); ?></h4>
														<h5 class="work-header__subtitle"><?php echo $work_subtit; ?></h5>
													</div>
													<p class="mb-0"><?php echo $overview; ?></p>
													<div class="membership">
														<p class="mb-0 text-end"><?php echo $membership; ?></p>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</a>
									</article>
									<?php
											endwhile;
											wp_reset_postdata();
										endif;
									?>
								</div>
							</div>
							<div class="content_work__item__footer naniwa-link-btn">
								<a href="<?php echo home_url(); ?>/category/naniwa/naniwa-pattern/" target="_blank">
									<button>
										<p class="mb-0">全てのパターンを見る</p>
									</button>
								</a>
							</div>
						</div>
						<div class="content_work__item">
							<div class="content_work__item__header">
								<h3>- フォント -</h3>
								<p class="mb-0">Font</p>
							</div>
							<div class="content_work__item__body">
								<div class="naniwa-work-list">
									<?php
										$args = array(
											'category_name' => 'naniwa-font',
											'orderby' => 'date',
											'posts_per_page' => '5',
										);
										$query = new WP_Query( $args );
										if ( $query->have_posts() ) :
											
											while ( $query->have_posts() ) :
												$query->the_post();
												$postid = get_the_ID();
												$work_subtit = $cfs->get('work_subtit', $postid);
												$author_name = $cfs->get('author_name', $postid);
												$membership = $cfs->get('membership', $postid);
												$overview = $cfs->get('overview', $postid);
												$overview_img = $cfs->get('overview_img', $postid);
									?>
									<article>
										<a href="<?php the_permalink(); ?>">
											<?php if(wp_is_mobile()) : ?>
											<div class="work-header">
												<h4 class="work-header__title"><?php the_title(); ?></h4>
												<h5 class="work-header__subtitle"><?php echo $work_subtit; ?></h5>
											</div>
											<div class="work-body">
												<div class="work-img col-12">
													<img src="<?php echo $overview_img; ?>" alt="<?php the_title(); ?>">
													<p class="text-center mt-2 mb-0"><?php echo $author_name; ?></p>
												</div>
												<div class="work-body__about col-12">
													<p class="mb-0"><?php echo $overview; ?></p>
													<div class="membership">
														<p class="mb-0 text-end"><?php echo $membership; ?></p>
													</div>
												</div>
											</div>
											<?php else : ?>
											<div class="work-body">
												<div class="work-img col-12 col-lg-5">
													<img src="<?php echo $overview_img; ?>" alt="<?php the_title(); ?>">
													<p class="text-center mt-2 mb-0"><?php echo $author_name; ?></p>
												</div>
												<div class="work-body__about col-12 col-lg-7">
													<div class="work-header">
														<h4 class="work-header__title"><?php the_title(); ?></h4>
														<h5 class="work-header__subtitle"><?php echo $work_subtit; ?></h5>
													</div>
													<p class="mb-0"><?php echo $overview; ?></p>
													<div class="membership">
														<p class="mb-0 text-end"><?php echo $membership; ?></p>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</a>
									</article>
									<?php
											endwhile;
											wp_reset_postdata();
										endif;
									?>
								</div>
							</div>
							<div class="content_work__item__footer naniwa-link-btn">
								<a href="<?php echo home_url(); ?>/category/naniwa/naniwa-font/" target="_blank">
									<button>
										<p class="mb-0">全てのフォントを見る</p>
									</button>
								</a>
							</div>
						</div>	
					</div>
				</section>
				<section class="content_product content_work">
					<div class="container">
						<div class="content-tit">
							<h2>制作物紹介</h2>
						</div>
						<div class="content_work__item">
							<div class="content_work__item__body">
								<div class="product-list">
								<?php
									$args = array(
										'category_name' => 'naniwa-work',
										'orderby' => 'date',
										'posts_per_page' => '10',
									);
									$query = new WP_Query( $args );
									if ( $query->have_posts() ) :
										
										while ( $query->have_posts() ) :
											$query->the_post();
											$postid = get_the_ID();
											$work_img = $cfs->get('work_img', $postid);
								?>
									<article>
										<div class="product-list__img">
											<img src="<?php echo $work_img; ?>" alt="<?php the_title(); ?>">
											<p class="mb-0 text-center"><?php the_title(); ?></p>
										</div>
									</article>
								<?php
										endwhile;
										wp_reset_postdata();
									endif;
								?>
								</div>
							</div>
							<div class="content_work__item__footer naniwa-link-btn">
								<a href="<?php echo home_url(); ?>/category/naniwa/naniwa-work/" target="_blank">
									<button>
										<p class="mb-0">全ての作品を見る</p>
									</button>
								</a>
							</div>
						</div>
					</div>
				</section>
				<section class="content_instagram">
					<div class="container">
						<div class="content-tit">
							<h2 class="d-flex">
								<span>instagram</span>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 31">
									<g transform="translate(-2491.73 -6731.73)">
										<path d="M24,31H7a7.008,7.008,0,0,1-7-7V7A7.008,7.008,0,0,1,7,0H24a7.008,7.008,0,0,1,7,7V24A7.008,7.008,0,0,1,24,31ZM7.424,3.425a4,4,0,0,0-4,4V23.576a4,4,0,0,0,4,4H23.576a4.005,4.005,0,0,0,4-4V7.424a4,4,0,0,0-4-4Z" transform="translate(2491.73 6731.73)" fill="#d71718"/>
										<path d="M8.5,17A8.5,8.5,0,0,1,5.191.668a8.5,8.5,0,0,1,6.617,15.664A8.447,8.447,0,0,1,8.5,17Zm0-14.355a5.837,5.837,0,1,0,2.279.46A5.819,5.819,0,0,0,8.5,2.645Z" transform="translate(2498.73 6738.73)" fill="#d71718"/>
										<circle cx="2" cy="2" r="2" transform="translate(2513.73 6736.73)" fill="#d71718"/>
									</g>
								</svg>
							</h2>
						</div>
						<div class="insta-list">
							<?php echo do_shortcode('[instagram-feed feed=1]'); ?>
						</div>
						<div class="naniwa-link-btn text-center">
							<p class="btn-comment mb-0">Follow us</p>
							<a href="https://www.instagram.com/naniwa_font/" target="blank">
								<button>
									<p class="mb-0">Instagramへ</p>
								</button>
							</a>
						</div>
					</div>
				</section>
				<section class="content_company">
					<div class="container">
						<?php
							$fields = $fields = CFS()->get('company');
							foreach ($fields as $field) :
						?>
						<div class="content_company__item">
							<div class="content-tit">
								<h2><?php echo $field['item_name']; ?></h2>
							</div>
							<div class="content_company__item__list row">
								<?php
									$fields = $field['company_list'];
									foreach ((array)$fields as $field):
								?>
								<div class="company_bnr col-6 col-md-4 col-lg-3">
									<?php if($field['company_link']) :?>
									<a href="<?php echo $field['company_link']; ?>" target="_blank">
									<?php endif;?>
										<img src="<?php echo $field['company_bnr']; ?>" alt="<?php echo $field['company_name']; ?>">
									<?php if($field['company_link']) :?>
									</a>
									<?php endif;?>
								</div>
								<?php
									endforeach;
								?>
							</div>
						</div>
						<?php
							endforeach;
						?>
					</div>
				</section>
				<section id="contact" class="content_contact">
					<div class="container">
						<div class="content-tit">
							<h2>お問い合わせ</h2>
						</div>
						<div class="content-about">
							<p class="mb-0">ご相談・お見積もりなどお気軽に<br>お問い合わせください。</p>
						</div>
						<div class="naniwa-link-btn contact">
							<a href="<?php echo home_url(); ?>/contact/">
								<button>
									<p class="mb-0">お問い合わせフォームへ</p>
								</button>
							</a>
						</div>
					</div>
				</div>
				<section class="content_naniwa-info">
					<div class="container">
						<p class="mb-0">なにわふぉんと運営事務局</p>
						<div class="info-list">
							<div class="info-list__item">
								<p class="mb-0"><b>株式会社 大通</b></p>
								<div class="info-list__item__img">
									<a href="<?php echo home_url(); ?>/company/">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/naniwa/daitu-bnr.png" alt="株式会社 大通">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<style>
	.main-content {
		padding-bottom: 0;
	}
	.main-content .container {
		width: 100%;
		max-width: 100%;
	}
	.bg-green {
		display: none;
	}
	@media (max-width: 993px) {
		.site-footer {
			margin-bottom: 5rem;
		}
	}
</style>
<?php get_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	$(document).ready(function(){
		$('.naniwa-work-list').slick({
			autoplay: false,
			speed: 800,
			dots: true,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			centerPadding: '10%',
			centerMode: true,
			prevArrow: '<button type="button" class="prev-btn"><i class="fa-solid fa-circle-chevron-right fa-flip-horizontal rounded-pill"></i></button>',
			nextArrow: '<button type="button" class="next-btn"><i class="fa-solid fa-circle-chevron-right rounded-pill"></i></button>',
			responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
			},
			{
				breakpoint: 576,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				},
			},
			]
		});
		$('.product-list').slick({
			autoplay: true,
			speed: 800,
			dots: true,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			centerPadding: '10%',
			centerMode: true,
			prevArrow: '<button type="button" class="prev-btn"><i class="fa-solid fa-circle-chevron-right fa-flip-horizontal rounded-pill"></i></button>',
			nextArrow: '<button type="button" class="next-btn"><i class="fa-solid fa-circle-chevron-right rounded-pill"></i></button>',
			responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			},
			},
			{
				breakpoint: 576,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				},
			},
			]
		});
	});
</script>