<?php

$slide = array();
$i = 1;
$n = 0;
for($i = 1; $i <= 10; $i++): ?>
	<?php 
	$img = "s_img" . $i;
	$title = "s_title" . $i;
	if(get_field($img) && get_field($title)):
		$img_data = get_field($img)["sizes"]["medium_large"];
		
	?>
	<?php
	if($i < 5){
		$n = 0;
	}else{
		$n = 1;
	}

	$slide[$n] .= '<div class="swiper-slide">';
	if ($img){
		$slide[$n] .= '<div class="hishi-slide-inner" style="background-image: url(' . $img_data . ')"></div>';
	}else{
		$slide[$n] .= '<img src="' . get_stylesheet_directory_uri() . '/images/noimage.jpg">';
	}
	$slide[$n] .= '<div class="popup_overlay">';
	$slide[$n] .= '<div class="popup_content">';
	$slide[$n] .= '<div class="in-flex">';
	$slide[$n] .= '<div class="pop-left">';
	if ($img){
		$slide[$n] .= '<img src="' . $img_data . '">';
	}else{
		$slide[$n] .= '<img src="' . get_stylesheet_directory_uri() .'/images/noimage.jpg">';
	}
	$slide[$n] .= '</div>';
	$slide[$n] .= '<div class="pop-right">';
	$slide[$n] .= '<h3>' . $title . '</h3>';
	$slide[$n] .= '</div>';
	$slide[$n] .= '</div>';
	$slide[$n] .= '<label for="trigger" class="close_btn">閉じる　×</label>';
	$slide[$n] .= '</div>';
	$slide[$n] .= '</div>';
	$slide[$n] .= '</div>';
?>
<?php endif; endfor; ?>
<div class="js-service svc">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php echo $slide[0]; ?>
		</div>
	</div>
</div>
<?php if($n == 1 ):?>
<div class="js-service2 svc">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php echo $slide[1]; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="popup_wrap">
	<div class="pop-flex">
		<div id="popup" class="pop-img"></div>
	</div>
</div>
	<!-- TODO:2024/4/12 swiper.jsのサーバーが落ちてCDNが使えないため応急処置 -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
	<link rel="stylesheet" href="/cms/wp-content/themes/rocked/css/swiper.min.css" />
	<script type='text/javascript' src="/cms/wp-content/themes/rocked/js/swiper.min.js"></script>	
<script>
window.addEventListener('DOMContentLoaded', function() {
	var wrapper1 = document.querySelector('.js-service .swiper-wrapper');
	var swiper1 = new Swiper('.js-service .swiper-container', {
		freeMode: true,
		loop: true,
		loopedSlides: 5,
		slidesPerView: 4,
		speed: 2000,
		autoplay: {
			delay: 0,
		},
		on: {
			slideChangeTransitionStart: function(){
				wrapper1.style.transitionTimingFunction = 'linear';
			}
		}
	});
	$('.js-service .swiper-container .swiper-slide').on('mouseover', function() {
		swiper1.autoplay.stop();
	});
	$('.js-service .swiper-container .swiper-slide').on('mouseout', function() {
		if(!$('#popup').hasClass('active')){
			swiper1.autoplay.start();
		}
	});
<?php if($n == 1 ):?>
	var wrapper2 = document.querySelector('.js-service2 .swiper-wrapper');
	var swiper2 = new Swiper('.js-service2 .swiper-container', {
		freeMode: true,
		loop: true,
		loopedSlides: 5,
		slidesPerView: 4,
		centeredSlides : true,
		speed: 2000,
		autoplay: {
			delay: 0,
		},
		on: {
			slideChangeTransitionStart: function(){
				wrapper2.style.transitionTimingFunction = 'linear';
			}
		}
	});
	$('.js-service2 .swiper-container .swiper-slide').on('mouseover', function() {
		swiper2.autoplay.stop();
	});
	$('.js-service2 .swiper-container .swiper-slide').on('mouseout', function() {
		if(!$('#popup').hasClass('active')){
			swiper2.autoplay.start();
		}
	});
<?php endif; ?>
	document.querySelectorAll('.swiper-slide').forEach(function (popup) {
		popup.addEventListener('click', event => {
			document.querySelector('#popup').innerHTML = popup.innerHTML;
			document.querySelector('#popup').classList.add('active');
			let close_btn = document.querySelector('#popup .close_btn');
			close_btn.addEventListener('click', function(e) {
				document.querySelector('#popup').innerHTML = '';
				document.querySelector('#popup').classList.remove('active');
				swiper1.autoplay.start();
				<?php if($n == 1 ):?>
				swiper2.autoplay.start();
				<?php endif; ?>
			});
		});
	});

});
</script>