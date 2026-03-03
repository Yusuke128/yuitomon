<?php
$diagnostic_query = new WP_Query(array(
  'post_type'      => 'product',
  'posts_per_page' => 2,
  'order'          => 'DESC',
  'orderby'        => 'date',
  'tax_query'      => array(
    array(
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => 'diagnostic',
    ),
  ),
));

$latest_product      = null;
$previous_product    = null;

if ($diagnostic_query->have_posts()) {
  $diagnostic_query->the_post();
  $latest_product = get_post(); // 1件目

  if ($diagnostic_query->have_posts()) {
    $diagnostic_query->the_post();
    $previous_product = get_post(); // 2件目
  }
}
wp_reset_postdata();
?>

<?php
if ($latest_product): ?>
  <article class="dashboard-content my-diagnostic section-padding bd bd-navy radius bg-white">
    <section class="title-box">
      <h2 class="title-main">最新の実力診断結果入力</h2><!-- .title-main end-->
      <p class="title-sub-title"><?php echo get_the_date('Y年m月', $latest_product->ID); ?>&nbsp;実力診断テスト</p><!-- .title-sub-title end-->
    </section><!-- .title-box end-->

    <section class="input-links result-input-links">
      <h3>(必須)結果を入力してください</h3>
      <?php
      if (get_user_meta(get_current_user_id(), 'has_input_result_' . $latest_product->ID, true)) :
      ?>
        <p class="link btn btn-glay radius">結果入力済</p>
      <?php
      else :
      ?>
        <a href="<?php echo home_url('/my-account/result-input?product_id=' . $latest_product->ID); ?>" class="link btn btn-yellow radius">結果入力</a>
      <?
      endif;
      ?>
      <p class="input-links-note">※運営者に結果が届き次第、一週間以内でフィードバックをお送りします。</p>
    </section><!-- .input-links .result-input-links end-->

    <section class="input-links questionnaire-input-links">
      <h3>(任意)サービス改善やフィードバックの精度を高めるためアンケートにご協力ください</h3>
      <a href="<?php echo  home_url('/my-account/questionnaire') ?>" class="link btn btn-yellow radius">アンケート入力</a>
    </section><!-- .input-links questionnaire-input-links end-->
  </article><!-- .my-diagnostic end-->
<?php endif; ?>

<?php if ($previous_product) :
  $current_use_id = get_current_user_id();

  $result_query = new WP_Query(array(
    'post_type'  => 'diagnostic_result',
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key'     => 'test_name',
        'value'   => '"' . $previous_product->ID . '"',
        'compare' => 'LIKE'
      ),
      array(
        'key'     => 'target_user',
        'value'   => $current_use_id,
        'compare' => '='
      ),
    ),
  ));
  $chart_data = array();
  $all_chart_data = array();
  if ($result_query->have_posts()) :
    while ($result_query->have_posts()) : $result_query->the_post();

      // ===== 基本データ取得 =====
      $evaluation  = get_field('evaluation');
      $comment     = get_field('Feedback');
      $pdf_file    = get_field('feedback_img');

      // ===== 科目別得点（repeater） =====

      $rows = get_field('category_scores');
      if ($rows) {
        foreach ($rows as $row) {
          $category_array = $row['category']; // ← ここは配列確定
          $points         = $row['points'];
          if (!empty($category_array)) {
            $category_id = (int)$category_array[0]; // 必ず0番目を取る
            $term = get_term($category_id, 'product_cat');
            if ($term && !is_wp_error($term)) {
              $rate = round(($points / $row['question_number']) * 100); // 得点率を計算
              $chart_data[$term->name] = $rate;
            }
          }
        }
      }
      $all_chart_data[] = [
        'scores' => $chart_data,
        "evaluation" => $evaluation,
        "comment" => $comment,
        "pdf" => $pdf_file ? $pdf_file['url'] : null,
      ];
    endwhile;
    wp_localize_script('diagnostic_result_chart', 'diagnosticChartsData', $all_chart_data); // ← PHPの配列を渡す;
  endif; ?>
  <article class="dashboard-content diagnostic-result-info section-padding section-margin bd bd-navy radius bg-white">
    <section class="title-box">
      <h2 class="title-main">最新の実力診断テスト結果</h2><!-- .title-main end-->
      <p class="title-sub-title"><?php echo get_the_date('Y年m月', $previous_product->ID); ?></p>
      <!-- .title-sub-title end-->
    </section>
    <!-- .title-box end-->
    <div class="diagnostic-result-evaluation">
      <h4 class="evaluation">総合評価&nbsp<?php echo $evaluation; ?></h4><!-- .evaluation end-->
    </div><!-- .diagnostic-result-evaluation end-->

    <?php if ($pdf_file): ?>
      <div class="feedback-pdf">
        <a href="<?php echo esc_url($pdf_file['url']); ?>" target="_blank" class="link btn btn-yellow radius">フィードバックPDFを見る</a>
      </div>
    <?php endif; ?>
    <section class="diagnostic-result-chart">
      <canvas class="diagnostic-chart"></canvas>
    </section><!-- .diagnostic-result-chart end-->
  </article><!-- .dashboard-content diagnostic-result-info end-->

  <article class="dashboard-content diagnostic-result-comment section-padding section-margin radius bg-lightnavy">
    <section class="title-box">
      <h2 class="title-main">監修者からのコメント</h2><!-- .title-main end-->
    </section><!-- .title-box end-->
    <p class="comment">
      <?php
      echo $comment;
      ?>
    </p>

  </article><!-- .dashboard-content diagnostic-result-comment end-->
<?php
  wp_reset_postdata();
endif; ?>