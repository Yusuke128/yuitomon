<?php
$older_args = array(
  'post_type' => 'product',
  'posts_per_page' => 3,
  'offset' => 1, // 最新の2件を除外
  'order' => "DESC",
  "orderby" => "date",
  'tax_query' => array(
    array(
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => 'diagnostic',
    ),
  ),
);
$older_posts = new WP_Query($older_args);
?>
<section class="older-products bg-lightnavy radius section-padding<?php echo (is_account_page()) ? ' container' : ''; ?>">
  <div class="title-box">
    <h2 class="title-main">過去の実力診断テスト</h2>
    <!-- .title-main end-->
    <p class="title-subcontent">数多く実施するほど得意・苦手分野がより明らかに!</p>
    <!-- .title-subcontent end-->
  </div>
  <!-- .ttl-box end-->
  <ul class="card-list older-card-list" role="list">
    <?php
    if ($older_posts->have_posts()):
      while ($older_posts->have_posts()): $older_posts->the_post();
    ?>
        <li>
          <a href="<?php echo get_permalink(); ?>" class="card older-card bg-white radius section-padding" data-scale="false">
            <!-- <div class="card-imgbox"> -->
            <?php //echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', ['class' => 'card-img older-img']); 
            ?>
            <!-- </div> -->
            <!-- .card-imgbox end-->
            <div class="card-content older-card-content">
              <h4 class="card-title older-card-title"><?php echo get_the_date('Y年m月'); ?></h4>
              <!-- .card-title .older-card-title end-->
            </div>
            <!-- .card-content older-card-content end-->
          </a>
          <!-- .card older-card end-->
        </li>
      <?php
      endwhile;
    else:
      ?>
      <li>過去の実力診断テストはありません。</li>
    <?php
    endif;
    wp_reset_postdata();
    ?>
  </ul>
  <!-- .card-list older-card-list end-->
  <a href="<?php echo home_url('/product-category/diagnostic') ?>" class="link btn btn-yellow">もっと見る</a>
</section>