<?php

/** ================================
 * 自動読み込みされるサイドバーの上書き
 * 実力診断テストカテゴリ(diagnostic) = 単元別TOP3の表示
 * その他カテゴリ = 実力診断テストテンプレート表示
 * ================================*/

if (
  !(is_product_category('diagnostic') || (is_product() && has_term('diagnostic', 'product_cat')))
) {
  require get_template_directory() . '/footer-diagnostic.php';
  return;
}
if (is_product() || is_product_category()) {
  require get_template_directory() . '/footer-categoryranking.php';
  return;
}
