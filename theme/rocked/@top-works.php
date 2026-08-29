<div class="popup_wrap">
<div class="pop-flex">
<?php for($i = 1; $i <= 13; $i++): ?>
<?php 
    $img = "p_img" . $i;
    $performance = "p_performance" . $i;
    $performance_e = "p_performance_e" . $i;
    $descripsion = "p_descripsion" . $i;
    $url = "p_url" . $i;
    if(get_field($img) && get_field($performance)):
        $img_data = get_field($img)["sizes"]["medium_large"];	
?>
    <div class="pop-img">
        <input id="trigger<?php echo $i; ?>" type="checkbox">
        <label for="trigger<?php echo $i; ?>" class="open_btn"><!--最初から表示する内容-->
            <div class="seisaku-img">
                <img src="<?php echo $img_data; ?>" alt="<?php echo the_field($performance); ?>" class="works-img">
                <img src="/cms/wp-content/uploads/2021/05/pop.png" class="pop">
            </div>
        </label><!--最初から表示する内容ここまで-->      
        <div class="popup_overlay">
            <label for="trigger<?php echo $i; ?>" class="popup_trigger"></label>
            <div class="popup_content"><!--ここからポップアップウインドウの中-->
                <div class="in-flex">
                    <div class="pop-left">
                        <img src="<?php echo $img_data; ?>" alt="<?php echo the_field($performance); ?>">
                    </div>
                    <div class="pop-right">
                        <h3><?php echo the_field($performance); ?></h3>
                        <?php if(get_field($descripsion)):?>
                            <p><?php echo nl2br( get_field($descripsion) ); ?></p>
                        <?php endif;?>
                        <?php if(get_field('url1')):?>
                            <a href="<?php echo the_field($url); ?>" class="goto" title="<?php echo the_field($performance); ?>"><?php echo the_field($performance); ?></a>
                        <?php endif;?>			
                    </div>
                </div>			
                <label for="trigger<?php echo $i; ?>" class="close_btn">閉じる　×</label>
            </div><!--ポップアップウインドウの中ここまで-->
        </div>
	</div>
<?php endif; endfor; ?>
</div><!--pop-flex-->
</div><!--popup_wrap-->

