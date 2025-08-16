<!-- header -->
<?php include './views/layout/header.php' ?>
<!-- navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- sidebar -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-6">
                    <div>
                        <h2>Thông tin khách hàng</h2>
                    </div>
                    <img src="<?= BASE_URL_ADMIN . 'uploads/' . $khachHang['anh_dai_dien'] ?>"
                        style="width:100%"
                        alt="<?= htmlspecialchars($sanPham['ho_ten']) ?>"
                        onerror="this.onerror=null;this.src='https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcTedhGeyys0UcmRROl2mGCG-tPe1EHtfffCcgGK5y06mtQLcy-sxtqhHgeJ8ZPBiKGt2ZdAtUao1HT4pDkwj-1n8924u2pMDvTNjrldwkrO'">

                </div>

                <div class="col-6">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody style="font-size: large;">
                                <tr>
                                    <th>Họ Tên</th>
                                    <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Ngày Sinh</th>
                                    <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td><?= $khachHang['email'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Số Điện Thoại</th>
                                    <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Giới Tính</th>
                                    <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nu' ?></td>
                                </tr>

                                <tr>
                                    <th>Địa Chỉ</th>
                                    <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                                </tr>

                                <tr>
                                    <th>Trạng Thái</th>
                                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?? '' ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="col-12">
                    <h2>Lịch sử mua hàng</h2>
                    <hr>
                    <div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($listDonHang as $key => $donHang): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= $donHang['tong_tien'] ?></td>
                                        <td><span class=""><?= $donHang['ten_trang_thai'] ?></span></td>
                                        <td>

                                            <a class="btn btn-primary" href="<?= BASE_URL_ADMIN . '?act=chiTietdonhang&don_hang_id=' . $donHang['id'] ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-warning" href="<?= BASE_URL_ADMIN . '?act=formsuadonhang&don_hang_id=' . $donHang['id'] ?>">
                                                <i class="fas fa-wrench"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>

                        </table>
                    </div>
                </div>


                <div class="col-12">
                    <h2>Lịch sử bình luận</h2>
                    <hr>
                    <div>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
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
                                            <a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chiTietSanPham&id=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?>
                                            </a>
                                        </td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_dang'] ?></td>
                                        <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>


                                        <td>

                                            <form action="<?= BASE_URL_ADMIN . '?act=updatetrangthaibinhluan' ?>" method="POST">
                                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_khach">
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>
</body>

</html>