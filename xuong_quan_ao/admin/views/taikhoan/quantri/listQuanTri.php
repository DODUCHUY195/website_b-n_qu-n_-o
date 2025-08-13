<!-- header -->
<?php include './views/layout/header.php' ?>
<!-- navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- sidebar -->
<?php include './views/layout/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Quản Lý Tai Khoan Quan Tri Vien</q></h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=formthemquantri' ?>">

                <button class="btn btn-success">Thêm tai khoan</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ho Ten</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Trang Thai</th>
                    <th>Thao tác</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listQuanTri as $key => $quanTri): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $quanTri['ho_ten'] ?></td>
                      <td><?= $quanTri['email'] ?></td>
                      <td><?= $quanTri['so_dien_thoai'] ?></td>
                      <td><?= $quanTri['trang_thai'] == 1 ?'Active' :'Inactive' ?></td>

                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=formsuaquantri&id_quan_tri=' . $quanTri['id'] ?>">

                          <button class="btn btn-warning">Sửa Tai Khoan</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=resetpassword&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có đồng muốn reset password không')"><button class="btn btn-danger">Reset</button></a>

                      </td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
                <tfoot>
                  <tr>
                     <th>STT</th>
                    <th>Ho Ten</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Trang Thai</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->

</body>

</html>