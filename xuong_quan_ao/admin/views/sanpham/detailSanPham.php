<!-- header -->
<?php include './views/layout/header.php' ?>
<!-- navbar -->
<?php include './views/layout/navbar.php' ?>
<!-- sidebar -->
<?php include './views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="card card-solid">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
            <div class="card-body">
                
                <div class="row">
                    
                    <!-- Ảnh chính -->
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h3>
                        <div class="col-12">
                            <img src="uploads/<?= $sanPham['hinh_anh'] ?>" class="product-image" alt="Ảnh sản phẩm">
                        </div>
                        <!-- Album ảnh -->
                        <div class="col-12 product-image-thumbs">
                            <?php if (!empty($albumAnh) && is_array($albumAnh)): ?>
                                <?php foreach ($albumAnh as $index => $anh): ?>
                                    <div class="product-image-thumb <?= $index === 0 ? 'active' : '' ?>">
                                        <img src="<?= BASE_URL_ADMIN . 'uploads/' . $anh['link_hinh_anh'] ?>">

                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Không có ảnh phụ cho sản phẩm này.</p>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h3>


                        <hr>
                        <h4>Giá</h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫
                            </h2>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Thêm vào giỏ
                            </div>
                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Yêu thích
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs mô tả / bình luận -->
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">
                                Mô tả
                            </a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                href="#product-comments" role="tab" aria-controls="product-comments"
                                aria-selected="false">
                                Bình luận
                            </a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                            aria-labelledby="product-desc-tab">
                            <?= nl2br(htmlspecialchars($sanPham['mo_ta'])) ?>
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                            aria-labelledby="product-comments-tab">
                            Chưa có bình luận.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- footer -->
<?php include './views/layout/footer.php'; ?>