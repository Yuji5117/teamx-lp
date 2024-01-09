const swiper = new Swiper(".swiper", {
  slidesPerView: 1.3,
  spaceBetween: 15,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 1.8,
      spaceBetween: 35,
    },

    1025: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
