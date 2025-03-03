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
