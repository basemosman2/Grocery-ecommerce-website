setTimeout(function() {
  var swiper = new Swiper('.swiper-container', {
      slidesPerView: 5,
      spaceBetween: 0,
      slidesPerGroup: 2,
      loop: true,
      loopFillGroupWithBlank: false,
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 5
        },
        480: {
          slidesPerView: 3,
          spaceBetween: 5
        },
        780: {
          slidesPerView: 4,
          spaceBetween: 5
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 0
        }
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      scrollbar: {
          el: '.swiper-scrollbar',
      },
  });
}, 1000);