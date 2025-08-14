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

                    <div class="card card-primary">
                        <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Thêm sản phẩm</h3>
                            
                            
                           
                        </div>


                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN ?>?act=themsanpham " method="POST" enctype="multipart/form-data">
                            <div class="row card-body">
                                <div class="form-group col-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Enter" name="ten_san_pham">

                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                                    <?php } ?>

                                </div>


                                <div class="form-group col-6">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control" placeholder="Enter" name="gia_san_pham">

                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                                    <?php } ?>

                                </div>

                                <div class="form-group col-6">
                                    <label>Giá khuyến mãi</label>
                                    <input type="number" class="form-control" placeholder="Enter" name="gia_khuyen_mai">

                                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                                    <?php } ?>

                                </div>


                                <div class="form-group col-6">
                                    <label>Hình Ảnh</label>
                                    <input type="file" class="form-control" placeholder="Enter" name="hinh_anh">

                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                                    <?php } ?>

                                </div>

                                <div class="form-group col-6">
                                    <label>Album ảnh</label>
                                    <input type="file" class="form-control" placeholder="Enter" name="img_array[]" multiple>
                                </div>


                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="text" class="form-control" placeholder="Enter" name="so_luong">

                                    <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                                    <?php } ?>

                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control" placeholder="Enter" name="ngay_nhap">

                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                                    <?php } ?>

                                </div>


                                <div class="form-group col-6">
                                    <label>Mô tả</label>
                                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
                                </div>


                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">

                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                                            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                        <?php endforeach ?>

                                    </select>

                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                    <?php } ?>

                                </div>

                                <div class="form-group col-6">
                                    <label>Trangk thái</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">

                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <option value="1">Còn bán</option>
                                        <option value="2">Hết bán</option>

                                    </select>

                                    <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                    <?php } ?>

                                </div>


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