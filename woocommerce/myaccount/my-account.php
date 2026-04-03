<?php

/**
 * My Account Page
 * マイアカウントページのテンプレート
 * Version 1.0.0
 */
global $wp;

$endpoint_slug = 'dashboard';
foreach (get_myaccount_menu_config() as $slug => $data) {
  if (isset($wp->query_vars[$slug])) {
    $endpoint_slug = $slug;
    break;
  }
}
$classes = ['woocommerce-MyAccount-content'];

if (is_wc_endpoint_url()) {
  $classes = array_merge($classes, [
    'dashboard-content',
    'section-padding',
    'bd',
    'bd-w5',
    'bd-navy',
    'radius',
    'bg-white',
  ]);
}
?>

<div class="woocommerce-MyAccount-wrapper container section-margin section-padding">
  <?php do_action('woocommerce_account_navigation'); ?>

  <div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
    <?php
    // echo '<pre>';
    // global $wp;
    // print_r($wp->query_vars);
    // echo '</pre>';
    // var_dump(is_wc_endpoint_url());
    do_action('woocommerce_account_content'); ?>
  </div>
</div>