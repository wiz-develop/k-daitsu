<?php
/*
 * @copyright   Copyright 2019, Wiz Co., Ltd. (https://wiznet.co.jp)
 * @author  Watanabe Kazuyoshi
 * Template Name: YES/NOチャート(親ページ)
 */

/**
 * タイムゾーン設定
 */
date_default_timezone_set('Asia/Tokyo');

/**
 * 設定データを読み込み
 */
$master_id = get_page_by_path('master','','p_navi')->ID;
$question_id = get_page_by_path('question','','p_navi')->ID;

/**
 * 公開設定
 * true : 公開する
 * false : 非公開する
 */
$release = get_field('release', $master_id);

/**
 * 公開設定が非公開であればサイトトップへリダイレクト
 */
$redirect_flag = false;
if ( $release == 'false' ) {
    $redirect_flag = true;
}
if ( $redirect_flag == true ) {
    wp_redirect( home_url( '/' ), 301 );
    exit;
}

/**
 * 質問設定
 */
$question_block = $cfs->get('question_block', $question_id);

/**
 * 問題順序
 * true : ランダムで表示
 * false : 設定画面の順番で表示
 */
$orderby = get_field('orderby', $master_id);

/**
 * 回答順序
 * true : ランダムで表示
 * false : 設定画面の順番で表示
 */
$answer_orderby = get_field('answer_orderby', $master_id);

/**
 * カスタム期間設定
 */
$term_custom = get_field('term_custom', $master_id);
$term_start_time = NULL;
$term_period_time = NULL;

if( $term_custom == true ) {
    $term_start_time = get_field('term_start_time', $master_id);
    $term_period_time = get_field('term_period_time', $master_id);
}

/**
 * トップページの文言
 */
$top_page_detail = get_field('top_page_detail', $master_id);

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
    <div style="display:none"><?php echo strtotime($term_start_time)?></div>
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
            <div id="start-page">
                <div class="p-navi_section">
                    <div class="p-navi_detail">
                        <h2 class="page-title"><img src="<?php echo get_template_directory_uri() ?>/images/p_navi/title.png" /></h2>
                        <div class="page-detail"><?php echo $top_page_detail; ?></div>
                    </div>
                    <button id="question-start">スタート</button>
                    <div class="p-navi_image">
                        <img class="top-image" src="<?php echo get_template_directory_uri() ?>/images/p_navi/top_image.png" alt="YES/NOチャート">
                    </div>
                </div>
<!--                 <p class="question-start-top">さぁ、あなたにぴったりの結果を探しましょう
                    <span class="p_navi_pin">
                        <img src="<?php echo get_template_directory_uri() ?>/images/p_navi/p_navi_pin.png">
                    </span>
                </p> -->
            </div><!-- #start-page -->

            <div id="question_window">

                <form id="question-form" method="post" action="/p_navi/result" accept-charset="UTF-8" autocomplete="off">

                    <div id="question_window_carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false" data-wrap="false" data-touch="false">

                        <div class="carousel-inner" role="listbox">

                            <!-- <div class="carousel-item active">
                                <div class="question-title">
                                    <span class="question-title-q">
                                        Q<span class="question-title-q-num">1.</span>
                                        <div class="question-counter sp">
                                            <p>あと<span class="question-counter-num"></span>問</p>
                                        </div>
                                    </span>
                                    <div class="question-title-block">
                                        <p class="question-title-txt">あなたの性別を教えてください。</p>
                                        <p class="question-detail">必ず選択肢を一つ選んでから [次へ] を押してください。</p>
                                    </div>
                                    <div class="question-counter">
                                        <p>あと<span class="question-counter-num"></span>問</p>
                                    </div>
                                </div>
                                <div class="answer-box">
                                    <input type="radio" name="gender" value="woman" id="woman" required checkbox-group="required">
                                    <label for="woman" style="background-color: #304359; border-color: #304359;">女性</label>
                                    <input type="radio" name="gender" value="man" id="man">
                                    <label for="man" style="background-color: #ab245c; border-color: #ab245c;">男性</label>
                                    <input type="radio" name="gender" value="other" id="other">
                                    <label for="other" style="background-color: #557747; border-color: #557747;">その他</label>
                                </div>
                                <div id="question-next-button-div">
                                    <a id="question-next-button" href="#question_window_carousel" role="button" data-slide="next">
                                        <span>次へ</span>
                                    </a>
                                </div>
                            </div> -->
                            <!-- <div class="carousel-item">
                                <div class="question-title">
                                    <span class="question-title-q">
                                        Q<span class="question-title-q-num">2.</span>
                                        <div class="question-counter sp">
                                            <p>あと<span class="question-counter-num"></span>問</p>
                                        </div>
                                    </span>
                                    <div class="question-title-block">
                                        <p class="question-title-txt">あなたの年代<span class="small-size">（10～20代／30～40代／50～60代／70代以上）</span>を選んでください。</p>
                                        <p class="question-detail">必ず選択肢を一つ選んでから [次へ] を押してください。</p>
                                    </div>
                                    <div class="question-counter">
                                        <p>あと<span class="question-counter-num"></span>問</p>
                                    </div>
                                </div>
                                <div class="answer-box">
                                    <input type="radio" name="age" value="10to20" id="10to20" required checkbox-group="required">
                                    <label for="10to20" style="background-color: #5588ba; border-color: #5588ba;">10～20代</label>
                                    <input type="radio" name="age" value="30to40" id="30to40">
                                    <label for="30to40" style="background-color: #cfaf48; border-color: #cfaf48;">30～40代</label>
                                    <input type="radio" name="age" value="50to60" id="50to60">
                                    <label for="50to60" style="background-color: #66954b; border-color: #66954b;">50〜60代</label>
                                    <input type="radio" name="age" value="70over" id="70over">
                                    <label for="70over" style="background-color: #b62d3e; border-color: #b62d3e;">70代以上</label>
                                </div>
                                <div id="question-next-button-div">
                                    <a id="question-next-button" href="#question_window_carousel" role="button" data-slide="next">
                                        <span>次へ</span>
                                    </a>
                                </div>
                            </div> -->

                            <?php
                            // 質問数カウント 初期値
                            $loop_count_for_question = 0;

                            foreach ( $question_block as $question_block_loop ) :

                                /**
                                 * カスタム期間設定
                                 */
                                $term_custom_flag = false;
                                if ( $term_custom == false && time() < strtotime($question_block_loop['question_start_time']) ) {
                                    $term_custom_flag = true;
                                }
                                if ( $term_custom == false && time() > strtotime($question_block_loop['question_period_time']) ) {
                                    $term_custom_flag = true;
                                }
                                if ( $term_custom == true && strtotime($question_block_loop['question_start_time']) != strtotime($term_start_time) ) {
                                    $term_custom_flag = true;
                                }
                                if ( $term_custom == true && strtotime($question_block_loop['question_period_time']) != strtotime($term_period_time) ) {
                                    $term_custom_flag = true;
                                }
                                if ( $term_custom_flag == true ) {
                                    continue;
                                }

                                /**
                                 * 問題順序
                                 */
                                if ( $orderby == 'true' ) {
                                    shuffle($question_block_loop['question_loop']);
                                }

                                ?>
                                <?php
                                foreach ( $question_block_loop['question_loop'] as $question_loop ) :

                                    /**
                                     * 回答順序
                                     */
                                    if ( $answer_orderby == 'true' ) {
                                        shuffle($question_loop['question_answer_loop']);
                                    }

                                    $loop_count_for_required = 0;

                                    if ( !$question_loop['question_display'] ) :

                                        // 質問数カウント用
                                        $loop_count_for_question = $loop_count_for_question + 1;
                            ?>

                            <div class="carousel-item<?php echo $loop_count_for_question == 1 ? ' active' : ''; ?>">
                                <div class="question-title">
                                    <span class="question-title-q" style="color: <?php echo $question_loop['question_color'];?>;">
                                        Q<span class="question-title-q-num"><?php echo $loop_count_for_question;?></span>.
                                        <div class="question-counter sp">
                                            <p>あと<span class="question-counter-num"></span>問</p>
                                        </div>
                                    </span>
                                    <div class="question-title-block">
                                        <p class="question-title-txt"><?php echo $question_loop['question_txt']; ?></p>
                                        <?php
                                            $question_type_required_echo = 'あてはまるものがない場合は [次へ] を押してください。';
                                            if( key( $question_loop['question_type'] ) == 'required' ){
                                                $question_type_required_echo = '必ず選択肢を一つ選んでから [次へ] を押してください。';
                                            }
                                        ?>
                                        <p class="question-detail"><?php echo $question_type_required_echo ?></p>
                                    </div>
                                    <div class="question-counter">
                                        <p>あと<span class="question-counter-num"></span>問</p>
                                    </div>
                                </div>
                                <div class="answer-box<?php echo ' '.$question_loop['question_txt']; ?>">
                                    <?php
                                    foreach ( $question_loop['question_answer_loop'] as $question_answer_loop ) :

                                        $question_type_required = '';
                                        if( $loop_count_for_required == 0 && key( $question_loop['question_type'] ) == 'required' ){
                                            $question_type_required = 'required checkbox-group="required"';
                                        }

                                        /**
                                         * ・inputのnameとvalueには文章中のダブルコーテーションを削除する
                                         */

                                        // 選択肢の背景色
                                        $colorcode = preg_replace( "/#/", "", $question_answer_loop['question_answer_color'] );

                                        $background_rgba = hexdec(substr($colorcode, 0, 2)).','.hexdec(substr($colorcode, 2, 2)).','.hexdec(substr($colorcode, 4, 2)).',0.1';

                                        // CSS用のUNIQUE ID
                                        $answer_box_unique_class = uniqid("answer-box_");
                                    ?>
                                    <style>
                                        .answer-box input:checked + label.<?php echo $answer_box_unique_class; ?> {
                                            color: <?php echo $question_answer_loop['question_answer_color'];?>;
                                            background-color: white;
                                        }
                                        label.<?php echo $answer_box_unique_class; ?> {
                                            background-color: <?php echo $question_answer_loop['question_answer_color'];?>;
                                        }
                                    </style>

                                    <input type="radio" name="<?php echo htmlspecialchars ( $question_loop['question_txt'], ENT_QUOTES ); ?>" value="<?php echo htmlspecialchars ( $question_answer_loop['question_answer_txt'], ENT_QUOTES ) ; ?>" id="<?php echo $answer_box_unique_class; ?>" data-question-id="<?php echo $question_answer_loop['question_next_id']; ?>" <?php //echo $question_type_required; ?>>
                                    <label class="<?php echo $answer_box_unique_class; ?>" for="<?php echo $answer_box_unique_class; ?>" style="border-color: <?php echo $question_answer_loop['question_answer_color'];?>;"><?php echo $question_answer_loop['question_answer_txt'] ; ?></label>

                                    <?php
                                        // 必須項目用
                                        $loop_count_for_required = $loop_count_for_required + 1;

                                    endforeach;
                                    ?>
                                </div>
                                <div id="question-next-button-div">
                                    <a id="question-next-button" href="#question_window_carousel" role="button" data-slide="next">
                                        <span>次へ</span>
                                    </a>
                                </div>
                            </div>

                            <?php
                                    endif;
                                endforeach;
                            endforeach;
                            ?>

                        </div><!-- .carousel-inner -->

                        <div id="question-submit-button-box">
                            <input id="question-submit-button" type="submit" value="結果を見る">
                            <label id="question-submit-button-label" for="question-submit-button">
                                結果を見る
                            </label>
                        </div>

                    </div><!-- #question_window_carousel -->

                </form>

            </div>
        </div>

    </div>
    <?php
    //get_footer();?>
    <!-- Global site tag (gtag.js) - Google Analytics テスト用-->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156795178-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-156795178-1');
    </script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
    ; (function ($) {
        // 最後の結果を送信ボタン　初期化
        var lastQuestion = false;
        $("input#question-submit-button").prop("disabled", true);

        // スタートボタン
        $('button#question-start').click(function() {
            questionNextButtonDisable( 'active', lastQuestion );

            $('div#start-page').fadeOut(500);
            $('div#question_window').delay(500).fadeIn();

            // テーマのイベントを初期化 (for #question_window_carousel)
            /* var events = $._data(jQuery('a[href*=#]').get(0), "events");
            var originalHandler = events.click[0].handler;
            $('a[href*=#]').off('click', originalHandler); */

            mobileScrollToTop();

            // 戻るを禁止
            $(window).bind("beforeunload", function() {
                // 確認メッセージに表示させたい文字列を返します。
                return "このサイトを離れますか？";
            });
        });

        // 問題数
        var questionCounterNum = $('div#question_window_carousel div.carousel-item .question-title').length;
        $('span.question-counter-num').text(questionCounterNum);

        var questionCounterNumNow;
        // 次へボタン
        $('a#question-next-button').click(function() {
            $('form#question-form div#question_window_carousel div.carousel-inner div.active').addClass('off').addClass('whiteout');
            $('form#question-form div#question_window_carousel div.carousel-inner div.active').next().addClass('on');
            // 最後の問題
            if ( questionCounterNumNow == 2 ){
                lastQuestionButtonChange();
            }

            questionNextButtonDisable( 'on', lastQuestion );
            // 次へ押して残問題数を減らす
            questionCounterNumNow = Number($('.carousel-item.active span.question-counter-num').first().text()) - 1;
            $('.carousel-item.on span.question-counter-num').text(questionCounterNumNow);

            $('form#question-form div#question_window_carousel div.carousel-inner div.active').next().removeClass('on');
            $('form#question-form div#question_window_carousel div.carousel-inner div.active').removeClass('off');

            mobileScrollToTop();
            questionNumbering();

            // YES/NOチャート質問画面 - 質問 -> 回答,性別,年代
            // YES/NOチャート質問画面 - 質問 -> 回答
            // if ( $('div.carousel-inner div.active input:checked').attr('name') != 'gender' && $('div.carousel-inner div.active input:checked').attr('name') != 'age' ) {
            //     gtagEventSend('q_an_g_ag');
            //     gtagEventSend('q_an');
            // }

            // // YES/NOチャート質問画面 - 性別 -> 性別
            // if ( $('div.carousel-inner div.active input:checked').attr('name') == 'gender' ) {
            //     gtagEventSend('g');
            // }

            // // YES/NOチャート質問画面 - 性別,年代 -> 性別,年代
            // // YES/NOチャート質問画面 - 年代 -> 年代
            // if ( $('div.carousel-inner div.active input:checked').attr('name') == 'age' ) {
            //     gtagEventSend('g_ag');
            //     gtagEventSend('ag');
            // }

        });

        // 結果を送信ボタン
        $('input#question-submit-button').click(function() {
            $(window).off("beforeunload");
            // gtagEventSend('q_an_g_ag');
            // gtagEventSend('q_an');
        });

        // 項目クリック時
        var _radio = [];
        $('div#question_window_carousel div.carousel-inner').on('click', 'div.active input', function() {
            var $count = $("div#question_window_carousel div.carousel-inner div.active input[type=checkbox]:checked").length;
            var $not = $('div#question_window_carousel div.carousel-inner div.active input[type=checkbox]').not(':checked');

            // checkbox的な動作をする
            var _this = $(this);
            var _name = _this.attr('name');
            var _val  = _this.val();
            if (_radio[_name] === '' || _radio[_name] === null || _radio[_name] === undefined) {
                _radio[_name] = _val;
            } else {
                if (_radio[_name] == _val) {
                    _this.prop('checked', false);
                    _radio[_name] = '';
                } else {
                    _radio[_name] = _val;
                }
            }

            slideToDestinationQuestion( $("div#question_window_carousel div.carousel-inner div.active input:checked").attr('data-question-id') );
            questionNextButtonDisable( 'active' , lastQuestion );
            mobileScrollToBottom();
        });

        // 質問数の表示をjQuery側で処理
        function questionNumbering() {
            questionCounterNumNow = Number($('.carousel-item.active span.question-title-q-num').text());
            $('.carousel-item span.question-title-q-num').text(questionCounterNumNow + 1);
        }

        // 最後の質問の際の処理
        function lastQuestionButtonChange() {
            $('a#question-next-button').hide();
            $('div#question-submit-button-box').show();
            lastQuestion = true;
            // [次へ]を置換
            $('.carousel-item.on p.question-detail').text($('.carousel-item.on p.question-detail').text().replace('[次へ]','[結果を見る]'));
        }

        // 最後の質問の際の処理
        function lastQuestionButtonChangeAfter() {
            $('div#question-submit-button-box').hide();
            $('a#question-next-button').show();
            lastQuestion = false;
            // [次へ]を置換
            $('.carousel-item.on p.question-detail').text($('.carousel-item.on p.question-detail').text().replace('[結果を見る]','[次へ]'));
        }

        // 特定の回答ボタンが押されたら特定の問題へ飛ばすようにする
        function slideToDestinationQuestion( question_id ) {
            if(question_id == 'END'){
                console.log('hogeEND');
                lastQuestionButtonChange();
                return;
            } else {
                console.log('elseEnd');
                lastQuestionButtonChangeAfter();
            }
            $('a#question-next-button').removeAttr('data-slide');
            $('a#question-next-button').attr('data-slide-to', Number(question_id)-1);
        }

        // YES/NOチャート イベント
        function gtagEventSend( event_category ) {
            var gender_array = {
                'woman' : '女性',
                'man' : '男性'
            };

            var age_array = {
                '10to20' : '10～20代',
                '30to40' : '30～40代',
                '50to60' : '50～60代',
                '70over' : '70代以上'
            };

            var event_category_array = {
                'q_an_g_ag' : {
                    'action_name' : $('div.carousel-inner div.active input:checked').attr('name'),
                    'category_name' : 'YES/NOチャート質問画面 - 質問 -> 回答,性別,年代',
                    'label_name' : $('div.carousel-inner div.active input:checked').attr('value') + ',' + $('div.carousel-inner div.carousel-item input[name="gender"]:checked').attr('value') + ',' + $('div.carousel-inner div.carousel-item input[name="age"]:checked').attr('value')
                },
                'q_an' : {
                    'action_name' : $('div.carousel-inner div.active input:checked').attr('name'),
                    'category_name' : 'YES/NOチャート質問画面 - 質問 -> 回答',
                    'label_name' : $('div.carousel-inner div.active input:checked').attr('value')
                },
                'g_ag' : {
                    'action_name' : '性別,年代',
                    'category_name' : 'YES/NOチャート質問画面 - 性別,年代 -> 性別,年代',
                    'label_name' : gender_array[$('div.carousel-inner div.carousel-item input[name="gender"]:checked').attr('value')] + ',' + age_array[$('div.carousel-inner div.carousel-item input[name="age"]:checked').attr('value')]
                },
                'g' : {
                    'action_name' : '性別',
                    'category_name' : 'YES/NOチャート質問画面 - 性別 -> 性別',
                    'label_name' : gender_array[$('div.carousel-inner div.carousel-item input[name="gender"]:checked').attr('value')]
                },
                'ag' : {
                    'action_name' : '年代',
                    'category_name' : 'YES/NOチャート質問画面 - 年代 -> 年代',
                    'label_name' : age_array[$('div.carousel-inner div.carousel-item input[name="age"]:checked').attr('value')]
                }
            };

            gtag('event',
                event_category_array[event_category]['action_name'],
                    {'event_category': event_category_array[event_category]['category_name'],
                        'event_label': event_category_array[event_category]['label_name'],
                    }
                );
        }

        // 必須項目に選択出来ていなければ結果を送信をクリック出来ないようにする
        function questionNextButtonDisable( className, lastQuestion ) {
            // if ( $('.carousel-item.active .answer-box input').attr('checkbox-group') === "required" || $('.carousel-item.on .answer-box input').attr('checkbox-group') === "required" ) {
            //     $('a#question-next-button').addClass('disable');
            //     //$('div#question_window_carousel p.question-detail').fadeIn().text('必ず選択肢を一つ選んでから次へお進みください');

            //     if ( $('form#question-form div#question_window_carousel div.carousel-inner div.'+ className +' input:checked').length !== 0 ){
            //         $('a#question-next-button').removeClass('disable');
            //         if ( lastQuestion == true ) {
            //             $("input#question-submit-button").prop("disabled", false);
            //         };
            //     }
            //     if ( $('.carousel-item.on .answer-box input').attr('checkbox-group') !== "required" && jQuery('div.carousel-inner div.carousel-item').hasClass('on') !== false ) {
            //         $('a#question-next-button').removeClass('disable');
            //     }
            // } else {
            //     $('a#question-next-button').removeClass('disable');
            //     //$('div#question_window_carousel p.question-detail').fadeIn().text('あてはまるものがない場合は次へお進みください');
            //     if ( lastQuestion == true ) {
            //         $("input#question-submit-button").prop("disabled", false);
            //     }
            // }
            // 必須項目設定関わらず１つでも選択されていない場合は次へが押せないようにする
            $('a#question-next-button').addClass('disable');
            if ( lastQuestion == true ) {
                $("input#question-submit-button").prop("disabled", true);
            }
            if ( $('form#question-form div#question_window_carousel div.carousel-inner div.'+ className +' input:checked').length !== 0 ){
                $('a#question-next-button').removeClass('disable');
                if ( lastQuestion == true ) {
                    $("input#question-submit-button").prop("disabled", false);
                }
            }
        }

        // モバイル用 ページトップへ
        function mobileScrollToTop() {
            $('body, html').animate({ scrollTop: 0 }, 200);
        }

        // モバイル用 ページ下部へ
        function mobileScrollToBottom() {
            $('body, html').animate({ scrollTop: $(document).height() }, 200);
        }

    })(jQuery);;

    </script>
</body>
</html>