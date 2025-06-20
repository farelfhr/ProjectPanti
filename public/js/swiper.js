const swiper = new Swiper(".swiper-container", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
        slidesPerView: 1,
        spaceBetween: 20,
    },
    1024: {
        slidesPerView: 2,
        spaceBetween: 30,
    },
    },
});