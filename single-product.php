<?php get_header(); ?>
<?php
global $product;
?>

<main>
  <!-- パンクズナビ -->
  <?php echo woocommerce_breadcrumb(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="product-list">
        <div class="container">
          <div class="woocommerce-notices-wrapper"></div>

          <h1 class="product-title"><?php the_title(); ?></h1>
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
                  <?php
                  echo (get_the_post_thumbnail(
                    get_the_ID(),
                    'full',
                    ['class' => 'swiper-slide']
                  ));
                  ?>
                </div>
              </div>
              <div class="swiper single-thumb-swiper">
                <div class="swiper-wrapper">
                  <?php
                  echo (get_the_post_thumbnail(
                    get_the_ID(),
                    'thumbnail',
                    ['class' => 'swiper-slide']
                  ));
                  ?>
                  <div class="swiper-slide">
                    <img src="img/category-img/calligraphy.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/common.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/language.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/quantity.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/reasoning.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/shapes.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/talk.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/understand.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="img/category-img/vision.png" />
                  </div>
                </div>
              </div>
            </div>
            <!-- .swiper single-swiper end-->
            <div class="entry-summary">
              <div class="bg-white radius section-padding">
                <h1 class="product-title entry-title">
                  <span class="tag">【筑波大学付属小学校編】</span>
                  <!-- .tag end-->
                  お得な22科目:学校別ばっちりパック!全問音声付!
                </h1>
                <div class="woocommerce-product-details__short-description">
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
                <!-- <div class="product_meta">
                    <span class="sku_wrapper">
                      商品コード:
                      <span class="sku">woo-fashion-shirt</span>
                    </span>

                    <span class="posted_in">
                      カテゴリー:
                      <a href="http://dev-site.local/product-category/common/" rel="tag">常識</a>
                    </span>
                  </div> -->
              </div>

              <!-- .bg-white end-->
              <section class="sample-movie bg-white radius section-padding">
                <div class="title-box">
                  <h3 class="title-main">問題音声(サンプル)</h3>
                  <!-- .title-main end-->
                </div>
                <!-- .title-box end-->
                <iframe
                  src="https://www.youtube.com/embed/UVkN3bbDvbU?si=FyLuQjhRjlXAL24S&amp;controls=0"
                  title="YouTube video player"
                  frameborder="0"
                  allow="
                      accelerometer;
                      autoplay;
                      clipboard-write;
                      encrypted-media;
                      gyroscope;
                      picture-in-picture;
                      web-share;
                    "
                  referrerpolicy="strict-origin-when-cross-origin"
                  allowfullscreen></iframe>
              </section>
            </div>
          </div>

          <article class="product-description container bg-white bd radius section-padding">
            <h2 class="title-main">教材説明</h2>
            <div class="product-content">
              <?php the_content(); ?>
              <p>
                音声付き・すぐ始められる】【筑波大学附属小学校編】お得な22科目：学校別ばっちりパック！全問音声付き！
              </p>
              <p>
                こちらの商品は、頻出35科目セットの中から、過去の出題傾向を参考に「筑波大学附属小学校」に関連したプリントをセットにしたパッケージ商品です。
              </p>
              <p>筑波大学附属小学校専用に各プリントの中から構成した読み上げ音声付き10問模試付きです。</p>
              <p>目的：年長〜直前期の理解度チェックと弱点補強に最適</p>
              <p>サンプル音声：YouTube再生リストで確認できます</p>
              <p>今すぐはじめられる（ダウンロード商品）</p>

              <p>※購入後すぐに ZIPをDL → 解凍 → PDF印刷 → QRで音声再生</p>

              <p></p>
              <p>■このセットで身につくこと</p>
              <ul>
                <li>頻出科目を広く・ムラなくカバー</li>
                <li>音声読み上げで保護者の負担を最小化／お子さまは自走学習しやすい</li>
                <li>日々の小テスト感覚で理解度の差が見える</li>
              </ul>
              <p></p>
              <p></p>
              <p>パッケージに含まれるのは、以下の科目のプリントです：</p>
              <p>筑波大学附属小学校専用10問模試（問題10ページ）</p>
              <p></p>
              <p>【図形系】</p>
              <p>サイコロの展開（問題20ページ）</p>
              <p>鏡問題・鏡図形（問題20ページ）</p>
              <p>四方観察・見え方の推理（問題20ページ）</p>
              <p>回転図形（問題20ページ）</p>
              <p>重ね図形（問題20ページ）</p>
              <p>マス目模写（問題20ページ）</p>
              <p>同図形発見（問題20ページ）</p>
              <p>置き換え（問題20ページ）</p>
              <p>折り紙の展開図（問題20ページ）</p>
              <p>三角パズル（問題20ページ）</p>
              <p>線対称（問題20ページ）</p>
              <p>点図形（問題20ページ）</p>
              <p>積み木・立体図形（問題20ページ）</p>
              <p>図形の構成・分割（問題20ページ）</p>
              <p>長さ比べ（問題10ページ）</p>
              <p>ひとふで書き（問題10ページ）</p>
              <p>【数量系】問題20ページ）</p>
              <p>数の比較・釣り合い（問題20ページ）</p>
              <p>数の構成（問題20ページ）</p>
              <p></p>
              <p>【条件推理系】</p>
              <p>系列・法則性（問題20ページ）</p>
              <p>マジックボックス・魔法の箱（問題20ページ）</p>
              <p>変化の法則（問題20ページ）</p>
              <p></p>
              <p>【言語系】</p>
              <p>お話の記憶（問題10ページ）</p>
              <p></p>
              <p>
                【全問問題読み上げ音声付き】表紙にあるQRコードを読み込むと、問題を読み上げている動画が再生できます。動画は「女性ナレーター」と「男性ナレーター」があります
              </p>
              <p></p>
              <p>実際の読み上げ音声はこちら（女性版）：</p>
              <p>https://youtu.be/sWkSvvtMQpo</p>
              <p>
                すべてのプリントの表紙にQRコードがついていますので、ご自身で音声を探していただく必要がありません。
              </p>
              <p>
                基本的には、お教室などに通われているご家庭の「理解度確認」に使っていただくために、初級から入試レベルの問題となっています。
              </p>
              <p>
                ひとりでとっくん（こぐま会）やばっちりくんドリル（理英会）など市販の問題集の理解度確認としてご利用いただければと思います。
              </p>
              <p>
                小学校受験に頻出の35科目をまとめたお得なセットもございますので、よろしければそちらもご覧ください。
              </p>
              <p>
                <a herf="https://ojukenprint.stores.jp/items/65bf1650a0789104ee622e64">
                  https://ojukenprint.stores.jp/items/65bf1650a0789104ee622e64
                </a>
              </p>
              <p></p>
              <p>【内容について】</p>
              <p>
                こちらのプリントは、ダウンロード形式のデジタルコンテンツですので、何度でも印刷してご利用いただけます。
              </p>
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
              <li>
                <a href="" class="card older-card bg-white radius section-padding">
                  <div class="card-content older-card-content">
                    <h4 class="card-title older-card-title">2025年12月</h4>
                    <!-- .card-title .older-card-title end-->
                  </div>
                  <!-- .card-content older-card-content end-->
                </a>
                <!-- .card older-card end-->
              </li>
              <li>
                <a href="" class="card older-card bg-white radius section-padding">
                  <div class="card-content older-card-content">
                    <h4 class="card-title older-card-title">2025年11月</h4>
                    <!-- .card-title .older-card-title end-->
                  </div>
                  <!-- .card-content older-card-content end-->
                </a>
                <!-- .card older-card end-->
              </li>
              <li>
                <a href="" class="card older-card bg-white radius section-padding">
                  <div class="card-content older-card-content">
                    <h4 class="card-title older-card-title">2025年10月</h4>
                    <!-- .card-title .older-card-title end-->
                  </div>
                  <!-- .card-content older-card-content end-->
                </a>
                <!-- .card older-card end-->
              </li>
            </ul>
            <!-- .card-list older-card-list end-->
            <a href="" class="link btn btn-yellow">もっと見る</a>
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