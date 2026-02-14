<?php

/**
 * Tmplate Name: Front Page
 */
get_header(); ?>
<main>
  <?php include('footer-diagnostic.php'); ?>
  <!-- 新着・お知らせ -->
  <section class="pickup-product">
    <!-- 新着 swiper -->
    <div class="pickup-swiper swiper">
      <div class="swiper-wrapper">

        <?php //最新2件の商品を取得
        $product_args = array(
          'numberposts' => 2, // 取得する投稿数
          'post_type'   => 'product', // 投稿タイプ
          'orderby'     => 'date', // 日付でソート
          'order'       => 'DESC', // 降順
          "post_status" => 'publish',
        );
        $products = get_posts($product_args);
        foreach ($products as $product_post) :
          setup_postdata($product_post);
        ?>
          <a href="<?php the_permalink(); ?>" class="link swiper-product pickup-swiper-slide swiper-slide bd bd-navy radius">
            <?php if (has_post_thumbnail()) :
              the_post_thumbnail('woocommerce_thumbnail', ['class' => 'pickup-img']);
            else : ?>
              <img src="<?php echo wc_placeholder_img_src(); ?>" alt="No image" class="pickup-img">
            <?php endif; ?>
          </a><!-- .link swiper-product pickup-swiper-slide swiper-slide bd bd-navy radius end-->
        <?php endforeach;
        wp_reset_postdata(); ?>

        <?php
        //投稿の直近２件を表示
        $post_args = array(
          'numberposts' => 2, // 取得する投稿数
          'post_type'   => 'post', // 投稿タイプ
          'orderby'     => 'date', // 日付でソート
          'order'       => 'DESC' // 降順
        );
        $posts = get_posts($post_args);
        foreach ($posts as $post) :
          setup_postdata($post);
        ?>
          <a href="<?php echo get_permalink() ?>" class="link swiper-post pickup-swiper-slide swiper-slide bd bd-navy radius">
            <?php if (has_post_parent()): ?>
              <?php the_post_thumbnail('medium', array('class' => 'pickup-img')) ?>
            <?php else: ?>
              <img src="<?php echo wc_placeholder_img_src(); ?>" alt="No image" class="pickup-img">
            <?php endif; ?>
            <section class="ttl-box">
              <p class="title-main"><?php the_title(); ?></p><!-- .title-main end-->
              <p class="title-sub-title"><?php the_field('summary') ?></p><!-- .title-sub-title end-->
            </section><!-- .ttl-box end-->
          </a><!-- .link sipwer-post pickup-swiper-slide swiper-slide bd bd-navy radius end-->
        <?php endforeach;
        wp_reset_postdata(); ?>
      </div>
      <!-- .swiper-wrapper end-->
      <div class="swiper-button container">
        <button class="pickup-swiper-arrow swiper-arrow swiper-button-prev pickup-button-prev">
          <span class="material-symbols-outlined">keyboard_arrow_left</span>
        </button>
        <!-- .swiper-arrow swiper-prev end-->
        <button class="pickup-swiper-arrow swiper-arrow swiper-button-next pickup-button-next">
          <span class="material-symbols-outlined">keyboard_arrow_right</span>
        </button>
        <!-- .swiper-arrow swiper-next end-->
      </div>
      <!-- .swiper-button end-->
    </div>
  </section>
  <!-- .pickup-product end-->

  <!-- お悩み喚起 -->
  <section class="problem section-padding section-margin bg-white">
    <div class="container">
      <div class="title-box">
        <h2 class="title-main">こんなお悩みありませんか？</h2>
        <!-- .title-main end-->
      </div>
      <!-- .title-box end-->

      <ul class="card-list problem-list" role="list">
        <li class="card problem-card bd bd-w5 radius" data-scale="false">
          <div class="card-imgbox problem-card-imgbox">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/front-page/problem-school.png"
              alt="学校"
              class="card-img problem-card-img"
              width="129"
              height="98" />
          </div>
          <!-- .card-imgbox end-->
          <!-- <h3 class="card-title"></h3> -->
          <!-- .card-title end-->
          <div class="card-content">
            <p class="card-text">お子様の学力がわからず、受験を視野に入れて良いのか迷っている</p>
          </div>
          <!-- .card-content end-->
        </li>
        <!-- .card problem-card end-->
        <li class="card problem-card bd bd-w5 radius" data-scale="false">
          <div class="card-imgbox problem-card-imgbox">
            <img
              src="<?php echo get_template_directory_uri(); ?>/img/front-page/problem-pencil.png"
              alt="鉛筆"
              class="card-img problem-card-img"
              width="98"
              height="100" />
          </div>
          <!-- .card-imgbox end-->
          <!-- <h3 class="card-title"></h3> -->
          <!-- .card-title end-->
          <div class="card-content">
            <p class="card-text">家庭学習やお教室で頑張っているが、成長している実感がない</p>
          </div>
          <!-- .card-content end-->
        </li>
        <!-- .card problem-card end-->
        <li class="card problem-card bd bd-w5 radius" data-scale="false">
          <div class="card-imgbox problem-card-imgbox">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/problem-teach.png" alt="" class="card-img problem-card-img" />
          </div>
          <!-- .card-imgbox end-->
          <!-- <h3 class="card-title"></h3> -->
          <!-- .card-title end-->
          <div class="card-content">
            <p class="card-text">評価が教室・先生次第で、本当に妥当か不安</p>
          </div>
          <!-- .card-content end-->
        </li>
        <!-- .card problem-card end-->
        <li class="card problem-card bd bd-w5 radius" data-scale="false">
          <div class="card-imgbox problem-card-imgbox">
            <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/note.png" alt="" class="card-img problem-card-img" />
          </div>
          <!-- .card-imgbox end-->
          <!-- <h3 class="card-title"></h3> -->
          <!-- .card-title end-->
          <div class="card-content">
            <p class="card-text">模試が気軽に受けれない。また、結果が出るまで時間がかかる。</p>
          </div>
          <!-- .card-content end-->
        </li>
        <!-- .card problem-card end-->
      </ul>
      <!-- .card-list.problem-list end-->
    </div>
    <!-- .container end-->
  </section>
  <!-- .problem end-->

  <!-- テラスラボでできること -->
  <section class="feature section-padding section-margin bg-white">
    <div class="container has-seal">
      <div class="title-box">
        <h2 class="title-main">テラスラボでできること</h2>
        <!-- .title-main end-->
      </div>
      <!-- .title-box end-->
      <div class="inner feature-inner">
        <ol class="feature-list" role="list">
          <li class="feature-list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">手軽に、本格的な実力診断テスト</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">お教室の模試よりも少ない負担で、今の実力を確認できます。</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">AIによる実力の見える化</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">データで今の実力を客観的に確認できます。</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">経験者の視点も加えたフィードバック</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">成長と課題を、わかりやすくお伝えします。</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">次にやることがわかる</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">今の実力に合わせて、次の学習をご提案します。</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
        </ol>
        <!-- .feature-list end-->
        <div class="feature-imgbox">
          <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/Iphone.png" alt="" class="feture-img" />
        </div>
        <!-- .feature-imgbox end-->
      </div>
      <!-- .main-layout end-->

      <div class="seal-block">
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/cherry_pink.png" alt="さくら" class="seal seal-feature-1" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/cherry_pink_thin.png" alt="さくら" class="seal seal-feature-2" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/cherry_pink.png" alt="さくら" class="seal seal-feature-3" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/cherry_pink_thin.png" alt="さくら" class="seal seal-feature-4" />
      </div>
      <!-- .seal-block end-->
    </div>
    <!-- .container end-->
  </section>
  <!-- .feature end-->

  <!-- 使い方 -->
  <section class="howto section-padding section-margin bg-white">
    <div class="container has-seal">
      <div class="title-box">
        <h2 class="title-main">ご利用までの流れ</h2>
        <!-- .title-main end-->
      </div>
      <!-- .title-box end-->
      <section class="inner">
        <ol class="howto-list" role="list">
          <li class="howto-item">
            <div class="howto-imgcontainer bg-white bd bd-navy bd-w5">
              <div class="howto-imgbox">
                <img
                  src="<?php echo get_template_directory_uri() ?>/img/front-page/download.png"
                  alt="ダウンロードイメージ"
                  class="howto-img"
                  width="123"
                  height="89" />
              </div>
              <!-- .howto-imgbox end-->
            </div>
            <!-- .howto-imgcontainer end-->
            <div class="howto-content">
              <h3 class="howto-step-title btn btn-navy">STEP1</h3>
              <!-- .howto-step-title btn btn-navy end-->
              <div class="howto-text">
                <p>教材を購入・ダウンロード</p>
              </div>
            </div>
            <!-- .howto-content end-->
          </li>
          <!-- .howto-item end-->
          <li class="howto-item">
            <div class="howto-imgcontainer bg-white bd bd-navy bd-w5">
              <div class="howto-imgbox">
                <img
                  src="<?php echo get_template_directory_uri() ?>/img/front-page/note.png"
                  alt="テスト実施イメージ"
                  class="howto-img"
                  width="122"
                  height="121" />
              </div>
              <!-- .howto-imgbox end-->
            </div>
            <!-- .howto-img end-->
            <div class="howto-content">
              <h3 class="howto-step-title btn btn-navy">STEP2</h3>
              <!-- .howto-step-title btn btn-navy end-->
              <div class="howto-text">
                <p>テストを実施・結果を入力</p>
              </div>
            </div>
            <!-- .howto-content end-->
          </li>
          <!-- .howto-item end-->
          <li class="howto-item">
            <div class="howto-imgcontainer bg-white bd bd-navy bd-w5">
              <div class="howto-imgbox">
                <img
                  src="<?php echo get_template_directory_uri() ?>/img/front-page/feedback.png"
                  alt="フィードバックイメージ"
                  class="howto-img"
                  width="123"
                  height="120" />
              </div>
              <!-- .howto-imgbox end-->
            </div>
            <!-- .howto-img end-->
            <div class="howto-content">
              <h3 class="howto-step-title btn btn-navy">STEP3</h3>
              <!-- .howto-step-title btn btn-navy end-->
              <div class="howto-text">
                <p>結果と対策を確認</p>
                <p>※翌日〜1週間以内にフィードバック</p>
              </div>
              <!-- .howto-text end-->
            </div>
            <!-- .howto-content end-->
          </li>
          <!-- .howto-item end-->
        </ol>
        <!-- .howto-list end-->
      </section>
      <!-- .inner end-->
      <div class="seal-block">
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/eraser.png" alt="消しゴム" class="seal seal-howto-1" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/pencil.png" alt="鉛筆" class="seal seal-howto-2" />
      </div>
      <!-- .seal-block end-->
    </div>
    <!-- .container end-->
  </section>
  <!-- .howto container end-->

  <!-- 教材紹介 -->
  <section class="prep section-padding section-margin bg-white bd bd-navy bd-dashed bd-noside">
    <div class="container">
      <div class="title-box">
        <h2 class="title-main">小学校受験対策教材</h2>
      </div>
      <!-- .title-box end-->
      <ul class="prep-list card-list" role="list">
        <li class="card prep-card" data-card="first-action" data-scale="false">
          <!-- .first-action end-->
          <div class="card-content prep-card-content bd bd-yellow bg-lightyellow radius section-padding">
            <h3 class="prep-title">実力診断テスト</h3>
            <!-- .prep-title end-->
            <p class="prep-text">
              受験準備の第一歩にも！
              <br />
              今の実力をご家庭で確認できます
            </p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/test.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-yellow bg-lightyellow end-->
          <p class="first-action btn bg-yellow">まずはここから!!</p>
          <a href="<?php echo home_url('product-category/diagnostic') ?>" class="link btn btn-yellow bg-lightyellow">詳細を見る</a>
          <!-- .link btn btn-yellow bg-lightyellow end-->
        </li>
        <!-- .card prep-card  end-->
        <li class="card prep-card" data-scale="false">
          <div class="card-content prep-card-content bd bd-lightnavy bd-w5 radius section-padding">
            <h3 class="prep-title">実力診断テスト</h3>
            <!-- .prep-title end-->
            <p class="prep-text">
              定期的に実施することで
              <br />
              成長の変化を確認できます
            </p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/note.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-navy end-->
          <a href="<?php echo home_url('product-category/diagnostic') ?>" class="link btn btn-lightnavy">詳細を見る</a>
          <!-- .link btn btn-navy end-->
        </li>
        <!-- .card prep-card  end-->
        <li class="card prep-card" data-scale="false">
          <div class="card-content prep-card-content bd bd-lightnavy bd-w5 radius section-padding">
            <h3 class="prep-title">単元別教材</h3>
            <!-- .prep-title end-->
            <p class="prep-text">
              実力診断テストの結果をもとに
              <br />
              苦手をピンポイントで対策できます
            </p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/prep.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-navy end-->
          <a href="<?php echo home_url('shop') ?>" class="link btn btn-lightnavy">詳細を見る</a>
          <!-- .link btn btn-navy end-->
        </li>
        <!-- .card prep-card  end-->
      </ul>
      <!-- .prep-list card-list end-->
    </div>
    <!-- .container end-->
  </section>
  <!-- .prep end-->

  <!-- 運営・監修者 -->
  <article class="adminvoice container bg-white bd bd-navy bd-w5 radius section-padding">
    <div class="title-box">
      <h2 class="title-main">運営・監修者</h2>
      <!-- .title-main end-->
    </div>
    <div class="main-layout-reverse">
      <div class="adminvoice-left bd bd-navy bd-w5">
        <img src="<?php echo get_template_directory_uri() ?>/img/front-page/adminvoice.png" alt="" class="adminvoice-img" />
      </div>
      <!-- .adminvoice-left end-->
      <div class="adminvoice-right">
        <div class="adminvoice-message">
          <p class="adminvoice-title">もっと、子どもらしく。</p>
          <p>その笑顔を守るために、私たちにできること。</p>
          <p>&nbsp;</p>
          <p>数年前、私たち自身も一人の親として、小学校受験という選択の前に立っていました。</p>
          <p>情報の少なさ、見えない正解、周囲との比較。</p>
          <p>
            「良かれと思ってやったこと」が、
            <br />
            かえって子どもの負担になっていないかと、悩みながら進む日々でした。
          </p>
          <p>&nbsp;</p>
          <p>無事に志望校とのご縁をいただいた今、振り返って感じていることがあります。</p>
          <p>&nbsp;</p>
          <p>
            それは、判断の手がかりがあれば、
            <br />
            受験はもう少し穏やかなものになる、ということです。
          </p>
          <p>&nbsp;</p>
          <p>
            テラスラボが大切にしているのは、多くを詰め込むことではありません。
            <br />
            学力に直結するポイントを整理し、学びを無理のない形に整えること。
          </p>
          <p>
            ペーパー対策を通じて、ご家庭それぞれの考えに基づいて、
            <br />
            次の一歩を検討いただけるような環境づくりを心がけています。
          </p>
          <p>&nbsp;</p>
          <p>
            限られた大切な時間を、
            <br />
            親子にとって大切な学びや経験に使ってほしい。
          </p>
          <p>その想いから、テラスラボは生まれました。</p>
        </div>
        <!-- .adminvoice-messege end-->
        <div class="adminvoice-profile">
          <h4 class="adminvoice-title">代表者プロフィール</h4>
          <!-- .adminvoice-title end-->
          <p>
            大学院修了後、教育・IT・経営分野に携わり、
            <br />
            複雑な課題を整理・解決するプロジェクトに多数従事。
          </p>
          <p>物事を構造的に捉え、整理・設計する視点を強みとしています。</p>
          <p>
            自身の子どもの小学校受験を通じて得た実体験も、
            <br />
            同じ志を持つ運営メンバーと共にサービス設計に活かしていきます。
          </p>
        </div>
        <!-- <div class="adminvoice-name">
              <span class="adminvoice-postname">〇〇株式会社&nbsp;代表取締役</span> -->
        <!-- .adminvoice-postname end-->
        <!-- 山田&nbsp;太郎
            </div> -->
        <!-- .adminvoice-name end-->
        <!-- .adminvoice-profile end-->
      </div>
      <!-- .adminvoice-right end-->
    </div>
    <!-- .main-leyout-reverse end-->
  </article>
  <!-- .adminvoice conteiner end-->
</main>
<?php get_footer(); ?>