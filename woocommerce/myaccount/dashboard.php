<section class="dashboard-content my-diagnostic section-padding bd bd-navy radius bg-white">
  <section class="title-box">
    <h2 class="title-main">最新の実力診断結果入力</h2><!-- .title-main end-->
  </section><!-- .title-box end-->
  <section class="input-links">
    <?php
    $diagnostic_query = new WP_Query(array(
      'post_type' => 'product',
      'posts_per_page' => 2,
      'order' => "DESC",
      "orderby" => "date",
      'tax_query' => array(
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'slug',
          'terms'    => 'diagnostic',
        ),
      ),
    ));
    if ($diagnostic_query->have_posts()):
      while ($diagnostic_query->have_posts()): $diagnostic_query->the_post();
    ?>
        <h3><?php echo get_the_date('Y年m月'); ?>&nbsp;実力診断テスト</h3>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </section><!-- .input-links end-->
</section><!-- .my-diagnostic end-->

<section class="dashboard-content diagnositc-result-info section-padding section-margin bd bd-navy radius bg-white">
  <section class="title-box">
    <h2 class="title-main">最新の実力診断テスト結果</h2><!-- .title-main end-->
  </section><!-- .title-box end-->
</section><!-- .dashboard-content diagnositc-result-info end-->

<section class="dashboard-content diagnositc-result-comment section-padding section-margin radius bg-lightnavy">
  <section class="title-box">
    <h2 class="title-main">監修者からのコメント</h2><!-- .title-main end-->
  </section><!-- .title-box end-->
  <div class="comment">
    <?php

    ?>
  </div>
</section><!-- .dashboard-content diagnositc-result-comment end-->