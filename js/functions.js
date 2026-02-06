//トップページスライダー

const pickup_slider = new Swiper('.pickup-swiper', {
  loop: true,
  centeredSlides: true,
  spaceBetween: 28,
  slidesPerView: 'auto',
  speed: 1000,
  navigation: {
    nextEl: '.pickup-button-next',
    prevEl: '.pickup-button-prev'
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  },
  on: {
    init() {
      pickupSlideHeight(this);
    },
    imageReady() {
      pickupSlideHeight(this);
    },
    resize() {
      pickupSlideHeight(this);
    }
  }
});

//pickupスライダーの高さ固定
function pickupSlideHeight(swiper) {
  let max = 0;
  swiper.slides.forEach((slide) => {
    slide.style.height = 'auto';
    max = Math.max(max, slide.offsetHeight);
  });
  swiper.slides.forEach((slide) => {
    slide.style.height = `${max}px`;
  });
}

// 商品詳細スライダー
const thumb_swiper = new Swiper('.single-thumb-swiper', {
  slidesPerView: 1,
  spaceBetween: 20,
  centeredSlides: true,
  watchSlidesProgress: true,
  allowTouchMove: false,
  loop: true,
  navigation: {
    nextEl: '.single-thumb-next',
    prevEl: '.single-thumb-prev'
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  }
});

const single_swiper = new Swiper('.single-swiper', {
  observer: true,
  observeParents: true,
  thumbs: {
    swiper: thumb_swiper
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

let timer = null;
let hidden = false;
let lastScrollY = window.scrollY;
let downDistance = 0;
const HIDE_THRESHOLD = 150;

window.addEventListener('scroll', () => {
  const currentY = window.scrollY;
  const diff = currentY - lastScrollY;

  if (diff > 0) {
    // 下スクロール中
    downDistance += diff;

    if (downDistance > HIDE_THRESHOLD && !header.classList.contains('open')) {
      header.classList.add('is-scroll');
      hidden = true;
    }
  } else {
    // 上スクロール
    downDistance = 0;
    header.classList.remove('is-scroll');
    hidden = false;
  }

  lastScrollY = currentY;

  // スクロール停止
  clearTimeout(timer);
  timer = setTimeout(() => {
    header.classList.remove('is-scroll');
    hidden = false;
  }, 150);
});
