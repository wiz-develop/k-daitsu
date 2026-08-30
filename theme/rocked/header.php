<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rocked
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>	
<!-- TOPページニュースティッカー用のCSS -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/simpleticker/jquery.simpleTicker.css" type="text/css" />
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/simpleticker/jquery.simpleTicker.js"></script>
	
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JNQQTR8CME"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JNQQTR8CME');
//   gtag('config', 'UA-139936856-1');
</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( is_home() || is_front_page() ) : ?>
<img src="/cms/wp-content/uploads/2021/03/Our-Service3.png" alt="" class="ourservice-img">
<?php endif; ?>
<div class="preloader">
    <div class="preloader-inner">
		<div class="loader"></div>
    	<?php //$preloader = get_theme_mod('preloader_text', __('Loading&hellip;','rocked')); ?>
    	<?php //echo esc_html($preloader); ?>
    </div>
</div>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rocked' ); ?></a>

	<header id="header" class="header">
		<div class="header-wrap">

			<!--PC版検索フォーム--><div id="search-wrap">
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" value="" name="s" id="search-text">
</form>
<!--/search-wrap--></div>
			
			
			<div class="container">
				<div class="row">
					<div class="site-branding col-md-3 col-sm-3 col-xs-3">
						<?php rocked_branding(); ?>
					</div><!-- /.col-md-2 -->
					<div class="menu-wrapper col-md-9 col-sm-9 col-xs-9">
						<div class="btn-menu">
							<i class="fa fa-close"></i><i class="fa fa-bars"></i></div>
						<nav id="mainnav" class="mainnav">
							<a href="/" class="smp1024 smp-logo">
							<img src="/cms/wp-content/uploads/2021/02/logo-f.png" alt="">	
							</a>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							
							<!--スマホ版検索フォーム--><div class="box-search">
								<?php get_search_form(); ?></div>
							
						</nav><!-- #site-navigation -->
						
					</div><!-- /.col-md-10 -->
				</div><!-- /.row -->
			</div><!-- /container -->
		</div>
	</header>
	
	<?php if ( get_header_image() && ( get_theme_mod('front_header_type' ,'image') == 'image' && is_front_page() || get_theme_mod('site_header_type', 'image') == 'image' && !is_front_page() ) ) : ?>
	<div class="header-image parallax">
		<?php //rocked_header_text(); ?>		
	</div>
	<?php endif; ?>

	<div class="main-content">
<?php if(is_front_page() ) : ?>
	<div class="js-introduction">
		<div class="white-bg"></div>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php
				$loops = CFS()->get('slide-loop');
				foreach ( $loops as $loop ):
				$img = $loop['img'];
				$performance = $loop['performance'];
				$performance_e = $loop['performance_e'];
				$descripsion = $loop['descripsion'];
				$url = $loop['url']['url'];
				if($img && $performance):
				?>
				<div class="swiper-slide">
					<div class="introduction-card">
						<a href="<?php echo $url; ?>" class="introduction-card-inner" title="<?php echo $performance; ?>">
							<?php if($img): ?>
							<div class="media">
								<div class="media-inner">
									<div class="media-image" data-src="<?php echo $img; ?>" data-src-mobile="<?php echo $img; ?>" style="background-image: url(<?php echo $img; ?>);"></div>
								</div>
							</div>
							<?php endif; ?>
							<div class="introduction-card-content">
								<p class="introduction-card-title"><?php echo $performance; ?></p>
								<p class="introduction-card-en"><?php echo $performance_e; ?></p>
							</div>
							<span class="introduction-card-text"><?php echo $descripsion; ?></span>
						</a>
					</div>
				</div>
				<?php endif; endforeach; ?>
			</div>
		</div>
		<div class="swiper-pagination"></div>
		<div id="str"></div>
	</div>
	<!-- TODO:2024/4/12 swiper.jsのサーバーが落ちてCDNが使えないため応急処置 -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
	<link rel="stylesheet" href="/cms/wp-content/themes/rocked/css/swiper.min.css" />
	<script type='text/javascript' src="/cms/wp-content/themes/rocked/js/swiper.min.js"></script>
<script>
window.addEventListener('DOMContentLoaded', function() {
var swiper = new Swiper('.js-introduction .swiper-container', {
    loop: true,
	speed: 2000,
	autoplay: {
    	delay: 2000,
  	},
	pagination: {
		el: '.swiper-pagination',
		clickable: true
	},
    slidesPerView: 3,
    centeredSlides : true,
    slideToClickedSlide: true,
    spaceBetween: 10,
	breakpoints: {
    640: {
		centeredSlides : false,
    	slidesPerView: 5
    }
  }
});
var x = document.querySelector(".js-introduction .swiper-slide").clientWidth;
var w = document.body.offsetWidth;
if(w>640){
	setTimeout(hset(1.8), 2500);
}else{
	setTimeout(hset(2.0), 2500);
}
document.querySelector(".swiper-wrapper").style.opacity ="0";
setTimeout(swipe_wrap, 3000);
document.querySelector(".swiper-pagination").style.display ="none";
setTimeout(paginate, 3500);
var act = "";
var prev = "";
var prevprev = "";
var prevprevprev = "";
var flg=false;
swiper.on('slideChangeTransitionStart', function () {
	x = document.querySelector(".js-introduction .swiper-slide").clientWidth;
	w = document.body.offsetWidth;
	let slides = document.querySelectorAll('.js-introduction .swiper-slide');
	for (var i = 0; i < slides.length; i++) {
		slides[i].style.bottom = "inherit";
		slides[i].style.width = x + "px";
	}
	if(w>640){
		setTimeout(hset(1.8), 2500);
		act = document.querySelector(".js-introduction .swiper-slide-next");
		act = act.nextElementSibling;//左端+4（中央）
		prev = document.querySelector(".js-introduction .swiper-slide-next");//左端+3
		prev.querySelector(".introduction-card-content").style.display ="initial";
		prevprev = document.querySelector(".js-introduction .swiper-slide-active");//左端+2
		prevprev.style.bottom = "-17%";//左端+1
		prevprev.querySelector(".introduction-card-content").style.display ="initial";
		prevprevprev = document.querySelector(".js-introduction .swiper-slide-prev");//左端
		prevprevprev.style.bottom = "-17%";
		prevprevprev.querySelector(".introduction-card-content").style.display ="initial";
		prev.querySelector(".media-image").style.paddingBottom ="165%";
		prev.classList.remove('main-img');
		expansionWidth(".js-introduction .swiper-slide-next",x * 1.3);
		reductionbBttom(document.querySelector(".js-introduction .swiper-slide-next"),-17);
		act.classList.add('main-img');
		act.querySelector(".introduction-card-content").style.display ="none";
	}else{
		setTimeout(hset(2.0), 2500);
		act = document.querySelector(".js-introduction .swiper-slide-active");//中央
		prev = document.querySelector(".js-introduction .swiper-slide-prev");//左端
		prev.querySelector(".introduction-card-content").style.display ="initial";
		next = document.querySelector(".js-introduction .swiper-slide-next");
		next.style.bottom = "0";
		prev.querySelector(".media-image").style.paddingBottom ="180%";
		prev.classList.remove('main-img');
		expansionWidth(".js-introduction .swiper-slide-prev",x * 1.3);
		reductionbBttom(document.querySelector(".js-introduction .swiper-slide-prev"),-15);
		act.classList.add('main-img');
		act.querySelector(".introduction-card-content").style.display ="none";
	}
	let txt = "<h3>"; 
	txt += act.querySelector(".introduction-card-title").innerHTML + "</h3>";
	txt += act.querySelector(".introduction-card-text").innerHTML;
	document.querySelector("#str").innerHTML = txt;
	jQuery("#str").fadeIn(500);
	jQuery("#str").fadeOut(3500);
	});
}, false);
function hset(param){
	let h = document.querySelector(".js-introduction .swiper-container .media-image").clientHeight;
	document.querySelector(".js-introduction .swiper-container").style.height = (h*param) + "px";
}
function swipe_wrap(){
jQuery(".swiper-wrapper").animate({ opacity: 1 }, { duration: 2000, easing: 'linear' });
}
function paginate(){
	jQuery(".swiper-pagination").fadeIn(500);
}
function expansionWidth($target, $maxWidth) {
	let $intervalID = setInterval(function(){changeWidth()},1);
	function changeWidth() {
		let $targetElement = document.querySelector( $target );
		$targetElement = $targetElement.nextElementSibling;	
		let $width = $targetElement.style.width;
		$width = parseInt( $width.replace( 'px', '' ) );
		if( $width < $maxWidth ){
			$targetElement.style.width = ++$width + 'px';
		}else{
			clearInterval( $intervalID );
		}
	}
}
// 縮小用関数
function reductionWidth( $target, $minWidth ) {
	let $intervalID = setInterval(function(){changeWidth()},1);
	function changeWidth() {
		let $targetElement = $target;
		let $width = $targetElement.style.width;
		$width = parseInt( $width.replace( 'px', '' ) );
		if( $width > $minWidth ){
			$targetElement.style.width = --$width + 'px';
		}else{
			clearInterval( $intervalID );
		}
	}
}
function reductionbBttom($target, param) {
	let $intervalID = setInterval(function(){changeBottom()},20);
	function changeBottom() {
		let $targetElement = $target;
		let $bottom = $targetElement.style.bottom;
		if($bottom=="inherit"){
			$bottom = "0%";
		}
		$bottom = parseInt( $bottom.replace( '%', '' ) );
		if( $bottom > param){
			$bottom = $bottom - 1;
			$targetElement.style.bottom = $bottom + '%';
		}else{
			clearInterval( $intervalID );
		}
	}
}
</script>
<?php endif; ?>
		<div class="container">
			<div class="row">