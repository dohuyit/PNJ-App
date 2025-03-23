document.addEventListener("DOMContentLoaded", function () {
    const sizeButtons = document.querySelectorAll(".size-btn");
    const salePriceElement = document.getElementById("salePrice");
    const selectedVariantInput = document.getElementById("selected_variant_id");

    sizeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Lấy giá và variant ID từ thuộc tính data
            const selectedPrice = this.getAttribute("data-price-variant");
            const variantId = this.getAttribute("data-variant-id");

            // Cập nhật giá vào phần tử salePrice
            salePriceElement.textContent = selectedPrice;

            // Cập nhật variant ID vào input hidden
            selectedVariantInput.value = variantId;

            // Xóa lớp active khỏi tất cả nút và thêm vào nút được chọn
            sizeButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");
        });
    });
});

// Raiting component

document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".radio-star");

    stars.forEach((star) => {
        star.addEventListener("change", function () {
            const value = this.value;

            // Xóa tất cả các class active trước
            document.querySelectorAll(".label-star").forEach((label) => {
                label.style.color = "#666";
            });

            // Đánh dấu tất cả các sao từ vị trí chọn về bên trái
            for (let i = 1; i <= value; i++) {
                document.querySelector(`label[for="star${i}"]`).style.color =
                    "#ffa723";
            }
        });
    });
});
