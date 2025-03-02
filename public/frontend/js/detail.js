document.addEventListener("DOMContentLoaded", function () {
    const sizeButtons = document.querySelectorAll(".size-btn");
    const salePriceElement = document.getElementById("salePrice");

    sizeButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Lấy giá từ thuộc tính data-price-variant
            const selectedPrice = this.getAttribute("data-price-variant");

            // Cập nhật giá vào phần tử salePrice
            salePriceElement.textContent = selectedPrice;

            // Xóa lớp active khỏi tất cả nút và thêm vào nút được chọn
            sizeButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
