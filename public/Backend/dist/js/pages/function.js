document.querySelectorAll('input[type="file"]').forEach((input) => {
    input.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const newImage = document.getElementById("newImage");
            if (newImage) {
                // Nếu tồn tại phần tử để preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    newImage.src = e.target.result;
                    newImage.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }
    });
});

document.querySelectorAll(".removeImage").forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
        const previewImage =
            this.closest(".image-container").querySelector(".previewImage");
        if (this.checked) {
            previewImage.style.display = "none";
        } else {
            previewImage.style.display = "block";
        }
    });
});
