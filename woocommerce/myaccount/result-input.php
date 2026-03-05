<?php
defined('ABSPATH') || exit;

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : '';

?>
<section class="title-box">
  <h2 class="title-main">テスト結果入力</h2>
  <!-- .title-main end-->
</section>
<!-- .title-box end-->

<?php
echo do_shortcode('[forminator_form id="156" product_id="' . $product_id . '"]');
?>