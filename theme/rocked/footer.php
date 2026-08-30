<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rocked
 */
?>
			</div>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>
<?php if( is_front_page()): ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.fancybox.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fancybox.min.js"></script>
<script>
jQuery(function() {
jQuery(".modal").fancybox({
  'afterShow': function() {
	vidplay();
  }
});
function vidplay() {
  var video = document.getElementById("player");
  if (video.paused) {
	video.play();
  } else {
	video.pause();
  }
}

});
</script>
<?php endif; ?>
<?php if( is_page() ) : ?>
<div class="bg-green">
<div class="top-end">
<h3>CONTACT</h3>
<h4>お問い合わせ</h4>
<p>ご質問やご相談を承ります。<br class="smp640">どうぞ、お気軽にお問い合わせください。</p>
<a title="CONTACT" href="/contact/">お問い合わせへ</a>
</div></div>
<?php else: ?>
<?php endif; ?>


<div class="footer-daitsu">
<ul>
<li><a href="/privacy/">プライバシーポリシー</a></li>
<li><a href="/privacy-announce/">個人情報に関する公表事項</a></li>
<li><a href="/sitemap/">サイトマップ</a></li>
</ul>
<a href="/" class="logo-f"><img src="/cms/wp-content/uploads/2021/02/logo-f.png"></a>
<p>大阪本社<a href="tel:0669223351" class="telno">06-6922-3351</a></p>
<p>東京支社<a href="tel:0335231603" class="telno">03-3523-1603</a></p>
</div><!--footer-daitsu-->



	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
<p>Copyright&copy; 2021 DAITSU INC.All Rights Reserved.</p>
<!--非表示
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'rocked' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'rocked' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %2$s by %1$s.', 'rocked' ), 'aThemes', '<a href="http://athemes.com/theme/rocked" rel="nofolow">Rocked</a>' ); ?>
ここまで-->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a class="go-top">
	<i class="fa fa-angle-up" style="display:none;"></i>
</a>
<?php wp_footer(); ?>
</body>
</html>
