document.addEventListener("DOMContentLoaded", function () {
    const citySelect = document.getElementById("city");
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

    const selectedDistrict = districtSelect.value;
    const selectedWard = wardSelect.value;

    // Khi chọn thành phố -> Load quận/huyện
    citySelect.addEventListener("change", function () {
        const cityId = this.value;
        districtSelect.innerHTML =
            '<option value="">Chọn Quận / Huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn Xã / Phường</option>';
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
        wardSelect.innerHTML = '<option value="">Chọn Xã / Phường</option>';

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
    const avatarCircle = document.querySelector(".avatar-circle");
    const avatarInput = document.getElementById("avatar-input");
    const avatarPreview = document.getElementById("avatar-preview");

    // Click vào avatar để mở file input
    avatarCircle.addEventListener("click", function () {
        avatarInput.click();
    });

    // Xử lý khi chọn file
    avatarInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            // Kiểm tra kích thước file
            if (file.size > 2 * 1024 * 1024) {
                // 2MB
                alert("Kích thước ảnh không được vượt quá 2MB");
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
                // Thêm animation khi thay đổi ảnh
                avatarPreview.classList.add(
                    "animate__animated",
                    "animate__fadeIn"
                );
                setTimeout(() => {
                    avatarPreview.classList.remove(
                        "animate__animated",
                        "animate__fadeIn"
                    );
                }, 1000);
            };
            reader.readAsDataURL(file);
        }
    });
});
