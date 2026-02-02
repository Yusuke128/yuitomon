<?php get_header(); ?>
<?php
global $product;
?>

<main>
  <!-- パンクズナビ -->
  <?php echo woocommerce_breadcrumb(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post();
      $tags = wc_get_product_tag_list(get_the_ID()); ?>
      <section class="product-list">
        <div class="container">
          <div class="woocommerce-notices-wrapper">
            <?php wc_print_notices(); ?>
          </div>

          <h1 class="product-title">
            <?php
            echo $tags;
            the_title(); ?></h1>
          <!-- .product_title end-->

          <div class="product type-product">
            <div class="image-gallery">
              <a
                href="#"
                class="woocommerce-product-gallery__trigger"
                aria-label="フルスクリーン画像ギャラリーを表示">
                <span aria-hidden="true">
                  <img
                    draggable="false"
                    role="img"
                    class="emoji"
                    alt="🔍"
                    src="https://s.w.org/images/core/emoji/17.0.2/svg/1f50d.svg" />
                </span>
              </a>
              <div class="swiper single-swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <?php
                    echo (get_the_post_thumbnail(get_the_ID(), 'full'));
                    ?>
                  </div><!-- .swiler-slide end-->
                  <?php
                  $image_gallery_ids = $product->get_gallery_image_ids();
                  foreach ($image_gallery_ids as $image_id) : ?>
                    <div class="swiper-slide">
                      <?php echo wp_get_attachment_image($image_id, 'full'); ?>
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
                      'thumbnail',
                    )); ?>
                  </div><!-- .swiper-slide end-->
                  <?php
                  $image_gallery_ids = $product->get_gallery_image_ids();
                  foreach ($image_gallery_ids as $image_id) : ?>
                    <div class="swiper-slide">
                      <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                    </div>
                  <?php endforeach;
                  ?>

                </div>
              </div>
            </div>
            <!-- .swiper single-swiper end-->
            <div class="entry-summary">
              <div class="bg-white radius section-padding">
                <h1 class="product-title entry-title">
                  <span class="tag"><?php echo $tags; ?></span>
                  <!-- .tag end-->
                  <?php the_title(); ?>
                </h1>
                <div class="woocommerce-product-details__short-description">
                  <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
                  <p>AI分析＆経験者の視点も加えたフィードバック付き！</p>
                  <p>ペーパーテストで頻出する問題を100問にまとめ、現在の実力を客観的に確認できます。</p>
                </div>

                <p class="price">
                  <span class="woocommerce-Price-amount amount">

                    <bdi>
                      <span class="">¥</span>
                      <?php
                      echo $product->get_price();
                      ?>
                    </bdi>
                    <span class="tax">税込</span>
                  </span>
                </p>

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


                <!-- .sample-movie end-->
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
              </div>

              <!-- .bg-white end-->
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
              </section>
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
          <section class="older-products bg-lightnavy radius section-padding">
            <div class="title-box">
              <h2 class="title-main">過去の実力診断テスト</h2>
              <!-- .title-main end-->
              <p class="title-subcontent">数多く実施するほど得意・苦手分野がより明らかに!</p>
              <!-- .title-subcontent end-->
            </div>
            <!-- .ttl-box end-->
            <ul class="card-list older-card-list" role="list">
              <?php
              $older_args = array(
                'post_type' => 'product',
                'posts_per_page' => 3,
                'order' => "DESC",
                "orderby" => "date",
                'tax_query' => array(
                  array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'diagnostic',
                  ),
                ),
              );
              $older_posts = new WP_Query($older_args);;
              if ($older_posts->have_posts()):
                while ($older_posts->have_posts()): $older_posts->the_post();
              ?>
                  <li>
                    <a href="<?php echo get_permalink(); ?>" class="card older-card bg-white radius section-padding" data-scale="false">
                      <div class="card-imgbox">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', ['class' => 'card-img older-img']); ?>
                      </div><!-- .card-imgbox end-->
                      <div class="card-content older-card-content">
                        <h4 class="card-title older-card-title"><?php echo get_the_date('Y年m月'); ?></h4>
                        <!-- .card-title .older-card-title end-->
                      </div>
                      <!-- .card-content older-card-content end-->
                    </a>
                    <!-- .card older-card end-->
                  </li>
              <?php
                endwhile;
              endif;
              ?>
            </ul>
            <!-- .card-list older-card-list end-->
            <a href="<?php echo home_url('/product-category/diagnostic') ?>" class="link btn btn-yellow">もっと見る</a>
          </section>
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