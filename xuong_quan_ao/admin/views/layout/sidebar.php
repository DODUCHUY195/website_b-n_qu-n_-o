  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Tên đăng nhập</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN  ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=danhmuc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=donhang' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Đơn Hàng

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="fas fa-tshirt"></i>
              <p>
                Sản Phẩm

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=sanpham' ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý tài khoản

              </p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=listtaikhoanquantri' ?>" class="nav-link">
                  <i class="nav-icon far fas fa-user"></i>
                  <p>Tài Khoản Quản Trị</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=listtaikhoankhachhang' ?>" class="nav-link">
                  <i class="nav-icon far fas fa-user"></i>
                  <p>Tài Khoản Khách Hàng</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN . '?act=formsuathongtincanhan' ?>" class="nav-link">
                  <i class="nav-icon far fas fa-user"></i>
                  <p>Tài Khoản Cá Nhân</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>