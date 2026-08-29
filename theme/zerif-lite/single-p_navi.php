<?php
/*
 * @copyright   Copyright 2019, Wiz Co., Ltd. (https://wiznet.co.jp)
 * @author  Watanabe Kazuyoshi
 * Template Name: YES/NOチャート(子ページ)
 */

/**
 * 診断結果ページのみを表示、診断結果の_POSTを優先的に表示
 */
$redirect_flag = false;
$navi_post_flag = true;
if ( empty( $_POST ) ) {
    $redirect_flag = true;
    if ( !empty( $_GET['i'] ) ) {
        $redirect_flag = false;
        $navi_post_flag = false;
    }
}
if ( get_page_uri( $post->ID ) != 'result' ) {
    $redirect_flag = true;
}
if ( get_page_uri( $post->ID ) == 'product_api' ) {
    $redirect_flag = false;
}
if ( $redirect_flag == true ) {
    wp_redirect( home_url( '/' ).'p_navi', 301 );
    exit;
}
/**
 * タイムゾーン設定
 */
date_default_timezone_set('Asia/Tokyo');

/**
 * 設定データを読み込み
 */
$master_id = get_page_by_path('master','','p_navi')->ID;
$product_id = get_page_by_path('product','','p_navi')->ID;
$question_id = get_page_by_path('question','','p_navi')->ID;

/**
 * 公開設定
 * true : 公開する
 * false : 非公開する
 */
$release = get_field('release', $master_id);

if ( $release == 'false' ) {
    wp_redirect( home_url( '/' ), 301 );
    exit;
}

/**
 * 商品設定
 */
$product_block = $cfs->get('product_block', $product_id);

/**
 * 質問設定
 */
$question_block = $cfs->get('question_block', $question_id);

/**
 * 商品設定API
 */
if ( get_page_uri( $post->ID ) == 'product_api' ) {
    if ( empty( $_GET['uid'] ) ) {
        wp_redirect( home_url( '/' ).'p_navi', 301 );
        exit;
    }

    // 配列 [startTerm~PeriodTerm] => array(productName)
    $product_data = array();
    foreach ( $product_block as $product_block_org ) :
        $product_name = array();
        foreach ( $product_block_org['product_loop'] as $product_loop ) :
            $product_name = array_merge( $product_name , array (
                    $product_loop['product_name'],
                )
            );
        endforeach;
        $product_data = array_merge( $product_data , array (
                $product_block_org['product_start_time'].'〜'.$product_block_org['product_period_time'] => $product_name
            )
        );
    endforeach;
     
    header("Content-Type: text/javascript; charset=utf-8");
    echo json_encode($product_data);
    exit;
}

/**
 * ポイントを加算する商品名と質問/回答を紐ずけ
 */
$question_result_array = array();
foreach ( $question_block as $question_block_org ) :
    foreach ( $question_block_org as $question_block_loop ) :
        if ( is_array($question_block_loop) ) :
            foreach ( $question_block_loop as $question_loop ) :
                if ( !$question_loop['question_display'] ) :

                    $question_result_array = array_merge( $question_result_array, array(
                        htmlspecialchars ( $question_loop['question_txt'], ENT_QUOTES ) => array()
                    ));
                    foreach ( $question_loop['question_answer_loop'] as $question_answer_loop ) :
                        $question_result_array = array_merge_recursive( $question_result_array, array(
                            $question_loop['question_txt'] => array(
                                htmlspecialchars ( $question_answer_loop['question_answer_txt'], ENT_QUOTES ) => htmlspecialchars ( $question_answer_loop['question_answer_product'], ENT_QUOTES )
                            )
                        ));
                    endforeach;

                endif;
            endforeach;
        endif;
    endforeach;
endforeach;

//var_dump($question_result_array);

/**
 * 商品の画像、優先順位
 */
$product_result_array = array();
foreach ( $product_block as $product_block_org ) :
    foreach ( $product_block_org['product_loop'] as $product_loop ) :
        $product_result_array = array_merge( $product_result_array, array(
            htmlspecialchars ( $product_loop['product_name'], ENT_QUOTES ) => array(
                'product_mainimg' => $product_loop['product_mainimg'],
                // 'product_subimg' => $product_loop['product_subimg'],
                'product_page' => $product_loop['product_page'],
                'product_name' => $product_loop['product_name'],
                'product_html1_color' => $product_loop['product_html1_color'],
                'product_html1' => $product_loop['product_html1'],
                // 'product_html2_color' => $product_loop['product_html2_color'],
                // 'product_html2' => $product_loop['product_html2'],
                'product_html_img' => $product_loop['product_html_img'],
                'rank_woman_10to20' => 9,
                // 'rank_woman_30to40' => $product_loop['rank_woman_30to40'],
                // 'rank_woman_50to60' => $product_loop['rank_woman_50to60'],
                // 'rank_woman_70over' => $product_loop['rank_woman_70over'],
                // 'rank_man_10to20' => $product_loop['rank_man_10to20'],
                // 'rank_man_30to40' => $product_loop['rank_man_30to40'],
                // 'rank_man_50to60' => $product_loop['rank_man_50to60'],
                // 'rank_man_70over' => $product_loop['rank_man_70over'],
                // 'rank_other_10to20' => $product_loop['rank_other_10to20'],
                // 'rank_other_30to40' => $product_loop['rank_other_30to40'],
                // 'rank_other_50to60' => $product_loop['rank_other_50to60'],
                // 'rank_other_70over' => $product_loop['rank_other_70over']
            )
        ));
    endforeach;
endforeach;

/**
 * /p_navi/のFORMから受け取ったデータの場合
 */
if( $navi_post_flag == true ) {

    // WordPress magic quotesの機能を無効
    $post_array = array_map('stripslashes_deep', $_POST);

    /**
     * 性別と年代
     */
    //$gender = $post_array['gender'];
    //$age = $post_array['age'];
    // 性別と年代は使用しないため女性、１０〜２０代の条件で並べ替えを行なう
    $gender = 'woman';
    $age = '10to20';

    /**
     * 結果の商品名を列挙する
     */
    $answered_product_all = '';

    foreach($post_array as $post_array_key => $post_array_detail){

        foreach($question_result_array as $question_result_array_key => $question_result_array_detail){

            // 回答数
            $answered_loop_count == 0;

            $post_array_key_conv = htmlspecialchars ( $post_array_key, ENT_QUOTES );
            $post_array_detail_conv = htmlspecialchars ( $post_array_detail, ENT_QUOTES );

            if ( $question_result_array_key == $post_array_key_conv && $question_result_array_detail[$post_array_detail_conv]) {

                $answered_loop_count = $answered_loop_count + 1;

                if ( $answered_loop_count == 1 ) {
                    $answered_product_all = $answered_product_all . $question_result_array_detail[$post_array_detail_conv];
                } else {
                    $answered_product_all = $answered_product_all . ',' . $question_result_array_detail[$post_array_detail_conv];
                }

            }

        }

    }

    //var_dump($answered_product_all);

    //print_r($answered_product_result);

    /**
     * 商品名とポイント数
     * [PRODUCT_NAME] => POINT_NUM
     */
    $answered_product_result = array_count_values( explode( ",", $answered_product_all ) );

    // ソート
    arsort($answered_product_result);

    // 商品名とポイント数 デバッグ用出力
    //print_r($answered_product_result);

    /**
     * 上位2種類が同じポイント数であれば優先順位処理を実行
     */
    $answered_product_result_slice = array_slice($answered_product_result, 0, 2);
    if ( array_slice($answered_product_result_slice, 0, 2) !== array_unique($answered_product_result_slice) ) {

        // 結果の商品名 (優先順位処理用)
        $answered_product_result_order = array();

        // ポイント最大数 初期値
        $result_max_point_num = reset($answered_product_result);

        foreach( $answered_product_result as $answered_product_result_key => $answered_product_result_detail ){

            if ( $result_max_point_num <= $answered_product_result_detail ) {

                $answered_product_result_order = array_merge( $answered_product_result_order, array(
                    $answered_product_result_key => $product_result_array[$answered_product_result_key]['rank_'.$gender.'_'.$age]
                ));

            }

        }

        // 昇順にソート
        asort($answered_product_result_order);
        $answered_product_result = $answered_product_result_order;

    }

    //var_dump($answered_product_result);

    // 商品名
    $main_product_name = key(array_slice($answered_product_result, 0, 1, true));
    $sub_product_name = key(array_slice($answered_product_result, 1, 1, true));

    // 商品ID
    $main_product_id = $product_result_array[$main_product_name]['product_mainimg'];
    $sub_product_id = $product_result_array[$sub_product_name]['product_subimg'];

    // 結果画像配列
    $result_images = [
        wp_get_attachment_url( $main_product_id ),
        wp_get_attachment_url( $sub_product_id )
    ];

    // 結果日時
    $result_date = date('ymdHi');
}


/**
 * SNSシェア用の「結果だけ表示する」ための表示処理
 */
if( $navi_post_flag == false ) {
    $result_param = $_GET['i'];
    $result_param_array = explode( "-", $result_param );
    
    // 検索配列の準備
    $product_result_array_column_main = array_column( $product_result_array, 'product_mainimg', 'product_name' );
    $product_result_array_column_sub = array_column( $product_result_array, 'product_subimg', 'product_name' );

    // 商品名
    $main_product_name = array_search( $result_param_array[1], $product_result_array_column_main );
    $sub_product_name = array_search( $result_param_array[2], $product_result_array_column_sub );

    // 表示する商品名が無かったらトップへ移動
    if ( $main_product_name == false || $sub_product_name == false ){
        wp_redirect( home_url( '/' ).'p_navi', 301 );
        exit;
    }

    // 商品ID
    $main_product_id = $result_param_array[1];
    $sub_product_id = $result_param_array[2];

    // 結果画像配列
    $result_images = [
        wp_get_attachment_url( $main_product_id ),
        wp_get_attachment_url( $sub_product_id )
    ];

    // 結果日時
    $result_date = $result_param_array[0];
}


// 最終結果 デバッグ用出力
//echo '<br>最終結果：';
//print_r(array_slice($answered_product_result, 0, 2));

//echo '<br><img src="'.$product_result_array[key(array_slice($answered_product_result, 0, 1, true))]['product_mainimg'].'" alt="" style="width: 300px;">';
//echo '<br><img src="'.$product_result_array[key(array_slice($answered_product_result, 1, 1, true))]['product_subimg'].'" alt="" style="width: 300px;">';

/**
 * 画像を結合
 */
if ( $result_images[0] == true ) {
    // width,height 初期化
    $total_w = 0;
    $total_h = 0;

    foreach ($result_images as $path) {
        list($w, $h) = getimagesize($path);
        $total_h += $h;
        if ($w > $total_w) {
        $total_w = $w;
        }
    }

    // 画像パッディング(横)
    $image_padding_width = 80;
    // 画像間マージン(縦)
    $image_margin_height = 100;

    // canvas 作成
    $result_canvas = imagecreatetruecolor( $total_w + $image_padding_width * 2, $total_h + $image_padding_width * 2 + $image_margin_height);

    // 着色
    $background_color = imagecolorallocate($result_canvas, 255, 255, 255);
    imagefill($result_canvas, 0, 0, $background_color);

    // 1枚目はマージンしない
    $loop_count_for_image_margin_height = 0;

    foreach ($result_images as $path) {
        $img = imagecreatefromjpeg($path);
        list($width, $height) = getimagesize($path);

        $image_margin_height_result = $image_margin_height;
        if ( $loop_count_for_image_margin_height == 0 ) {
            $image_margin_height_result = $image_padding_width;
        }

        // コピー先の画像,コピー元の画像,コピー先のx座標,コピー先のy座標,コピー元のx座標,コピー元のy座標,コピー元の幅,コピー元の高さ
        imagecopy($result_canvas, $img, $image_padding_width, $merged_img_h_sum + $image_margin_height_result, 0, 0, $width, $height);
        imagedestroy($img);
        // どこのy座標まで画像を展開したかを記録
        $merged_img_h_sum += $height + $image_margin_height_result;

        $loop_count_for_image_margin_height = $loop_count_for_image_margin_height + 1;
    }

    ob_start();
    imagejpeg($result_canvas);
    $img_src = base64_encode(ob_get_contents());
    ob_end_clean();
    imagedestroy($result_canvas);
}
//}

//get_header();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="/cms/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp"></script>
    <script type="text/javascript" src="/cms/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
    <script type="text/javascript" src="https://daitsu-ar.com/CARMCMS/js/unitycall.js"></script>
    <title>Yes/Noチャート</title>
    <meta name="viewport" content="width=device-width" >
    <meta name="robots" content="noindex">
</head>

<body>
    <script>
    ; (function ($) {
        $(function(){
            console.log('<?php echo json_encode($answered_product_result, JSON_UNESCAPED_UNICODE); ?>');
        });
    })(jQuery);;
    </script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/p_navi.css" type="text/css" media="all">

    <div id="p_navi-id">

        <div class="p_navi container">
            <p style="
                margin: 0.5em;
                color: darkslategray;
                position: fixed;
                top: 0;
                z-index: 2;
                border-radius: 1em;
                background-color: white;
                padding: 0.6em;
                box-shadow: 0px 0px 5px lightgray;
                opacity: 0.9;
            " onclick="Unity.call('closeWebView=true');">&lt;　閉じる</p>
            <div class="navi_result">
                <div class="nav_result_html" style="margin: 5em 0 0;">
                    <h2 class="nav_result_html_title">
                        <!-- <img src="<?php echo get_template_directory_uri() ?>/images/p_navi/p_navi_pin.png" alt=""> -->
                        あなたの結果
                    </h2>
                    <div class="nav_result_html_product_box">
                        <div class="nav_result_html_product_box_txt">
                            <h3 class="nav_result_html_product_name" style="background-color: <?php echo $product_result_array[$main_product_name]['product_html1_color']; ?>">
                                <?php echo $product_result_array[$main_product_name]['product_name']; ?>
                                <?php if (!$product_result_array[$main_product_name]['product_name']) echo end($post_array); ?>
                            </h3>
                            <div class="nav_result_html_product_txt">
                                <?php echo $product_result_array[$main_product_name]['product_html1']; ?>
                            </div>
                        </div>
                        <?php if ( $product_result_array[$main_product_name]['product_html_img'] ) : ?>
                            <img src="<?php echo $product_result_array[$main_product_name]['product_html_img']; ?>" alt="">
                        <?php else : ?>
                            <img src="/cms/wp-content/themes/zerif-lite/images/p_navi/top_image.png" alt="">
                        <?php endif; ?>
                    </div>

                    <!-- <h4 class="nav_result_html_product_about" style="color: <?php echo $product_result_array[$main_product_name]['product_html2_color']; ?>">
                        <?php echo $product_result_array[$main_product_name]['product_name']; ?>
                    </h4> -->
                    <div class="nav_result_html_product_about_txt">
                        <?php echo $product_result_array[$main_product_name]['product_html2']; ?>
                    </div>

                    <?php if ( $product_result_array[$main_product_name]['product_page'] ) : ?>
                    <a href="javascript:void(0)" onclick="Unity.call('<?php echo $product_result_array[$main_product_name]['product_page']; ?>');"><div id="question-restart" class="restart_link">
                        <p>もっと詳しく</p>
                    </div></a>
                    <?php endif; ?>

                    <h2 class="nav_result_html_title sub">
                        <img src="<?php echo get_template_directory_uri() ?>/images/p_navi/p_navi_pin.png" alt="">
                        他にも...
                    </h2>
                    <div class="nav_result_html_product_box sub">
                        <div class="nav_result_html_product_box sub left">
                            <h3 class="nav_result_html_product_name sub" style="background-color: <?php echo $product_result_array[$sub_product_name]['product_html1_color']; ?>">
                                <?php echo $product_result_array[$sub_product_name]['product_name']; ?>
                            </h3>
                            <?php if ( $product_result_array[$sub_product_name]['product_html_img'] ) : ?>
                                <img src="<?php echo $product_result_array[$sub_product_name]['product_html_img']; ?>" alt="">
                            <?php else : ?>
                                <img src="https://placehold.jp/600x500.png" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="nav_result_html_product_box_txt sub">
                            <div class="nav_result_html_product_txt sub">
                                <?php echo $product_result_array[$sub_product_name]['product_html1']; ?>
                            </div>
                            <a><div id="question-restart" class="restart_link sub-restart_link" href="<?php echo $product_result_array[$sub_product_name]['product_page']; ?>">
                                <p>もっと詳しく</p>
                            </div></a>
                        </div>
                    </div>
                </div>
                
                <div class="btn-box">
                    <a id="question-save" class="fb share save" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url( '/' ); ?>p_navi/result%2F%3Fi%3D<?php echo $result_date; ?>-<?php echo $main_product_id; ?>-<?php echo $sub_product_id; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/images/p_navi/fb-mark.png"> シェアする</a>
                    <a id="question-save" class="tw share save" href="https://twitter.com/intent/tweet?url=<?php echo home_url( '/' ); ?>p_navi/result/?i=<?php echo $result_date; ?>-<?php echo $main_product_id; ?>-<?php echo $sub_product_id; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/images/p_navi/tw-mark.png"> シェアする</a>
                    <a id="question-save" class="li share save" href="https://social-plugins.line.me/lineit/share?url=<?php echo home_url( '/' ); ?>p_navi/result/?i=<?php echo $result_date; ?>-<?php echo $main_product_id; ?>-<?php echo $sub_product_id; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/images/p_navi/li-mark.png"> シェアする</a>
                    <a id="question-save" class="save" href="javascript:void(0)" onclick="saveCanvas('data:image/jpeg;base64,<?php echo $img_src ?>');">結果を保存</a>
                </div>
                <div class="question-re_start">
                    <a id="question-start" class="restart restart-back" href="/p_navi/">はじめからやる</a>
                </div>
            </div>
        </div>

    </div>

    <script>
    //Base64データをBlobデータに変換
    function toBlob(base64) {
        var bin = atob(base64.replace(/^.*,/, ''));
        var buffer = new Uint8Array(bin.length);
        for (var i = 0; i < bin.length; i++) {
            buffer[i] = bin.charCodeAt(i);
        }
        var blob = new Blob([buffer.buffer], {type: 'image/png'});
        return blob;
    }
    //
    function saveCanvas(uri)
    {
        var userAgent = window.navigator.userAgent.toLowerCase();

        if (userAgent.indexOf('msie') != -1 || userAgent.indexOf('trident') != -1) { //IE対応
            var blob = toBlob(uri);
            window.navigator.msSaveBlob(blob, 'YES/NOチャート診断結果.jpg');
        } else {
            //アンカータグを作成
            var a = document.createElement('a');
            a.href = uri;
            a.download = 'YES/NOチャート診断結果.jpg';
            //クリックイベントを発生させる
            a.click();
        }
    }
    </script>
</body>
</html>