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
      add_filter('woocommerce_get_price_html', '__return_empty_string', 10, 2);

      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

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
        <ul class="card-list diagnostic-card-list" role="list">
          <?php while ($loop->have_posts()): $loop->the_post(); ?>
            <li class="bg-white radius">
              <a href="<?php echo get_permalink(); ?>" class="card  diagnostic-card section-padding" data-scale="false">
                <div class="card-content diagnostic-card-content">
                  <h2 class="card-title diagnostic-card-title"><?php echo get_the_date('Y年m月'); ?></h2><!-- .card-title  end-->
                  <!-- <p class="card-text diagnostic-card-text"><?php woocommerce_template_loop_price(); ?></p>.card-text  end -->
                </div><!-- .card-content  end-->
              </a>
            </li><!-- .card  end-->
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        </ul><!-- .card-list end-->
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
      ?>
    </div><!-- .section-padding end-->
  </div><!-- .section-padding end-->
</section><!-- .diagnostic container bg-lightnavy product-list radius section-padding end-->
<?php
get_sidebar();
get_footer();
?>