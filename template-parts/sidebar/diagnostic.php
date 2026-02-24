<section class="diagnostic 
<?php
echo (is_front_page() || is_home()) ? 'kv bd bd-navy bd-bottom bg-white' : 'bg-lightnavy section-padding';
?>">
  <div class="container">
    <?php
    if (!(is_front_page() || is_home())): ?>
      <div class="title-box">
        <h2 class="title-main">実力診断テスト</h2><!-- .title-main end-->
        <p class="title-subcontent">得意・苦手分野が明らかにしよう！</p><!-- .title-subcontent end-->
        <p class="title-subcontent">AI分析や体験者の視点を加えたフィードバック付き!</p><!-- .title-subcontent end-->
      </div><!-- .title-box end-->
    <?php endif; ?>
    <div class="flex-box">
      <div class="diagnostic-imgbox">
        <img src="<?php echo get_template_directory_uri() ?>/img/front-page/diagnostic.png" alt="TOP画像" class="diagnostic-img" />
      </div>
      <!-- .diagnostic-imgbox end-->
      <article class="diagnostic-textarea">
        <div class="diagnostic-content bd bd-navy radius bd-w5 bg-white section-padding">
          <?php
          $diagnostic_query = new WP_Query(array(
            'post_type' => 'product',
            'posts_per_page' => 1,
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
              <p class="diagnostic-title"><?php echo get_the_date('Y年m月'); ?></p>
              <!-- .diagnostic-title end-->
              <div class="diagnostic-text">
                <p>学力診断テスト実施中</p>
                <?php echo apply_filters('woocommerce_short_description', $diagnostic_query->get_the_description()); ?>
              </div>
              <!-- .diagnostic-text end-->
            <?php
            endwhile;
          else:
            ?>
            <p class="diagnostic-title">2025年1月</p>
            <!-- .diagnostic-title end-->
            <p class="diagnostic-text">学力診断テスト準備中</p>
            <!-- .diagnostic-text end-->
          <?php
          endif;
          ?>
        </div>
        <!-- .diagnostic-content end-->
        <a href="<?php echo $diagnostic_query->have_posts() ? get_permalink() : ''; ?>" class="link diagnostic-link btn btn-yellow">実力診断テストの詳細を見る</a>
        <!-- .link diagnostic-link end-->
        <?php
        wp_reset_postdata();
        ?>
      </article><!-- .diagnostic-textarea end-->
    </div><!-- .flex-box end-->
  </div><!-- .container end-->
</section>
<!-- .diagnostic end-->