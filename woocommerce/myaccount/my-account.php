<?php
$current_endpoint = WC()->query->get_current_endpoint();
$endpoint_slug    = $current_endpoint ? $current_endpoint : 'dashboard';

$classes = ['woocommerce-MyAccount-content'];

if ($endpoint_slug !== 'dashboard') {
  $classes = array_merge($classes, [
    'dashboard-content',
    'section-padding',
    'bd',
    'bd-navy',
    'radius',
    'bg-white',
    'endpoint-' . sanitize_html_class($endpoint_slug),
  ]);
}
?>

<div class="myaccount-wrapper">
  <?php do_action('woocommerce_account_navigation'); ?>

  <div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
    <?php do_action('woocommerce_account_content'); ?>
  </div>
</div>