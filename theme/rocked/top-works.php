<div class="popup_wrap">
<div class="pop-flex">
<?php
    $i = 1;
    $seisakuloops = (array)CFS()->get('seisakuloop');
    foreach ( $seisakuloops as $seisakuloop ):
        $seisakuimg = $seisakuloop['seisakuimg'];
        $seisakutitle = $seisakuloop['seisakutitle'];
        $seisakuper = $seisakuloop['seisakuper'];
        $seisakuurl = $seisakuloop['seisakuurl'];
        if($seisakuimg):
    ?>
    <div class="pop-img">
        <input id="trigger<?php echo $i; ?>" type="checkbox">
        <label for="trigger<?php echo $i; ?>" class="open_btn"><!--最初から表示する内容-->
            <div class="seisaku-img">
                <img src="<?php echo $seisakuimg; ?>" alt="<?php echo $seisakutitle; ?>" class="works-img">
                <img src="/cms/wp-content/uploads/2021/05/pop.png" class="pop">
            </div>
        </label><!--最初から表示する内容ここまで-->      
        <div class="popup_overlay">
            <label for="trigger<?php echo $i; ?>" class="popup_trigger"></label>
            <div class="popup_content"><!--ここからポップアップウインドウの中-->
                <div class="in-flex">
                <?php if($seisakutitle): ?>
                    <div class="pop-left">
                        <img src="<?php echo $seisakuimg; ?>" alt="<?php echo $seisakutitle; ?>">
                    </div>
                    <div class="pop-right">
                        <h3><?php echo $seisakutitle; ?></h3>
                            <p><?php echo nl2br($seisakuper); ?></p>
                            <?php if($seisakuurl['url']): ?>
                            <a href="<?php echo $seisakuurl['url']; ?>" class="goto" title="<?php echo $seisakutitle; ?>"><?php echo $seisakutitle; ?></a>	
                            <?php endif; ?>
                    </div>
                <?php else: ?>
                    <img src="<?php echo $seisakuimg; ?>" style="margin:0 auto;">
                <?php endif; ?> 
                </div>			
                <label for="trigger<?php echo $i; ?>" class="close_btn">閉じる　×</label>
            </div><!--ポップアップウインドウの中ここまで-->
        </div>
	</div>
<?php $i = $i + 1; endif; endforeach; ?>
</div><!--pop-flex-->
</div><!--popup_wrap-->


