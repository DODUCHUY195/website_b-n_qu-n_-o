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
            <h1>   quan ly danh sách quần áo</q></h1>
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
                <a href="<?= BASE_URL_ADMIN . '?act=formthemsanpham'?>">

                <button class="btn btn-success">Thêm sản phẩm</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên sp</th>
                    <th>Ảnh sp</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Danh mục sp</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listSanPham as $key=>$sanPham):?>
                      <tr>
                        <td><?=$key+1?></td>
                        <td><?=$sanPham['ten_san_pham']?></td>
                        <td>
                          <img src="<?=BASE_URL .$sanPham['hinh_anh']?>" style="width:100px" alt=""
                          onerror="this.onerror=null;this.src='https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcTedhGeyys0UcmRROl2mGCG-tPe1EHtfffCcgGK5y06mtQLcy-sxtqhHgeJ8ZPBiKGt2ZdAtUao1HT4pDkwj-1n8924u2pMDvTNjrldwkrO'"
                          >
                      </td>
                        <td><?=$sanPham['gia_san_pham']?></td>
                        <td><?=$sanPham['so_luong']?></td>
                        <td><?=$sanPham['ten_danh_muc']?></td>
                        <td><?=$sanPham['trang_thai']==1?'Còn Bán':'Dừng Bán'?></td>
                        <td>
                          <a href="<?= BASE_URL_ADMIN . '?act=formsuasanpham&id_san_pham='.$sanPham['id']?>">

                          <button class="btn btn-warning">Sửa</button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN . '?act=xoasanpham&id_san_pham='.$sanPham['id']?>" onclick="return confirm('Bạn có đồng ý xoá không')"><button class="btn btn-danger">Xoá</button></a>
                          
                        </td>
                      </tr>
                      <?php endforeach ?>
                     
                  </tbody>
                  <tfoot>
                  <tr>
                   
                     <th>STT</th>
                    <th>Tên sp</th>
                    <th>Ảnh sp</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Danh mục sp</th>
                    <th>Trạng thái</th>
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
 <?php include './views/layout/footer.php';?>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
