<?php
$loops1 = (array)CFS()->get('slide-loop1');
foreach ( $loops1 as $loop1 ){
	$img = $loop1['img'];
	$performance = $loop1['performance'];
	if($img){
		$slide1 .= '<div class="swiper-slide">';
		$slide1 .= '<div class="hishi-slide-inner" style="background-image: url(' . $img . ')"><img src="' .home_url() . '/cms/wp-content/uploads/2021/06/pop2.png" class="pop"></div>';
		$slide1 .= '<div class="popup_overlay">';
		$slide1 .= '<div class="popup_content">';
		$slide1 .= '<div class="in-flex">';
		if($performance){
			$slide1 .= '<div class="pop-left">';
			$slide1 .= '<img src="' . $img . '">';
			$slide1 .= '</div>';
			$slide1 .= '<div class="pop-right">';
			$slide1 .= '<h3>' . $performance . '</h3>';
			$slide1 .= '</div>';
		}else{
			$slide1 .= '<img src="' . $img . '" style="margin:0 auto;">';
		}
		$slide1 .= '</div>';
		$slide1 .= '<label for="trigger" class="close_btn">閉じる　×</label>';
		$slide1 .= '</div>';
		$slide1 .= '</div>';
		$slide1 .= '</div>';
	}
}
$loops2 = (array)CFS()->get('slide-loop2');
foreach ( $loops2 as $loop2 ){
	$img = $loop2['img'];
	$performance = $loop2['performance'];
	if($img){
		$slide2 .= '<div class="swiper-slide">';
		$slide2 .= '<div class="hishi-slide-inner" style="background-image: url(' . $img . ')"><img src="' .home_url() . '/cms/wp-content/uploads/2021/06/pop2.png" class="pop"></div>';
		$slide2 .= '<div class="popup_overlay">';
		$slide2 .= '<div class="popup_content">';
		$slide2 .= '<div class="in-flex">';
		if($performance){
			$slide2 .= '<div class="pop-left">';
			$slide2 .= '<img src="' . $img . '">';
			$slide2 .= '</div>';
			$slide2 .= '<div class="pop-right">';
			$slide2 .= '<h3>' . $performance . '</h3>';
			$slide2 .= '</div>';
		}else{
			$slide2 .= '<img src="' . $img . '" style="margin:0 auto;">';
		}
		$slide2 .= '</div>';
		$slide2 .= '<label for="trigger" class="close_btn">閉じる　×</label>';
		$slide2 .= '</div>';
		$slide2 .= '</div>';
		$slide2 .= '</div>';
	}
}
$loops3 = (array)CFS()->get('slide-loop3');
foreach ( $loops3 as $loop3 ){
	$img = $loop3['img'];
	$performance = $loop3['performance'];
	if($img){
		$slide3 .= '<div class="swiper-slide">';
		$slide3 .= '<div class="hishi-slide-inner" style="background-image: url(' . $img . ')"><img src="' .home_url() . '/cms/wp-content/uploads/2021/06/pop2.png" class="pop"></div>';
		$slide3 .= '<div class="popup_overlay">';
		$slide3 .= '<div class="popup_content">';
		$slide3 .= '<div class="in-flex">';
		if($performance){
			$slide3 .= '<div class="pop-left">';
			$slide3 .= '<img src="' . $img . '">';
			$slide3 .= '</div>';
			$slide3 .= '<div class="pop-right">';
			$slide3 .= '<h3>' . $performance . '</h3>';
			$slide3 .= '</div>';
		}else{
			$slide3 .= '<img src="' . $img . '" style="margin:0 auto;">';
		}
		$slide3 .= '</div>';
		$slide3 .= '<label for="trigger" class="close_btn">閉じる　×</label>';
		$slide3 .= '</div>';
		$slide3 .= '</div>';
		$slide3 .= '</div>';
	}
}
?>
<?php if($slide1):?>
<div class="workstitle"><h3>WORKS</h3><h4>制作実績</h4></div>
<div class="js-service svc">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php echo $slide1; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if($slide2):?>
<div class="js-service2 svc">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php echo $slide2; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php if($slide3):?>
<div class="js-service3 svc">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php echo $slide3; ?>
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
		loopedSlides: 10,
		slidesPerView: 3,
		centeredSlides : false,
		speed: 2000,
		autoplay: {
			delay: 0,
		},
		breakpoints: {
    	640: {
    	slidesPerView: 5
    	}
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
<?php if($slide2):?>
	var wrapper2 = document.querySelector('.js-service2 .swiper-wrapper');
	var swiper2 = new Swiper('.js-service2 .swiper-container', {
		freeMode: true,
		loop: true,
		loopedSlides: 10,
		slidesPerView: 3,
		centeredSlides : true,
		speed: 2000,
		autoplay: {
			delay: 0,
		},
		breakpoints: {
    	640: {
    	slidesPerView: 5
    	}
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
<?php if($slide3):?>
	var wrapper3 = document.querySelector('.js-service3 .swiper-wrapper');
	var swiper3 = new Swiper('.js-service3 .swiper-container', {
		freeMode: true,
		loop: true,
		loopedSlides: 6,
		slidesPerView: 3,
		centeredSlides : false,
		speed: 2000,
		autoplay: {
			delay: 0,
		},
		on: {
			slideChangeTransitionStart: function(){
				wrapper3.style.transitionTimingFunction = 'linear';
			}
		}
	});
	$('.js-service3 .swiper-container .swiper-slide').on('mouseover', function() {
		swiper3.autoplay.stop();
	});
	$('.js-service3 .swiper-container .swiper-slide').on('mouseout', function() {
		if(!$('#popup').hasClass('active')){
			swiper3.autoplay.start();
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