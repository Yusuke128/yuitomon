<?php
get_header();
?>

<?php
echo woocommerce_breadcrumb();
?>

<section class="bd bd-dashed bd-noside bg-white section-padding section-margin product-list">
  <section class="container">
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

    <?php
    $term = get_queried_object();
    echo do_shortcode('[products columns="3"  category="' . $term->slug . '" paginate="true"]');
    ?>

  </section><!-- .container end-->
</section><!-- .bd bd-dashed bd-noside bg-white section-padding product-list end-->
<?php
get_sidebar();
get_footer();
?>