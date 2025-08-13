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
                <div class="col-12">
                    <h1>Quan ly tai khoan quan khach hang</h1>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sua thong tin tai khoan khach hang <?= $khachHang['ho_ten']?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=suakhachhang' ?>" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id']?>">
                        <div class="form-group col-12">
                                <label>Ho ten</label>
                                <input type="text" class="form-control" placeholder="Enter" name="ho_ten" value="<?= $khachHang['ho_ten']?> ">

                                <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                <?php } ?>

                            </div>

                            <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter" name="email" value="<?= $khachHang['email']?>">

                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>

                                </div>

                                 <div class="form-group col-12">
                                    <label>SDT</label>
                                    <input type="text" class="form-control" placeholder="Enter" name="so_dien_thoai" value="<?= $khachHang['so_dien_thoai']?>">

                                </div>

                                <div class="form-group col-12">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control" placeholder="Enter" name="ngay_sinh" value="<?= $khachHang['ngay_sinh']?>">

                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                    <?php } ?>

                                </div>
                                <div class="form-group col-12">
                                    <label>Giới tính</label>
                                    <select  id="inputStatus" name="gioi_tinh" class="form-control custom-select">
                                        <option <?= $khachHang['gioi_tinh'] ==1 ? 'selected':''?> value="1">Nam</option>
                                        <option <?= $khachHang['gioi_tinh'] !==1 ? 'selected':''?> value="2">Nữ</option>
                                    </select>

                                </div>
                                <div class="form-group col-12">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Enter" name="dia_chi" value="<?= $khachHang['dia_chi']?>">

                                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                    <?php } ?>

                                </div>

                                 <div class="form-group">
                                    <label for="inputStatus">Trang thai tai khoan</label>
                                    <select  id="inputStatus" name="trang_thai" class="form-control custom-select">
                                        <option <?= $khachHang['trang_thai'] ==1 ? 'selected':''?> value="1">Active</option>
                                        <option <?= $khachHang['trang_thai'] !==1 ? 'selected':''?> value="2">Inactive</option>
                                    </select>
                                 </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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

</body>

</html>