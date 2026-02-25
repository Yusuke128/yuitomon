<nav class="nav-pc nav-mypage">
  <ul class="header-nav header-nav-pc" role="list">
    <li class="header-nav-list pc">
      <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="link link-mypage bd bd-w5 bd-lightnavy radius">
        <img src="<?php echo get_template_directory_uri() ?>/img/header/mypage.png" class="header-icon" />
        <?php
        if (is_user_logged_in()) {
          $current_user = wp_get_current_user();
          echo esc_html($current_user->display_name) . 'さん マイページ';
        } else {
          echo 'マイページ';
        }
        ?>
      </a>
    </li>
    <?php $menu_items = wc_get_account_menu_items();
    foreach ($menu_items as $endpoint => $label): ?>
      <li class="header-nav-list sp nav-sp">
        <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="link link-mypage">
          <?php echo esc_html($label); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>