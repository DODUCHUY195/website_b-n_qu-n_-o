<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">shop</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- custom css -->
    <style>
    /* bố cục sản phẩm dạng grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    /* sản phẩm */
    .product-item {
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
        padding-bottom: 15px;
    }
    .product-item:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
    .product-thumb {
        position: relative;
        overflow: hidden;
    }
    .product-thumb img {
        width: 100%;
        transition: transform 0.4s ease;
    }
    .product-item:hover .product-thumb img {
        transform: scale(1.05);
    }

    /* badges */
    .product-badge {
        position: absolute;
        top: 10px;
        left: 10px;
    }
    .product-label {
        display: inline-block;
        font-size: 12px;
        padding: 3px 7px;
        border-radius: 4px;
        color: #fff;
        margin-right: 5px;
    }
    .product-label.new {
        background: #c19a6b;
    }
    .product-label.discount {
        background: #000;
    }

    /* hover button */
    .cart-hover {
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        text-align: center;
        transition: bottom 0.3s ease;
    }
    .product-item:hover .cart-hover {
        bottom: 10px;
    }
    .btn-cart {
        background: #c19a6b;
        color: #fff;
        border: none;
        padding: 6px 15px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-cart:hover {
        background: #000;
        color: #fff;
    }

    /* caption */
    .product-caption {
        padding: 10px;
    }
    .product-name a {
        font-size: 15px;
        color: #333;
        text-decoration: none;
        font-weight: 600;
    }
    .product-name a:hover {
        color: #c19a6b;
    }
    .price-box {
        margin-top: 5px;
    }
    .price-regular {
        font-size: 16px;
        font-weight: 600;
        color: #c19a6b;
    }
    .price-old {
        font-size: 14px;
        color: #999;
        margin-left: 5px;
    }

    /* responsive */
    @media (max-width: 991px) {
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 576px) {
        .product-grid {
            grid-template-columns: repeat(1, 1fr);
        }
    }
    </style>

    <!-- shop main wrapper start -->
    <div class="shop-main-wrapper section-padding py-5">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <aside class="sidebar-wrapper">
                        <!-- categories -->
                         <h5 class="sidebar-title">Danh mục</h5><hr>
                         <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                        <div class="sidebar-single">
                            
                            <div class="sidebar-body">
                                <ul class="shop-categories">
                                    <li><a href="#"> <?= $danhMuc['ten_danh_muc']?></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                         <?php endforeach ?>
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop products start -->
                <div class="col-lg-9">
                    <div class="shop-top-bar mb-4">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                <div class="top-bar-left">
                                    <div class="product-view-mode">
                                        <a class="active" href="#"><i class="fa fa-th"></i></a>
                                        <a href="#"><i class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <p>Showing 1–16 of 21 results</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- grid sản phẩm -->
                    <div class="product-grid">
                        <?php foreach ($listSanPham as $key => $sanPham): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                                        <img class="pri-img" src="<?= BASE_URL_ADMIN . 'uploads/' . $sanPham['hinh_anh'] ?>" alt="product">
                                    </a>

                                    <!-- badges -->
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap)->days;
                                        if ($tinhNgay <= 7) { ?>
                                            <div class="product-label new"><span>Mới</span></div>
                                        <?php } ?>
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <div class="product-label discount"><span>Giảm giá</span></div>
                                        <?php } ?>
                                    </div>

                                    <!-- hover button -->
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">Xem chi tiết</button>
                                    </div>
                                </figure>

                                <div class="product-caption">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                                            <?= $sanPham['ten_san_pham'] ?>
                                        </a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach; ?>
                    </div>

                    <!-- pagination -->
                    <div class="paginatoin-area text-center mt-4">
                        <ul class="pagination-box">
                            <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- shop products end -->
            </div>
        </div>
    </div>
    <!-- shop main wrapper end -->
</main>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>
