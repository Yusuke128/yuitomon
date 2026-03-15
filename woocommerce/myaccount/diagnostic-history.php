<?php
defined('ABSPATH') || exit;
?>
<section class="title-box">
  <h2 class="title-main">過去の実力診断テスト結果</h2>
  <!-- .title-main end-->
</section>
<!-- .title-box end-->
<?php
// 過去のテスト問題取得
//   未回答のものは回答画面への遷移ボタンを追加 
$user_id = get_current_user_id();
//フィードバック一覧を取得(ログインユーザー)
$result_query = new WP_Query([
  'post_type'  => 'diagnostic_result',
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'target_user',
      'value' => $user_id,
      'compare' => '=',
    ]
  ]
]);
//過去の診断テストとの比較用にフィードバックのIDを配列に格納
$feedback_ids = [];
if ($result_query->have_posts()) :
  while ($result_query->have_posts()) : $result_query->the_post();
    $result_product = get_field('test_name');

    if ($result_product) {
      $result_product_id = is_array($result_product)
        ? $result_product[0]
        : $result_product;

      $feedback_ids[$result_product_id] = get_the_ID();
    }
  endwhile;
  wp_reset_postdata();
endif;

//過去の診断テストを取得
$old_diagnostic_query = get_diagnostic_products([
  'posts_per_page' => -1,
  'offset' => 1
]);
$chart_data = [];

if ($old_diagnostic_query->have_posts()) :
?>

  <ul class="card-list old_diagnostic-card-list" role='list'>
    <?php
    while ($old_diagnostic_query->have_posts()) : $old_diagnostic_query->the_post();
      $old_diagnostic = get_post();
      $old_diagnostic_id = get_the_ID();
      $old_diagnostic_name = get_the_title();
    ?>
      <li id="<?php echo $old_diagnostic_id ?>" class="card old_diagnostic-card section-padding radius bg-white" role='listitem'>
        <div class="card-content old_diagnostic-card-content">
          <h3 class="card-title old_diagnostic-card-title"><?php echo get_the_date('Y年m月', $old_diagnostic->ID); ?>&nbsp;実力診断テスト</h3><!-- .card-title .old_diagnostic-card-title end-->
          <?php
          /*
          *  フィードバックの有無を確認
          *   true(フィードバックあり): 結果入力済の表示
          *  false(フィードバックなし): 結果入力画面へのリンクを表示
          */
          if (isset($feedback_ids[$old_diagnostic_id])) :
            $result_product_id = $feedback_ids[$old_diagnostic_id];
          ?>
            <?php
            // 結果内容も表示
            $data = get_diagnostic_result_data($result_product_id);

            $chart_data[] = $data;
            ?>
            <div class="diagnostic-result-evaluation">
              <h4 class="evaluation">総合評価&nbsp;<span class="large"><!-- .large end--><?php echo $data['evaluation']; ?></span></h4><!-- .evaluation end-->
            </div><!-- .diagnostic-result-evaluation end-->

            <?php if ($data['pdf']): ?>
              <div class="feedback-pdf">
                <a href="<?php echo esc_url($data['pdf']); ?>" target="_blank" class="link btn btn-yellow radius">結果PDFを見る</a>
              </div>
            <?php else: ?>
              <div class="feedback-pdf">
                <button class="link btn btn-gray radius">結果PDFはありません</button>
              </div>
            <?php endif; ?>
            <section class="diagnostic-result-chart">
              <canvas class="diagnostic-chart"></canvas>
            </section><!-- .diagnostic-result-chart end-->
            <?php
            // 結果内容も表示 ここまで
            ?>

          <?php else : ?>
            <a href="<?php echo esc_url(
                        home_url('/my-account/result-input?product_id=' . $old_diagnostic_id . '&product_title=' . rawurlencode($old_diagnostic_name))
                      ); ?>" class=" link btn btn-yellow radius">
              結果入力
            </a>
          <?php endif; ?>
        </div><!-- .card-content old_diagnostic-card-content end-->
      </li> <!-- .card old_diagnostic-card end-->
    <?php
    endwhile;
    wp_localize_script(
      'diagnostic_result_chart',
      'diagnosticChartsData',
      $chart_data
    );
    wp_reset_postdata(); ?>
  </ul><!-- .card-list old_diagnostic-card-list end-->
<?php endif; ?>