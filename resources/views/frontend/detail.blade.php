@extends('frontend.layouts.app')
@section('title', 'Trang chi tiết sản phẩm PNJ ')

@section('content')
    <main>
        <section id="detail-product" class="py-5">
            <div class="container">
                <div class="row d-flex justify-content-evenly">
                    <div class="col-sm-12 col-md-12 col-lg-6 product-detail-left">
                        <div class="product-image d-flex align-items-center justify-content-between">
                            <div class="block-album text-center">
                                <div class="py-4 pe-2">
                                    <div class="position-relative py-3">
                                        <div class="swiper albumCarousel ">
                                            <div class="swiper-wrapper d-flex align-items-center flex-column">
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-01.png"
                                                        alt="img-thumbnail">
                                                </div>
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-02.png"
                                                        alt="img-thumbnail">
                                                </div>
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-03.png"
                                                        alt="img-thumbnail">
                                                </div>
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-04.jpg"
                                                        alt="img-thumbnail">
                                                </div>
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-05.jpg"
                                                        alt="img-thumbnail">
                                                </div>
                                                <div class="swiper-slide bg-light">
                                                    <img class="img-thumbnail"
                                                        src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-06.jpg"
                                                        alt="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-main-image">
                                <div class="image bg-light">
                                    <img src="./image/products/gnxmxmw002401-nhan-vang-trang-y-18k-dinh-da-cz-pnj-01.png"
                                        alt="">
                                </div>
                                <div class="icon-image mt-3">
                                    <img width="30" height="25" src="./image/anh.svg" alt="icon-anh">
                                    <p class="text-center fs-6 py-1">Hình ảnh</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-description mt-2">
                            <div class="desc-heading">
                                <ul
                                    class="list-group p-0 d-flex flex-row justify-content-center align-items-center text-center">
                                    <li class="w-100 fw-bold list-group-item py-2 px-3 active">Mô tả sản phẩm</li>
                                    <li class="w-100 fw-bold list-group-item py-2 px-3">Chính sách hậu đãi</li>
                                    <li class="w-100 fw-bold list-group-item py-2 px-3">Câu hỏi thường gặp</li>
                                </ul>
                                <div class="desc-content py-4">
                                    <table class="table table-borderless mb-3 table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Trọng lượng tham khảo:</td>
                                                <td>18.28982</td>
                                            </tr>
                                            <tr>
                                                <td>Hàm lượng chất liệu:</td>
                                                <td>7500</td>
                                            </tr>
                                            <tr>
                                                <td>Loại đá chính:</td>
                                                <td>Không gắn đá</td>
                                            </tr>
                                            <tr>
                                                <td>Loại đá phụ:</td>
                                                <td>Không gắn đá</td>
                                            </tr>
                                            <tr>
                                                <td>Giới tính:</td>
                                                <td>Nữ</td>
                                            </tr>
                                            <tr>
                                                <td>Thương hiệu:</td>
                                                <td>PNJ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        Bằng việc kết hợp chất liệu <a href="#">Vàng Ý 18K</a>
                                        cùng thiết kế tinh tế, sợi
                                        <a href="#">dây chuyền vàng</a> chính là điểm nhấn nổi
                                        bật, tô điểm thêm vẻ đẹp thanh
                                        lịch và duyên dáng cho nàng. Dây đeo mảnh thích hợp với những bộ trang phục
                                        có nhiều họa tiết, đồng thời tạo
                                        điểm nhấn cân bằng với các phụ kiện to bản khác.
                                    </p>
                                    <p>
                                        Dù diện lên bộ cánh dạ tiệc hay đơn giản là outfit thường ngày, chiếc dây
                                        chuyền sẽ tạo điểm nhấn tuyệt đối
                                        xung quanh xương quai xanh và khơi gợi ánh nhìn xung quanh.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 product-detail-right">
                        <div class="title-section">
                            <div class="d-flex align-items-center gap-2">
                                <img class="img-fluid" src="./image/PNJfast-Giaotrong3h.svg" alt="icon-pnj-fast"
                                    width="55" height="35">
                                <h1 class="product-title text-primary m-0">Dây chuyền Vàng trắng Ý 18K PNJ
                                    0000W001071
                                </h1>
                            </div>
                            <p class="text-muted small d-flex justify-content-between py-2">
                                <span>Mã: GD0000W001071</span>
                                <span>(0) 132 đã bán</span>
                            </p>
                        </div>

                        <!-- Price Section -->
                        <div class="price-section">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="fs-4 text-primary">17.559.000₫</p>
                                <p class="text-secondary">
                                    Chỉ cần trả <span class="text-primary">1.463.250 ₫</span>/tháng
                                </p>
                            </div>
                            <p class="price-note text-secondary fst-italic">
                                (Giá sản phẩm thay đổi tuỳ trọng lượng vàng và đá)
                            </p>
                        </div>

                        <!-- Size Selection -->
                        <div class="size-section">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Chọn kích cỡ</span>
                                <span class="fst-italic text-decoration-underline text-secondary">Cách đo size
                                    nhẫn</span>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="size-btn rounded-2 btn btn-outline-primary active">42</button>
                                <button class="size-btn rounded-2 btn btn-outline-primary">45</button>
                                <button class="size-btn rounded-2 btn btn-outline-primary">48</button>
                            </div>
                        </div>
                        <div class="stock-status-section my-3 text-primary">
                            <span class="fw-bold">Còn hàng - </span>
                            <a href="#"><img width="24" height="24" src="./image/zalo.svg" alt="icon-zalo"></a>
                            <span>nhấn để được tư vấn và nhận ưu đãi</span>
                        </div>

                        <!-- Promotions Section -->
                        <div class="promotions-section bg-light rounded-2 mb-2 shadow">
                            <h6 class="mb-1 fs-6 p-2">Ưu đãi:</h6>
                            <ul class="list-unstyled p-2 rounded-bottom-2">
                                <li class="promotion-item d-flex align-items-start mb-2 gap-2">
                                    <span class="icon-check rounded-circle text-light">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>Giảm đến 300K khi thanh toán bằng VNPAY-QR</span>
                                </li>
                                <li class="promotion-item d-flex align-items-start mb-2 gap-2">
                                    <span class="icon-check rounded-circle text-light">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        Ưu đãi thêm lên đến 1.5tr khi thanh toán bằng thẻ TECHCOMBANK
                                    </span>
                                </li>
                                <li class="promotion-item d-flex align-items-start mb-2 gap-2">
                                    <span class="icon-check rounded-circle text-light">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>
                                        Giảm 200.000₫ khi thanh toán bằng thẻ tín
                                        dụng Muadee by HDBANK
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <!-- Benefits Section -->
                        <div
                            class="benefits-section d-flex justify-content-between text-center mb-2 bg-light p-1 rounded-2">
                            <div class="benefit-item">
                                <img src="./image/shipping-icon.svg" alt="Delivery" width="30" height="30">
                                <p class="small">MIỄN PHÍ giao trong 3 giờ</p>
                            </div>
                            <div class="benefit-item">
                                <img src="./image/shopping 247-icon.svg" alt="Service" width="30" height="30">
                                <p class="small">Phục vụ 24/7</p>
                            </div>
                            <div class="benefit-item">
                                <img src="./image/thudoi-icon.svg" alt="Return" width="30" height="30">
                                <p class="small">Thu đổi 48h</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="btns-section gap-3">
                            <button class="btn btn-danger btn-buy-now d-flex align-items-center flex-column w-100">
                                <span class="fw-bold">Mua ngay</span>
                                <span class="fst-italic">(Giao hàng miễn phí tận nhà hoặc nhận tại cửa hàng)</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-between mt-2 gap-2">
                                <button class="btn btn-primary btn-add-cart">Thêm vào giỏ hàng</button>
                                <button class="btn btn-primary btn-phone">Gọi ngay (miễn phí)</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="comment-product" class="py-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-secondary m-0">Đánh giá từ khách hàng</h2>
                        <div class="heading-comment d-flex justify-content-between">
                            <div class="left-component flex-grow-1">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="fs-2">5.0</span>
                                    <div class="rating-star text-warning">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-muited">Tổng cộng 2 đánh giá từ khách hàng</p>

                                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                                    data-bs-target="#commentModal">
                                    Viết đánh giá
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="commentModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered position-relative">
                                        <button type="button" class="btn-close position-absolute top-0"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-content px-5 py-3">
                                            <div class="modal-header border-0 ">
                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Mặt dây
                                                    chuyền Vàng trắng 10K đính đá ECZ PNJ</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center mb-2">XMXMW001928</p>
                                                <div class="text-center rating-stars mb-3">
                                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                                </div>
                                                <form>
                                                    <!-- Name -->
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Họ và tên*</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Nhập họ và tên">
                                                    </div>
                                                    <!-- Review -->
                                                    <div class="mb-3">
                                                        <label for="review" class="form-label">Chia sẻ của bạn về
                                                            sản phẩm*</label>
                                                        <textarea class="form-control" id="review" rows="4" placeholder="Nhập đánh giá của bạn"></textarea>
                                                    </div>
                                                    <!-- Tags -->
                                                    <div class="mb-3">
                                                        <div class="tag">Sản phẩm đẹp</div>
                                                        <div class="tag">Tư vấn nhiệt tình xinh đẹp</div>
                                                        <div class="tag">Gói hàng cẩn thận</div>
                                                        <div class="tag">Giao hàng nhanh chóng, an toàn</div>
                                                        <div class="tag">Chất lượng dịch vụ siêu tốt</div>
                                                    </div>
                                                    <!-- Checkbox -->
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="recommendCheck">
                                                        <label class="form-check-label" for="recommendCheck">
                                                            Sẽ giới thiệu cho bạn bè và người thân
                                                        </label>
                                                    </div>
                                                    <!-- Upload -->
                                                    <div class="mb-3 text-center">
                                                        <i class="bi bi-camera camera-icon"></i>
                                                        <p class="mb-0">Gửi hình chụp/clip quay thực tế</p>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-primary w-100">GỬI ĐÁNH
                                                    GIÁ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-component">
                                <div class="d-flex">
                                    <div class="flex-centered p-3">
                                        <div class="btn rounded-2 btn-filter active">
                                            <p>Tất cả đánh giá</p>
                                        </div>
                                    </div>
                                    <div class="flex-centered p-3">
                                        <div class="btn rounded-2 btn-filter">
                                            <p>Có hình ảnh và video</p>
                                        </div>
                                    </div>
                                    <div class="dropdown  p-3">
                                        <button class="btn btn-filter dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>5</span>
                                            <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                        </button>
                                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item d-flex gap-2 active" href="#">
                                                    <span>5</span>
                                                    <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex gap-2" href="#">
                                                    <span>4</span>
                                                    <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex gap-2" href="#">
                                                    <span>3</span>
                                                    <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex gap-2" href="#">
                                                    <span>2</span>
                                                    <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex gap-2" href="#">
                                                    <span>1</span>
                                                    <span class="text-warning"><i class="fa-solid fa-star"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-comment mt-4">
                            <div class="item-comment my-3 p-2 d-flex align-items-center gap-4 shadow-sm rounded-2">
                                <div class="infor-user flex-equal">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="rounded-circle" src="./image/avatar-default.jpg" alt="user-avatar"
                                            width="50" height="50">
                                        <div class="user-name">
                                            <p class="m-0">Nguyễn Thị Hồng</p>
                                            <p class="m-0 text-warning">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content flex-equal">
                                    <p>Sản phẩm thực tế hơi nhỏ hơn mình tưởng tượng chút, nhưng mà cũng rất ưng ý,
                                        Hôm khuya lướt web mới phát hiện có chương trình săn mã giảm 30%, thể là
                                        mình canh giật ngay mã giảm và hốt được 1 em mặt dây rất cưng</p>
                                </div>
                            </div>
                            <div class="item-comment my-3 p-2 d-flex align-items-center gap-4 shadow-sm rounded-2">
                                <div class="infor-user flex-equal">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="rounded-circle" src="./image/avatar-default.jpg" alt="user-avatar"
                                            width="50" height="50">
                                        <div class="user-name">
                                            <p class="m-0">Nguyễn Thị Hồng</p>
                                            <p class="m-0 text-warning">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content flex-equal">
                                    <p>Sản phẩm thực tế hơi nhỏ hơn mình tưởng tượng chút, nhưng mà cũng rất ưng ý,
                                        Hôm khuya lướt web mới phát hiện có chương trình săn mã giảm 30%, thể là
                                        mình canh giật ngay mã giảm và hốt được 1 em mặt dây rất cưng</p>
                                </div>
                            </div>
                            <div class="item-comment my-3 p-2 d-flex align-items-center gap-4 shadow-sm rounded-2">
                                <div class="infor-user flex-equal">
                                    <div class="d-flex align-items-center gap-2">
                                        <img class="rounded-circle" src="./image/avatar-default.jpg" alt="user-avatar"
                                            width="50" height="50">
                                        <div class="user-name">
                                            <p class="m-0">Nguyễn Thị Hồng</p>
                                            <p class="m-0 text-warning">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content flex-equal">
                                    <p>Sản phẩm thực tế hơi nhỏ hơn mình tưởng tượng chút, nhưng mà cũng rất ưng ý,
                                        Hôm khuya lướt web mới phát hiện có chương trình săn mã giảm 30%, thể là
                                        mình canh giật ngay mã giảm và hốt được 1 em mặt dây rất cưng</p>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-comment">
                            <ul class="pagination justify-content-center gap-2">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="related-product" class="my-4">
            <div class="container">
                <div class="title-group pb-3 text-secondary">
                    <h2 class="fs-4 fw-normal">Sản phẩm tương tự</h2>
                </div>
                <div class="body-swiper px-5 position-relative">
                    <div class="swiper myProducts pb-2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide card">
                                <div class="card-img position-relative">
                                    <img src="./image/products/pro1.png" class="card-img-top" alt="" />
                                    <img class="img-sub-fast" src="./image/PNJfast-Giaotrong3h.svg" alt="">
                                    <img class="img-sub-icon" src="./image/icon-tragop-2.svg" alt="">
                                </div>
                                <div class="card-body p-2">
                                    <h5 class="card-title">
                                        <a href="#">Bông tai Vàng trắng 14K đính đá Topaz PNJ
                                            TPXMW000045</a>
                                    </h5>
                                    <p class="card-text product-price">6.801.000đ</p>
                                    <div
                                        class="product-order-and-rating d-flex align-items-center justify-content-between">
                                        <div class="item-rating">
                                            <span>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </span>
                                            <span>5</span>
                                        </div>
                                        <div class="item-order">
                                            <span>200+ đã bán</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
    </main>
@endsection
