const pickup_slider = new Swiper('.pickup-swiper', {
  loop: true,
  centeredSlides: true,
  spaceBetween: 28,
  slidesPerView: 'auto',
  speed: 1000,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  }
});

//ハンバーガーメニュー
const hum = document.querySelector('.humberger');
const header = document.querySelector('.header');
const body = document.body;

hum.addEventListener('click', () => {
  const isOpen = header.classList.contains('open');

  header.classList.toggle('open', !isOpen);
  header.setAttribute('data-state', isOpen ? 'closed' : 'open');
  hum.setAttribute('aria-expanded', String(!isOpen));
  body.classList.toggle('no-scroll', !isOpen);
  header.classList.remove('is-scroll');
});

// SP版でナビリンククリック時にメニューを閉じる
document.querySelectorAll('.link').forEach((link) => {
  link.addEventListener('click', () => {
    if (header.classList.contains('open')) {
      header.classList.remove('open');
      body.classList.remove('no-scroll');
    }
  });
});

let scrollY = window.scrollY;
let timer = null;
let hidden = false;

window.addEventListener('scroll', () => {
  const currentY = window.scrollY;
  // 下スクロールしたら隠す
  if (currentY > scrollY && currentY > 50) {
    if (!hidden && !header.classList.contains('open')) {
      header.classList.add('is-scroll');
      hidden = true;
    }
  }

  // 上スクロール時は表示
  if (currentY < scrollY) {
    header.classList.remove('is-scroll');
    hidden = false;
  }
  scrollY = currentY;

  // スクロール停止
  clearTimeout(timer);
  timer = setTimeout(() => {
    header.classList.remove('is-scroll');
    hidden = false;
  }, 150);
});
