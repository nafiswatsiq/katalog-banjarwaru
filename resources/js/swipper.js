import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const heroSwiper = new Swiper('.hero-swiper', {
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    // pagination: {
    //     el: '.swiper-pagination',
    //     clickable: true,
    // },
    speed: 1000,
});