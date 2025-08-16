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

document.addEventListener('DOMContentLoaded', function() {
    // Product Gallery Thumbnails
    const galleryThumbs = new Swiper('.product-gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            640: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 6,
            },
        },
    });
  
    // Product Gallery Main
    const galleryMain = new Swiper('.product-gallery-main', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
        keyboard: {
            enabled: true,
        },
        zoom: {
            maxRatio: 3,
        },
    });
  
    // Related Products Slider
    const relatedProducts = new Swiper('.related-products-swiper', {
        spaceBetween: 30,
        slidesPerView: 1,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
});