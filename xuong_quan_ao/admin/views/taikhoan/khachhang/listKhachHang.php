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
                    <h1> Quản Lý Tài Khoản Khách Hàng</q></h1>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>SDT</th>
                                        <th>Trạng Thái</th>
                                        <th>Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $khachHang): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $khachHang['ho_ten'] ?></td>
                                            <td>
                                                <img src="<?= BASE_URL_ADMIN . 'uploads/' . $khachHang['anh_dai_dien'] ?>"
                                                    style="width:100px"
                                                    alt="<?= htmlspecialchars($sanPham['ho_ten']) ?>"
                                                    onerror="this.onerror=null;this.src='https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcTedhGeyys0UcmRROl2mGCG-tPe1EHtfffCcgGK5y06mtQLcy-sxtqhHgeJ8ZPBiKGt2ZdAtUao1HT4pDkwj-1n8924u2pMDvTNjrldwkrO'">
                                            </td>
                                            <td><?= $khachHang['email'] ?></td>
                                            <td><?= $khachHang['so_dien_thoai'] ?></td>
                                            <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                            <td>
                                                <div class="btn-group">
                                                     <a class="btn btn-primary" href="<?= BASE_URL_ADMIN . '?act=chitietkhachhang&id_khach_hang=' . $khachHang['id'] ?>">

                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN . '?act=formsuakhachhang&khach_hang_id=' . $khachHang['id'] ?>">

                                                        <i class="fas fa-wrench"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN . '?act=resetpassword&khach_hang_id=' . $khachHang['id'] ?>" onclick="return confirm('Bạn có đồng muốn reset password không')"><i class="fas fa-trash-alt"></i></a>
                                                 

                                                </div>
                                            </td>
                                           
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Email</th>
                                        <th>SDT</th>
                                        <th>Trạng Thái</th>
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