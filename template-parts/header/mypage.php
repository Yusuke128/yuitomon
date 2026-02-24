<nav class="nav-pc nav-mypage">
  <ul class="header-nav header-nav-pc" role="list">
    <li class="header-nav-list">
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
    <li class="header-nav-list sp"><a href="" class="link end-point">エンドポイント一覧</a><!-- .link end-point end--></li><!-- .header-nav-list end-->
  </ul>
</nav>