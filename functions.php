<?php

/** ===============================
 * 子テーマのCSS,JS読み込み
 * ===============================*/
function astra_child_enqueue_assets()
{
  // 親テーマのCSS
  wp_enqueue_style(
    'astra-parent-style',
    get_template_directory_uri() . '/style.css'
  );

  // 子テーマのCSS
  //cssを読み込む
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',  array(), false, 'all');
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.min.css',  array(), false, 'all');
  wp_enqueue_style('google-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded', array(), false, 'all');
  wp_enqueue_style('google-fonts-noto_sans_jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array(), false, 'all');
  wp_enqueue_style('google-fonts-Shippori_Mincho', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&display=swap', array(), false, 'all');
  wp_enqueue_style('google-fonts-Noto_Serif_JP', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap', array(), false, 'all');


  // javasctipt読み込み
  wp_enqueue_script('fonts', 'https://kit.fontawesome.com/fc4b29f1b1.js', array(), false, true);
  wp_enqueue_script('JQuery', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true);
  wp_enqueue_script('original_function', get_template_directory_uri() . '/js/function.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_assets');


// WooCommerce サポート
function mytheme_setup()
{
  add_theme_support('woocommerce');
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');

  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'mytheme_setup');
