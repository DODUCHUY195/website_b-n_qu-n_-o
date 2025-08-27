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
        <div class="container">

            <hr>

            <div class="row">
                <!-- left column -->

                <div class="col-md-3">
                    <div class="text-center">
                        <div>
                           
                            <img src="<?php echo !empty($user['anh_dai_dien']) ? 'uploads/anhdaidien/' . $user['anh_dai_dien'] : 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcTedhGeyys0UcmRROl2mGCG-tPe1EHtfffCcgGK5y06mtQLcy-sxtqhHgeJ8ZPBiKGt2ZdAtUao1HT4pDkwj-1n8924u2pMDvTNjrldwkrO'; ?>"
                                style="width:100px"
                                alt="Ảnh đại diện">
                        </div>
                        <h6>Họ Tên: <?php echo $user['ho_ten'] ?></h6>


                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <form action="<?= BASE_URL_ADMIN . '?act=suathongtincanhan' ?>" method="POST">
                        <h3>Thông tin cá nhân</h3>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Họ tên:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="ho_ten" value="<?php echo $user['ho_ten'] ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="email" value="<?php echo $user['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">SDT:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="so_dien_thoai" value="<?php echo $user['so_dien_thoai'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Địa chỉ:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="dia_chi" value="<?php echo $user['dia_chi'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Thay đổi">
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>
                <div class="col-md-9 personal-info">
                    <form action="<?= BASE_URL_ADMIN . '?act=suamatkhaucanhan' ?>" method="POST">
                        <div class="form-group">
                            <label for="old_pass">Mật khẩu cũ</label>
                            <input type="password" name="old_pass" class="form-control" value="<?= $thongTin['mat_khau'] ?>">
                            <?php if (isset($_SESSION['error']['old_pass'])): ?>
                                <small class="text-danger"><?= $_SESSION['error']['old_pass'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="new_pass">Mật khẩu mới</label>
                            <input type="password" name="new_pass" class="form-control">
                            <?php if (isset($_SESSION['error']['new_pass'])): ?>
                                <small class="text-danger"><?= $_SESSION['error']['new_pass'] ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="confirm_pass">Nhập lại mật khẩu mới</label>
                            <input type="password" name="confirm_pass" class="form-control">
                            <?php if (isset($_SESSION['error']['confirm_pass'])): ?>
                                <small class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></small>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </form>


                </div>
            </div>

            <hr>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->


<?php include './views/layout/footer.php'; ?>

</body>

</html>