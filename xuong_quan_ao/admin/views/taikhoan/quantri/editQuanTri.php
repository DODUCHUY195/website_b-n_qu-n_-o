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
                    <h1>Quan ly tai khoan quan tri vien</h1>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sua thong tin tai khoan quan tri vien <?= $quanTri['ho_ten']?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=suaquantri' ?>" method="POST">
                            <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id']?>">
                        <div class="form-group col-12">
                                <label>Ho ten</label>
                                <input type="text" class="form-control" placeholder="Enter" name="ho_ten" value="<?= $quanTri['ho_ten']?> ">

                                <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                <?php } ?>

                            </div>

                            <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter" name="email" value="<?= $quanTri['email']?>">

                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>

                                </div>

                                 <div class="form-group col-12">
                                    <label>SDT</label>
                                    <input type="text" class="form-control" placeholder="Enter" name="so_dien_thoai" value="<?= $quanTri['so_dien_thoai']?>">

                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php } ?>

                                </div>

                                 <div class="form-group">
                                    <label for="inputStatus">Trang thai tai khoan</label>
                                    <select  id="inputStatus" name="trang_thai" class="form-control custom-select">
                                        <option <?= $quanTri['trang_thai'] ==1 ? 'selected':''?> value="1">Active</option>
                                        <option <?= $quanTri['trang_thai'] !==1 ? 'selected':''?> value="2">Inactive</option>
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