<!doctype html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover" />

  <!-- SEO -->
  <meta name="description" content="<?php bloginfo('description') ?> " />
  <link rel="canonical" href="<?php echo esc_url(home_url(add_query_arg(null, null))); ?>">

  <!-- General -->
  <meta name="format-detection" content="telephone=no, email=no, address=no" />
  <meta name="theme-color" content="#80acc0" />
  <!-- favicon -->
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header header-origin bd bd-navy bd-bottom">
    <div class="container">
      <div class="title-box">
        <?php if (is_front_page()): ?>
          <h1 class="logo"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="ロゴ" class="logo" /></h1>
        <?php else: ?>
          <a href="<?php echo home_url() ?>" class="logo"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="ロゴ" class="logo" /></a>
        <?php endif; ?>
        <!-- .logo end-->
        <p class="title-box-sub-title">小学校受験対策教材</p>
        <!-- .title-box-sub-title end-->
      </div>
      <!-- .title_box end-->
      <nav class="sp nav-sp">
        <ul class="header-nav header-nav-sp" role="list">
          <li class="header-nav-list">
            <a href="<?php echo home_url('my-account'); ?>" class="link bg-navy">
              <span class="user-icon"></span>
              マイページ
            </a>
            <!-- .link end-->
          </li>
          <!-- .header-nav-list end-->
          <li class="header-nav-list">
            <button class="nav-toggle bg-navy">
              <div class="humberger">
                <span class="humberger-border"></span>
                <!-- .humbeger-border end-->
                <span class="humberger-border"></span>
                <!-- .humbeger-border end-->
                <span class="humberger-border"></span>
                <!-- .humbeger-border end-->
              </div>
              <!-- .humberger end-->
              <span class="menu-close">MENU</span>
              <span class="menu-open">閉じる</span>
            </button>
            <!-- .link end-->
          </li>
          <!-- .header-nav-list end-->
        </ul>
        <!-- .header-nav sp end-->
      </nav>
      <?php if (is_account_page()) : ?>
        <?php get_template_part('template-parts/header/mypage'); ?>
      <?php else : ?>
        <?php get_template_part('template-parts/header/default'); ?>
      <?php endif; ?>
    </div>
    <!-- .container end-->
  </header>