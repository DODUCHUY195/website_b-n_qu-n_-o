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
                    <div class="col-12">
                    <h2>Bình luận</h2>
                    <hr>
                    <div>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người bình luận</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bình luận</th>
                                    <th>Trạng thái</th>

                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <a href="<?= BASE_URL_ADMIN . '?act=chitietkhachhang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?>
                                            </a>
                                        </td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_dang'] ?></td>
                                        <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>


                                        <td>

                                            <form action="<?= BASE_URL_ADMIN . '?act=updatetrangthaibinhluan' ?>" method="POST">
                                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_sanpham">
                                                <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">

                                                <button onclick="return confirm('Bạn có đồng muốn ẩn không')" class="btn btn-warning">
                                                    <?= $binhLuan['trang_thai'] ==1 ? 'Ẩn' : 'Bỏ Ẩn'?>
                                                </button>
                                            </form>


                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>

                        </table>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </section>
</div>


<!-- footer -->
<?php include './views/layout/footer.php'; ?>

