<div class="swiper-container2">
  <div class="swiper-wrapper">
    <?php
    $loop = new WP_Query(array(
      'post_type' => 'post', // ポストタイプを設定 デフォルト投稿はそのまま
      'cat' => '5', // ポストタイプを設定 デフォルト投稿はそのまま
      'posts_per_page' => 10 // 記事数を設定
    ));
    ?>
    <?php
    /* Start the Loop */
    while ($loop->have_posts()) : $loop->the_post();
    ?>
      <div class="swiper-slide">
        <div class="swiper-slide__inner">
          <div class="swiper-slide__inner--item">
            <?php if (has_post_thumbnail()) : ?>
              <figure class="post__thumb--img">
                <a href="<?php the_permalink(); ?>" style="background-image: url('<?php the_post_thumbnail_url('rocked-medium-thumb'); ?>')"></a>
              </figure>
            <?php else : ?>
              <figure class="post__thumb--img">
                <!-- アイキャッチ画像がない場合  -->
                <a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/no-image.png')"></a>
              </figure>
            <?php endif; ?>
            <div class="text-block">
              <div class="meta-block">
                <span class="date"><?php the_time('Y.m.d'); ?></span>
              </div>
              <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>
          </div>
        </div>
      </div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination2"></div>
</div>

<!-- swiper設定用js -->
<script>
window.addEventListener('DOMContentLoaded', function() {
  var swiper2 = new Swiper('.swiper-container2', {
    slidesPerView: 1.5,
    loop: true,
    spaceBetween: 5,
    autoplay: {
    delay: 2000
    },
    breakpoints: {
      1024: {
      slidesPerView: 4,
      centeredSlides: false,
      spaceBetween: 35
    },
      640: {
        centeredSlides: true,
        slidesPerView: 3,
        spaceBetween: 15
      }
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination2',
        clickable: true
    }
  });
  });
</script>
<style>

</style>