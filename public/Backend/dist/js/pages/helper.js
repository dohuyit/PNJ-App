$(document).ready(function () {
    // Hàm chung xử lý tất cả các checkbox switch
    $(".custom-control-input").change(function () {
        var categoryId = $(this).data("id"); // Lấy id của danh mục
        var isActive = $(this).prop("checked"); // Lấy trạng thái của checkbox (true/false)
        var apiUrl = $(this).data("api"); // Lấy URL API từ data-api
        var Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
        });
        // Gửi AJAX đến API động
        $.ajax({
            url: apiUrl, // Dùng URL động từ data-api
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}", // Thêm CSRF token
                id: categoryId,
                is_active: isActive,
            },
            success: function (response) {
                if (response.success) {
                    Toast.fire({
                        icon: "success",
                        title: "Cập nhật dữ liệu thành công!",
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Có lỗi xảy ra, vui lòng thử lại sau!",
                    });
                }
            },
        });
    });
});
