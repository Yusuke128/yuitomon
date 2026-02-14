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
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    $category_image = wp_get_attachment_url($thumbnail_id);
    $category_products_args = array(
      'post_type' => 'product',
      'posts_per_page' => 12,
      'paged' => $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_cat',
          'field'    => 'slug',
          'terms'    => $term->slug,
        ),
      ),
    );
    $loop = new WP_Query($category_products_args);

    if ($loop->have_posts()):
    ?>
      <ul class="card-list product-card-list" role="list">
        <?php while ($loop->have_posts()): $loop->the_post();
        ?>
          <li>
            <a href="<?php echo get_permalink(); ?>" class="card product-card" data-scale="false">
              <?php if (has_post_thumbnail()): ?>
                <div class=" card-imgbox product-card-imgbox radius">
                  <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($term->name); ?>" class="card-img product-card-img" />
                </div><!-- .card-imgbox .product-card-imgbox end-->
              <?php endif; ?>
              <div class="card-content product-card-content">
                <h2 class="card-title product-card-title"><?php the_title(); ?></h2><!-- .card-title .product-card-title end-->
                <p class="card-text product-card-text"><?php woocommerce_template_loop_price(); ?></p><!-- .card-text product-card-text end-->
              </div><!-- .card-content product-card-content end-->
            </a>
          </li><!-- .card product-card end-->
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </ul><!-- .card-list product-card-list end-->
    <?php
    endif;
    // echo do_shortcode('[products columns="3"  category="' . $term->slug . '" paginate="true"]');
    ?>
    <div class="pagination">
      <?php
      echo paginate_links([
        'total' => $loop->max_num_pages,
        'current' => $paged,
      ]);
      ?>
    </div><!-- .pagination end-->
  </section><!-- .container end-->
</section><!-- .bd bd-dashed bd-noside bg-white section-padding product-list end-->
<?php
get_sidebar();
get_footer();
?>