<footer class="footer bg-white <?php if (is_front_page()) {
                                  echo 'front-page';
                                } ?>">


  <div class="container">

    <img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="" class="footer-logo" />
    <div class="nav-container">
      <nav data-role="sns">
        <h2 class="nav-title bd bd-w5 bd-bottom bd-black">SNS</h2>
        <!-- .nav-title end-->
        <ul class="footer-sns footer-nav-list" role="list">
          <li class="list-item x">
            <a href="" class="link" target="_blank">
              <div class="social-icon bd bd-black">
                <img src="<?php echo get_template_directory_uri() ?>/img/social-icons/x-logo.png" alt="X" class="social-icon-img" />
              </div>
              <!-- .social-icon end-->
              TERRACE&nbsp;LAB.COM
            </a>
            <!-- .link end-->
          </li>
          <!-- .list-item x end-->
          <li class="list-item insta">
            <a href="" class="link" target="_blank">
              <div class="social-icon bd bd-black">
                <img src="<?php echo get_template_directory_uri() ?>/img/social-icons/Instagram-Black.png" alt="instagram-icon" class="social-icon-img" />
              </div>
              <!-- .social-icon end-->
              TERRACE&nbsp;LAB.COM
            </a>
            <!-- .link end-->
          </li>
          <!-- .list-item insta end-->
        </ul>
        <!-- .footer-sns end-->
      </nav>
      <nav data-role="footer-nav">
        <h2 class="nav-title bd bd-w5 bd-bottom bd-black">その他</h2>
        <!-- .nav-title end-->
        <ul class="footer-nav footer-nav-list" role="list">
          <li class="footer-nav-item">
            <a href="" class="link">FAQ</a>
            <!-- .link end-->
          </li>
          <!-- .footer-nav-item end-->
          <li class="footer-nav-item">
            <a href="" class="link">特商標表記</a>
            <!-- .link end-->
          </li>
          <!-- .footer-nav-item end-->
          <li class="footer-nav-item">
            <a href="" class="link">プライバシーポリシー</a>
            <!-- .link end-->
          </li>
          <!-- .footer-nav-item end-->
          <li class="footer-nav-item">
            <a href="" class="link">お問い合わせ</a>
            <!-- .link end-->
          </li>
          <!-- .footer-nav-item end-->
        </ul>
        <!-- .footer-nav end-->
      </nav>
    </div>
    <!-- .nav-container end-->
  </div>
  <!-- .container end-->
  <small class="copyright">&copy;2025&nbsp;ALL&nbsp;Rights&nbsp;Reserved.</small>
  <!-- .copyright end-->
</footer>

<?php wp_footer(); ?>
</body>

</html>