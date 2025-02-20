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
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        on: {
            slideChangeTransitionEnd: function () {
                let activeSlide = document.querySelector(
                    ".sliderCollection .swiper-slide-active"
                );
                if (activeSlide) {
                    let collectionId = activeSlide.getAttribute("data-id");
                    updateActiveCollection(collectionId);
                }
            },
        },
    });
}

swiperSecond();

function updateActiveCollection(collectionId) {
    if (!collectionId) return;

    // Cập nhật class active trên collection
    document
        .querySelectorAll(".sliderCollection .swiper-slide")
        .forEach((slide) => {
            slide.classList.remove("active");
        });
    document
        .querySelector(
            `.sliderCollection .swiper-slide[data-id="${collectionId}"]`
        )
        ?.classList.add("active");

    // Gọi API để lấy sản phẩm
    fetch(`/get-product-by-collections/${collectionId}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Lỗi khi tải dữ liệu: ${response.status}`);
            }
            return response.json();
        })
        .then((products) => {
            let productContainer = document.querySelector("#product-list");
            productContainer.innerHTML = "";

            if (products.length === 0) {
                productContainer.innerHTML = "<p>Không có sản phẩm nào.</p>";
                return;
            }

            products.forEach((product) => {
                let imageUrl = storageUrl + product.product_image;
                let originalPrice = parseFloat(product.original_price);
                let salePrice = product.sale_price
                    ? parseFloat(product.sale_price)
                    : null;

                let formattedOriginalPrice =
                    originalPrice.toLocaleString("vi-VN") + "đ";
                let formattedSalePrice = salePrice
                    ? salePrice.toLocaleString("vi-VN") + "đ"
                    : formattedOriginalPrice;

                let priceHTML = "";
                if (salePrice !== originalPrice) {
                    // Nếu có giá khuyến mãi và giá khuyến mãi khác giá gốc
                    priceHTML = `
                                 <span class="original-price text-decoration-line-through fst-italic">${formattedOriginalPrice}</span>
                                 <span class="sale-price">${formattedSalePrice}</span>
                               `;
                } else {
                    priceHTML = `<span class="sale-price">${formattedOriginalPrice}</span>`;
                }

                let productHTML = `
                      <div class="swiper-slide card">
            <div class="card-img position-relative">
                <img src="${imageUrl}" class="card-img-top" alt="${
                    product.product_name
                }" />
                <img class="img-sub-fast" src="/frontend/image/PNJfast-Giaotrong3h.svg" alt="" />
                <img class="img-sub-icon" src="/frontend/image/icon-tragop-2.svg" alt="" />
            </div>
            <div class="card-body p-2">
                <h5 class="card-title">
                    <a href="/product/${product.id}">${product.product_name}</a>
                </h5>
                <p class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                    ${priceHTML}
                </p>
                <div class="product-order-and-rating d-flex align-items-center justify-content-between">
                    <div class="item-rating">
                        <span><i class="fa-solid fa-star text-warning"></i></span>
                        <span>${product.rating || "N/A"}</span>
                    </div>
                    <div class="item-order">
                        <span>${product.sold || 0}+ đã bán</span>
                    </div>
                </div>
            </div>
        </div>
                `;
                productContainer.innerHTML += productHTML;
            });
        })
        .catch((error) => console.error("Lỗi khi tải sản phẩm:", error));
}

// Khi tải trang, gọi API cho collection đầu tiên
document.addEventListener("DOMContentLoaded", function () {
    let firstActiveSlide = document.querySelector(
        ".sliderCollection .swiper-slide-active"
    );
    if (firstActiveSlide) {
        let collectionId = firstActiveSlide.getAttribute("data-id");
        updateActiveCollection(collectionId);
    }
});
