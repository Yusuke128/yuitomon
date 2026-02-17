<?php get_header(); ?>
<?php
global $product;
?>

<main>
  <!-- パンクズナビ -->
  <?php echo woocommerce_breadcrumb(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post();
      $tags = get_the_terms(get_the_ID(), 'product_tag');
      if ($tags && !is_wp_error($tags)) {
        foreach ($tags as $term) {
          $taglist = esc_html($term->name);
        }
      };
  ?>
      <section class="product-list">
        <div class="container">
          <div class="woocommerce-notices-wrapper">
            <?php wc_print_notices(); ?>
          </div>

          <h1 class="product-title">
            <?php if (!empty($taglist)) : ?>
              <span class="tag">
                <?php echo $taglist; ?>
              </span><!-- .tag end-->
            <?php endif;
            the_title(); ?>
          </h1>
          <!-- .product_title end-->

          <div class="product type-product">
            <div class="image-gallery">
              <div class="swiper single-swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <?php
                    echo (get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'swiper-img')));
                    ?>
                  </div><!-- .swiler-slide end-->
                  <?php
                  $image_gallery_ids = $product->get_gallery_image_ids();
                  foreach ($image_gallery_ids as $image_id) : ?>
                    <div class="swiper-slide">
                      <?php echo wp_get_attachment_image($image_id, 'full', array('class' => 'swiper-img')); ?>
                    </div>
                  <?php endforeach;
                  ?>
                </div>
              </div>
              <div class="swiper single-thumb-swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <?php
                    echo (get_the_post_thumbnail(
                      get_the_ID(),
                      'medium',
                      array('class' => 'swiper-img')
                    )); ?>
                  </div><!-- .swiper-slide end-->
                  <?php
                  $image_gallery_ids = $product->get_gallery_image_ids();
                  foreach ($image_gallery_ids as $image_id) : ?>
                    <div class="swiper-slide">
                      <?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'swiper-img')); ?>
                    </div>
                  <?php endforeach;
                  ?>
                </div>
                <div class="swiper-button">
                  <button class="single-swiper-arrow swiper-button-prev swiper-arrow single-thumb-prev">
                    <span class="material-symbols-outlined">keyboard_arrow_left</span>
                  </button>
                  <!-- .swiper-arrow swiper-prev end-->
                  <button class="single-swiper-arrow swiper-button-next swiper-arrow single-thumb-next">
                    <span class="material-symbols-outlined">keyboard_arrow_right</span>
                  </button>
                  <!-- .swiper-arrow swiper-next end-->
                </div>
                <!-- .swiper-button end-->
              </div>
            </div>
            <!-- .swiper single-swiper end-->
            <div class="entry-summary">
              <div class="bg-white radius section-padding">
                <h1 class="product-title entry-title">
                  <?php if (!empty($taglist)) : ?>
                    <span class="tag">
                      <?php echo $taglist; ?>
                    </span><!-- .tag end-->
                  <?php endif; ?>
                  <?php the_title(); ?>
                </h1>
                <?php if ($post->post_excerpt): ?>
                  <div class="woocommerce-product-details__short-description">
                    <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
                  </div>
                <?php endif; ?>
                <p class="price">
                  <?php echo $product->get_price_html(); ?>
                  <span class="tax">税込</span><!-- .tax end-->
                </p>
                <?php
                $sale_text = get_option('global_sale_text');
                if ($product->is_on_sale() && !empty($sale_text)): ?>
                  <span class="sale bg-red"> <?php echo esc_html($sale_text); ?></span><!-- .sale end-->
                <?php endif; ?>

                <div class="single-info">
                  <?php if (has_term('diagnostic', 'product_cat', $product->get_id())) :
                  ?>
                    <p>教材購入後、ダウンロードした教材を印刷し、テストを実施ください。</p>
                    <p>
                      フィードバックをさせていただくためには、テスト実施後の採点結果をマイページで教えて頂く必要があります。結果を受け取ってから翌日～１週間以内でマイページ上にフィードバックをお送りいたします。
                    </p>
                  <?php else: ?>
                    <p>教材購入後、ダウンロードした教材を印刷し、活用いただくことをお勧めいたします。</p>
                    <p>単元別教材は、フィードバックのサービスはございません。</p>
                  <?php endif; ?>
                </div>
                <form class="cart" method="post">
                  <input type="hidden" name="quantity" value="1">

                  <button
                    type="submit"
                    name="add-to-cart"
                    value="<?php echo esc_attr($product->get_id()); ?>"
                    class="single_add_to_cart_button btn btn-yellow">
                    購入する
                  </button>
                </form>
                <div class="product_meta">
                  <span class="sku_wrapper">
                    商品コード:
                    <span class="sku"> <?php echo wc_product_sku_enabled() ? $product->get_sku() : ''; ?></span>
                  </span>

                  <span class="posted_in">
                    カテゴリー:
                    <?php echo wc_get_product_category_list(get_the_ID()); ?>
                  </span>
                </div>
              </div> <!-- .bg-white end-->

              <section class="sample-movie bg-white radius section-padding">
                <div class="title-box">
                  <h3 class="title-main">問題音声(サンプル)</h3>
                  <!-- .title-main end-->
                </div>
                <!-- .title-box end-->
                <?php
                if (get_field('youtube_url')) {
                  echo wp_oembed_get(get_field('youtube_url'));
                } else {
                  echo '<p>動画準備中</p>';
                } ?>
              </section> <!-- .sample-movie end-->
            </div>
          </div>

          <article class="product-description container bg-white bd radius section-padding">
            <h2 class="title-main">教材説明</h2>
            <div class="product-content">
              <?php the_content(); ?>
            </div>
            <!-- .product-content end-->
          </article>
          <!-- .product-description bg-white bd radius section-padding end-->
          <?php include('older-diagnostic.php'); ?>

        </div>
      </section>
</main>
</div>

<?php
    endwhile;
  endif;
  get_sidebar();
  get_footer();
?>