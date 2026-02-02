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
        <a href="" class="link pickup-swiper-slide swiper-slide bd bd-navy radius">
          <!-- <p>slide1</p> -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/image_sample.png" alt="" class="pickup-img" />
        </a>
        <a href="" class="link pickup-swiper-slide swiper-slide bd bd-navy radius">
          <!-- slide2 -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/image_sample.png" alt="" class="pickup-img" />
        </a>
        <a href="" class="link pickup-swiper-slide swiper-slide bd bd-navy radius">
          <!-- slide3 -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/image_sample.png" alt="" class="pickup-img" />
        </a>
        <a href="" class="link pickup-swiper-slide swiper-slide bd bd-navy radius">
          <!-- slide4 -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/image_sample.png" alt="" class="pickup-img" />
        </a>
        <a href="" class="link pickup-swiper-slide swiper-slide bd bd-navy radius">
          <!-- slide5 -->
          <img src="<?php echo get_template_directory_uri(); ?>/img/image_sample.png" alt="" class="pickup-img" />
        </a>
      </div>
      <!-- .swiper-wrapper end-->
      <div class="swiper-button container">
        <button class="pickup-swiper-arrow swiper-button-prev pickup-button-prev">
          <span class="material-symbols-outlined">keyboard_arrow_left</span>
        </button>
        <!-- .swiper-arrow swiper-prev end-->
        <button class="pickup-swiper-arrow swiper-button-next pickup-button-next">
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
            <h3 class="feature-list-title">安価&and;即日結果確認可能な模試</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">一般的なお教室の模試より安く、結果も早く確認できる。</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">得意のAI分析</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">AI分析で、今の実力を客観的に見える化</p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">的確なフィードバック</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">
              成長と課題を、納得できる形でフィードバック。体験者の視点を加え、わかりやすく説明。
            </p>
            <!-- .bd bd-navy bd-w5 bd-bottom end-->
          </li>
          <!-- .feature-list-item list-item end-->
          <li class="feature-list-item list-item list-item bd bd-navy bd-w5 bd-bottom">
            <h3 class="feature-list-title">やるべきこと提案</h3>
            <!-- .feature-list-title end-->
            <p class="feature-list-content">AIと体験者の知見をもとに、次にやるべきことを提案</p>
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
            <p class="prep-text">コメント、コメント、コメント、コメント、コメント、コメント</p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/test.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-yellow bg-lightyellow end-->
          <p class="first-action btn bg-yellow">まずはここから!!</p>
          <a href="" class="link btn btn-yellow bg-lightyellow">詳細を見る</a>
          <!-- .link btn btn-yellow bg-lightyellow end-->
        </li>
        <!-- .card prep-card  end-->
        <li class="card prep-card" data-scale="false">
          <div class="card-content prep-card-content bd bd-lightnavy bd-w5 radius section-padding">
            <h3 class="prep-title">模試</h3>
            <!-- .prep-title end-->
            <p class="prep-text">コメント、コメント、コメント、コメント、コメント、コメント</p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/note.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-navy end-->
          <a href="" class="link btn btn-lightnavy">詳細を見る</a>
          <!-- .link btn btn-navy end-->
        </li>
        <!-- .card prep-card  end-->
        <li class="card prep-card" data-scale="false">
          <div class="card-content prep-card-content bd bd-lightnavy bd-w5 radius section-padding">
            <h3 class="prep-title">単元別教材</h3>
            <!-- .prep-title end-->
            <p class="prep-text">コメント、コメント、コメント、コメント、コメント、コメント</p>
            <!-- .prep-text end-->
            <div class="card-imgbox prep-imgbox">
              <img src="<?php echo get_template_directory_uri(); ?>/img/front-page/prep.png" alt="" class="prep-img" />
            </div>
            <!-- .prep-imgbox end-->
          </div>
          <!-- .bd bd-navy end-->
          <a href="" class="link btn btn-lightnavy">詳細を見る</a>
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
        <img src="<?php echo get_template_directory_uri() ?>" alt="" class="adminvoice-img" />
      </div>
      <!-- .adminvoice-left end-->
      <div class="adminvoice-right">
        <!-- .title-box end-->
        <div class="adminvoice-message">
          <p>働きながら小学校受験を実際に経験し、</p>
          <p>私立御三家にも合格をいただいたメンバーでテラスラボを運営しています。</p>
          <p>
            大手IT企業での事業開発で培った、
            <br />
            AIや分析の経験を活かし、
            <br />
            や分析の経験を活かし、小学校受験の実体験をもとに、
            <br />
            迷わず次の一歩を踏み出せるサポートを目指しています。
          </p>
        </div>
        <!-- .adminvoice-messege end-->
        <p class="adminvoice-name">
          <span class="adminvoice-postname">〇〇株式会社&nbsp;代表取締役</span>
          <!-- .adminvoice-postname end-->
          山田&nbsp;太郎
        </p>
        <!-- .adminvoice-name end-->
      </div>
      <!-- .adminvoice-right end-->
    </div>
    <!-- .main-leyout-reverse end-->
  </article>
  <!-- .adminvoice conteiner end-->
</main>
<?php get_footer(); ?>