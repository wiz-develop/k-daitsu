<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package zerif-lite
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<?php zerif_top_head_trigger(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/cms/wp-content/themes/zerif-lite/images/favicon.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="/cms/wp-content/themes/zerif-lite/images/favicon.ico">
<link rel="apple-touch-icon" type="image/png" href="/cms/wp-content/themes/zerif-lite/images/favicon-180x180.png">
<link rel="icon" type="image/png" href="/cms/wp-content/themes/zerif-lite/images/favicon-192x192.png">
<?php wp_head(); ?>

<?php zerif_bottom_head_trigger(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139936856-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139936856-1');
</script>
</head>

<?php if ( isset( $_POST['scrollPosition'] ) ) : ?>

	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval( $_POST['scrollPosition'] ); ?>)">

<?php else : ?>

	<body <?php body_class(); ?> >

	<?php
endif;

	zerif_top_body_trigger();

	/* Preloader */

if ( is_front_page() && ! is_customize_preview() ) :

	$zerif_disable_preloader = get_theme_mod( 'zerif_disable_preloader' );

	if ( isset( $zerif_disable_preloader ) && ( $zerif_disable_preloader != 1 ) ) :
		echo '<div class="preloader">';
			echo '<div class="status">&nbsp;</div>';
		echo '</div>';
		endif;

	endif;
?>

<div id="breadcrumb_head">
	<?php
		if ( function_exists( 'bcn_display' ) ) {
		bcn_display();
		}
	?>
</div>

<div id="mobilebgfix">
	<div class="mobile-bg-fix-img-wrap">
		<div class="mobile-bg-fix-img"></div>
	</div>
	<div class="mobile-bg-fix-whole-site">


<header id="home" class="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	
	<div class="nav_search_sp">
		<?php get_search_form(); ?>
	</div>

	<div class="hidden_show_inn">
		<!--非表示ここから-->     
			<div class="nav_tel_style">
				大阪本社
				<a href="/corporate-profile/companyoverview/">
					<span class="telephone_mark">
						06-6922-3351
					</span>
				</a>
			</div><br>
			
			<div class="nav_tel_style">
				東京支社
				<a href="/corporate-profile/companyoverview/">
					<span class="telephone_mark">
						03-3523-1603
					</span>
				</a>
			</div>
		<!--ここまで-->
	</div>

	<div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

		<div class="container">

			<?php zerif_before_navbar_trigger(); ?>

			<div class="navbar-header responsive-logo">

				<div id="nav_tel_pc_on">	

					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

					<span class="sr-only"><?php _e( 'Toggle navigation', 'zerif-lite' ); ?></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					</button>

				</div>
			
				<div id="nav_tel_sp_on">

					<input id="sp_search_button" type="button" value="&#xf002"></input>				

					<input id="sp_telnum_button" type="button" value="&#xf095"></input>

					<script type="text/javascript">
							jQuery(document).ready(function () {
							jQuery("#sp_search_button").on('click', function () {
								//jQuery('.nav_search_sp').css({'display':'inline'});
								jQuery('.nav_search_sp').slideToggle(300);
							});
							jQuery("#sp_telnum_button").on('click', function () {
								//jQuery('.hidden_show_inn').css({'display':'inline'});
								jQuery('.hidden_show_inn').slideToggle(300);
							});
						})
					</script>

					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

					<span class="sr-only"><?php _e( 'Toggle navigation', 'zerif-lite' ); ?></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					</button>
				
				</div>

					<div class="navbar-brand" itemscope itemtype="http://schema.org/Organization">

						<?php

						if ( has_custom_logo() ) {

							the_custom_logo();

						} else {

							?>
							<div class="site-title-tagline-wrapper">
								<h1 class="site-title">
									<a href=" <?php echo esc_url( home_url( '/' ) ); ?> ">
										<?php bloginfo( 'title' ); ?>
									</a>
								</h1>

								<?php

								$description = get_bloginfo( 'description', 'display' );

								if ( ! empty( $description ) ) :
									?>

									<p class="site-description">

										<?php echo $description; ?>

									</p> <!-- /.site-description -->

								<?php elseif ( is_customize_preview() ) : ?>

								<p class="site-description"></p>

								<?php endif; ?>

							</div> <!-- /.site-title-tagline-wrapper -->

						<?php } ?>

					</div> <!-- /.navbar-brand -->

					<div id="nav_tel_pc">
						<?php get_search_form(); ?>
						<div>
							<div class="nav_tel_style">
								大阪本社
								<a href="/corporate-profile/companyoverview/">
									<span class="telephone_mark">
										06-6922-3351
									</span>
								</a>
							</div><br>
							
							<div class="nav_tel_style">
								東京支社
								<a href="/corporate-profile/companyoverview/">
									<span class="telephone_mark">
										03-3523-1603
									</span>
								</a>
							</div>
						</div>
					</div>
				</div> <!-- /.navbar-header -->

			<?php zerif_primary_navigation_trigger(); ?>

		</div> <!-- /.container -->

		<?php zerif_after_header_container_trigger(); ?>

	</div> <!-- /#main-nav -->
	
	<!-- / END TOP BAR -->
