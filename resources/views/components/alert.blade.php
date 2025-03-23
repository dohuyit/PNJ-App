<script>
    @if (session('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1800
        });
    @elseif (session('error'))
        // Swal.fire({
        //     position: "center",
        //     icon: "error",
        //     title: "{{ session('error') }}",
        //     showConfirmButton: false,
        //     timer: 1800
        // });

        Swal.fire({
            icon: "error",
            title: "Lỗi...",
            text: "{{ session('error') }}",
        });
    @endif
</script>
