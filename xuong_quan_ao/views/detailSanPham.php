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
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Chi tiết sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <?php foreach($listAnhSanPham as $key => $anhSanPham): ?>
                                    <div class="pro-large-img img-zoom">
                                            <img src="<?= BASE_URL_ADMIN .'uploads/'. $sanPham['hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                       <?php endforeach ?>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <?php foreach($listAnhSanPham as $key => $anhSanPham): ?>
                                    <div class="pro-large-img img-zoom">
                                            <img src="<?= BASE_URL_ADMIN .'uploads/album/'. $anhSanPham['link_hinh_anh']?>" alt="product-details" />
                                        </div>
                                       <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name">
                                               
                                                <a href="#"><?= $listDanhMuc['ten_danh_muc']?> </a>   
                                       
                                        </div>

                                        <h3 class="product-name"><?= $sanPham['ten_san_pham']?></h3>
                                        <div>
                                           
                                            <p><?= $soLuongBinhLuan . 'Bình luận'?></p>
                                        </div>
                                        <div class="price-box">
                                           <div class="price-box">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']).'d' ?> </span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']).'d' ?> </del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']).'d' ?> </span>
                                                    <?php } ?>
                                                </div>
                                        </div>
                                        
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span><?='Trong kho: '. $sanPham['so_luong']?></span>
                                        </div>
                                        <p class="pro-desc">
                                           <?= $sanPham['mo_ta']?></p>
                                           <form action="<?= BASE_URL.'?act=themgiohang'?>" method="post">
                                            <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'];?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                            </div>
                                            <div class="action_link">
                                                <button class="btn btn-cart2" >Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                           </form>
                                        
                                       
                                       
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận: <?= $soLuongBinhLuan?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            
                                            <div class="tab-pane fade show active" id="tab_three">
                                                <?php foreach($listBinhluan as $binhLuan):?>
                                                
                                                    
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= $binhLuan['anh_dai_dien']?>" alt="failed">
                                                        </div>
                                                        <p><?= $binhLuan['ho_ten']?>:<?= $binhLuan['noi_dung']?></p>
                                                    </div>
                                                   <?php endforeach ?>
                                                    <form action="#" class="review-form">
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Nội dung bình luận</label>
                                                            <textarea class="form-control" required></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Bình Luận</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Liên Quan</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>



                
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            
                              <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL .'?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL_ADMIN .'uploads/'. $sanPham['hinh_anh'] ?>" alt="product">
                                                    
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
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']).'d' ?> </span>
                                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']).'d' ?> </del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']).'d' ?> </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                        <?php endforeach; ?>

                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>


<?php require_once 'layout/miniCart.php'; ?>
    <?php require_once 'layout/footer.php'; ?>
