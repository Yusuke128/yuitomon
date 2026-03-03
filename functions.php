<?php

/** ===============================
 ** CSS,JS読み込み
 ** =============================== */
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
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), null, true);
  wp_enqueue_script('original_function', get_template_directory_uri() . '/js/functions.js', array('swiper', 'jquery'), null, true);
  if (is_account_page()) {
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
    wp_enqueue_script('diagnostic_result_chart', get_template_directory_uri() . '/js/diagnostic_result_chart.js', array('chart-js'), null, true);
  }
}
add_action('wp_enqueue_scripts', 'terracelab_enqueue_assets');

/** ===============================
 ** WooCommerce サポート
 ** =============================== */
function mytheme_setup()
{
  add_theme_support('woocommerce');
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'mytheme_setup');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

/** =============================
 ** WooCommerce カスタマイズ
 ** 商品一覧・詳細関係なく価格非表示
 ** ============================= */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/** ============================= 
 ** 商品一覧、詳細ページカスタマイズ
 ** パンくずリストのカスタマイズ
 **  ============================= */
add_filter(
  'woocommerce_breadcrumb_defaults',
  function ($defaults) {
    $defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb"><section class="container">';
    $defaults['wrap_after']  = '</section></nav>';
    return $defaults;
  }
);

/** ===============================
 ** カート、チェックアウト,マイページカスタマイズ
 ** 住所入力の非表示
 **  =============================== */
add_filter(
  'woocommerce_default_address_fields',
  function ($fields) {
    unset($fields['address_1']);
    unset($fields['address_2']);
    unset($fields['city']);
    unset($fields['postcode']);
    unset($fields['country']);
    return $fields;
  }
);

/** =============================
 ** 人気の単元別教材を取得する関数
 ** ============================= */
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

/** ===============================
 ** カテゴリ画像の取得
 ** =============================== */
function get_product_category_image_url($term_id)
{
  $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
  if ($thumbnail_id) {
    return wp_get_attachment_url($thumbnail_id);
  }
  // フォールバック画像
  return get_template_directory_uri() . '/assets/img/noimage.png';
}

/** ===============================
 ** 未装飾ページのとりあえずコンテナ追加
 ** =============================== */
add_filter('the_content', function ($content) {
  if (is_cart() || is_checkout() || is_account_page()) {
    return '<div class="container section-padding section-margin">' . $content . '</div>';
  }
  return $content;
}, 9);

/** ===============================
 ** 機能カスタマイズ
 ** 1. Forminator で入力されたデータをカスタム投稿タイプに保存
 ** =============================== */
add_action(
  'forminator_custom_form_after_handle_submit',
  function ($form_id, $response) {
    error_log('HANDLE SUBMIT OK : ' . $form_id);
  },
  10,
  2
);

/** ===============================
 ** 機能カスタマイズ
 ** セール商品文言の編集を管理画面から可能にする
 ** =============================== */
function mytheme_register_sale_setting()
{
  register_setting('general', 'global_sale_text');
  add_settings_field(
    'global_sale_text',
    'セール時表示テキスト',
    function () {
      $value = get_option('global_sale_text', '今ならお得');
      echo '<input type="text" name="global_sale_text" value="' . esc_attr($value) . '" class="regular-text">';
      echo '<p class="description">セール価格設定時に表示されるテキストです。空欄で非表示になります。</p>';
    },
    'general'
  );
}
add_action('admin_init', 'mytheme_register_sale_setting');
/** ===============================
 * 機能カスタマイズ
 * パンクズリストでオリジナルエンドポイントも出力する
 * =============================== */
add_filter('woocommerce_get_breadcrumb', function ($crumbs) {

  if (!is_account_page()) return $crumbs;

  global $wp;
  $config = get_myaccount_menu_config();

  foreach ($config as $slug => $data) {

    if (isset($wp->query_vars[$slug])) {

      // WooCommerce標準endpointかどうか判定
      $wc_endpoints = array_keys(WC()->query->get_query_vars());

      if (in_array($slug, $wc_endpoints)) {
        // 標準 → 上書き
        $crumbs[count($crumbs) - 1][0] = $data['label'];
      } else {
        // カスタム → 追加
        $crumbs[] = [$data['label'], ''];
      }

      break;
    }
  }

  return $crumbs;
});

/** ===============================
 * マイページカスタマイズ
 * ダッシュボード差し替え
 * =============================== */
remove_action('woocommerce_account_dashboard', 'woocommerce_account_dashboard');
add_action('woocommerce_account_dashboard', 'custom_dashboard');
function custom_dashboard()
{
  get_template_part('template-parts/mypage/dashboard');
}
/**　===============================
 * マイページカスタマイズ
 * カスタムエンドポイント管理
 * =============================== */
function get_myaccount_menu_config()
{
  return [
    'dashboard'          => ['label' => 'ホーム',                 'template' => null],
    'diagnostic-history' => ['label' => '過去の実力診断テスト結果', 'template' => 'diagnostic-history'],
    'orders'             => ['label' => '購入履歴',               'template' => null],
    'result-input'       => ['label' => '結果入力',               'template' => 'result-input'],
    'school-setting'     => ['label' => '志望校設定',             'template' => 'school-setting'],
    'questionnaire'      => ['label' => 'アンケート',             'template' => 'questionnaire'],
    'payment-methods'    => ['label' => '決済設定',               'template' => null],
    'edit-account'       => ['label' => 'アカウント設定',         'template' => null],
    'customer-logout'    => ['label' => 'ログアウト',             'template' => null],
  ];
}

/** ===============================
 * マイページカスタマイズ
 * ナビゲーションメニューのカスタマイズ
 *  =============================== */
add_filter('woocommerce_account_menu_items', function ($items) {

  $config = get_myaccount_menu_config();
  $new_items = [];

  foreach ($config as $slug => $data) {
    $new_items[$slug] = $data['label'];
  }

  return $new_items;
});
/** ===============================
 * マイページカスタマイズ
 * カスタムエンドポイント管理,テンプレートの割り当て
 * =============================== */
add_action('init', function () {

  foreach (get_myaccount_menu_config() as $slug => $data) {

    if (!empty($data['template'])) {

      add_rewrite_endpoint($slug, EP_ROOT | EP_PAGES);

      add_action("woocommerce_account_{$slug}_endpoint", function () use ($data) {
        wc_get_template("myaccount/{$data['template']}.php");
      });
    }
  }
});
