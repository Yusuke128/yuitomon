<?php

/**
 * Template Name: FAQ
 * Template Post Type: page
 */
get_header();
?>
<?php
echo woocommerce_breadcrumb();
?>
<div class="container section-margin section-padding bg-white">
  <section class="title-box">
    <h1 class="title-main"><?php the_title(); ?></h1>
    <!-- .title-main end-->
    <p class="title-sub-title"></p>
    <!-- .title-sub-title end-->
  </section>
  <!-- .title-box end-->

  <?php
  $faq_query = new WP_Query(
    array(
      'post_type' => 'qa',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
    )
  );
  if ($faq_query->have_posts()) :
    while ($faq_query->have_posts()) : $faq_query->the_post();
  ?>
      <details class="question" name="<?php the_title(); ?>">
        <summary><?php the_title(); ?></summary>
        <div class="answer">
          <?php the_content(); ?>
        </div>
      </details><!-- .question end-->
  <?php
    endwhile;
  endif;
  wp_reset_postdata();
  ?>
</div><!-- .container section-margin section-padding bg-white end-->
<?php
get_sidebar();
get_footer()
?>