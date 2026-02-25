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
  <div class="dashboard-content my-diagnostic section-padding bd bd-navy radius bg-white">
    <section class="title-box">
      <h2 class="title-main">最新の実力診断結果入力</h2><!-- .title-main end-->
      <p class="title-sub-title"><?php echo get_the_date('Y年m月', $latest_product->ID); ?>&nbsp;実力診断テスト</p><!-- .title-sub-title end-->
    </section><!-- .title-box end-->
    <section class="input-links result-input-links">
      <h3>(必須)結果を入力してください</h3>
      <a href="<?php echo home_url('/my-account/result-input?product_id=' . $latest_product->ID); ?>" class="link btn btn-yellow radius">結果入力</a>
      <p class="input-links-note">※運営者に結果が届き次第、一週間以内でフィードバックをお送りします。</p>
    </section><!-- .input-links .result-input-links end-->

    <section class="input-links questionnaire-input-links">
      <h3>(任意)サービス改善やフィードバックの精度を高めるためアンケートにご協力ください</h3>
      <a href="<?php echo  home_url('/my-account/questionnaire') ?>" class="link btn btn-yellow radius">アンケート入力</a>
    </section><!-- .input-links questionnaire-input-links end-->
  </div><!-- .my-diagnostic end-->
<?php endif; ?>

<?php if ($previous_product) : ?>
  <section class="dashboard-content diagnostic-result-info section-padding section-margin bd bd-navy radius bg-white">
    <section class="title-box">
      <h2 class="title-main">最新の実力診断テスト結果</h2><!-- .title-main end-->
      <p class="title-sub-title"><?php echo get_the_date('Y年m月', $previous_product->ID); ?></p>
      <!-- .title-sub-title end-->
    </section>
    <!-- .title-box end-->
  </section><!-- .dashboard-content diagnostic-result-info end-->
<?php endif; ?>

<section class="dashboard-content diagnostic-result-comment section-padding section-margin radius bg-lightnavy">
  <section class="title-box">
    <h2 class="title-main">監修者からのコメント</h2><!-- .title-main end-->
  </section><!-- .title-box end-->
  <div class="comment">
    <?php

    ?>
  </div>
</section><!-- .dashboard-content diagnostic-result-comment end-->