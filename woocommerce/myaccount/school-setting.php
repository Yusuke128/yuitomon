<?php
defined('ABSPATH') || exit;
?>
<section class="dashboard-content school-setting section-padding bg-white bd bd-navy radius">
  <section class="title-box">
    <h2 class="title-main">志望校設定</h2>
    <!-- .title-main end-->
  </section>
  <!-- .title-box end-->

  <?php
  echo do_shortcode('[forminator_form id="158"]');
  ?>
</section><!-- .section-padding bg-white end-->