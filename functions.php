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
  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');

  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'mytheme_setup');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
