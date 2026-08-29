<?php
/**
 * @copyright     Copyright 2019, Wiz Co., Ltd. (https://wiznet.co.jp)
 * @author Watanabe Kazuyoshi
 * @package zerif-lite
 * 
 * Template Name: お知らせ一覧ページ
 */

get_header();
?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">
    <div class="container">
        <div class="content-left-wrap col-md-12">
            <div id="primary" class="content-area">
                <main itemscope itemtype="//schema.org/WebPageElement" itemprop="mainContentOfPage" id="main" class="site-main">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php
                            $days  = 7; // NEWを表示させる期間の日数を入力
                            $today = date_i18n('U');
                            query_posts('post_type=post&paged='.$paged);

                            if ( have_posts() ) :
                            ?>
                                <table class="wp-block-table aligncenter">
                                    <tbody>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <tr>
                                                <td><?php the_time('Y/n/j'); ?></td>
                                                <td><?php	$total = date( 'U',( $today - get_the_time('U') ) ) / 86400;
                                                            if( $days > $total ){?>
                                                        <img src="/cms/wp-content/themes/zerif-lite/images/new_mark.png" class="new_mark" alt="new" title="NEW">
                                                    <?php	} ?>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>を更新しました。
                                                </td>
                                            </tr>
                                        <?php endwhile;?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <p>現在お知らせする情報はありません</p>
                            <?php endif;

                            //edit_post_link( __( 'Edit', 'zerif-lite' ), '<span class="edit-link">', '</span>' );
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                </main><!-- .site-main -->
            </div><!-- #primary -->
        </div><!-- .content-left-wrap -->
    </div><!-- .container -->
</div><!-- .site-content -->

<?php
get_footer();
?>