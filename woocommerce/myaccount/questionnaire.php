<?php
defined('ABSPATH') || exit;
?>
<section class="dashboard-content questionnaire section-padding bd bd-navy radius bg-white">
  <section class="title-box">
    <h2 class="title-main">アンケート入力</h2>
    <!-- .title-main end-->
  </section>
  <!-- .title-box end-->

  <?php
  echo do_shortcode('[forminator_form id="159"]');
  ?>
</section><!-- .diagnostic-history section-padding bd bd-navy radius bg-white end-->