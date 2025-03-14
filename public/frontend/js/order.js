document.addEventListener("DOMContentLoaded", function () {
    const citySelect = document.getElementById("city");
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

    const selectedDistrict = districtSelect.value;
    const selectedWard = wardSelect.value;

    // Khi chọn thành phố -> Load quận/huyện
    citySelect.addEventListener("change", function () {
        const cityId = this.value;
        districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn Xã/Phường</option>';
        wardSelect.disabled = true;

        if (cityId) {
            fetch(`/api/location/districts/${cityId}`)
                .then((response) => response.json())
                .then((data) => {
                    data.forEach((district) => {
                        const option = document.createElement("option");
                        option.value = district.id;
                        option.textContent = district.name;
                        if (district.id == selectedDistrict)
                            option.selected = true;
                        districtSelect.appendChild(option);
                    });
                    districtSelect.disabled = false;
                    districtSelect.dispatchEvent(new Event("change"));
                })
                .catch((error) =>
                    console.error("Lỗi khi tải Quận/Huyện:", error)
                );
        } else {
            districtSelect.disabled = true;
            wardSelect.disabled = true;
        }
    });

    // Khi chọn quận/huyện -> Load xã/phường
    districtSelect.addEventListener("change", function () {
        const districtId = this.value;
        wardSelect.innerHTML = '<option value="">Chọn Xã/Phường</option>';

        if (districtId) {
            fetch(`/api/location/wards/${districtId}`)
                .then((response) => response.json())
                .then((data) => {
                    data.forEach((ward) => {
                        const option = document.createElement("option");
                        option.value = ward.id;
                        option.textContent = ward.name;
                        if (ward.id == selectedWard) option.selected = true;
                        wardSelect.appendChild(option);
                    });
                    wardSelect.disabled = false;
                })
                .catch((error) =>
                    console.error("Lỗi khi tải Xã/Phường:", error)
                );
        } else {
            wardSelect.disabled = true;
        }
    });

    // Tự động tải quận/huyện khi trang load
    if (citySelect.value) {
        citySelect.dispatchEvent(new Event("change"));
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const applyVoucherBtn = document.querySelector("#applyVoucherBtn");
    const voucherInput = document.querySelector("#voucher_code");
    const voucherMessage = document.querySelector("#voucherMessage");
    const voucherSection = document.querySelector("#voucherSection");
    const subtotalElement = document.querySelector("#subtotal");
    const finalPriceElement = document.querySelector("#finalPrice");

    applyVoucherBtn.addEventListener("click", function (e) {
        e.preventDefault();
        const voucherCode = voucherInput.value.trim();

        if (!voucherCode) {
            showMessage("Vui lòng nhập mã giảm giá", "error");
            return;
        }

        fetch("/order/apply-voucher", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({
                voucher_code: voucherCode,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    console.log(data);
                    // Hiển thị thông tin voucher
                    voucherSection.innerHTML = `
                <div class="voucher-item d-flex align-items-center mt-3">
                                            <div class="voucher-item-info">
                                                <div
                                                    class="voucher-item-detail p-3 d-flex flex-column justify-content-center flex-grow-1">
                                                    <div class="voucher-item-title d-block">
                                                        <strong>
                                                            <span>
                                                                <span class="fw-bold">${
                                                                    data.voucher
                                                                        .voucher_name
                                                                }</span>
                                                                <br>
                                                            </span>
                                                        </strong>
                                                    </div>
                                                    <div class="voucher-item-des">
                                                        <span>Tên mã giảm giá </span>
                                                        <strong>
                                                            <span>
                                                                <span>${
                                                                    data.voucher
                                                                        .voucher_code
                                                                }</span>
                                                            </span>
                                                        </strong>
                                                    </div>
                                                    <div class="voucher-item-des">
                                                        <span>Tổng tiền giảm</span>
                                                        <span class="badge bg-success ms-2">${
                                                            data.discount_amount
                                                        }</span>
                                                    </div>
                                                    <div class="voucher-item-date">
                                                        <span class="expire fw-bold">Hết hạn:
                                                        ${new Date(
                                                            data.voucher.end_date
                                                        ).toLocaleDateString(
                                                            "vi-VN"
                                                        )}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="voucher-item-action d-flex align-items-center justify-content-center">
                                                    <span class="action btn btn-danger" id="removeVoucherBtn">
                                                        <span class="copy-content">Xóa
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
            `;

                    // Cập nhật phần giảm giá
                    document.querySelector(".discount-section").innerHTML = `
                <div class="d-flex justify-content-between mt-2">
                    <p class="mb-0">Mã giảm giá</p>
                    <p class="mb-0 fw-bold text-danger" id="discountAmount">
                        - ${data.discount_amount}
                    </p>
                </div>
            `;

                    // Cập nhật tổng tiền
                    finalPriceElement.textContent = data.final_price;

                    // Hiển thị thông báo thành công
                    showMessage(data.message, "success");

                    // Thêm event listener cho nút xóa voucher
                    document
                        .getElementById("removeVoucherBtn")
                        .addEventListener("click", function () {
                            removeVoucher();
                        });
                } else {
                    showMessage(data.message, "error");
                }
            })
            .catch((error) => {
                console.error("Lỗi:", error);
                showMessage("Có lỗi xảy ra khi áp dụng mã giảm giá", "error");
            });
    });

    function removeVoucher() {
        fetch("/order/remove-voucher", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                "Content-Type": "application/json",
                Accept: "application/json",
            },
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Xóa thông tin voucher
                    voucherSection.innerHTML = "";
                    // Xóa phần giảm giá
                    document.querySelector(".discount-section").innerHTML = "";
                    // Cập nhật lại tổng tiền
                    finalPriceElement.textContent = data.final_price;
                    // Reset input
                    voucherInput.value = "";
                    // Hiển thị thông báo
                    showMessage(data.message, "success");
                }
            })
            .catch((error) => {
                console.error("Lỗi:", error);
                showMessage("Có lỗi xảy ra khi xóa mã giảm giá", "error");
            });
    }

    function showMessage(message, type = "success") {
        // Hiển thị thông báo
        voucherMessage.innerHTML = `
<div class="alert alert-${
            type === "success" ? "success" : "danger"
        } alert-dismissible fade show" role="alert">
    ${message}
</div>
`;

        // Tự động ẩn sau 3 giây
        setTimeout(() => {
            voucherMessage.innerHTML = "";
        }, 2000);
    }
});
