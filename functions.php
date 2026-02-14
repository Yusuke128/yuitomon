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

  if (is_account_page()) {
    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
    wp_enqueue_script('diagnostic_result_chart', get_template_directory_uri() . '/js/diagnostic_result_chart.js', array('chartjs'), null, true);
  }
}
add_action('wp_enqueue_scripts', 'terracelab_enqueue_assets');

/** ===============================
 * 管理ページの時のみのJS読み込み
 * =============================== */
add_action('admin_enqueue_scripts', function ($hook) {
  global $post;
  if (!isset($post) || $post->post_type !== 'diagnostic_result') return;
  wp_enqueue_script('diagnostic-calc', get_template_directory_uri() . '/js/diagnostic_result_calc.js', array('jquery'), null, true);
});

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

/** =============================
 * WooCommerce カスタマイズ
 * 商品一覧・詳細関係なく価格非表示
 * ============================= */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/** ============================= 
 * 商品一覧、詳細ページカスタマイズ
 * パンくずリストのカスタマイズ
 * ============================= */
add_filter('woocommerce_breadcrumb_defaults', function ($defaults) {
  $defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb"><section class="container">';
  $defaults['wrap_after']  = '</section></nav>';
  return $defaults;
});

/** ===============================
 * カート、チェックアウト,マイページカスタマイズ
 * 住所入力の非表示
 * =============================== */

add_filter('woocommerce_default_address_fields', function ($fields) {
  unset($fields['address_1']);
  unset($fields['address_2']);
  unset($fields['city']);
  unset($fields['postcode']);
  unset($fields['country']);
  return $fields;
});

/** =============================
 *  人気の単元別教材を取得する関数
 *  ============================= */
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

/***
 * 未装飾ページのとりあえずコンテナ追加
 */
add_filter('the_content', function ($content) {
  if (is_cart() || is_checkout() || is_account_page()) {
    return '<div class="container section-padding section-margin bg-white">' . $content . '</div>';
  }
  return $content;
}, 9);
/** ===============================
 * 機能カスタマイズ
 * 1. Forminator で入力されたデータをカスタム投稿タイプに保存
 * =============================== */

add_action(
  'forminator_custom_form_after_handle_submit',
  function ($form_id, $response) {

    error_log('HANDLE SUBMIT OK : ' . $form_id);
  },
  10,
  2
);

add_action(
  'forminator_form_entry_saved',
  function ($entry_id, $form_id, $entry_model) {

    error_log('ENTRY SAVED HOOK OK');

    if ($form_id != 203) return;

    $user_id = get_current_user_id();

    $post_id = wp_insert_post([
      'post_type'   => 'diagnostic_result',
      'post_status' => 'publish',
      'post_title'  => 'テスト結果 - ' . current_time('Y-m-d H:i'),
      'post_author' => $user_id,
    ]);

    error_log('POST CREATED=' . $post_id);
  },
  10,
  3
);


// add_action('forminator_form_entry_saved', 'forminator_to_custompost', 10, 2);
// function forminator_to_custompost($entry_id, $form_id)
// {
//   $target_form_id = 203;
//   if ($form_id != $target_form_id) return;

//   $entry = new Forminator_Form_Entry_Model($entry_id);
//   $fields = $entry->meta_data;
//   $user_id = get_current_user_id();
//   $test_id = ''; // テストID取得

//   $post_id = wp_insert_post([
//     'post_type'   => 'diagnostic_result',
//     'post_status' => 'publish',
//     'post_title'  => 'テスト結果 - ' . current_time('Y-m-d H:i'),
//     'post_author' => $user_id,
//   ]);

//   // フォームのフィールドからtest_idを取得
//   foreach ($fields as $field) {
//     if ($field['name'] === 'test_id') {
//       $test_id = $field['value'];
//       break;
//     }
//   }

//   // Forminator回答を問No付きで整形
//   $answers_data = [];
//   foreach ($fields as $i => $field) {
//     if (!empty($field['name'])) {
//       $answers_data[] = [
//         'question_no'    => $i + 1,
//         'user_answer'    => $field['value'],
//         'corrent_answer' => '',    // 後で自動採点するならここで計算
//         'subject'        => '',    // 後で科目マッピング
//         'score'          => 0,     // 後で採点
//       ];
//     }
//   }
//   // テストIDをメタから取得する場合
//   $product_id = $test_id;
//   $product = wc_get_product($product_id);
//   $test_name = $product ? $product->get_name() : '';


//   update_field('test_name', $test_name, $post_id);
//   // 繰り返しフィールドに保存  
//   update_field('diagnostic_answers', $answers_data, $post_id);
//   // 管理用メタ
//   update_post_meta($post_id, 'user_id', $user_id);
//   update_post_meta($post_id, 'test_id', $test_id);
//   update_post_meta($post_id, 'form_entry_id', $entry_id);
// }
/** ===============================
 * 機能カスタマイズ
 * 
 * =============================== */
