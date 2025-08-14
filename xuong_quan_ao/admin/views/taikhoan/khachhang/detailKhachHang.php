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
                    <div class="container"><table class="table table-borderless">
                        <tbody style="font-size: large;">
                            <tr>
                                <th>Họ Tên</th>
                                <td><?= $khachHang['ho_ten']??''?></td>
                            </tr>

                            <tr>
                                <th>Ngày Sinh</th>
                                <td><?= $khachHang['ngay_sinh']??''?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?= $khachHang['email']??''?></td>
                            </tr>

                            <tr>
                                <th>Số Điện Thoại</th>
                                <td><?= $khachHang['so_dien_thoai']??''?></td>
                            </tr>

                            <tr>
                                <th>Giới Tính</th>
                                <td><?= $khachHang['gioi_tinh']==1 ? 'Nam' : 'Nu'?></td>
                            </tr>

                            <tr>
                                <th>Địa Chỉ</th>
                                <td><?= $khachHang['dia_chi']??''?></td>
                            </tr>

                            <tr>
                                <th>Trạng Thái</th>
                                <td><?= $khachHang['trang_thai'] ==1 ? 'Active':'Inactive'??''?></td>
                            </tr>
                        </tbody>
                    </table></div>
                    
                </div>
                <div class="col-12">
                    <h2>Thông tin mua hàng</h2>
                    <table>

                    </table>
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

</body>

</html>