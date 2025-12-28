$(".pickup-slider").slick({
  autoplay: false,
  dots: false,
  arrows: true,
  centerMode: true,
  variableWidth: true,
  infinite: true,
  prevArrow:
    '<button class="slick-prev pickup-arrow" aria-label="Previous"><span class="material-symbols-outlined">keyboard_arrow_left</span></button>',
  nextArrow:
    '<button class="slick-next pickup-arrow" aria-label="next"><span class="material-symbols-outlined">keyboard_arrow_right</span></button>',
  responsive: [
    {
      breakpoint: 796,
      settings: {
        slidesToShow: 1
      }
    }
  ]
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
