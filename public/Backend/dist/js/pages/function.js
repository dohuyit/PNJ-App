document.addEventListener("DOMContentLoaded", function () {
    let inputs = document.querySelectorAll(".image-input");

    inputs.forEach(function (input) {
        let container = input
            .closest(".card-body")
            .querySelector(".container-img");
        let previewImage = container.querySelector(".preview-image");
        let removeBtn = container.querySelector(".remove-image");
        let deleteInput = input
            .closest(".card-body")
            .querySelector("input[name^='delete_']");

        // Kiểm tra ảnh mặc định
        if (!previewImage.src || previewImage.src === "#") {
            container.classList.add("d-none");
        }

        // Khi chọn ảnh mới
        input.addEventListener("change", function (event) {
            let file = event.target.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    container.classList.remove("d-none");
                    deleteInput.value = "0";
                };
                reader.readAsDataURL(file);
            }
        });

        // Khi nhấn nút xóa ảnh
        removeBtn.addEventListener("click", function () {
            previewImage.src = "#";
            container.classList.add("d-none");
            input.value = "";
            deleteInput.value = "1";
        });

        previewImage.addEventListener("click", function () {
            let overlay = document.createElement("div");
            overlay.classList.add("image-overlay");

            let fullImage = document.createElement("img");
            fullImage.src = previewImage.src;
            fullImage.classList.add("full-image");

            overlay.appendChild(fullImage);
            document.body.appendChild(overlay);

            document.body.style.overflow = "hidden";

            overlay.addEventListener("click", function () {
                document.body.removeChild(overlay);
                document.body.style.overflow = "";
            });
        });
    });
});

// Hiển thị album hình ảnh

document.addEventListener("DOMContentLoaded", function () {
    const previewContainer = document.getElementById("imagePreviewContainer");
    const fileInput = document.getElementById("albumImage");

    // Khi tải trang, gán sự kiện xóa cho ảnh có sẵn
    previewContainer.addEventListener("click", function (event) {
        if (
            event.target.classList.contains("remove-image") ||
            event.target.closest(".remove-image")
        ) {
            let wrapper = event.target.closest(".image-wrapper");

            if (wrapper) {
                // Tìm checkbox trong wrapper và check nó
                let checkbox = wrapper.querySelector(".delete-checkbox");
                if (checkbox) {
                    checkbox.checked = true; // Đánh dấu checkbox
                }

                wrapper.style.display = "none";
            }
        }
    });

    // Khi người dùng chọn ảnh mới từ input
    fileInput.addEventListener("change", function (event) {
        const files = event.target.files;

        // Xóa nội dung cũ chỉ khi không phải trong form edit
        if (!previewContainer.hasAttribute("data-edit-mode")) {
            previewContainer.innerHTML = "";
        }

        if (files.length > 0) {
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        // Tạo wrapper cho ảnh
                        const imageWrapper = document.createElement("div");
                        imageWrapper.classList.add("image-wrapper");

                        // Tạo phần tử ảnh
                        const imgElement = document.createElement("img");
                        imgElement.src = e.target.result;

                        // Tạo nút xóa ảnh
                        const removeButton = document.createElement("button");
                        removeButton.classList.add(
                            "remove-image",
                            "btn",
                            "btn-danger"
                        );

                        removeButton.innerHTML =
                            '<i class="fas fa-times-circle"></i>';

                        // Xóa ảnh khi nhấn vào nút
                        removeButton.addEventListener("click", function () {
                            imageWrapper.remove();
                        });

                        // Thêm sự kiện click vào ảnh để xem phóng to
                        imgElement.addEventListener("click", function () {
                            let overlay = document.createElement("div");
                            overlay.classList.add("image-overlay");

                            let fullImage = document.createElement("img");
                            fullImage.src = imgElement.src;
                            fullImage.classList.add("full-image");

                            overlay.appendChild(fullImage);
                            document.body.appendChild(overlay);

                            document.body.style.overflow = "hidden";

                            overlay.addEventListener("click", function () {
                                document.body.removeChild(overlay);
                                document.body.style.overflow = "";
                            });
                        });

                        // Thêm ảnh và nút xóa vào wrapper
                        imageWrapper.appendChild(imgElement);
                        imageWrapper.appendChild(removeButton);
                        previewContainer.appendChild(imageWrapper);
                    };

                    reader.readAsDataURL(file);
                }
            }
        }
    });
});
