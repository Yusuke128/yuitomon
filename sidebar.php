<?php

/** ================================
 * 自動読み込みされるサイドバーの上書き
 * 実力診断テストカテゴリ(diagnostic) = 単元別TOP3の表示
 * アカウントページ = 実力診断テストテンプレート + 単元別TOP3 + 過去の実力診断テストテンプレート表示
 * その他カテゴリ = 実力診断テストテンプレート表示
 * ================================*/
if (is_account_page()) {
  get_template_part('template-parts/sidebar/diagnostic');
  get_template_part('template-parts/sidebarcategoryranking');
  get_template_part('template-parts/sidebar/older-diagnostic');
}
if (!(is_product_category('diagnostic') || (is_product() && has_term('diagnostic', 'product_cat')))) {
  get_template_part('template-parts/sidebar/diagnostic');
}
if (is_product() || is_product_category()) {
  get_template_part('template-parts/sidebar/categoryranking');
}
