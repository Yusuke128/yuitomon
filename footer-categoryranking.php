<section class="category-ranking bd bd-dashed bd-noside bg-white section-padding">
  <div class="container">
    <div class="title-box">
      <h2 class="title-main">人気の単元別教材</h2>
      <!-- .title-main end-->
      <p class="title-subcontent">苦手分野が見つかったら単元別で対策！</p>
      <!-- .title-subcontent end-->
    </div>
    <!-- .title-box end-->

    <ul class="card-list ranking-card-list" role="list">
      <?php
      $popular_categories = get_popular_product_categories(3);
      if (!empty($popular_categories)):
        foreach ($popular_categories as $category_data):
          $term = $category_data['term'];
          $img = get_product_category_image_url($term->term_id);
      ?>
          <li>
            <a href="<?php echo esc_url(get_term_link($term)); ?>" class="card ranking-card bd radius" data-scale="false">
              <div class="card-imgbox ranking-card-imgbox">
                <img src="<?php echo esc_url($img) ?>" alt="<?php echo esc_attr($term->name) ?>" class="card-img ranking-card-img" />
              </div>
              <!-- .card-imgbox .ranking-card-imgbox end-->
              <div class="card-content ranking-card-content">
                <h3 class="card-title ranking-card-title"><?php echo esc_html($term->name); ?></h3>
                <!-- .card-title .rankin-card-title end-->
              </div>
              <!-- .card-content ranking-card-content end-->
            </a>
            <!-- .card ranking-card end-->
          </li>
        <?php endforeach; ?>
    </ul>
  <?php else:  ?>
    <li>
      <div class="card-content ranking-card-content">
        <h3 class="card-title ranking-card-title">現在集計中です</h3>
        <!-- .card-title .ranking-card-title end-->
      </div>
      <!-- .card-content ranking-card-content end-->
      </a>
      <!-- .card ranking-card end-->
    </li>

    </ul>
    <!-- .card-list rankin-card-list end-->
  <?php endif; ?>
  <a href="<?php echo home_url('shop'); ?>" class="btn btn-yellow">もっと見る</a>
  <!-- .btn btn-yellow end-->
  </div>
  <!-- .container end-->
</section>
<!-- .category-ranking end-->