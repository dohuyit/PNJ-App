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

// document.addEventListener('DOMContentLoaded', function() {
//             let variantIndex = 1;
//             const container = document.getElementById('variants-container');
//             const addButton = document.getElementById('add-variant');

//             addButton.addEventListener('click', function() {
//                         let newRow = document.createElement('div');
//                         newRow.classList.add('variant-row', 'd-flex', 'gap-2', 'mb-2');

//                         let selectHtml = '';
//                         @foreach ($attributeGroups as $group)
//                             selectHtml += `<div>
//                 <label>{{ $group->name }}</label>
//                 <select name="attributes[${variantIndex}][{{ $group->id }}]" class="form-control">
//                     <option value="">Chọn {{ strtolower($group->name) }}</option>
//                     @foreach ($group->attributes as $attribute)
//                         selectHtml += ` < option value = "{{ $attribute->id }}" > {{ $attribute->name }} <
//                                 /option>`;
//                     @endforeach <
//                     /select> < /
//                     div > `;
//             @endforeach

//             newRow.innerHTML = selectHtml + ` <
//                         input type = "number"
//                     name = "price[${variantIndex}]"
//                     placeholder = "Giá biến thể"
//                     class = "form-control"
//                     style = "width: 120px;" >
//                         <
//                         button type = "button"
//                     class = "btn btn-danger remove-variant" > X < /button>
//                     `;

//             container.appendChild(newRow); variantIndex++;
//         });

//     container.addEventListener('click', function(e) {
//         if (e.target.classList.contains('remove-variant')) {
//             e.target.parentElement.remove();
//         }
//     });
//     });
