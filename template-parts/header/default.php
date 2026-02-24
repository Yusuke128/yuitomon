<nav class="nav-pc">
  <ul class="header-nav header-nav-pc" role="list">
    <li class="header-nav-list">
      <a href="<?php echo home_url('product-category/diagnostic') ?>" class="link">
        <img src="<?php echo get_template_directory_uri() ?>/img/header/test.png" alt="実力テスト" class="header-icon" />
        実力診断テスト
      </a>
      <!-- .link end-->
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