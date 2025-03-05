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
            fetch(`/customer/districts/${cityId}`)
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
            fetch(`/customer/wards/${districtId}`)
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
