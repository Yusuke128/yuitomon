// $(".pickup-slider").slick({
//   autoplay: true,
//   dots: false,
//   arrows: true,
//   slideToShow: 3,
//   centerMode: true,
//   centerPadding: "25%",
//   prevArrow:
//     '<button class="slick-prev pickup-arrow" aria-label="Previous"><span class="material-symbols-outlined">keyboard_arrow_left</span></button>',
//   nextArrow:
//     '<button class="slick-next pickup-arrow" aria-label="next"><span class="material-symbols-outlined">keyboard_arrow_right</span></button>',
//   responsive: [
//     {
//       breakpoint: 768,
//       settings: {
//         slideToShow: 1,
//         centerMode: false
//       }
//     }
//   ]
// });
const pickup_slider = new Swiper(".pickup-swiper", {
  loop: true,
  centeredSlides: true,
  spaceBetween: 28,
  slidesPerView: "auto",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  autoplay: {
    delay: 4000,
    speed: 600,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
  }
});

//ハンバーガーメニュー
const hum = jQuery(".humberger");
const header = jQuery(".header");
const body = jQuery("body");

hum.on("click", function () {
  header.toggleClass("open");
  body.toggleClass("no-scroll");
});

// SP版でナビリンククリック時にメニューを閉じる
jQuery(".link").on("click", function () {
  if (header.hasClass("open")) {
    header.removeClass("open");
    body.removeClass("no-scroll");
  }
});
