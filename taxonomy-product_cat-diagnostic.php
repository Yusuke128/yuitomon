<?php
get_header();
?>

<?php
echo woocommerce_breadcrumb();
?>

<section class="diagnostic container bg-lightnavy product-list radius section-padding">
  <div class="section-padding">
    <header class="woocommerce-products-header">
      <h1 class="woocommerce-products-header__title page-title">
        <?php
        echo single_cat_title();
        ?>
      </h1>
      <p class="woocommerce-products-header__content page-content">
        <?php echo category_description(); ?>
      </p>
      <!-- .products-content end-->
    </header>
    <div class="woocommerce-notices-wrapper"></div>

    <div class="section-padding">
      <?php
      $term = get_queried_object();
      echo do_shortcode('[products columns="3"  category="' . $term->slug . '" paginate="true"]');
      ?>
    </div><!-- .section-padding end-->
  </div><!-- .section-padding end-->
</section><!-- .diagnostic container bg-lightnavy product-list radius section-padding end-->
<?php
get_sidebar();
get_footer();
?>