function swiperVetical() {
    var swiper = new Swiper(".albumCarousel", {
        direction: "vertical",
        slidesPerView: 5,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

swiperVetical();

function swiper(
    nameSwiper,
    numberSlideView,
    numberSlideSpace,
    numberDelay = 2000
) {
    var swiper = new Swiper(nameSwiper, {
        slidesPerView: 1,
        spaceBetween: 10,
        slidesPerGroup: 1,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: numberDelay,
            disableOnInteraction: false,
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // 576: {
            //   slidesPerView: 3,
            //   spaceBetween: 20,
            // },
            768: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1200: {
                slidesPerView: numberSlideView,
                spaceBetween: numberSlideSpace,
            },
        },
    });
}

swiper(".myBrand", 3, 20, 5000);
swiper(".myBestseller", 4, 10, 3000);
swiper(".myCollection", 4, 10, 4500);
swiper(".myProducts", 4, 10, 4500);

function swiperSecond() {
    var swiper = new Swiper(".sliderCollection", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: -10,
            depth: 150,
            modifier: 2.5,
            slideShadows: true,
        },
        loop: true,
        // autoplay: {
        //   delay: 5000,
        //   disableOnInteraction: false,
        // },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

swiperSecond();
