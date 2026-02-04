<?php

/** ===============================
 * CSS,JS読み込み
 * ===============================*/
function terracelab_enqueue_assets()
{

  //cssを読み込む
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',  array(), false, 'all');
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css',  array(), false, 'all');
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css',  array(), false, 'all');
  wp_enqueue_style('google-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded', array(), false, 'all');
  wp_enqueue_style('google-fonts-noto-sans-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap', array(), null);
  wp_enqueue_style('google-fonts-m-plus-rounded-1c', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap', array(), null);
  wp_enqueue_style('google-fonts-zen-maru-gothic', 'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap', array(), null);


  // javasctipt読み込み
  wp_enqueue_script('fonts', 'https://kit.fontawesome.com/fc4b29f1b1.js', array(), null, true);
  wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('original_function', get_template_directory_uri() . '/js/functions.js', array('swiper', 'jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'terracelab_enqueue_assets');


// WooCommerce サポート
function mytheme_setup()
{
  add_theme_support('woocommerce');
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'mytheme_setup');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// 商品一覧・詳細関係なく価格非表示
add_filter('woocommerce_get_price_html', '__return_empty_string', 10, 2);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// 人気の単元別教材を取得する関数
function get_popular_product_categories($limit = 3)
{
  $cache_key = 'popular_product_categories_30days';
  $cached = get_transient($cache_key);

  if ($cached !== false) {
    return $cached;
  }

  $category_sales = [];

  $orders = wc_get_orders([
    'status'       => ['wc-processing', 'wc-completed'],
    'limit'        => -1,
    'date_created' => '>' . (time() - 30 * DAY_IN_SECONDS),
  ]);

  foreach ($orders as $order) {
    foreach ($order->get_items() as $item) {
      $product_id = $item->get_product_id();
      $qty        = $item->get_quantity();

      $terms = get_the_terms($product_id, 'product_cat');
      if (empty($terms) || is_wp_error($terms)) {
        continue;
      }

      foreach ($terms as $term) {
        // diagnosticカテゴリは除外
        if ($term->slug === 'diagnostic') {
          continue;
        }

        if (!isset($category_sales[$term->term_id])) {
          $category_sales[$term->term_id] = [
            'term'  => $term,
            'count' => 0,
          ];
        }

        $category_sales[$term->term_id]['count'] += $qty;
      }
    }
  }

  // 販売数で降順ソート
  usort($category_sales, function ($a, $b) {
    return $b['count'] <=> $a['count'];
  });

  $result = array_slice($category_sales, 0, $limit);

  // 6時間キャッシュ
  set_transient($cache_key, $result, 6 * HOUR_IN_SECONDS);

  return $result;
}
// カテゴリ画像の取得
function get_product_category_image_url($term_id)
{
  $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);

  if ($thumbnail_id) {
    return wp_get_attachment_url($thumbnail_id);
  }

  // フォールバック画像
  return get_template_directory_uri() . '/assets/img/noimage.png';
}

// パンくずリストのカスタマイズ
add_filter('woocommerce_breadcrumb_defaults', function ($defaults) {
  $defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb"><section class="container">';
  $defaults['wrap_after']  = '</section></nav>';
  return $defaults;
});

// 住所フィールドの削除
add_filter('woocommerce_default_address_fields', function ($fields) {
  unset($fields['address_1']);
  unset($fields['address_2']);
  unset($fields['city']);
  unset($fields['postcode']);
  unset($fields['country']);
  return $fields;
});


/***
 * 未装飾ページのとりあえずコンテナ追加
 */
add_filter('the_content', function ($content) {
  if (is_cart() || is_checkout() || is_account_page()) {
    return '<div class="container section-padding section-margin bg-white">' . $content . '</div>';
  }
  return $content;
}, 9);
