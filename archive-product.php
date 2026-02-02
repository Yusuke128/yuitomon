<?php
get_header();

echo woocommerce_breadcrumb();
?>

<section class="bd bd-dashed bd-noside bg-white section-padding section-margin product-list">
  <section class="container">
    <header class="woocommerce-products-header">
      <h1 class="woocommerce-products-header__title page-title">主要単元教材一覧</h1>
      <p class="woocommerce-products-header__content page-content">※単元別教材はAI分析やフィードバックのサービスはありません</p>
      <!-- .products-content end-->
    </header>
    <div class="woocommerce-notices-wrapper"></div>
    <section class="woocommerce columns-3">
      <ul class="products columns-3">
        <?php
        $exclude_slug = array('uncategorized', 'diagnostic');
        $exclude_ids = array();
        foreach ($exclude_slug as $slug) {
          $term = get_term_by('slug', $slug, 'product_cat');
          if ($term) {
            $exclude_ids[] = $term->term_id;
          }
        };
        $categories = get_terms(
          array(
            'taxonomy' => 'product_cat',
            'parent' => 0,
            'hide_empty' => false,
            'exclude' => $exclude_ids
          )
        );
        $i = 0;
        foreach ($categories as $count => $cat):
          $i++;
          $classes = 'product-category product';
          if ($i % 3 == 1) $classes .= " first";
          if ($i % 3 == 0) $classes .= " last";
        ?>
          <li class="<?php echo $classes; ?>">
            <a href="<?php echo get_term_link($cat); ?>">
              <?php
              $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
              $image = wp_get_attachment_url($thumbnail_id);
              ?>
              <img src="<?php echo $image ?>" alt="">
              <h2><?php echo $cat->name; ?></h2>
            </a>
          </li><!-- .product-category end-->
        <?php endforeach; ?>
      </ul><!-- .products end-->
    </section><!-- .woocommerce columns-3 end-->
  </section><!-- .container end-->
</section><!-- .bd bd-dashed bd-noside bg-white section-padding product-list end-->
<?php
get_sidebar();
get_footer();
?>