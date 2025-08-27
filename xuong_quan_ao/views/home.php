<?php require_once 'layout/header.php'; ?>

<?php require_once 'layout/menu.php'; ?>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
  <style>
   .thumb {
      width: 100%;
      height: 600px;
      object-fit: cover;
      border-radius: 10px;
    }


/* Nếu muốn custom thêm style */
.hero-slider-active .slick-prev,
.hero-slider-active .slick-next {
    background: rgba(0,0,0,0.5);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    z-index: 100;
}

   
  </style>

<main>
    <!-- hero slider area start -->
    <?php if (!empty($listAnhSanPham)): ?>
<section class="slider-area hero-style-five slider">
    <div class="hero-slider-active slick-arrow-style_hero slick-arrow-style slick-dot-style">
        <?php foreach ($listAnhSanPham as $anhSanPham): ?>
            <div class="single-slider">
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $anhSanPham['id'] ?>">
                <img class="thumb" src="<?= BASE_URL_ADMIN . 'uploads/' . $anhSanPham['hinh_anh'] ?>" 
                     alt="Ảnh đại diện sản phẩm <?= $anhSanPham['id'] ?>" />
        </a>
            </div>
        <?php endforeach ?>
    </div>
</section>
<?php endif; ?>



    <!-- service policy area start -->
    <div class="service-policy">
        <div class="container">
            <div class="policy-block section-padding">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao hàng</h6>
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ trợ</h6>
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hoàn tiền</h6>
                                <p>Hoàn tiền trong 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh toán</h6>
                                <p>Bảo mật thanh toán</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm của chúng tôi</h2>
                        <p class="sub-title">Sản phẩm được cập nhập liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL_ADMIN . 'uploads/' . $sanPham['hinh_anh'] ?>" alt="product">

                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap)->days;
                                                    if ($tinhNgay <= 7) { ?>
                                                        <div class="product-label new">
                                                            <span>Mới</span>

                                                        <?php } ?>
                                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                            <div class="product-label discount">
                                                                <span>Giảm giá</span>
                                                            </div>
                                                        <?php } ?>



                                                        </div>

                                                        <div class="cart-hover">
                                                            <button class="btn btn-cart">Xem chi tiết</button>
                                                        </div>
                                            </figure>
                                            <div class="product-caption">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'd' ?> </span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'd' ?> </del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'd' ?> </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->





<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$('.hero-slider-active').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>'
});


</script>

</main>

<?php require_once 'layout/footer.php'; ?>