// document.addEventListener("DOMContentLoaded", function () {
//     const selectAllCheckbox = document.getElementById("selectAll");
//     const itemCheckboxes = document.querySelectorAll(".cart-item-checkbox");
//     const removeAllBtn = document.querySelector(".remove-all");
//     const deleteButtons = document.querySelectorAll(".delete-item");
//     const subtotalElement = document.getElementById("subtotal");
//     const totalElement = document.getElementById("total");
//     const quantityBtns = document.querySelectorAll(".quantity-btn");
//     const sizeSelects = document.querySelectorAll(".size-select");

//     // Hàm tính tổng tiền của các item được check
//     function calculateTotal() {
//         let subtotal = 0;
//         itemCheckboxes.forEach((checkbox) => {
//             if (checkbox.checked) {
//                 const cartItem = checkbox.closest(".cart-item");
//                 const priceText = cartItem.querySelector(
//                     ".text-secondary.fw-bold"
//                 ).textContent;
//                 // Chuyển đổi giá từ dạng "123,456đ" thành số
//                 const price = parseInt(priceText.replace(/[^\d]/g, ""));
//                 subtotal += price;
//             }
//         });

//         // Cập nhật hiển thị
//         subtotalElement.textContent = new Intl.NumberFormat("vi-VN", {
//             style: "currency",
//             currency: "VND",
//         })
//             .format(subtotal)
//             .replace("₫", "đ");
//         totalElement.textContent = subtotalElement.textContent;
//     }

//     // Xử lý checkbox từng item
//     itemCheckboxes.forEach((checkbox) => {
//         checkbox.addEventListener("change", function () {
//             const itemId = this.dataset.id;
//             const deleteBtn =
//                 this.closest(".cart-item").querySelector(".delete-item");

//             deleteBtn.disabled = !this.checked;

//             const allChecked = Array.from(itemCheckboxes).every(
//                 (cb) => cb.checked
//             );
//             selectAllCheckbox.checked = allChecked;
//             removeAllBtn.disabled = !allChecked;

//             calculateTotal();
//         });
//     });

//     // Xử lý checkbox chọn tất cả
//     selectAllCheckbox.addEventListener("change", function () {
//         const isChecked = this.checked;

//         itemCheckboxes.forEach((checkbox) => {
//             checkbox.checked = isChecked;
//         });

//         deleteButtons.forEach((btn) => {
//             btn.disabled = !isChecked;
//         });

//         removeAllBtn.disabled = !isChecked;
//         calculateTotal();
//     });

//     // Xử lý xóa tất cả sản phẩm
//     removeAllBtn.addEventListener("click", function () {
//         if (confirm("Bạn có chắc chắn muốn xóa tất cả sản phẩm?")) {
//             const selectedIds = Array.from(itemCheckboxes)
//                 .filter((cb) => cb.checked)
//                 .map((cb) => cb.dataset.id);

//             document.getElementById("cartIdsInput").value =
//                 selectedIds.join(",");
//             document.getElementById("deleteAllForm").submit();
//         }
//     });

//     // Xử lý tăng giảm số lượng
//     quantityBtns.forEach((btn) => {
//         btn.addEventListener("click", function () {
//             const cartId = this.dataset.cartId;
//             const input = document.querySelector(
//                 `.quantity-input[data-cart-id="${cartId}"]`
//             );
//             const currentQty = parseInt(input.value);
//             let newQty = currentQty;

//             if (this.classList.contains("plus") && currentQty < 3) {
//                 newQty = currentQty + 1;
//             } else if (this.classList.contains("minus") && currentQty > 1) {
//                 newQty = currentQty - 1;
//             }

//             if (newQty !== currentQty) {
//                 updateQuantity(cartId, newQty, input);
//             }
//         });
//     });

//     // Xử lý thay đổi size
//     sizeSelects.forEach((select) => {
//         select.addEventListener("change", function () {
//             const cartId = this.dataset.cartId;
//             const sizeId = this.value;
//             updateSize(cartId, sizeId);
//         });
//     });

//     // Hàm cập nhật số lượng qua API
//     function updateQuantity(cartId, quantity, inputElement) {
//         fetch("/cart/update-quantity", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": document.querySelector(
//                     'meta[name="csrf-token"]'
//                 ).content,
//             },
//             body: JSON.stringify({
//                 cart_id: cartId,
//                 quantity: quantity,
//             }),
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 if (data.status === "success") {
//                     inputElement.value = quantity;
//                     // Cập nhật giá hiển thị
//                     const priceElement = inputElement
//                         .closest(".cart-item")
//                         .querySelector(".text-secondary.fw-bold");
//                     priceElement.textContent = data.newPrice;
//                     // Tính lại tổng tiền nếu item được check
//                     calculateTotal();
//                 } else {
//                     alert(data.message);
//                 }
//             })
//             .catch((error) => {
//                 console.error("Error:", error);
//                 alert("Có lỗi xảy ra khi cập nhật số lượng");
//             });
//     }

//     // Hàm cập nhật size qua API
//     function updateSize(cartId, sizeId) {
//         fetch("/cart/update-size", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": document.querySelector(
//                     'meta[name="csrf-token"]'
//                 ).content,
//             },
//             body: JSON.stringify({
//                 cart_id: cartId,
//                 size_id: sizeId,
//             }),
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 if (data.status === "success") {
//                     // Cập nhật giá hiển thị
//                     const priceElement = document
//                         .querySelector(`select[data-cart-id="${cartId}"]`)
//                         .closest(".cart-item")
//                         .querySelector(".text-secondary.fw-bold");
//                     priceElement.textContent = data.newPrice;
//                     // Tính lại tổng tiền nếu item được check
//                     calculateTotal();
//                 } else {
//                     alert(data.message);
//                 }
//             })
//             .catch((error) => {
//                 console.error("Error:", error);
//                 alert("Có lỗi xảy ra khi cập nhật size");
//             });
//     }
// });

document.addEventListener("DOMContentLoaded", function () {
    const selectAllCheckbox = document.getElementById("selectAll");
    const itemCheckboxes = document.querySelectorAll(".cart-item-checkbox");
    const removeAllBtn = document.querySelector(".remove-all");
    const deleteButtons = document.querySelectorAll(".delete-item");
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");
    const quantityBtns = document.querySelectorAll(".quantity-btn");
    const sizeSelects = document.querySelectorAll(".size-select");
    const checkoutButton = document.getElementById("checkoutButton");
    const checkoutForm = document.getElementById("checkoutForm");
    const selectedCartItemsInput = document.getElementById("selectedCartItems");

    // Hàm cập nhật trạng thái disabled của các option
    function updateSizeOptions(productId, selectedSize, excludeCartId = null) {
        const productSelects = document.querySelectorAll(
            `.size-select[data-product-id="${productId}"]`
        );

        const selectedSizes = Array.from(productSelects)
            .filter((select) => select.dataset.cartId !== excludeCartId)
            .map((select) => select.value);

        productSelects.forEach((select) => {
            const options = select.querySelectorAll("option");
            options.forEach((option) => {
                const isCurrentSelection =
                    select.dataset.cartId === excludeCartId &&
                    option.value === selectedSize;
                const isAlreadySelected = selectedSizes.includes(option.value);

                option.disabled = !isCurrentSelection && isAlreadySelected;

                option.text =
                    option.getAttribute("data-original-text") || option.text;
                if (option.disabled) {
                    option.text += " (Đã chọn)";
                }
            });
        });
    }

    // Hàm tính tổng tiền của các item được check
    function calculateTotal() {
        let subtotal = 0;
        itemCheckboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                const cartItem = checkbox.closest(".cart-item");
                const priceText = cartItem.querySelector(
                    ".text-secondary.fw-bold"
                ).textContent;
                const price = parseInt(priceText.replace(/[^\d]/g, ""));
                subtotal += price;
            }
        });

        subtotalElement.textContent = new Intl.NumberFormat("vi-VN", {
            style: "currency",
            currency: "VND",
        })
            .format(subtotal)
            .replace("₫", "đ");
        totalElement.textContent = subtotalElement.textContent;
    }

    // Hàm cập nhật trạng thái nút thanh toán và danh sách item được chọn
    function updateCheckoutButton() {
        const checkedItems = Array.from(itemCheckboxes)
            .filter((checkbox) => checkbox.checked)
            .map((checkbox) => checkbox.dataset.id);

        // Enable/disable nút thanh toán
        checkoutButton.disabled = checkedItems.length === 0;

        // Cập nhật danh sách item được chọn
        selectedCartItemsInput.value = checkedItems.join(",");
    }

    // Xử lý checkbox từng item
    itemCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            const itemId = this.dataset.id;
            const deleteBtn =
                this.closest(".cart-item").querySelector(".delete-item");

            deleteBtn.disabled = !this.checked;

            const allChecked = Array.from(itemCheckboxes).every(
                (cb) => cb.checked
            );
            selectAllCheckbox.checked = allChecked;
            removeAllBtn.disabled = !allChecked;

            calculateTotal();
            updateCheckoutButton();
        });
    });

    // Xử lý checkbox chọn tất cả
    selectAllCheckbox.addEventListener("change", function () {
        const isChecked = this.checked;

        itemCheckboxes.forEach((checkbox) => {
            checkbox.checked = isChecked;
        });

        deleteButtons.forEach((btn) => {
            btn.disabled = !isChecked;
        });

        removeAllBtn.disabled = !isChecked;
        calculateTotal();
        updateCheckoutButton();
    });

    // Xử lý xóa tất cả sản phẩm
    removeAllBtn.addEventListener("click", function () {
        if (confirm("Bạn có chắc chắn muốn xóa tất cả sản phẩm?")) {
            const selectedIds = Array.from(itemCheckboxes)
                .filter((cb) => cb.checked)
                .map((cb) => cb.dataset.id);

            document.getElementById("cartIdsInput").value =
                selectedIds.join(",");
            document.getElementById("deleteAllForm").submit();
        }
    });

    // Xử lý tăng giảm số lượng
    quantityBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const cartId = this.dataset.cartId;
            const input = document.querySelector(
                `.quantity-input[data-cart-id="${cartId}"]`
            );
            const currentQty = parseInt(input.value);
            let newQty = currentQty;

            if (this.classList.contains("plus") && currentQty < 3) {
                newQty = currentQty + 1;
            } else if (this.classList.contains("minus") && currentQty > 1) {
                newQty = currentQty - 1;
            }

            if (newQty !== currentQty) {
                updateQuantity(cartId, newQty, input);
            }
        });
    });

    // Xử lý thay đổi size
    sizeSelects.forEach((select) => {
        // Lưu text gốc của các option
        select.querySelectorAll("option").forEach((option) => {
            option.setAttribute("data-original-text", option.text);
        });

        select.addEventListener("change", function () {
            const cartId = this.dataset.cartId;
            const sizeId = this.value;
            const previousValue = this.getAttribute("data-previous-value");

            // Lưu giá trị hiện tại trước khi thay đổi
            this.setAttribute("data-previous-value", sizeId);

            updateSize(cartId, sizeId);
        });

        // Lưu giá trị ban đầu
        select.setAttribute("data-previous-value", select.value);
    });

    // Hàm cập nhật số lượng qua API
    function updateQuantity(cartId, quantity, inputElement) {
        fetch("/cart/update-quantity", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                cart_id: cartId,
                quantity: quantity,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    inputElement.value = quantity;
                    const priceElement = inputElement
                        .closest(".cart-item")
                        .querySelector(".text-secondary.fw-bold");
                    priceElement.textContent = data.newPrice;
                    calculateTotal();
                } else {
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Có lỗi xảy ra khi cập nhật số lượng");
            });
    }

    // Hàm cập nhật size qua API
    function updateSize(cartId, sizeId) {
        const select = document.querySelector(
            `select[data-cart-id="${cartId}"]`
        );
        const productId = select.dataset.productId;

        fetch("/cart/update-size", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                cart_id: cartId,
                size_id: sizeId,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "success") {
                    // Cập nhật giá hiển thị
                    const priceElement = select
                        .closest(".cart-item")
                        .querySelector(".text-secondary.fw-bold");
                    priceElement.textContent = data.newPrice;

                    // Cập nhật trạng thái disabled cho tất cả select của sản phẩm này
                    updateSizeOptions(productId, sizeId, cartId);

                    // Tính lại tổng tiền nếu item được check
                    calculateTotal();
                } else {
                    // Nếu có lỗi, reset lại giá trị select về giá trị trước đó
                    select.value = select.getAttribute("data-previous-value");
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                // Reset lại giá trị select về giá trị trước đó
                select.value = select.getAttribute("data-previous-value");
                alert("Có lỗi xảy ra khi cập nhật size");
            });
    }

    // Chạy các hàm khởi tạo
    updateCheckoutButton(); // Thiết lập trạng thái ban đầu cho nút thanh toán

    // Thiết lập trạng thái ban đầu cho tất cả select
    document.querySelectorAll(".size-select").forEach((select) => {
        const productId = select.dataset.productId;
        const currentSize = select.value;
        const cartId = select.dataset.cartId;
        updateSizeOptions(productId, currentSize, cartId);
    });
});
