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
    numberDelay = 2000,
    dataPagination = null
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
            el: dataPagination,
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
swiper(".myNewProductJewelryLines", 3, 10, 3000);
swiper(".ProductRelated", 4, 10, 2500);

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
                // console.log(imageUrl);
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
                   <a href="/detail-product/${product.id}">
                    <div class="card-img position-relative">
                <img src="${imageUrl}" class="card-img-top" alt="${
                    product.product_name
                }" />
                <img class="img-sub-fast" src="/frontend/image/PNJfast-Giaotrong3h.svg" alt="" />
                <img class="img-sub-icon" src="/frontend/image/icon-tragop-2.svg" alt="" />
            </div>
            <div class="card-body p-2">
                <h5 class="card-title">
                    <a href="/detail-product/${product.id}">${
                    product.product_name
                }</a>
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
                   </a>
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

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".item-tags");
    let swiperInstance; // Biến lưu trữ Swiper instance

    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            buttons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            const jewelryLineId = this.getAttribute("data-id");

            fetch(`/jewelry-line/${jewelryLineId}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.message) {
                        console.error(data.message);
                        return;
                    }

                    document.querySelector(".banner-main img").src =
                        storageUrl + data.banner;
                    document.querySelector(".desc-for-tag p").textContent =
                        data.description;

                    const swiperWrapper = document.querySelector(
                        "#list-jewelryline-products"
                    );

                    // Xóa Swiper slide mà không phá vỡ Swiper
                    swiperWrapper.innerHTML = "";

                    data.products.forEach((product) => {
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

                        let priceHTML =
                            salePrice !== originalPrice
                                ? `<span class="original-price text-decoration-line-through fst-italic">${formattedOriginalPrice}</span>
                               <span class="sale-price">${formattedSalePrice}</span>`
                                : `<span class="sale-price">${formattedOriginalPrice}</span>`;

                        let productHTML = `
                            <div class="swiper-slide card">
                               <a href="/detail-product/${product.id}">
                               <div class="card-img position-relative">
                                    <img src="${imageUrl}" class="card-img-top" alt="${
                            product.product_name
                        }" />
                                    <img class="img-sub-fast" src="/frontend/image/PNJfast-Giaotrong3h.svg" alt="" />
                                    <img class="img-sub-icon" src="/frontend/image/icon-tragop-2.svg" alt="" />
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="/detail-product/${
                                            product.id
                                        }">${product.product_name}</a>
                                    </h5>
                                    <p class="card-text product-price mb-2 d-flex align-items-center justify-content-center gap-2">
                                        ${priceHTML}
                                    </p>
                                    <div class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span><i class="fa-solid fa-star text-warning"></i></span>
                                            <span>${
                                                product.rating || "N/A"
                                            }</span>
                                        </div>
                                        <div class="item-order">
                                            <span>${
                                                product.sold || 0
                                            }+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        `;
                        swiperWrapper.innerHTML += productHTML;
                    });

                    // Hủy Swiper cũ đúng cách
                    if (swiperInstance && swiperInstance.destroy) {
                        swiperInstance.destroy(true, true);
                    }

                    swiper(".myCollection", 4, 10, 4500);
                })
                .catch((error) => console.error("Error:", error));
        });
    });

    // Kích hoạt phần tử đầu tiên khi tải trang
    if (buttons.length > 0) {
        buttons[0].click();
    }

    swiper(".myCollection", 4, 10, 4500);
});
