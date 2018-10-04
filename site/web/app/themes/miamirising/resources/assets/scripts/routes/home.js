import Swiper from 'swiper';

export default {
  init() {
      var swiper = new Swiper ('.swiper-container', {
        loop: false,
        spaceBetween: 0,
        centeredSlides: true,
        lazyload: false,
        autoplay: {
          delay: 2500,
          disableOnInteraction: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      console.log(swiper);
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};