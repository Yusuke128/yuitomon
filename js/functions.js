const pickup_slider = new Swiper('.pickup-swiper', {
  loop: true,
  centeredSlides: true,
  spaceBetween: 28,
  slidesPerView: 'auto',
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  autoplay: {
    delay: 4000,
    speed: 600,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  }
});

//ハンバーガーメニュー
const hum = jQuery('.humberger');
const header = jQuery('.header');
const body = jQuery('body');

hum.on('click', function () {
  const isOpen = header.hasClass('open');

  header.toggleClass('open', !isOpen);
  header.attr('data-state', isOpen ? 'closed' : 'open');
  hum.attr('aria-expanded', String(!isOpen));
  body.toggleClass('no-scroll', !isOpen);
});

// SP版でナビリンククリック時にメニューを閉じる
jQuery('.link').on('click', function () {
  if (header.hasClass('open')) {
    header.removeClass('open');
    body.removeClass('no-scroll');
  }
});
