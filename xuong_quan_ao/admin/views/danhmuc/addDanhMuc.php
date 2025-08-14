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
             <a href="<?= BASE_URL_ADMIN . '?act=danhmuc' ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
            <div class="card-header">
              <h3 class="card-title">Thêm danh mục</h3>
            
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=themdanhmuc' ?>" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label>Tên danh mục</label>
                  <input type="text" class="form-control" placeholder="Enter" name="ten_danh_muc">

                  <?php if (isset($errors['ten_danh_muc'])) { ?>
                    <p class="text-danger"><? $errors['ten_danh_muc'] ?></p>
                  <?php } ?>

                </div>

                <div class="form-group">
                  <label>Mô tả</label>
                  <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
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