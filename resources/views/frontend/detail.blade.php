@extends('frontend.layouts.app')
@section('title', 'Trang chi tiết sản phẩm PNJ ')

@section('content')
    <main>
        <section id="detail-product" class="py-5">
            <form action="{{ route('client.cart.add') }}" method="post">
                @csrf;
                <input type="hidden" name="quanlity" min="1" value="1">
                <input type="hidden" name="id_product" value="{{ $dataDetail->id }}">
                <div class="container">
                    <div class="row d-flex justify-content-evenly">
                        <div class="col-sm-12 col-md-12 col-lg-6 product-detail-left">
                            <div class="product-image d-flex align-items-center justify-content-between">
                                <div class="block-album text-center">
                                    <div class="py-4 pe-2">
                                        <div class="position-relative py-3">
                                            <div class="swiper albumCarousel ">
                                                <div class="swiper-wrapper d-flex align-items-center flex-column">
                                                    @foreach ($albumImageProduct as $image)
                                                        <div class="swiper-slide bg-light">
                                                            <img class="img-thumbnail"
                                                                src="{{ Storage::url($image->image_link) }}"
                                                                alt="img-thumbnail">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-main-image">
                                    <div class="image bg-light">
                                        <img src="{{ Storage::url($dataDetail->product_image) }}" alt="">
                                    </div>
                                    <div class="icon-image mt-3">
                                        <img width="30" height="25" src="{{ asset('frontend/image/anh.svg') }}"
                                            alt="icon-anh">
                                        <p class="text-center fs-6 py-1">Hình ảnh</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-description mt-2">
                                <ul
                                    class="list-group p-0 d-flex flex-row justify-content-center align-items-center text-center">
                                    <li class="w-100 fw-bold list-group-item py-2 px-3 active" data-bs-toggle="tab"
                                        data-bs-target="#desc-product">Mô tả sản phẩm</li>
                                    <li class="w-100 fw-bold list-group-item py-2 px-3" data-bs-toggle="tab"
                                        data-bs-target="#service-policy">Chính sách hậu đãi</li>
                                    <li class="w-100 fw-bold list-group-item py-2 px-3" data-bs-toggle="tab"
                                        data-bs-target="#faq-accordion">Câu hỏi thường gặp</li>
                                </ul>
                                <div class="tab-content py-4">
                                    <div class="tab-pane fade show active" id="desc-product">
                                        <div class="table-desc mb-3">
                                            {!! $dataDetail->description !!}
                                        </div>
                                        <p>
                                            Bằng việc kết hợp chất liệu Vàng Ý 18K
                                            cùng thiết kế tinh tế, sợi
                                            dây chuyền vàng chính là điểm nhấn nổi
                                            bật, tô điểm thêm vẻ đẹp thanh
                                            lịch và duyên dáng cho nàng. Dây đeo mảnh thích hợp với những bộ trang phục
                                            có nhiều họa tiết, đồng thời tạo
                                            điểm nhấn cân bằng với các phụ kiện to bản khác.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="faq-accordion">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="heading1">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                        aria-expanded="true" aria-controls="collapse1">
                                                        Mua Online có ưu đãi gì đặc biệt cho tôi?
                                                    </button>
                                                </h2>
                                                <div id="collapse1" class="accordion-collapse collapse"
                                                    aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        PNJ mang đến nhiều trải nghiệm mua sắm hiện đại khi mua Online:
                                                        - Ưu đãi độc quyền Online với hình thức thanh toán đa dạng.
                                                        - Đặt giữ hàng Online, nhận tại cửa hàng.
                                                        - Miễn phí giao hàng từ 1-7 ngày trên toàn quốc và giao hàng trong 3
                                                        giờ
                                                        tại một số khu vực
                                                        trung tâm với các sản phẩm có gắn nhãn.
                                                        - Trả góp 0% lãi suất với đơn hàng từ 3 triệu.
                                                        - Làm sạch trang sức trọn đời, khắc tên miễn phí theo yêu cầu (tùy
                                                        kết
                                                        cấu sản phẩm) và
                                                        chính sách bảo hành, đổi trả dễ dàng tại hệ thống PNJ trên toàn
                                                        quốc.
                                                        PNJ hân hạnh phục vụ quý khách qua Hotline 1800 5454 57
                                                        (08:00-21:00,
                                                        miễn phí cuộc gọi).
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="heading2">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                        aria-expanded="false" aria-controls="collapse2">
                                                        PNJ có thu mua lại trang sức không?
                                                    </button>
                                                </h2>
                                                <div id="collapse2" class="accordion-collapse collapse"
                                                    aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        PNJ có dịch vụ thu đổi trang sức PNJ tại hệ thống cửa hàng trên toàn
                                                        quốc.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="heading3">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                        aria-expanded="false" aria-controls="collapse3">
                                                        Sản phẩm đeo lâu có xỉn màu không, bảo hành như thế nào?
                                                    </button>
                                                </h2>
                                                <div id="collapse3" class="accordion-collapse collapse"
                                                    aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        Do tính chất hóa học, sản phẩm có khả năng oxy hóa, xuống màu. PNJ
                                                        có
                                                        chính sách bảo hành
                                                        miễn phí về lỗi kỹ thuật, nước xi:
                                                        - Trang sức vàng: 6 tháng.
                                                        - Trang sức bạc: 3 tháng.
                                                        Ngoài ra, PNJ cũng cung cấp dịch vụ siêu âm làm sạch bằng máy chuyên
                                                        dụng (siêu âm, không
                                                        xi) miễn phí trọn đời tại hệ thống cửa hàng.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item mb-3">
                                                <h2 class="accordion-header" id="heading4">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse4"
                                                        aria-expanded="false" aria-controls="collapse4">
                                                        Nếu đặt mua Online mà sản phẩm không đeo vừa thì có được đổi không?
                                                    </button>
                                                </h2>
                                                <div id="collapse4" class="accordion-collapse collapse"
                                                    aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        PNJ có chính sách thu đổi trang sức vàng trong vòng 48 giờ, đổi ni/
                                                        size
                                                        trang sức bạc trong vòng 72 giờ. Quý khách sẽ được áp dụng đổi trên
                                                        hệ
                                                        thống PNJ toàn quốc.
                                                        • Sản phẩm đeo lâu có xỉn màu không, bảo hành như thế nào?
                                                        Do tính chất hóa học, sản phẩm có khả năng oxy hóa, xuống màu. PNJ
                                                        có
                                                        chính sách bảo hành miễn phí về lỗi kỹ thuật, nước xi:
                                                        - Trang sức vàng: 6 tháng.
                                                        - Trang sức bạc: 3 tháng.
                                                        Ngoài ra, PNJ cũng cung cấp dịch vụ siêu âm làm sạch bằng máy chuyên
                                                        dụng (siêu âm, không xi) miễn phí trọn đời tại hệ thống cửa hàng.
                                                        • Tôi muốn xem trực tiếp, cửa hàng nào còn hàng?
                                                        Với hệ thống cửa hàng trải rộng khắp toàn quốc, quý khách vui lòng
                                                        liên
                                                        hệ Hotline 1800 5454 57 (08:00-21:00, miễn phí cuộc gọi) để kiểm tra
                                                        cửa
                                                        hàng còn hàng và tư vấn chương trình khuyến mãi Online trước khi đến
                                                        cửa
                                                        hàng.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="service-policy">
                                        <ul>
                                            <div class="item-policy mb-3">
                                                <h5>Miễn phí bảo hành 6 tháng</h5>
                                                <li>Bảo hành 6 tháng lỗi kỹ thuật, nước xi.</li>
                                            </div>
                                            <div class="item-policy mb-3">
                                                <h5>Miễn phí siêu âm và đánh bóng bằng máy chuyên dụng trọn đời</h5>
                                                <li>Đối với sản phẩm bị oxy hóa, xuống màu, sẽ được siêu âm làm sạch bằng
                                                    máy
                                                    chuyên dụng (siêu
                                                    âm,
                                                    không xi) miễn phí trọn đời tại cửa hàng.</li>
                                                <li> Miễn phí đánh bóng, siêu âm trọn đời.</li>
                                                <li>Đối với nhẫn cưới được làm mới, đánh bóng, xi miễn phí trọn đời.
                                                </li>
                                            </div>
                                            <div class="item-policy mb-3">
                                                <h5>Miễn phí thay đá ECZ, CZ và đá tổng hợp</h5>
                                                <li>Miễn phí thay đá tổng hợp, ECZ và CZ trong suốt thời gian bảo hành.</li>
                                            </div>
                                            <div class="item-policy mb-3">
                                                <h5>
                                                    Không áp dụng bảo hành cho các trường hợp sau:</h5>
                                                <li>Dây chuyền, lắc chế tác bị đứt gãy.</li>
                                                <li>Sản phẩm bị lỗi do tác động bên ngoài, do quá trình sử dụng hoặc sử dụng
                                                    không đúng cách dẫn
                                                    đến sản
                                                    phẩm bị biến dạng hoặc hư hỏng.</li>
                                                <li>Không bảo hành kiềng, vòng, nữ trang 22K, 24K, dây chuyền, dây cổ chế
                                                    tác,
                                                    lắc chế tác bị
                                                    đứt, gãy
                                                    và sản phẩm bị lỗi do tác động bên ngoài.</li>
                                                <li>Khách hàng cung cấp thông tin truy lục hóa đơn không chính xác.</li>
                                            </div>
                                            <div class="item-policy mb-3">
                                                <h5>Lưu ý về chính sách bảo hành:</h5>
                                                <li>PNJ bảo hành các sản phẩm thuộc hệ thống cửa hàng kênh lẻ và online của
                                                    PNJ.
                                                </li>
                                                <li>
                                                    Chế độ bảo hành sản phẩm có thể thay đổi theo chính sách của PNJ đối với
                                                    các
                                                    dòng hàng và
                                                    chương
                                                    trình khuyến mãi vào từng thời điểm.</li>
                                                <li> Xem thông tin chi tiết về chính sách bảo hành vui lòng truy cập tại
                                                    đây.
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-5 product-detail-right">
                            <div class="title-section">
                                <div class="d-flex align-items-center gap-2">
                                    <img class="img-fluid" src="{{ asset('frontend/image/PNJfast-Giaotrong3h.svg') }}"
                                        alt="icon-pnj-fast" width="55" height="35">
                                    <h1 class="product-title text-primary m-0">{{ $dataDetail->product_name }}
                                    </h1>
                                </div>
                                <p class="text-muted small d-flex justify-content-between py-2">
                                    <span>Mã: {{ strtoupper('PNJ' . Str::random(8) . mt_rand(1000, 9999)) }}

                                    </span>
                                    <span>(0) 132 đã bán</span>
                                </p>
                            </div>

                            <!-- Price Section -->
                            <div class="price-section">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fs-4 text-primary" id="salePrice">{{ formatPrice($dataDetail->sale_price) }}
                                    </p>
                                    <p class="text-secondary">
                                        Chỉ cần trả <span
                                            class="text-primary">{{ formatPrice($dataDetail->sale_price * 0.05) }}</span>/tháng
                                    </p>
                                </div>
                                <p class="price-note text-secondary fst-italic">
                                    (Giá sản phẩm thay đổi tuỳ trọng lượng vàng và đá)
                                </p>
                            </div>


                            <!-- Size Selection -->
                            @if ($dataDetail->variants->isNotEmpty())
                                <div class="size-section">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span>Chọn kích cỡ</span>
                                        <span class="fst-italic text-decoration-underline text-secondary">Cách đo size
                                            nhẫn</span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        @foreach ($dataDetail->variants as $variant)
                                            @if ($variant->attribute && $variant->attribute->attributegroups->name === 'Size')
                                                <input type="hidden" name="id_variant_product"
                                                    value="{{ $variant->id }}">
                                                <button type="button" class="size-btn rounded-2 btn btn-outline-primary"
                                                    data-size-id="{{ $variant->attribute->id }}"
                                                    data-price-variant="{{ formatPrice($variant->price_variant) }}">
                                                    {{ $variant->attribute->name }}
                                                </button>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="stock-status-section my-3 text-primary">
                                <span class="fw-bold">Còn hàng - </span>
                                <a href="#"><img width="24" height="24"
                                        src="{{ asset('frontend/image/zalo.svg') }}" alt="icon-zalo"></a>
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
                                    <img src="{{ asset('frontend/image/shipping-icon.svg') }}" alt="Delivery"
                                        width="30" height="30">
                                    <p class="small">Miễn phÍ giao trong 3 giờ</p>
                                </div>
                                <div class="benefit-item">
                                    <img src="{{ asset('frontend/image/shopping 247-icon.svg') }}" alt="Service"
                                        width="30" height="30">
                                    <p class="small">Phục vụ 24/7</p>
                                </div>
                                <div class="benefit-item">
                                    <img src="{{ asset('frontend/image/thudoi-icon.svg') }}" alt="Return"
                                        width="30" height="30">
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
                                    <button type="submit" class="btn btn-primary btn-add-cart">Thêm vào giỏ hàng</button>
                                    <button class="btn btn-primary btn-phone">Gọi ngay (miễn phí)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-muited">Tổng cộng 2 đánh giá từ khách hàng</p>

                                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                                    data-bs-target="#commentModal">
                                    Viết đánh giá
                                </button>

                                <!-- Modal -->
                                <div class="modal fade modal-comment" id="commentModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered position-relative">
                                        <button type="button" class="btn-close position-absolute top-0"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-content px-5 py-3">
                                            <div class="modal-header border-0 p-0">
                                                <img src="{{ asset('frontend/image/pnj.com.vn.png') }}"
                                                    class="img-fluid mx-auto" alt="logo-pnj" width="150" />
                                            </div>
                                            <div class="infor-product mt-2">
                                                <p class="fw-bold m-0 text-center">{{ $dataDetail->product_name }}</p>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-rating">
                                                    <div class="rating d-flex justify-content-center">
                                                        <input class="radio-star" type="radio" id="star5"
                                                            name="rate" value="5" />
                                                        <label class="label-star" for="star5" title="text"></label>
                                                        <input class="radio-star" type="radio" id="star4"
                                                            name="rate" value="4" />
                                                        <label class="label-star" for="star4" title="text"></label>
                                                        <input class="radio-star" type="radio" id="star3"
                                                            name="rate" value="3" />
                                                        <label class="label-star" for="star3" title="text"></label>
                                                        <input class="radio-star" type="radio" id="star2"
                                                            name="rate" value="2" />
                                                        <label class="label-star" for="star2" title="text"></label>
                                                        <input class="radio-star" type="radio" id="star1"
                                                            name="rate" value="1" />
                                                        <label class="label-star" for="star1" title="text"></label>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="review" class="form-label fw-bold">Chia sẻ của bạn
                                                            về
                                                            sản phẩm*</label>
                                                        <textarea class="form-control" id="review" rows="8" placeholder="Nhập đánh giá của bạn"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-primary w-100">GỬI ĐÁNH
                                                        GIÁ</button>
                                                </div>
                                            </form>
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

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/detail.css') }}" />
@endpush

@push('script')
    <script src="{{ asset('frontend/js/helper.js') }}"></script>
    <script src="{{ asset('frontend/js/client.js') }}"></script>
    <script src="{{ asset('frontend/js/detail.js') }}"></script>
@endpush
