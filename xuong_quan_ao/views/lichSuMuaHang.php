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
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Mã đơn hàng</th>
                                        <th class="pro-title">Ngày đặt</th>
                                        <th class="pro-price">Tổng tiền</th>
                                        <th class="pro-quantity"> Phuong thức thanh toán</th>
                                        <th class="pro-subtotal">Trạng thái đơn hàng</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($donHangs as $donHang):
                                    ?> <tr>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= formatPrice($donHang['tong_tien']) ?>đ</td>
                                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                            <td>
                                                 <a href="<?= BASE_URL ?>?act=chitietmuahang&id=<?=$donHang['id']?>" class="btn btn-sqr">
                                                        Chi tiết đon hàng
                                                    </a>
                                                <?php if($donHang['trang_thai_id'] ==1):?>
                                                    <a href="<?= BASE_URL ?>?act=huydonhang&id=<?=$donHang['id']?>" class="btn btn-sqr" onclick="return confirm('Xác nhận huỷ đơn hàng!')">
                                                        Huỷ
                                                    </a>
                                        <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->

                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
</main>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>