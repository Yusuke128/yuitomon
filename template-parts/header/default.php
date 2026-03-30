<nav class="nav-pc">
  <ul class="header-nav header-nav-pc" role="list">
    <li class="header-nav-list">
      <?php
      $diagnostic_query_head = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => 1,
        "orderby" => "date",
        'post_status'    => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => 'diagnostic',
          ),
        ),
      ));
      if ($diagnostic_query_head->have_posts()):
        while ($diagnostic_query_head->have_posts()): $diagnostic_query_head->the_post(); ?>
          <a href="<?php echo  get_permalink(); ?>" class="link">
            <img src="<?php echo get_template_directory_uri() ?>/img/header/test.png" alt="実力テスト" class="header-icon" />
            実力診断テスト
          </a>
          <!-- .link end-->
      <? endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </li>
    <!-- .header-nav-list end-->
    <li class="header-nav-list">
      <a href="<?php echo home_url('shop'); ?>" class="link">
        <img src="<?php echo get_template_directory_uri() ?>/img/header/prep.png" alt="単元別教材" class="header-icon" />
        単元別教材
      </a>
      <!-- .link end-->
    </li>
    <!-- .header-nav-list end-->
    <li class="header-nav-list">
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="link">
        <img src="<?php echo get_template_directory_uri() ?>/img/header/mypage.png" alt="マイページ" class="header-icon" />
        マイページ
      </a>
      <!-- .link end-->
    </li>
    <!-- .header-nav-list end-->
  </ul>
  <!-- .header-nav end-->
</nav>